<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id = [
	'field' => 'id',
	'label' => 'lang:id',
	'rules' => 'required|is_natural',
];

$ka_name = [
	'field' => 'ka_name',
	'label' => 'lang:ka_name',
	'rules' => 'required',
];

$en_name = [
	'field' => 'en_name',
	'label' => 'lang:en_name',
	'rules' => 'required',
];

$ru_name = [
	'field' => 'ru_name',
	'label' => 'lang:ru_name',
	'rules' => 'required',
];

$ka_description = [
	'field' => 'ka_description',
	'label' => 'lang:ka_description',
	'rules' => 'required',
];

$en_description = [
	'field' => 'en_description',
	'label' => 'lang:en_description',
	'rules' => 'required',
];

$ru_description = [
	'field' => 'ru_description',
	'label' => 'lang:ru_description',
	'rules' => 'required',
];

$category = [
	'field' => 'category',
	'label' => 'lang:category',
	'rules' => 'required|is_natural',
];

$brand = [
	'field' => 'brand',
	'label' => 'lang:brand',
	'rules' => 'required|is_natural',
];

$stock = [
	'field' => 'stock',
	'label' => 'lang:stock',
	'rules' => 'required|is_natural',
];

$ka_title = [
	'field' => 'ka_title',
	'label' => 'lang:ka_title',
	'rules' => 'required',
];

$en_title = [
	'field' => 'en_title',
	'label' => 'lang:en_title',
	'rules' => 'required',
];

$ru_title = [
	'field' => 'ru_title',
	'label' => 'lang:ru_title',
	'rules' => 'required',
];

$priority = [
	'field' => 'priority',
	'label' => 'lang:priority',
	'rules' => 'is_numeric',
];

$config['add_Product'] = [
	$ka_name, $en_name, $ru_name,
	$ka_description, $en_description, $ru_description,
	$category, $brand, $stock,
];

$config['edit_Product'] = [
	$id, $ka_name, $en_name, $ru_name,
	$ka_description, $en_description, $ru_description,
	$category, $brand, $stock,
];

$config['add_Product_images'] = [
	[
		'field' => 'item',
		'label' => 'lang:item',
		'rules' => 'required|is_natural',
	],
];

$config['edit_Page'] = [
	$id, $ka_title, $en_title, $ru_title,
];

$config['add_Banner'] = [
	$priority,
];

$config['edit_Banner'] = [
	$id, $priority,
];