<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends MY_Model {

	protected $upload_path = 'static/uploads/categories/';
	protected $thumbs_path = 'static/uploads/categories/thumbs/';

	protected $table = 'categories';

	protected $with_image = TRUE;
	protected $image_required = TRUE;

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
				foreach($r as $t) {
					if($t->id === $s->parent) {
						$t->sub[] = $s;
						unset($r[$k]);
						break;
					}
				}
			}
		}

		return $r;
	}

	public function get_subcategories($id) {

		$this->db->select('id');
		$this->db->where(array('parent' => $id));

		return parent::get_list();
	}

	public function get_subcategories_admin($id) {
		$this->select_localized();
		$this->db->where('parent', $id);
		return parent::get_list();
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->select_localized();
		return parent::get_list($limit, $offset);
	}

	public function delete($id) {

		if($id < 1) {
			return FALSE;
		}

		$this->load->model('Product');

		$this->db->where('category', $id);
		$products = $this->Product->get_list();

		foreach($products as $p) {
			$this->Product->delete($p->id);
		}

		$this->db->where('parent', $id);
		$subcategories = parent::get_list();

		foreach($subcategories as $s) {
			$this->delete($s->id);
		}

		return parent::delete($id);
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