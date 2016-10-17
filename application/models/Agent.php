<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends MY_Model {

	protected $table = 'agents';

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->select_localized();
		return parent::get_list($limit, $offset);
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_name as name",
			'email', 'id',
		]);
	}

}

/* End of file Agent.php */
/* Location: ./application/models/Agent.php */