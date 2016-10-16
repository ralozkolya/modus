<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function admin_table($type, $items, $columns) {

	$ci =& get_instance();

	return $ci->load->view('elements/admin/table', [
		'type' => $type,
		'items' => $items,
		'columns' => $columns,
	], TRUE);
}