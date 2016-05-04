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
		$this->load->model('Page');

		set_language();

		$this->load->language('general');

		$this->data['user'] = $this->auth->get_current_user();
		$this->data['navigation'] = $this->Page->get_navigation();

		$this->data['cart_size'] = count($this->session->userdata('cart'));
	}

	public function index()	{

		$this->load->model(array('Product', 'Category', 'Brand', 'News'));

		$this->data['pinned_categories'] = $this->Category->get_pinned();
		$this->data['categories'] = $this->Category->get_list_with_subcategories();
		$this->data['latest_products'] = $this->Product->get_latest();
		$this->data['brands'] = $this->Brand->get_pinned();
		$this->data['news'] = $this->News->get_latest();
		
		$this->data['slug'] = 'home';
		
		$this->load->view('pages/home', $this->data);
	}

	public function products() {

		$get = $this->input->get();

		$this->load->model(array('Product', 'Category', 'Brand'));

		$this->data['categories'] = $this->Category->get_list_with_subcategories();
		$this->data['products'] = $this->Product->get_filtered($get);

		$this->data['brands'] = $this->Brand->get_distinct($this->data['products']);

		$this->data['slug'] = 'products';

		$this->load->view('pages/products', $this->data);
	}

	public function product($id, $slug) {

		$this->load->model('Product');

		$this->data['product'] = $this->Product->get($id);

		$cart = $this->session->userdata('cart');

		if($cart) {
			if(!empty($cart[$this->data['product']->id])) {
				$this->data['in_cart'] = TRUE;
			}
		}

		$this->data['slug'] = 'products';

		$this->load->view('pages/product', $this->data);
	}

	public function cart() {

		return;

		$this->load->model('Product');

		$cart = $this->session->userdata('cart');

		$this->data['products'] = $this->Product->get_cart($cart);

		$this->data['slug'] = 'cart';

		$this->load->view('pages/cart', $this->data);
	}

	public function news() {

		$this->data['slug'] = 'news';

		$this->load->view('pages/news', $this->data);
	}

	public function about_us() {

		$this->data['slug'] = 'about_us';

		$this->data['page'] = $this->Page->get_by_key('slug', $this->data['slug']);

		$this->load->view('pages/page', $this->data);
	}

	public function contact() {

		$this->data['slug'] = 'contact';

		$this->data['page'] = $this->Page->get_by_key('slug', $this->data['slug']);

		$this->load->view('pages/page', $this->data);
	}

	public function add_to_cart($id) {

		$this->output->set_header('Content-Type: application/json');

		$response = array();

		if(is_numeric($id)) {

			$cart = $this->session->userdata('cart');

			if(!$cart) {
				$cart = array();
			}

			$cart[$id] = time();

			$this->session->set_userdata('cart', $cart);

			$response['status'] = 'success';
			$response['action'] = 'added';
			$response['item_count'] = count($cart);

			echo json_encode($response);
			return;
		}

		$response['status'] = 'error';

		echo json_encode($response);
	}

	public function remove_from_cart($id) {

		$this->output->set_header('Content-Type: application/json');

		$response = array();

		if(is_numeric($id)) {

			$cart = $this->session->userdata('cart');

			if($cart) {
				unset($cart[$id]);
				$this->session->set_userdata('cart', $cart);
			}

			$response['status'] = 'success';
			$response['action'] = 'removed';
			$response['item_count'] = count($cart);

			echo json_encode($response);
			return;
		}

		$response['status'] = 'error';

		echo json_encode($response);
	}

	public function test() {

		$this->load->library('image_lib');

		$images = scandir('static/uploads/categories');

		foreach($images as $image) {
			if(!is_dir($image)) {
				$path = 'static/uploads/categories/'.$image;

				$config['source_image'] = $path;
				$config['maintain_ratio'] = TRUE;
				$config['width'] = 300;
				$config['height'] = 300;
				$config['new_image'] = 'static/uploads/categories/thumbs/'.$image;

				$this->image_lib->initialize($config);

				$this->image_lib->resize();
			}
		}

		var_dump(scandir('static/uploads/categories/thumbs/'));
	}
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */