<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soap {

	private $directory_exchange;
	private $sales_order;
	private $user;
	private $password;

	public function __construct($config = NULL) {

		if($config) {
			$this->directory_exchange = $config['directory_exchange'];
			$this->sales_order = $config['sales_order'];
			$this->user = $config['user'];
			$this->password = $config['password'];
		}
	}

	public function get_table() {
		
		$client = new SoapClient($this->directory_exchange, [
			'login' => $this->user,
			'password' => $this->password,
			'trace' => TRUE,
		]);

		return $client->GetBalance([])->return->BalanceTable;
	}

}

/* End of file Soap.php */
/* Location: ./application/libraries/Soap.php */