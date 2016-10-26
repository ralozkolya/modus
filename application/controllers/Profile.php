<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('general');
		$this->load->library('Auth');
		$this->load->model(['Page', 'Category']);
		$this->load->helper('view');

		$this->data['user'] = $this->auth->get_current_user();

		if(empty($this->data['user'])) {
			$this->message(lang('auth_needed'), ERROR, FALSE);
			$this->redirect();
		}

		$this->data['navigation'] = $this->Page->get_navigation();
		$this->data['top_categories'] = $this->Category->get_top();

		$this->data['user'] = purify($this->data['user']);

		$this->data['cart_size'] = count($this->session->userdata('cart'));
		$this->data['redirect_base'] = locale_url('profile');
	}

	public function index() {

		$this->load->library('form_validation');

		if($this->input->post()) {
			if($this->form_validation->run('edit_profile')) {
				$data = $this->input->post();
				$data['id'] = $this->data['user']->id;
				if($this->User->edit($data)) {
					$this->auth->refresh();
					$this->message(lang('changed_successfully'));
				}

				else {
					$this->message(lang('unexpected_error'), ERROR);
				}
			}

			else {
				$errors = validation_errors('<div>', '</div>');
				$this->message($errors, ERROR, FALSE);
			}
		}

		$this->data['highlighted'] = 'profile';

		$this->load->view('pages/profile', $this->data);
	}

	public function orders() {

		$this->load->model('Order');

		$this->data['orders'] = $this->Order->get_for_user($this->data['user']->id);

		$this->data['highlighted'] = 'orders';

		$this->load->view('pages/orders', $this->data);
	}

	public function change_password() {

		$this->load->library('form_validation');

		if($this->input->post()) {

			if($this->form_validation->run('change_password')) {

				$this->User->edit([
					'id' => $this->data['user']->id,
					'password' => $this->input->post('password'),
				]);

				$this->message(lang('changed_successfully'));
			}

			else {
				$errors = validation_errors('<div>', '</div>');
				$this->message($errors, ERROR);
			}
		}

		$this->redirect();
	}

}

/* End of file Profile.php */
/* Location: ./application/controllers/Profile.php */