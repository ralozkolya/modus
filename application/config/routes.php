<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$lang = '('.GE.'|'.EN.'|'.RU.')';

$route[$lang] = 'site';
$route[$lang.'/home'] = 'site';
$route[$lang.'/login'] = 'site/login';
$route[$lang.'/register'] = 'site/register';

$route[$lang.'/profile'] = 'profile';
$route[$lang.'/orders'] = 'profile/orders';
$route[$lang.'/order'] = 'profile/order';
$route[$lang.'/profile/(.*)'] = 'profile/$2';

$route[$lang.'/(.*)'] = 'site/$2';

$route['add_to_cart/(:num)'] = 'site/add_to_cart/$1';
$route['remove_from_cart/(:num)'] = 'site/remove_from_cart/$1';

$route['default_controller'] = 'site';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
