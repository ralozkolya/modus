<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Model {

	protected $table = 'categories';

	public function get_top() {

		$this->db->where(array(
			'parent' => 0,
		));

		return $this->get_localized_list();
	}

	public function get_pinned() {
		
		$this->db->where(array(
			'pinned' => 1,
		));

		return $this->get_localized_list(7);
	}

	public function get_list_with_subcategories() {

		$r = $this->get_localized_list();

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

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->select_localized();
		return parent::get_list($limit, $offset);
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			'id',
			$lang.'_name as name',
			'parent', 'image',
		));
	}

}

/* End of file Category.php */
/* Location: ./application/models/Category.php */