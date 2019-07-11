<?php 

    class User_model extends CI_model 
    {
        public function register($enc_password)
        {
            # code...
            //user data
            $data = [
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'zipcode' => $this->input->post('zipcode'),
                'password' => $enc_password 
            ];

            //insert data
            return $this->db->insert('users', $data);
        }

        public function login($username, $password)
        {
            # code...
            //validate
            $this->db->where('username', $username);
            $this->db->where('password', $password);

            $result = $this->db->get('users');
            //return rows
            if ($result->num_rows() == 1) {
                # code...
                return $result->row(0)->id;
            }else {
                return false;
            }
        }

        public function check_username_exists($username)
        {
            # code...
            $query = $this->db->get_where('users', ['username' => $username]);

            if (empty($query->row_array())) {
                # code...
                return true;
            }else {
                return false;
            }
        }

        public function check_email_exists($email)
        {
            # code...
            $query = $this->db->get_where('users', ['email' => $email]);

            if (empty($query->row_array())) {
                # code...
                return true;
            }else {
                return false;
            }
        }
    }
    




?>