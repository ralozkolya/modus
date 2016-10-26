<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model {

	protected $table = 'users';

	public function check($id, $email) {

		$this->db->where('email', $email);

		return parent::get($id);
	}

	public function add($raw) {

		$data['first_name'] = $raw['first_name'];
		$data['last_name'] = $raw['last_name'];
		$data['email'] = $raw['email'];
		$data['company'] = $raw['company'];
		$data['id_number'] = $raw['id_number'];
		$data['billing_address'] = $raw['billing_address'];
		$data['shipping_address'] = $raw['shipping_address'];
		$data['password'] = $this->hash_password($raw['password']);

		return parent::add($data);
	}

	public function edit($raw) {

		if(!empty($raw['password'])) {
			$data['id'] = $raw['id'];
			$data['password'] = $this->hash_password($raw['password']);
		}

		else {
			$data['id'] = $raw['id'];
			$data['first_name'] = $raw['first_name'];
			$data['last_name'] = $raw['last_name'];
			$data['company'] = $raw['company'];
			$data['id_number'] = $raw['id_number'];
			$data['billing_address'] = $raw['billing_address'];
			$data['shipping_address'] = $raw['shipping_address'];
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