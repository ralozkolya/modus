<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

	public function __construct() {

		parent::__construct();

		$this->load->language('admin');
		$this->load->library(['Auth_admin' => 'auth']);
		$this->load->helper('table');
		$this->load->model([
			'User_admin', 'Product',
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

		$this->data['items'] = $this->Product->get_localized_list();
		$this->data['highlighted'] = 'products';

		$this->load->view('pages/admin/products', $this->data);
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
			'Banner', 'Brand', 'News', 'Product',
		];

		if(!$this->is_allowed($allowed, $type)) {
			$this->message(lang('not_allowed'), ERROR);
		}

		if($this->form_validation->run('add_'.$type)) {

			if($this->$type->add($data)) {
				$this->message(lang('added_successfully'));
			}

			else {
				$this->message(lang('unexpected_error'), ERROR, FALSE);
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

		if($this->form_validation->run('edit_'.$type)) {

			if($this->$type->edit($data)) {
				$this->message(lang('changed_successfully'));
			}

			else {
				$this->message(lang('unexpected_error'), ERROR, FALSE);
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


	/*	HELPERS	*/

	private function add_images($branch, $display_error = FALSE) {

		$this->load->library(['image_lib', 'upload']);

		$config = [];
		$config['allowed_types'] = 'png|jpg|gif';
		$config['upload_path'] = 'static/uploads/branches/';
		$config['encrypt_name'] = TRUE;

		$this->upload->initialize($config);

		$files = $_FILES;

		$cpt = count($_FILES['images']['name']);

		for($i = 0; $i < $cpt; $i++) {

			$_FILES['images']['name'] = $files['images']['name'][$i];
			$_FILES['images']['type'] = $files['images']['type'][$i];
			$_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
			$_FILES['images']['error'] = $files['images']['error'][$i];
			$_FILES['images']['size'] = $files['images']['size'][$i];

			if($this->upload->do_upload('images')) {

				$upload = $this->upload->data();

				if(isset($upload['full_path'])) {

					$config = [];
					$config['source_image'] = $upload['full_path'];
					$config['source_image'] = $upload['full_path'];
					$config['width'] = 300;
					$config['height'] = 300;
					$config['maintain_ratio'] = TRUE;
					$config['new_image'] = 'static/uploads/branches/thumbs/'.$upload['file_name'];

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
				}

				elseif($display_error) {
					$this->data['error_message'] = $this->image_lib->display_errors();
				}

				$data = [];

				$data['branch'] = $branch;
				$data['image'] = $upload['file_name'];

				$this->Branch_gallery->add($data);
			}

			elseif($display_error) {
				$this->message($this->upload->display_errors(), ERROR);
			}
		}
	}

	private function is_allowed($array, $type) {

		foreach($array as $a) {
			if($type === $a) {
				return TRUE;
			}
		}

		return FALSE;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */