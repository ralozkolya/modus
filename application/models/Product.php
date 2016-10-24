<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends MY_Model {

	protected $upload_path = 'static/uploads/products/';
	protected $thumbs_path = 'static/uploads/products/thumbs/';

	protected $table = 'products';
	protected $slug = 'en_name';
	protected $images_table = 'product_images';
	protected $images_model = 'Product_images';

	public function get_latest() {

		$this->db->order_by('id DESC');

		$this->join_images();

		return $this->get_localized_list(6);
	}

	public function get_filtered($filter) {

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

		if(!empty($filter['search'])) {
			$search = $filter['search'];

			$this->db->group_start();

			$this->db->like('ka_name', $search);
			$this->db->or_like('en_name', $search);
			$this->db->or_like('ru_name', $search);
			$this->db->or_like('ka_description', $search);
			$this->db->or_like('en_description', $search);
			$this->db->or_like('ru_description', $search);
			$this->db->or_like('brand', $search);
			
			$this->db->group_end();
		}

		$this->join_images();

		return $this->get_localized_list($page * PRODUCTS_PER_PAGE, $offset);
	}

	public function get_cart($cart) {

		$cart = array_keys($cart);

		$this->db->where_in("{$this->table}.id", $cart);

		$this->join_images();
		return $this->get_localized_list();
	}

	public function get_localized($id) {

		$this->join_images();
		$this->join_stock();

		$this->select_localized();
		return parent::get($id);
	}

	public function get_localized_list($limit = NULL, $offset = NULL) {

		$this->join();
		return parent::get_list($limit, $offset);
	}

	private function select_localized() {

		$lang = get_lang_code(get_lang());

		$this->db->select([
			"{$this->table}.{$lang}_name as name",
			"{$this->table}.{$lang}_description as description",
			"{$this->table}.slug", "{$this->table}.id",
			"{$this->table}.price",
		]);
	}

	private function join() {

		$lang = get_lang_code(get_lang());

		$this->select_localized();

		$this->db->select([
			"categories.{$lang}_name as category",
			"brands.{$lang}_name as brand",
		]);

		$this->db->join('categories', "{$this->table}.category = categories.id");
		$this->db->join('brands', "{$this->table}.brand = brands.id");
		$this->db->group_by("{$this->table}.id");
	}

	private function join_images() {

		$this->db->select([
			"{$this->images_table}.image",
		]);

		//$this->db->where('product', $product);

		$this->db->join($this->images_table, "{$this->images_table}.item = {$this->table}.id", 'left');

		$this->db->group_by("{$this->table}.id");
	}

	private function join_stock() {

		$this->db->select([
			'stock_products.Quantity as quantity',
		]);

		$this->db->join('stock_products', "stock_products.id = {$this->table}.stock", 'left');
		$this->db->group_by("{$this->table}.id");
	}

}

/* End of file Product.php */
/* Location: ./application/models/Product.php */