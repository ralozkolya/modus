<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends MY_Model {

	public function get_navigation() {

		$lang = get_lang_code(get_lang());

		$this->db->where(array(
			'navigation' => 1,
		));

		$this->db->select(array(
			$lang.'_title as title',
			'slug',
		));

		$this->db->order_by('priority');

		return $this->db->get('pages')->result();
	}

}

/* End of file Pages.php */
/* Location: ./application/models/Pages.php */