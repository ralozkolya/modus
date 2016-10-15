<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends MY_Model {

	protected $table = 'stock_products';

	public function update($products) {

		$this->db->update($this->table, ['Quantity' => 0]);

		$query = "INSERT INTO {$this->table} (`Name`, `Quantity`) VALUES ";

		$values = '';

		foreach($products as $p) {

			$row = get_object_vars($p);

			if(strlen($values)) {
				$values .= ', ';
			}

			$name = $this->db->escape($p->Name);
			$quantity = $this->db->escape($p->Quantity);

			$values .= '('.
				$name.', '.
				$quantity
			.')';
		}

		$query .= $values;
		$query .= " ON DUPLICATE KEY UPDATE `Quantity` = `Quantity` + VALUES(`Quantity`)";

		$this->db->query($query);
	}

}

/* End of file Stock.php */
/* Location: ./application/models/Stock.php */