<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->library(['Auth_admin' => 'auth']);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->session->set_flashdata('error_message', lang('unauthorized'));
			redirect(base_url('login'));
		}
	}

	public function index() {

	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */