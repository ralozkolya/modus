<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Model {

	protected $upload_path = 'static/uploads/brands/';
	protected $thumbs_path = 'static/uploads/brands/thumbs/';

	protected $table = 'brands';

	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function add($data) {

		if(empty($data['pinned'])) {
			$data['pinned'] = 0;
		}

		return parent::add($data);
	}

	public function edit($data) {

		if(empty($data['pinned'])) {
			$data['pinned'] = 0;
		}

		return parent::edit($data);
	}

	public function get_pinned() {

		$this->db->where(array(
			'pinned' => 1,
		));

		$this->db->select(array(
			'image', 'id',
		));

		$this->db->limit(8);

		return $this->db->get($this->table)->result();
	}

	public function get_distinct($products) {

		/*$brands = array();

		foreach($products as $p) {
			$brands[] = $p->brand;
		}

		if(!empty($brands)) {
			$this->db->where_in('id', $brands);
		}

		else {
			return NULL;
		}*/

		//$this->db->distinct();

		return parent::get_list();
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			"{$lang}_name as name",
			'id', 'image',
		));

		return parent::get_list($limit, $offset);
	}

	public function delete($id) {

		$this->load->model('Product');

		$this->db->where('brand', $id);
		$products = $this->Product->get_list();

		foreach($products as $p) {
			$this->Product->delete($p->id);
		}

		return parent::delete($id);
	}

}

/* End of file Brand.php */
/* Location: ./application/models/Brand.php */