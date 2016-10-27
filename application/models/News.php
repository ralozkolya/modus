<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends MY_Model {

	protected $upload_path = 'static/uploads/news/';
	protected $thumbs_path = 'static/uploads/news/thumbs/';

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

		$this->db->select('SQL_CALC_FOUND_ROWS null as rows', FALSE);

		$this->db->select(array(
			$lang.'_title as title',
			$lang.'_description as description',
			$lang.'_body as body',
			'date', 'image', 'slug', 'id',
		));

		$this->db->order_by('date DESC');

		$response['data'] = parent::get_list($limit, $offset);
		$response['rows'] = $this->db->query('SELECT FOUND_ROWS() count')->row()->count;

		return $response;
	}

}

/* End of file News.php */
/* Location: ./application/models/News.php */