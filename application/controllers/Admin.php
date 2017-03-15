<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		set_language(GE);

		$this->load->language('admin');
		$this->load->library(['Auth_admin' => 'auth', 'form_validation']);
		$this->load->helper(['view', 'purifier']);
		$this->load->model([
			'User_admin', 'Product', 'Page',
			'Category', 'Brand', 'Product_images',
			'Banner', 'News', 'Agent',
		]);

		$this->data['user'] = $this->auth->get_current_user();

		if(!$this->data['user']) {
			$this->auth->logout();
			$this->message(lang('unauthorized'), ERROR, FALSE);
			$this->redirect('login');
		}

		$this->data['redirect_base'] = base_url('admin');
	}
	

	/*	VIEWS	*/

	public function index() {

		$this->products();
	}

	public function products($page = 1) {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type, $page);
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();

		$this->config->load('pagination');
		$config = $this->config->item('pagination');
		$config['base_url'] = base_url('admin/products');
		$config['per_page'] = ITEMS_PER_PAGE_ADMIN;
		$config['total_rows'] = $this->get_rows($type);
		$this->load->library('pagination', $config);

		$this->load->view('pages/admin/products', $this->data);
	}

	public function Product($id) {

		$this->data['type'] = $type = 'Product';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['highlighted'] = 'products';
		$this->data['categories'] = $this->Category->get_localized_list();
		$this->data['brands'] = $this->Brand->get_localized_list();
		$this->data['gallery'] = $this->Product_images->get_for_product($id);

		$this->load->view('pages/admin/product', $this->data);
	}

	public function categories() {

		$this->data['type'] = $type = 'Category';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type);
		$this->data['parents'] = $this->Category->get_top();
		$this->data['highlighted'] = 'categories';

		$this->load->view('pages/admin/categories', $this->data);
	}

	public function Category($id) {

		$this->data['type'] = $type = 'Category';

		$this->modify($type);

		$this->data['item'] = $this->get_item($type, $id);
		$this->data['parents'] = $this->Category->get_top();
		$this->data['products'] = $this->Product->get_for_category($this->data['item']->id);
		$this->data['subcategories'] = $this->Category->get_subcategories_admin($this->data['item']->id);
		$this->data['highlighted'] = 'categories';

		$this->load->view('pages/admin/category', $this->data);
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

	public function news_list() {

		$this->data['type'] = $type = 'News';

		$this->modify($type);

		$this->data['items'] = $this->get_items($type)['data'];
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
			'Product', 'Agent', 'Category'
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
			'User_admin', 'Category'
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
			'Agent', 'Category'
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

	private function get_items($type, $page = NULL) {

		$items;

		if($page) {
			$offset = abs($page - 1) * ITEMS_PER_PAGE_ADMIN;
			$items = $this->$type->get_localized_list(ITEMS_PER_PAGE_ADMIN, $offset);
		}

		else {
			$items = $this->$type->get_localized_list();
		}

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

	private function get_rows($type) {
		$this->load->model($type);
		return $this->$type->row_count();
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */