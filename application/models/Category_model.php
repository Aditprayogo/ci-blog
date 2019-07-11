<?php

    class Category_model extends CI_model 
    {
        public function __construct() {
            $this->load->database();
        }

        public function create_category()
        {
            # code...
            $data = [
                'name' => $this->input->post('name'),
                'user_id' => $this->session->userdata('user_id')
            ];

            return $this->db->insert('categories', $data);
        }

        public function get_categories()
        {
            # code...
            $this->db->order_by('name');
            return $query = $this->db->get('categories')->result_array();

        }
        public function get_category($id)
        {
            # code...
           return $query = $this->db->get_where('categories', ['id' => $id])->row();

            
        }

        public function delete_category($id)
		{
			# code...
			$this->db->where('id', $id);
			$this->db->delete('categories');
			return true;
		}



    }
    



?>