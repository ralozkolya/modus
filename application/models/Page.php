<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Model {

	protected $table = 'pages';

	public function get_by_key($key, $value) {

		$lang = get_lang_code(get_lang());
		
		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_body as body',
		));

		return parent::get_by_key($key, $value);
	}

	public function get_navigation() {

		$lang = get_lang_code(get_lang());

		$this->db->where('navigation', 1);

		$this->db->select(array(
			$lang.'_title as title',
			'slug',
		));

		$this->db->order_by('priority');

		return parent::get_list();
	}
}

/* End of file Pages.php */
/* Location: ./application/models/Pages.php */
