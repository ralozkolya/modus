<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function static_url() {

	return base_url().'static/';
}

function locale_url() {

	$ci =& get_instance();
	return base_url().$ci->config->item('language').'/';
}