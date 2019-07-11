<?php 
	

	class Post_model extends CI_model {
	    public function __construct()
		{
			$this->load->database();
		}

		public function get_posts($slug = FALSE, $limit = FALSE, $offset = FALSE)
		{
            # code...
            if ($limit) {
                # code...
                $this->db->limit($limit, $offset);
            }

			if ($slug === FALSE) {
				# code...
                $this->db->order_by('posts.id', 'DESC');
                $this->db->join('categories', 'categories.id = posts.category_id' );
				$query = $this->db->get('posts');
				return $query->result_array();
			}

			return $query = $this->db->get_where('posts', ['slug' => $slug])->row_array();


		}

		public function create_post($post_image)
		{
			# code...
			$slug = url_title($this->input->post('title'));

			$data = [
				'title' => $this->input->post('title'),
				'slug'	=> $slug,
                'body'	=> $this->input->post('body'),
                'category_id' => $this->input->post('category_id'),
                'user_id' => $this->session->userdata('user_id'),
                'post_image' => $post_image
			];

			return $this->db->insert('posts', $data);
		}

		public function delete_post($id)
		{
			# code...
			$this->db->where('id', $id);
			$this->db->delete('posts');
			return true;
		}

		public function update_post()
		{
			# code...
			$slug = url_title($this->input->post('title'));
			
			$data = [
				'title' => $this->input->post('title'),
				'slug'	=> $slug,
                'body'	=> $this->input->post('body'),
                'user_id' => $this->session->userdata('user_id'),
                'category_id' => $this->input->post('category_id')
			];

			$this->db->where('id', $this->input->post('id'));
			return $this->db->update('posts', $data);

        }
        
        public function get_categories()
        {
            # code...
            $this->db->order_by('name');
            return $query = $this->db->get('categories')->result_array();

        }

        public function get_posts_by_category($category_id)
        {
            # code...
            $this->db->order_by('posts.id', 'DESC');
            $this->db->join('categories', 'categories.id = posts.category_id' );
            $query = $this->db->get_where('posts', ['category_id' => $category_id]);
            return $query->result_array();
        }
       






	}




 ?>