<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

	private $data = array(
		'title' => 'Modus',
	);

	public function __construct() {

		parent::__construct();

		$this->load->helper(array('language', 'cookie'));

		set_language();

		$this->load->language(array('general'));
	}

	public function index()	{
		
		$this->load->view('pages/home', $this->data);
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */