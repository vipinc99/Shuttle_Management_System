<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
    }
    public function index()
    {
        if ($this->isUserLoggedIn) {
            redirect('users/dashboard');
        }
        $data['site_title'] = SITE_NAME . ' :: Login';
        $this->load->view('templates/login', $data);
    }
    public function login_exe()
    {
        $this->load->model('user_model');
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'status' => 1
            )
        );
        $checkLogin = $this->user_model->getRows($con);
        if ($checkLogin) {
            $this->session->set_userdata('isUserLoggedIn', TRUE);
            $this->session->set_userdata('userId', $checkLogin['id']);
            $this->session->set_flashdata('success-msg', 'Login Success!');
            redirect('users/dashboard/');
        } else {
            $data['error_msg'] = 'Wrong email or password, please try again.';
            $this->session->set_flashdata('error-msg', $data['error_msg']);
            redirect('login');
        }
    }
    public function register()
    {
        if ($this->isUserLoggedIn) {
            redirect('users/dashboard');
        }
        $data['site_title'] = SITE_NAME . ' :: Register';
        $this->load->view('templates/register', $data);
    }
    public function register_exe()
    {
        $user_data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'phone' => $this->input->post('phone')
        );
        $query = $this->db->get_where('user', $user_data);
        if ($query->num_rows() > 0) {
            $data['msg'] = 'User alredy registered!';
            $this->session->set_flashdata('error-msg', $data['msg']);
            redirect('login/register/');
        } else {
            $user_data['password'] = md5($this->input->post('password'));
            $this->db->insert('user', $user_data);
            $data['inserted_id'] = $this->db->insert_id();
            $data['msg'] = 'Registration Success!';
            $this->session->set_userdata('isUserLoggedIn', TRUE);
            $this->session->set_userdata('userId', $data['inserted_id']);
            $this->session->set_flashdata('success-msg', $data['msg']);
            redirect('users/dashboard/');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('isUserLoggedIn');
        $this->session->unset_userdata('userId');
        $this->session->sess_destroy();
        $this->session->set_flashdata('error-msg', 'Logged out successfully!');
        redirect('login');
    }
}
