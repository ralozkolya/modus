<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends MY_Model {

	protected $table = 'brands';

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

		$lang = get_lang_code(get_lang());

		$brands = array();

		foreach($products as $p) {
			$brands[] = $p->brand;
		}

		if(!empty($brands)) {
			$this->db->where_in('id', $brands);
		}

		else {
			return NULL;
		}

		$this->db->select(array(
			$lang.'_name as name',
			'id',
		));

		$this->db->distinct();

		return parent::get_list();

	}

}

/* End of file Brand.php */
/* Location: ./application/models/Brand.php */