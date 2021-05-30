<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['sessionx/session_unset'] = 'Session_controller/unset_session_data';
$route['sessionx'] = 'Session_controller';

$route['cookie'] = 'Cookie_controller';
$route['cookie/display'] = 'Cookie_controller/display_cookie';
$route['cookie/delete'] = 'Cookie_controller/deletecookie';
$route['tempdata'] = 'Tempdata_new_controller';
$route['tempdata/add'] = 'Tempdata_new_controller/add';

$route['flashdata'] = 'Flashdata_controller';
$route['flashdata/add'] = 'Flashdata_controller/add';

$route['cachecontroller'] = 'Cache_controller';
$route['cachecontroller/delete'] = 'Cache_controller/delete_file_cache';
$route['example'] = 'Example';

$route['redirect'] = "Redirect_controller";
$route['redirect/computer_graphics']="Redirect_controller/computer_graphics";

$route['Upload'] = "upload";

$route['user/register'] = "user";
$route['user/create'] = 'user/create';

$route['user/login'] = "user/login";

$route['user/doLogin'] = "user/signin";

$route['user/edit/2'] = "user/upload";
$route['user/logout'] = "user/logout";


$route['user/dashboard']="user/dashboard/index";

$route['admin/dashboard']="user/dashboard";

$route['admin/category'] = 'Categories/category/view';
$route['admin/category_add'] = 'Categories/category/addCategory';

$route['admin/category_insert'] = 'Categories/category/create';


$route['admin/product_add'] = 'Product/product/addProduct';

$route['admin/product_insert'] = 'Product/product/create';

$route['admin/product_list'] = 'Product/product/view';
