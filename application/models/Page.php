<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Model {

	protected $table = 'pages';

	public function get_by_key($key, $value) {

		$this->select_localized();
		return parent::get_by_key($key, $value);
	}

	public function get_navigation() {

		$this->db->where('navigation', 1);
		$this->db->order_by('priority');

		return $this->get_localized_list();
	}

	public function get_localized($id) {

		$this->select_localized();
		return parent::get($id);
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->select_localized();
		return parent::get_list($limit, $offset);
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());
		
		$this->db->select(array(
			"{$lang}_title as title",
			"{$lang}_body as body",
			'slug', 'id',
		));
	}
}

/* End of file Pages.php */
/* Location: ./application/models/Pages.php */
