<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends MY_Model {

	protected $table = 'orders';

	public function get_for_user($user) {
		$this->db->where('user', $user);
		return parent::get_list();
	}

}

/* End of file Order.php */
/* Location: ./application/models/Order.php */