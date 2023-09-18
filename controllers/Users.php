<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn');
        if ($this->isUserLoggedIn == false) {
            $this->session->set_flashdata('error-msg', 'Session Timed-out');
            redirect('login');
        }
    }
    public function dashboard()
    {
        $data['site_title'] = SITE_NAME . ' :: Dashboard';
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'id' => $this->session->userdata('userId'),
                'status' => 1
            )
        );
        $data['user_data'] = $this->user_model->getRows($con);
        $data['order_data'] = $this->session->userdata('order_data');
        $this->load->view('templates/dashboard', $data);
    }
    public function profile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data['site_title'] = SITE_NAME . ' :: Update Profile';
            $con = array(
                'returnType' => 'single',
                'conditions' => array(
                    'id' => $this->session->userdata('userId'),
                    'status' => 1
                )
            );
            $data['user_data'] = $this->user_model->getRows($con);
            $this->load->view('templates/profile', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $setData = array(
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone')
            );
            if ($this->input->post('password') != '') {
                $setData['password'] = md5($this->input->post('password'));
            }
            $this->db->set($setData);
            $this->db->where(array(
                'id' => $this->session->userdata('userId')
            ));
            $this->db->update('user');
            $this->session->set_flashdata('success-msg', 'Profile Updated!.');
            redirect('users/profile');
        }
    }
    public function wallet()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data['site_title'] = SITE_NAME . ' :: Wallet';
            $con = array(
                'returnType' => 'single',
                'conditions' => array(
                    'id' => $this->session->userdata('userId'),
                    'status' => 1
                )
            );
            $data['user_data'] = $this->user_model->getRows($con);
            $query = $this->db->get_where('wallet', array('user_id' => $this->session->userdata('userId')));
            $data['user_wallet'] = $query->row();
            $this->load->view('templates/wallet', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->trans_start();
            $insertData = array(
                'user_id' => $this->session->userdata('userId'),
                'type' => 1,
                'amount' => $this->input->post('amount'),
                'transaction_id' => time(),
                'description' => 'Top-Up',
                'status' => 1
            );
            $this->db->insert('wallet_transaction', $insertData);
            // Update Wallet
            $query = $this->db->get_where('wallet', array('user_id' => $this->session->userdata('userId')));
            unset($insertData['type']);
            unset($insertData['transaction_id']);
            unset($insertData['description']);
            unset($insertData['status']);
            if ($query->num_rows() > 0) { // update wallet
                $user_wallet = $query->row();
                $total = $user_wallet->amount + $this->input->post('amount');
                $this->db->set('amount', $total);
                $this->db->where(array('user_id' => $this->session->userdata('userId')));
                $this->db->update('wallet');
            } else { // insert wallet
                $this->db->insert('wallet', $insertData);
            }
            $this->db->trans_complete();
            $this->session->set_flashdata('success-msg', '₹' . $insertData['amount'] . ' Added into Wallet!.');
            redirect('users/wallet');
        }
    }
    public function shuttle()
    {
        $data['site_title'] = SITE_NAME . ' :: Available Shuttle';
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'id' => $this->session->userdata('userId'),
                'status' => 1
            )
        );
        $data['user_data'] = $this->user_model->getRows($con);
        $this->load->view('templates/shuttle', $data);
    }
    public function trip($type = '')
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data['site_title'] = SITE_NAME . ' :: Checkout';
            $con = array(
                'returnType' => 'single',
                'conditions' => array(
                    'id' => $this->session->userdata('userId'),
                    'status' => 1
                )
            );
            $data['user_data'] = $this->user_model->getRows($con);
            $data['shuttle_type'] = $type;
            $this->load->view('templates/checkout', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->session->set_userdata('checkoutData', $_POST);
            redirect('users/payment');
        }
    }
    public function payment()
    {
        $query = $this->db->get_where('wallet', array('user_id' => $this->session->userdata('userId')));
        $data['user_wallet'] = $query->row();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $data['site_title'] = SITE_NAME . ' :: Payment';
            $con = array(
                'returnType' => 'single',
                'conditions' => array(
                    'id' => $this->session->userdata('userId'),
                    'status' => 1
                )
            );
            $data['user_data'] = $this->user_model->getRows($con);
            $data['shuttle_type'] = $this->session->userdata('checkoutData');
            $this->load->view('templates/payment', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->db->trans_start();
            extract($data);
            $orderData = array(
                'user_id' => $this->session->userdata('userId'),
                'type' => $this->input->post('type'),
                'source' => $this->input->post('source'),
                'destination' => $this->input->post('destination'),
                'amount' => $this->input->post('amount'),
                'transaction_id' => time()
            );
            /** Order placed */
            $this->db->insert('orders', $orderData);
            $trackData['trip'] = $_POST;
            $trackData['order_id'] = $this->db->insert_id();
            $trackData['transaction_id'] = $orderData['transaction_id'];
            $trackData['date'] = date("Y-m-d");
            /** Insert Transaction */
            $transactionData = array(
                'user_id' => $this->session->userdata('userId'),
                'type' => 2,
                'amount' => $orderData['amount'],
                'transaction_id' => $orderData['transaction_id'],
                'description' => 'Paid for Shuttle Booking',
                'status' => 1
            );
            $this->db->insert('wallet_transaction', $transactionData);

            /** Update Wallet */
            if ($user_wallet->amount >= $orderData['amount']) {
                $total = ($user_wallet->amount - $orderData['amount']);
                $this->db->set('amount', $total);
                $this->db->where(array('user_id' => $this->session->userdata('userId')));
                $this->db->update('wallet');
            } else {
                $this->session->set_flashdata('success-msg', 'Insufficient Fund');
                redirect('users/payment');
            }
            $this->db->trans_complete();
            $this->session->set_userdata('order_data', $trackData);
            $this->session->set_flashdata('success-msg', 'Shuttle booked successfully');
            redirect('users/track_order');
        }
    }
    public function track_order()
    {
        $data['order_data'] = $this->session->userdata('order_data');
        $data['site_title'] = SITE_NAME . ' :: Order Success';
        $con = array(
            'returnType' => 'single',
            'conditions' => array(
                'id' => $this->session->userdata('userId'),
                'status' => 1
            )
        );
        $data['user_data'] = $this->user_model->getRows($con);
        $this->load->view('templates/success', $data);
    }
}
