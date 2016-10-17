<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	/*	VIEWS	*/

	public function __construct() {

		parent::__construct();

		set_language(GE);

		$this->load->language('admin');
		$this->load->library(['Auth_admin' => 'auth', 'form_validation']);
		$this->load->helper('view');
		$this->load->model([
			'User_admin', 'Product', 'Page',
			'Category', 'Brand', 'Stock', 'Product_images',
			'Banner',
		]);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->session->set_flashdata('error_message', lang('unauthorized'));
			redirect(base_url('login'));
		}
	}

	public function index() {

		$this->products();
	}

	public function products() {

		if($this->input->post()) {
			$this->modify('Product');
		}

		$this->data['items'] = $this->Product->get_localized_list();
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();
		$this->data['stock'] = $this->Stock->get_list();

		$this->load->view('pages/admin/products', $this->data);
	}

	public function Product($id) {

		if($this->input->post()) {
			$this->modify('Product');
		}

		$this->data['item'] = $this->Product->get($id);
		$this->check_item();
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();
		$this->data['stock'] = $this->Stock->get_list();
		$this->data['gallery'] = $this->Product_images->get_for_product($id);

		$this->load->view('pages/admin/product', $this->data);
	}

	public function pages() {

		$this->data['items'] = $this->Page->get_localized_list();
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/pages', $this->data);
	}

	public function Page($id) {

		if($this->input->post()) {
			$this->modify('Page');
		}

		$this->data['item'] = $this->Page->get($id);
		$this->check_item();
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/page', $this->data);
	}

	public function banners() {

		if($this->input->post()) {
			$this->modify('Banner');
		}

		$this->data['items'] = $this->Banner->get_list();
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banners', $this->data);
	}

	public function Banner($id) {

		if($this->input->post()) {
			$this->modify('Banner');
		}

		$this->data['item'] = $this->Banner->get($id);
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banner', $this->data);
	}


	/*	MODIFIERS	*/

	public function modify($type, $data = NULL) {

		if(empty($data)) {
			$data = $this->input->post();
		}

		if(empty($data['id'])) {
			$this->add($type, $data);
		}

		else {
			$this->edit($type, $data);
		}
	}

	public function add($type, $data) {

		$allowed = [
			'Banner', 'Brand', 'News',
			'Product',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("add_{$type}")) {

			try {
				$this->$type->add($data);
				$this->message(lang('added_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->message(validation_errors('<div>', '</div>'), ERROR, FALSE);
		}
	}

	public function edit($type, $data) {

		$allowed = [
			'Banner', 'Page', 'Brand',
			'News', 'Product',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("edit_{$type}")) {

			try {
				$this->$type->edit($data);
				$this->message(lang('changed_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR, FALSE);
			}
		}

		else {
			$this->message(validation_errors('<div>', '</div>'), ERROR, FALSE);
		}
	}

	public function delete($type, $id) {

		$allowed = [
			'Banner', 'Brand',
			'News', 'Product',
			'Product_images',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->$type->delete($id)) {
			$this->message(lang('deleted_successfully'));
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}
	}

	public function add_images($type) {

		$allowed = [
			'Product_images',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run("add_{$type}")) {

			$item = $this->input->post('item');

			try {
				$this->$type->add_images($item);
				$this->message(lang('added_successfully'));
			}

			catch(Exception $e) {
				$this->message($e->getMessage(), ERROR);
			}
		}

		else {
			$this->message(validation_errors('<div>', '</div>'), ERROR);
		}
	}


	/*	HELPERS	*/

	private function is_allowed($array, $type) {

		foreach($array as $a) {
			if($type === $a) {
				return TRUE;
			}
		}

		return FALSE;
	}

	private function check_item() {
		if(empty($this->data['item'])) {
			show_404();
			exit;
		}
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */