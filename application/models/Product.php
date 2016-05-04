<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $table = 'products';

	public function get($id) {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			$lang.'_name as name',
			$lang.'_description as description',
			'en_name as slug',
			'id', 'price', 'image',
		));

		return parent::get($id);
	}

	public function get_latest() {

		$lang = get_lang_code(get_lang());

		$this->db->select(array(
			'id',
			$lang.'_name as name',
			'en_name as slug',
			'brand',
			'price',
			'image',
		));

		$this->db->order_by('id DESC');

		return parent::get_list(6);
	}

	public function get_filtered($filter) {

		$lang = get_lang_code(get_lang());

		$page = !empty($filter['page']) ? $filter['page'] : 1;

		$page = abs($page - 1);
		$offset = $page * PRODUCTS_PER_PAGE;

		if(!empty($filter['category'])) {

			$category = $filter['category'];

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

		if(!empty($filter['brand'])) {
			$this->db->where_in('brand', $filter['brand']);
		}

		if(!empty($filter['from'])) {
			$this->db->where('price >=', $filter['from']);
		}

		if(!empty($filter['to'])) {
			$this->db->where('price <=', $filter['to']);
		}

		$this->db->select(array(
			'id',
			$lang.'_name as name',
			'en_name as slug',
			'brand',
			'price',
			'image',
		));

		return parent::get_list($page * PRODUCTS_PER_PAGE, $offset);
	}

	public function get_cart($cart) {

		$lang = get_lang_code(get_lang());

		$cart = array_keys($cart);

		$this->db->select(array(
			$lang.'_name as name',
			'id', 'price', 'image',
		));

		$this->db->where_in('id', $cart);

		return $this->get_list();
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */