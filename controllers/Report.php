<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isAdminLoggedIn');
        if ($this->isUserLoggedIn == false) {
            $this->session->set_flashdata('error-msg', 'Session Timed-out');
            redirect('login');
        }
    }
    public function dashboard()
    {
        $data['site_title'] = SITE_NAME . ' :: Admin Dashboard';
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'id' => $this->session->userdata('adminUserId'),
                'status' => 1
            )
        );
        $data['user_data'] = $this->user_model->getRows($con);
        $sql = "SELECT t1.*,t2.name,t2.email,t2.phone FROM `orders` as t1 INNER JOIN `user` as t2 ON t1.user_id = t2.id WHERE t1.status = '1'
        ORDER BY t1.id DESC ";
        $query = $this->db->query($sql);
        $data['order_data'] = $query->result();
        $this->load->view('templates/admin_dashboard', $data);
    }
}
