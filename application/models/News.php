<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Model {

	protected $table = 'news';

	public function get_latest() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_description as description',
			$lang.'_body as body',
			'date', 'image',
		));

		$this->db->order_by('date DESC');

		return parent::get_list(4);
	}

}

/* End of file News.php */
/* Location: ./application/models/News.php */