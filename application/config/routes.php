<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'main/index';
$route['admin'] = 'admin/dashboard';
$route['about'] = 'main/about';
$route['login'] = 'main/p_login';
$route['available-doctors'] = 'appointment/available_docs';
$route['contact-us'] = 'main/contact_us';
$route['doctor/login'] = 'main/doc_login';
$route['doctor/register-form'] = 'main/doc_register';
$route['doctor/register'] = 'doctor/register';
$route['doctor/dashboard'] = 'doctor/dashboard';
$route['doctors/list/(:num)'] = 'doctor/list';
$route['doctor/appointments'] = 'appointment/appointments';
$route['doctor/search-patient'] = 'doctor/search_patient';
$route['doctor/account'] = 'doctor/account_details';
$route['user/register-form'] = 'main/p_register';
$route['user/account'] = 'user/account_details';
$route['user/change-password'] = 'user/change_password';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
