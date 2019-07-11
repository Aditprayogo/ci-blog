<?php 


class Posts extends CI_Controller {
	
	public function index($offset = 0)
	{
        # code...
        //navigation
        $config['base_url'] = base_url() . 'posts/index/';
        $config['total_rows'] = $this->db->count_all('posts');;
        $config['per_page'] = 3;
        $config['uri_segment'] = 3;
        $config['full_tag_open'] = "<ul class='pagination'>";
        $config['full_tag_close'] ="</ul>";
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
        $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
        $config['next_tag_open'] = "<li>";
        $config['next_tagl_close'] = "</li>";
        $config['prev_tag_open'] = "<li>";
        $config['prev_tagl_close'] = "</li>";
        $config['first_tag_open'] = "<li>";
        $config['first_tagl_close'] = "</li>";
        $config['last_tag_open'] = "<li>";
        $config['last_tagl_close'] = "</li>";

        //init 
        $this->pagination->initialize($config);

		$data['title'] = 'Latest posts';
        $data['posts'] = $this->Post_model->get_posts(FALSE, $config['per_page'], $offset);
        
		$this->load->view('templates/header', $data);
		$this->load->view('posts/index', $data);
		$this->load->view('templates/footer');
	}

	public function view($slug = NULL)
	{
		# code...
        $data['post'] = $this->Post_model->get_posts($slug);
        $post_id = $data['post']['id'];
        $data['comments'] = $this->comment_model->get_comment($post_id);

		if ( empty($data['post']) ) {
			# code...
			show_404();
		}

		$data['title'] = $data['post']['title'];
		$this->load->view('templates/header', $data);
		$this->load->view('posts/view', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
        # code...
        
        //check login 
        if (!$this->session->userdata('logged_in')) {
            # code...
            redirect('users/login');
        }
        
        $data['title'] = 'Create posts';
        $data['categories'] = $this->Post_model->get_categories();

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('body', 'Body', 'required');

		if ($this->form_validation->run() === FALSE) {
			# code...
			$this->load->view('templates/header', $data);
			$this->load->view('posts/create', $data);
            $this->load->view('templates/footer');
            
		} else {	
            
            //upload image
            $config['upload_path'] = './assets/images/posts';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '2048';
            $config['max_width'] = '2000';
            $config['max_height'] = '2000';
            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload() ) {
                # code...
                $error = ['error' => $this->upload->display_errors()];

                //kalau gambar tidak ada/tidal di upload
                $post_image = 'noimage.jpg';

            }else{
                
                $data = ['upload_data' => $this->upload->data()];
                $post_image = $_FILES['userfile']['name'];

            }

            $this->Post_model->create_post($post_image);

            //set flash massage
            $this->session->set_flashdata('post_created', 'Your post has been created');
			redirect('posts');

		}
	}

	public function delete($id)
	{
        # code...
        //check login 
        if (!$this->session->userdata('logged_in')) {
            # code...
            redirect('users/login');
        }

        $this->Post_model->delete_post($id);
        
        //set flash massage
        $this->session->set_flashdata('post_deleted', 'Your post has been deleted');
		redirect('posts');
	}

	public function edit($slug)
	{
        # code...
        //check login 
        // if (!$this->session->userdata('logged_in')) {
        //     # code...
        //     redirect('posts');
        // }

        $data['post'] = $this->Post_model->get_posts($slug);

        //check user
        if ($this->session->userdata('user_id') != $this->Post_model->get_posts($slug)['user_id'] ) {
            # code...
            redirect('posts');
        }


        $data['categories'] = $this->Post_model->get_categories();

		if ( empty($data['post']) ) {
			# code...
			show_404();
		}

        $data['title'] = 'Edit post';

		$this->load->view('templates/header', $data);
		$this->load->view('posts/edit', $data);
		$this->load->view('templates/footer');
	}

    //untuk edit post
	public function update()
	{
        # code...

        $this->Post_model->update_post();
        
        //set flash massage
        $this->session->set_flashdata('post_updated', 'Your post has been updated');

		redirect('posts');

	}
}










 ?>