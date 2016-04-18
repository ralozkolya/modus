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

		$this->db->where(array('id' => $data['id']));

		return $this->db->update($this->table, $data);
	}

	public function delete($id) {

		$this->db->where(array('id' => $id));

		return $this->db->delete($this->table);
	}

	public function get_list($limit = NULL, $offset = NULL) {

		$r = $this->db->get($this->table);

		if($limit) {
			if($offset) {
				$this->db->limit($limit, $offset);
			}

			else {
				$this->db->limit($limit);
			}
		}

		return $r->result();
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */