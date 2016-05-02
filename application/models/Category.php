<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Model {

	protected $table = 'categories';

	public function get_list($limit = NULL, $offset = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			'id',
			$lang.'_name as name',
			'parent',
		));

		$this->db->where(array(
			'parent' => 0,
		));

		return parent::get_list();
	}

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

	public function get_list_with_subcategories() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			'id',
			$lang.'_name as name',
			'parent',
		));

		$r = parent::get_list();

		foreach($r as $k => $s) {
			if($s->parent) {
				$i = $s->parent - 1;
				$r[$i]->sub[] = $s;
				unset($r[$k]);
			}
		}

		return $r;
	}

	public function get_subcategories($id) {

		$this->db->select('id');
		$this->db->where(array('parent' => $id));

		return parent::get_list();
	}

}

/* End of file Category.php */
/* Location: ./application/models/Category.php */