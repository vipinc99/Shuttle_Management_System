<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $data['site_title'] = SITE_NAME . ' :: Admin Login';
        $this->load->view('templates/admin_login', $data);
    }
    public function login_exe()
    {
        $this->load->model('user_model');
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'status' => 1,
                'is_admin' => 1
            )
        );
        $checkLogin = $this->user_model->getRows($con);
        if ($checkLogin) {
            $this->session->set_userdata('isAdminLoggedIn', TRUE);
            $this->session->set_userdata('adminUserId', $checkLogin['id']);
            $this->session->set_flashdata('success-msg', 'Login Success!');
            redirect('report/dashboard/');
        } else {
            $data['error_msg'] = 'Wrong email or password, please try again.';
            $this->session->set_flashdata('error-msg', $data['error_msg']);
            redirect('admin');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('isAdminLoggedIn');
        $this->session->unset_userdata('adminUserId');
        $this->session->sess_destroy();
        $this->session->set_flashdata('error-msg', 'Logged out successfully!');
        redirect('admin');
    }
}
