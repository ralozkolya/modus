<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Model {

	protected $table = 'users';

	public function check($id, $email) {

		$this->db->where('email', $email);

		return parent::get($id);
	}

}

/* End of file User.php */
/* Location: ./application/models/User.php */