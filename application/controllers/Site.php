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

		$this->load->model(array('Product', 'Category', 'Brand', 'News'));

		$this->data['address_1'] = lang('address_1');
		$this->data['address_2'] = lang('address_2');

		$this->data['pinned_categories'] = $this->Category->get_pinned();
		$this->data['categories'] = $this->Category->get_list();
		$this->data['latest_products'] = $this->Product->get_latest();
		$this->data['brands'] = $this->Brand->get_pinned();
		$this->data['news'] = $this->News->get_latest();
		
		$this->data['slug'] = 'home';
		
		$this->load->view('pages/home', $this->data);
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