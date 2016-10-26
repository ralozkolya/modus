<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('general');
		$this->load->library('Auth');
		$this->load->model(['Page', 'Category']);

		$this->data['user'] = $this->auth->get_current_user();
		$this->data['navigation'] = $this->Page->get_navigation();
		$this->data['top_categories'] = $this->Category->get_top();

		$this->data['user'] = purify($this->data['user']);
		$this->data['redirect_base'] = locale_url();

		$this->data['cart_size'] = count($this->session->userdata('cart'));
	}

	public function index()	{

		$this->load->model(['Product', 'Category', 'Brand', 'News', 'Banner']);

		$this->data['pinned_categories'] = $this->Category->get_pinned();
		$this->data['categories'] = $this->Category->get_list_with_subcategories();
		$this->data['products'] = $this->Product->get_latest();
		$this->data['brands'] = $this->Brand->get_pinned();
		$this->data['news'] = $this->News->get_latest();
		$this->data['banners'] = $this->Banner->get_list();
		
		$this->data['highlighted'] = 'home';
		
		$this->load->view('pages/home', $this->data);
	}

	public function products() {

		$get = $this->input->get();

		$this->load->model(['Product', 'Category', 'Brand']);

		$this->data['categories'] = $this->Category->get_list_with_subcategories();
		$this->data['products'] = $this->Product->get_filtered($get);

		$this->data['brands'] = $this->Brand->get_localized_list();

		$this->data['highlighted'] = 'products';

		$this->load->view('pages/products', $this->data);
	}

	public function product($id, $slug) {

		$this->load->model(['Product', 'Product_images']);

		$this->data['product'] = $this->Product->get_localized($id);
		$this->data['gallery'] = $this->Product_images->get_for_product($id);

		if(empty($this->data['product'])) {
			show_404();
			return;
		}

		$cart = $this->session->userdata('cart');

		if($cart) {
			if(!empty($cart[$this->data['product']->id])) {
				$this->data['in_cart'] = TRUE;
			}
		}

		$this->data['highlighted'] = 'products';

		$this->load->view('pages/product', $this->data);
	}

	public function cart() {

		$this->load->model(['Product', 'Agent']);

		$cart = $this->session->userdata('cart');

		if($this->data['cart_size']) {
			$this->data['products'] = $this->Product->get_cart($cart);
		}

		$this->data['agents'] = $this->Agent->get_localized_list();

		$this->data['highlighted'] = 'cart';

		$this->load->view('pages/cart', $this->data);
	}

	public function news() {

		$this->load->model('News');

		$this->data['news'] = $this->News->get_localized_list();
		$this->data['highlighted'] = 'news';

		$this->load->view('pages/news', $this->data);
	}

	public function post($id, $slug) {

		$this->load->model('News');

		$this->data['post'] = $this->News->get_localized($id);
		$this->data['highlighted'] = 'news';

		if(empty($this->data['post'])) {
			show_404();
			return;
		}

		$this->load->view('pages/post', $this->data);
	}

	public function about_us() {

		$this->data['highlighted'] = 'about_us';

		$this->data['page'] = $this->Page->get_by_key('slug', $this->data['highlighted']);

		$this->load->view('pages/page', $this->data);
	}

	public function contact() {

		$this->data['highlighted'] = 'contact';

		$this->load->view('pages/contact', $this->data);
	}

	public function add_to_cart($id) {

		if(is_numeric($id)) {

			$this->load->model('Product');

			$product = $this->Product->get_localized($id);

			if(empty($product->quantity) || $product->quantity < 1) {
				$this->message(lang('out_of_stock'), ERROR);
			}

			$cart = $this->session->userdata('cart');

			if(!$cart) {
				$cart = [];
			}

			$cart[$id] = time();

			$this->session->set_userdata('cart', $cart);
			$this->message(lang('added_to_cart'));
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}
	}

	public function remove_from_cart($id) {

		if(is_numeric($id)) {

			$cart = $this->session->userdata('cart');

			if($cart) {
				unset($cart[$id]);
				$this->session->set_userdata('cart', $cart);
			}
		}

		else {
			$this->message(lang('unexpected_error'), ERROR);
		}

		$this->redirect();
	}

	public function login() {

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		if(!$this->auth->login($email, $password)) {
			$this->message(lang('auth_error'), ERROR);
		}

		$this->redirect();
	}

	public function logout() {
		$this->auth->logout();
		redirect(locale_url());
	}

	public function register() {

		if($this->auth->is_logged_in()) {
			redirect(locale_url());
		}

		$this->load->library('form_validation');
		$this->load->helper('view');

		if($this->input->post()) {
			if($this->form_validation->run('register')) {
				
				if($this->User->add($this->input->post())) {
					$this->message(lang('registered_successfully'));
				}

				else {
					$this->message(lang('unexpected_error'), ERROR);
				}
			}

			else {
				$this->message(validation_errors('<div>', '</div>'), ERROR, FALSE);
			}
		}

		$this->load->view('pages/register', $this->data);
	}

	public function recover_password() {

		$this->load->helper(['view', 'email_sender']);

		if($this->input->post()) {

			$email = $this->input->post('email');
			$user = $this->User->get_by_key('email', $email);
				
			if(!empty($user)) {

				$this->User->edit([
					'id' => $user->id,
					'recovery_token' => $this->User->get_token(),
				]);

				$user = $this->User->get($user->id);

				send_recovery($user);
			}

			$this->message(lang('instructions_sent'));
		}

		$this->load->view('pages/recover_password', $this->data);
	}

	public function check_token($token) {

		$user = $this->User->get_by_key('recovery_token', $token);

		if($user) {

			if($this->auth->login_by_id($user->id)) {

				$this->message(lang('change_password'), ERROR, FALSE);
				$this->redirect('profile');
			}
		}

		$this->message(lang('unexpected_error'), ERROR);
	}

	public function retrieve() {
		
		$this->load->library('Soap');
		$this->load->model('Stock');

		$table = $this->soap->get_table();

		$this->Stock->update($table);

		echo '<pre>';
		print_r($table);
		echo '</pre>';
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */