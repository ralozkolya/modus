<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $data = [
		'title' => 'Modus',
		'highlighted' => NULL,
	];

	public function __construct() {

		parent::__construct();

		set_language();
	}

	protected function redirect() {

		if($this->agent->referrer()) {
			redirect($this->agent->referrer());
		}

		redirect(base_url('admin'));
	}

	protected function message($message, $type = SUCCESS, $redirects = TRUE) {

		if($redirects) {
			$this->session->set_flashdata($type, $message);
			$this->redirect();
		}

		else {
			$this->data[$type] = $message;
		}
	}

}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */