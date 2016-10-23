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

	public function edit($data) {

		if(!empty($data['password_repeat'])) {
			unset($data['password_repeat']);
		}

		if(!empty($data['password'])) {
			$data['password'] = $this->hash_password($data['password']);
		}

		return parent::edit($data);
	}

	public function get_token() {

		do {

			$token = bin2hex($this->security->get_random_bytes(16));

			$r = parent::get_by_key('recovery_token', $token);

		} while($r);

		return $token;
	}

	public function clear_token($id) {

		return parent::edit([
			'id' => $id,
			'recovery_token' => '',
		]);
	}
}

/* End of file User.php */
/* Location: ./application/models/User.php */