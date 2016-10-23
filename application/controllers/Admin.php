<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		set_language(GE);

		$this->load->language('admin');
		$this->load->library(['Auth_admin' => 'auth', 'form_validation']);
		$this->load->helper('view');
		$this->load->model([
			'User_admin', 'Product', 'Page',
			'Category', 'Brand', 'Stock', 'Product_images',
			'Banner', 'News', 'Agent',
		]);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->session->set_flashdata('error_message', lang('unauthorized'));
			redirect(base_url('login'));
		}
	}
	

	/*	VIEWS	*/

	public function index() {

		$this->products();
	}

	public function products() {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();
		$this->data['stock'] = $this->Stock->get_list();

		$this->load->view('pages/admin/products', $this->data);
	}

	public function Product($id) {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();
		$this->data['stock'] = $this->Stock->get_list();
		$this->data['gallery'] = $this->Product_images->get_for_product($id);

		$this->load->view('pages/admin/product', $this->data);
	}

	public function pages() {

		$this->data['type'] = $type = 'Page';

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/pages', $this->data);
	}

	public function Page($id) {

		$this->data['type'] = $type = 'Page';

		$this->modify($type);
		
		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'pages';

		$this->load->view('pages/admin/page', $this->data);
	}

	public function banners() {

		$this->data['type'] = $type = 'Banner';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banners', $this->data);
	}

	public function Banner($id) {

		$this->data['type'] = $type = 'Banner';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'banners';

		$this->load->view('pages/admin/banner', $this->data);
	}

	public function brands() {

		$this->data['type'] = $type = 'Brand';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'brands';

		$this->load->view('pages/admin/brands', $this->data);
	}

	public function Brand($id) {

		$this->data['type'] = $type = 'Brand';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'brands';

		$this->load->view('pages/admin/brand', $this->data);
	}

	public function news_list() {

		$this->data['type'] = $type = 'News';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'news';

		$this->load->view('pages/admin/news_list', $this->data);
	}

	public function News($id) {

		$this->data['type'] = $type = 'News';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'news';

		$this->load->view('pages/admin/news', $this->data);
	}

	public function agents() {

		$this->data['type'] = $type = 'Agent';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['highlighted'] = 'agents';

		$this->load->view('pages/admin/agents', $this->data);
	}

	public function Agent($id) {

		$this->data['type'] = $type = 'Agent';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'agents';

		$this->load->view('pages/admin/agent', $this->data);
	}

	public function user() {

		$type = 'User_admin';

		$this->modify($type, [
			'password' => $this->input->post('password'),
			'id' => $this->data['user']->id,
		]);

		$this->data['highlighted'] = 'user';
		$this->load->view('pages/admin/user', $this->data);
	}


	/*	MODIFIERS	*/

	public function modify($type, $data = NULL) {

		if(!$this->input->post()) {
			return;
		}

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
			'Product', 'Agent',
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
			$this->validation_errors();
		}
	}

	public function edit($type, $data) {

		$allowed = [
			'Banner', 'Page', 'Brand',
			'News', 'Product', 'Agent',
			'User_admin',
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
			$this->validation_errors();
		}
	}

	public function delete($type, $id) {

		$allowed = [
			'Banner', 'Brand', 'News',
			'Product', 'Product_images',
			'Agent',
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
			$this->validation_errors();
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

	private function validation_errors() {
		$message = validation_errors('<div>', '</div>');
		$message = $message ? $message : lang('no_validation_rules');
		$this->message($message, ERROR, FALSE);
	}

	private function get_items($type) {

		$items = $this->$type->get_localized_list();
		return $items;
	}

	private function get_item($type, $id) {

		$item = $this->$type->get($id);

		if(empty($item)) {
			show_404();
			exit;
		}

		return $item;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */