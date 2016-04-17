<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	private $data = array(
		'title' => 'Modus',
		'slug' => NULL,
	);

	public function __construct() {

		parent::__construct();

		$this->load->helper(array('language', 'cookie'));
		$this->load->library('Auth');
		$this->load->model(array('Page'));

		set_language();

		$this->load->language(array('general'));

		$this->data['user'] = $this->auth->get_current_user();
		$this->data['navigation'] = $this->Page->get_navigation();
	}

	public function index()	{

		$this->data['address_1'] = lang('address_1');
		$this->data['address_2'] = lang('address_2');
		
		$this->load->view('pages/home', $this->data);
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */