<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['site_title'] = SITE_NAME . ' :: Home';
		$this->load->view('templates/index', $data);
	}
	public function page($page_name = '')
	{
		$data['site_title'] = SITE_NAME . ' :: ' . $page_name;
		if ($page_name != '') {
			$this->load->view('templates/' . $page_name, $data);
		} else {
			redirect(WEB_URL);
		}
	}
}
