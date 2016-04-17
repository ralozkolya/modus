<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function set_language() {

	$ci =& get_instance();

	$lang = $ci->uri->segment(1);
	$config = $ci->config->item('language');
	$cookie = json_decode(base64_decode(get_cookie('lang')));

	if(!$cookie && !isset($cookie->value)) {
		$cookie = new stdClass;
		$cookie->value = $config;
		$cookie->expire = 0;
	}

	if($lang !== EN && $lang !== GE) {
		if($cookie->value === EN || $cookie->value === GE) {
			$lang = $cookie->value;
		}

		else {
			$lang = $config;
		}
	}

	if($config !== $lang) {
		$ci->config->set_item('language', $lang);
	}

	$diff = $cookie->expire - strtotime('now');

	$diff = $diff / 60 / 60 / 24;

	if($diff < 45 || $cookie->value !== $lang) { //if it's been at around 2 weeks

		$cookie = array(
			'value' => $lang,
			'expire' => strtotime('2 months'),
		);

		$value = base64_encode(json_encode($cookie));

		set_cookie(array(
			'name' => 'lang',
			'value' => $value,
			'expire' => 60*60*24*60,
		));
	}

	$ci->load->language('general');
}

function lang_link($lang) {

	$ci =& get_instance();

	$uri = $ci->uri->uri_string();

	$link = preg_replace('/'.GE.'|'.EN.'/', $lang, $uri, 1);

	if(!$link) $link = $lang;

	return base_url().$link;
}

function get_lang_code($lang) {
	return $lang === EN ? 'en' : 'ka';
}