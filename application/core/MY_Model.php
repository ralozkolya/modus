<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table;

	public function get($id) {

		$this->db->where(array('id' => $id));

		$r = $this->db->get($this->table);

		return $r->row();
	}

	public function add($data) {

		return $this->db->insert($this->table, $data);
	}

	public function edit($data) {

		return $this->db->update($this->table, $data);
	}

	public function delete($id) {

		$this->db->where(array('id' => $id));

		return $this->db->delete($this->table);
	}

	public function get_list() {

		$r = $this->db->get($this->table);

		return $r->result();
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */