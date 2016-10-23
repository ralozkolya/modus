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

$ka_body = [
	'field' => 'ka_body',
	'label' => 'lang:ka_body',
	'rules' => 'required',
];

$en_body = [
	'field' => 'en_body',
	'label' => 'lang:en_body',
	'rules' => 'required',
];

$ru_body = [
	'field' => 'ru_body',
	'label' => 'lang:ru_body',
	'rules' => 'required',
];

$priority = [
	'field' => 'priority',
	'label' => 'lang:priority',
	'rules' => 'is_numeric',
];

$pinned = [
	'field' => 'pinned',
	'label' => 'lang:pinned',
	'rules' => 'regex_match[/0|1/]',
];

$email = [
	'field' => 'email',
	'label' => 'lang:email',
	'rules' => 'required|valid_email',
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

$config['add_Brand'] = [
	$ka_name, $en_name, $ru_name, $pinned,
];

$config['edit_Brand'] = [
	$id, $ka_name, $en_name, $ru_name, $pinned,
];

$config['add_News'] = [
	$ka_title, $en_title, $ru_title,
	$ka_description, $en_description, $ru_description,
	$ka_body, $en_body, $ru_body,
	$pinned,
];

$config['edit_News'] = [
	$id,
	$ka_title, $en_title, $ru_title,
	$ka_description, $en_description, $ru_description,
	$ka_body, $en_body, $ru_body,
	$pinned,
];

$config['add_Agent'] = [
	$ka_name, $en_name, $ru_name, $email,
];

$config['edit_Agent'] = [
	$id, $ka_name, $en_name, $ru_name, $email,
];

$config['edit_User_admin'] = [
	[
		'field' => 'password',
		'label' => 'lang:password',
		'rules' => 'required|min_length[5]'
	],
	[
		'field' => 'password_repeat',
		'label' => 'lang:password_repeat',
		'rules' => 'required|matches[password]'
	],
];

$config['register'] = [
	[
		'field' => 'first_name',
		'label' => 'lang:first_name',
		'rules' => 'required',
	],
	[
		'field' => 'last_name',
		'label' => 'lang:last_name',
		'rules' => 'required',
	],
	[
		'field' => 'email',
		'label' => 'lang:email',
		'rules' => 'required|valid_email|is_unique[users.email]',
	],
	[
		'field' => 'password',
		'label' => 'lang:password',
		'rules' => 'required|min_length[6]',
	],
	[
		'field' => 'password_repeat',
		'label' => 'lang:password_repeat',
		'rules' => 'required|matches[password]',
	],
];