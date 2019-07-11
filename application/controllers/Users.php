<?php 


    class Users extends CI_Controller 
    {   

        //user register
        public function register()
        {
            # code...
            $data['title'] = 'Registration Form';

            //set rules
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('username', 'Username', 'required|callback_check_username_exists');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email_exists');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('password2', 'Confirm password', 'required|matches[password]');

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('users/register', $data);
                $this->load->view('templates/footer');
            }
            else
            {
               //encript password
               $enc_password = md5($this->input->post('password'));

               $this->user_model->register($enc_password);

               //set flash massage
               $this->session->set_flashdata('user_registered', 'You are now registered');
               

               redirect('posts');
            }
        }

        //login user
        public function login()
        {
            # code...
            $data['title'] = 'Login Form';

            //set rules
           
            $this->form_validation->set_rules('username', 'Username', 'required');
            
            $this->form_validation->set_rules('password', 'Password', 'required');
           

            if ($this->form_validation->run() == FALSE)
            {
                $this->load->view('templates/header',$data);
                $this->load->view('users/login', $data);
                $this->load->view('templates/footer');
            }
            else
            {
              
                //Get username
                $username = $this->input->post('username');

                //encript password
                $password = md5($this->input->post('password'));

                //login user
                $user_id = $this->user_model->login($username, $password);

                    if ($user_id) {
                        # code...
                        //create session
                        $user_data = [
                            'user_id' => $user_id,
                            'username' => $username,
                            'logged_in' => true
                        ];

                        //set userdata
                        $this->session->set_userdata($user_data);
                        //set flash massage
                        $this->session->set_flashdata('login_success', 'You are now logged in');

                        redirect('posts');
                    } else {
                        # code...
                        //set flash massage
                        $this->session->set_flashdata('login_failed', 'Username/password incorrect');
                        redirect('users/login');
                    }
    

            }
        }

        //log out 
        public function logout()
        {
            # code...
            //unset session
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('user_id');

             //set flash massage
             $this->session->set_flashdata('logout_success', 'You are now logged out');

             redirect('users/login');

        }

        //check username exists
        public function check_username_exists($username)
        {
            # code...
            $this->form_validation->set_message('check_username_exists', 'Username already exists.');
           
            if ($this->user_model->check_username_exists($username)) {
                # code...
                
                return true;
               
            } else {
                # code...
                return false;
            }
            
        }

        //untuk check email
        public function check_email_exists($email)
        {
            # code...
            $this->form_validation->set_message('check_email_exists', 'Email already exists.');
           
            if ($this->user_model->check_email_exists($email)) {
                # code...
                
                return true;
               
            } else {
                # code...
                return false;
            }
            
        }


    }

?>