<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $table = 'products';

	public function get_latest() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_name as name',
			'price',
			'image',
		));

		$this->db->order_by('id DESC');

		return parent::get_list(6);
	}

	public function get_filtered($get) {

		$lang = get_lang_code(get_lang());

		$page = !empty($get['page']) ? $get['page'] : 1;

		$page = abs($page - 1);
		$offset = $page * PRODUCTS_PER_PAGE;

		if(!empty($get['category'])) {

			$category = $get['category'];

			$c = $this->Category->get($category);

			if($c->parent) {
				$this->db->where('category', $category);
			}

			else {
				$subs = $this->Category->get_subcategories($category);
				$ids = array();
				
				foreach($subs as $s) {
					$ids[] = $s->id;
				}

				$this->db->group_start();

				if(!empty($ids)) {
					$this->db->where_in('category', $ids);
				}

				$this->db->or_where('category', $category);

				$this->db->group_end();
			}
		}

		if(!empty($get['brand'])) {
			$this->db->where_in('brand', $get['brand']);
		}

		if(!empty($get['from'])) {
			$this->db->where('price >=', $get['from']);
		}

		if(!empty($get['to'])) {
			$this->db->where('price <=', $get['to']);
		}

		$this->db->select(array(
			$lang.'_name as name',
			'brand',
			'price',
			'image',
		));

		return parent::get_list($page * PRODUCTS_PER_PAGE, $offset);
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */