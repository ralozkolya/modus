<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $upload_path = 'static/uploads/';

	protected $table;
	protected $folder;
	protected $with_image;
	protected $image_required;
	protected $slug = FALSE;

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

		if($this->with_image) {

			$upload = $this->upload();

			if(empty($upload)) {
				return FALSE;
			}

			$data['image'] = $upload['file_name'];
			$data['image_path'] = $upload['file_path'];
		}

		if($this->slug) {
			$data['slug'] = $this->generate_slug($data[$slug]);
		}

		return $this->db->insert($this->table, $data);
	}

	public function edit($data) {

		$this->db->where(['id' => $data['id']]);

		return $this->db->update($this->table, $data);
	}

	public function delete($id) {

		$this->db->where(['id' => $id]);

		if($this->with_image) {

			$item = parent::get($id);
			$path = $item->image_path.$item->image;

			if(file_exists($path)) {
				unlink($path);
			}
		}

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

	protected function upload() {

		$config['allowed_types'] = 'png|jpg|gif';
		$config['upload_path'] = $this->upload_path.$this->folder;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);

		if($this->upload->do_upload('image')) {
			return $this->upload->data();
		}

		else if($image_requred) {
			return FALSE;
		}
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */