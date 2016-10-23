<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth {

	private $CI;

	public function __construct() {

		$this->CI =& get_instance();

		$this->CI->load->library('session');
		$this->CI->load->model('User');
	}

	public function login($email, $password) {

		$user = $this->check($email, $password);

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

			$user = $this->CI->User->check($user->id, $user->email);

			if($user) {
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

	public function check($email, $password) {

		$user = $this->CI->User->get_by_key('email', $email);

		if($user) {

			if(password_verify($password, $user->password)) {

				return $user;
			}
		}

		return FALSE;
	}

}


/* End of file Auth.php */
/* Location: ./application/libraries/Auth.php */