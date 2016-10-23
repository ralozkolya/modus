<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model {

	protected $table = 'users';

	public function check($id, $email) {

		$this->db->where('email', $email);

		return parent::get($id);
	}

	public function add($data) {

		if(!empty($data['password_repeat'])) {
			unset($data['password_repeat']);
		}

		$data['password'] = $this->hash_password($data['password']);

		return parent::add($data);
	}
}

/* End of file User.php */
/* Location: ./application/models/User.php */