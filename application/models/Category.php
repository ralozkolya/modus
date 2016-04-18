<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Model {

	protected $table = 'categories';

	public function get_pinned() {

		$lang = get_lang_code(get_lang());
		
		$this->db->where(array(
			'pinned' => 1,
		));

		$this->db->select(array(
			$lang.'_name as name',
			'image',
			'id',
		));

		$this->db->limit(7);

		return $this->db->get($this->table)->result();
	}

	public function get_list($limit = NULL, $offset = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_name as name',
		));

		return parent::get_list();
	}

}

/* End of file Category.php */
/* Location: ./application/models/Category.php */