<?php 

    class Comment_model extends CI_model 
    {
        public function __construct() {
            $this->load->database();
        }

        public function create_comment($post_id)
        {
            # code...
            $data = [
                'post_id' => $post_id,
                'name'    => $this->input->post('name'),
                'email'    => $this->input->post('email'),
                'body'    => $this->input->post('body')
            ];

            return $this->db->insert('comments', $data);
        }

        public function get_comment($post_id)
        {
            # code...
           return $query = $this->db->get_where('comments', ['post_id' => $post_id])->result_array();
            
        }
            
    }






?>