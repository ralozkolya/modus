<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Model {

	protected $table = 'orders';

	public function get_for_user($user) {

		$this->select_localized();
		$this->db->where('user', $user);
		$this->db->order_by('id DESC');

		return parent::get_list();
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$lang}_order as order",
			'modified',
		]);
	}

}

/* End of file Order.php */
/* Location: ./application/models/Order.php */