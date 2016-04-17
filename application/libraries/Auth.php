<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	private $CI;

	public function __construct() {

		$this->CI =& get_instance();

		$this->CI->load->library('session');
	}

	public function login($username, $password) {

		$user = $this->check($username, $password);

		if($user) {

			$this->CI->session->set_userdata(USER, $user);

			return TRUE;
		}

		return FALSE;
	}

	public function logout() {

		$this->CI->session->unset_userdata(USER);
	}

	public function is_logged_in() {
		
		$user = $this->CI->session->userdata(USER);

		if($user) {
			$this->CI->db->where(array(ID => $user[ID], USERNAME => $user[USERNAME]));
			$r = $this->CI->db->get(USERS);

			if($r->num_rows() == 1) {
				return TRUE;
			}
		}

		$this->logout();

		return FALSE;
	}

	public function get_current_user() {
		
		$user = $this->CI->session->userdata(USER);
		return $user;
	}

	public function add_user($data) {

		$this->CI->db->where(array(USERNAME => $data[USERNAME]));
		$r = $this->CI->db->get(USERS);

		if($r->num_rows() != 0) {
			return FALSE;
		}

		$r = $this->CI->db->insert(USERS, array(
			USERNAME => $data[USERNAME],
			PASSWORD => $this->pass_hash($data[PASSWORD])
		));

		return $r;
	}

	public function edit_user($username = NULL, $password = NULL) {

		$data = array();

		$user = $this->CI->session->userdata(USER);

		if(!$user) {
			$this->logout();
			return FALSE;
		}

		if($username) {
			$data[USERNAME] = $username;
		}

		if($password) {
			$data[PASSWORD] = $this->pass_hash($password);
		}
		
		if(count($data)) {

			$this->CI->db->where(array(ID => $user[ID]));
			if($this->CI->db->update(USERS, $data)) {
				if($username) {
					$user[USERNAME] = $username;

					$this->CI->session->set_userdata(USER, $user);
				}

				return TRUE;
			}
		}

		return FALSE;
	}

	public function check($username, $password) {

		$this->CI->db->where(array(
			USERNAME => $username
		));

		$r = $this->CI->db->get(USERS);

		if($r->num_rows() === 1) {

			$user = $r->row_array();

			if(password_verify($password, $user[PASSWORD])) {

				unset($user[PASSWORD]);
				return $user;
			}
		}

		return FALSE;
	}

	public function change_current_password($password) {
		if($this->is_logged_in()) {
			$username = $this->CI->session->userdata(USER)[USERNAME];
			return $this->change_password($username, $password);
		}

		return FALSE;
	}

	public function change_password($username, $password) {
		$this->CI->db->where(array(USERNAME => $username));
		$r = $this->CI->db->update(USERS, array(PASSWORD => $this->pass_hash($password)));
		return $r;
	}

	private function pass_hash($password) {
		$p = password_hash($password, PASSWORD_BCRYPT);
		return $p;
	}

}


/*

	NEEDS TO BE DEFINED:
	
	define('ID', 'id');
	define('USERS', 'users');
	define('USERNAME', 'username');
	define('PASSWORD', 'password');

	define('USER', 'user');


	DATABASE TABLE STRUCTURE:

	CREATE TABLE IF NOT EXISTS `users` (
	  `id` int(11) NOT NULL,
	  `username` varchar(50) NOT NULL,
	  `password` varchar(64) NOT NULL,
	  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;
	ALTER TABLE `users`
	  ADD PRIMARY KEY (`id`),
	  ADD UNIQUE KEY `username` (`username`);
	ALTER TABLE `users`
	  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

*/


/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */