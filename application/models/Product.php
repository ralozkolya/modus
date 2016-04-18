<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $table = 'products';

	public function get_latest() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_name as name',
			'price',
			'image',
		));

		$this->db->order_by('id DESC');

		return parent::get_list(8);
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */