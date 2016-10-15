<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $table;

	public function get($id) {

		$this->db->where('id', $id);

		$r = $this->db->get($this->table);

		return $r->row();
	}

	public function get_by_key($key, $value) {

		$this->db->where($key, $value);

		return $this->db->get($this->table)->row();
	}

	public function add($data) {

		return $this->db->insert($this->table, $data);
	}

	public function edit($data) {

		$this->db->where(['id' => $data['id']]);

		return $this->db->update($this->table, $data);
	}

	public function delete($id) {

		$this->db->where(['id' => $id]);

		return $this->db->delete($this->table);
	}

	public function get_list($limit = NULL, $offset = NULL) {

		if($limit) {
			if($offset) {
				$this->db->limit($limit, $offset);
			}

			else {
				$this->db->limit($limit);
			}
		}

		$r = $this->db->get($this->table);

		return $r->result();
	}

	protected function hash_password($password) {

		return password_hash($password, PASSWORD_DEFAULT, array('cost' => 12));
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */