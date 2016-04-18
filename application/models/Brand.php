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

}

/* End of file Brand.php */
/* Location: ./application/models/Brand.php */