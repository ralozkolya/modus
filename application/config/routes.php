<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = '('.GE.'|'.EN.'|'.RU.')';

$route[$lang] = 'site';

$route[$lang.'/(.*)'] = 'site/$2';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
