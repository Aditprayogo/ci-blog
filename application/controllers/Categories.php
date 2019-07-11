<?php

    class Categories extends CI_Controller 
    {
        public function index()
        {
            # code...
            $data['title'] = 'Category';
            $data['categories'] = $this->category_model->get_categories();
            $this->load->view('templates/header', $data);
            $this->load->view('categories/index', $data);
            $this->load->view('templates/footer');
        }

        public function create()
        {
            # code...
            //check login 
            // if (!$this->session->userdata('loggged_in')) {
            //     # code...
            //     redirect('users/login');
            // }
 
            $data['title'] = 'Create Category';

            $this->form_validation->set_rules('name', 'Name', 'required');
           
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header', $data);
                $this->load->view('categories/create', $data);
                $this->load->view('templates/footer');
            }else{
                $this->category_model->create_category();

                //set flash massage
                $this->session->set_flashdata('category_created', 'your category has been created');
                redirect('categories');
            }
                
        }

        public function posts($id)
        {
            # code...
            $data['title'] = $this->category_model->get_category($id)->name;
            $data['posts'] = $this->Post_model->get_posts_by_category($id);

            $this->load->view('templates/header', $data);
            $this->load->view('posts/index', $data);
            $this->load->view('templates/footer');

        }

        public function delete($id)
	    {
            # code...
            //check login 
            if (!$this->session->userdata('logged_in')) {
                # code...
                redirect('users/login');
            }

            $this->category_model->delete_category($id);
            
            //set flash massage
            $this->session->set_flashdata('Category_deleted', 'Your category has been deleted');
            redirect('categories');
	    }
    }
    

?>