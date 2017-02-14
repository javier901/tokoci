<?php

/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 1/27/17
 * Time: 1:20 PM
 */
class Login extends CI_Controller {

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
        //$this->form_validation->set_rules('password', 'Password', 'required|password');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('form_login');
        } else {
            $this->load->model('Model_users');
            $valid_user = $this->Model_users->check_credential();

            if ($valid_user == FALSE)
            {
                $this->session->set_flashdata('error', 'Wrong Username/Password');
                redirect('login');
            } else {
                //jika user dan password match
                $this->session->set_userdata('username', $valid_user->username);
                $this->session->set_userdata('groups', $valid_user->groups);
                //$this->session->set_userdata('password', $valid_user->password);

                switch ($valid_user->groups) {
                    case 1  : //admin
                                redirect('admin/products');
                                break;
                    case 2  : //member
                                redirect(base_url());
                                break;
                    default : break;
                }


            }

        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}