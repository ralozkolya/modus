<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = [
		'title' => 'Modus',
		'slug' => NULL,
	];

	public function __construct() {

		parent::__construct();

		$this->load->model('Page');

		set_language();

		$this->load->language('general');
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */