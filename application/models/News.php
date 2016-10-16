<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Model {

	protected $table = 'news';
	protected $slug = 'en_title';
	protected $with_image = TRUE;
	protected $image_required = TRUE;

	public function get_latest() {

		return $this->get_localized_list(4);
	}

	public function get_localized($id) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_description as description',
			$lang.'_body as body',
			'date', 'image', 'id',
		));

		return parent::get($id);
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_description as description',
			$lang.'_body as body',
			'date', 'image', 'slug', 'id',
		));

		$this->db->order_by('date DESC');

		return parent::get_list($limit, $offset);
	}

}

/* End of file News.php */
/* Location: ./application/models/News.php */