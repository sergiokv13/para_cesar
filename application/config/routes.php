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
$route['default_controller'] = 'home';
$route['verify_login'] = 'login/verify_login';

$route['users'] = 'users/index';
$route['users/profile/(:any)'] = 'users/profile/$1';
$route['users/new'] = 'users/new';
$route['users/create'] = 'users/create';
$route['users/update'] = 'users/update';
$route['users/edit'] = 'users/edit';
$route['users/disable_account/(:any)'] = 'users/disable_account/$1';
$route['users/activate_account/(:any)'] = 'users/activate_account/$1';

$route['days'] = 'days/index';
$route['days/begin_day'] = 'days/begin_day';
$route['days/end_day'] = 'days/end_day';
$route['days/show/(:any)'] = 'days/show/$1';
$route['days/deadline'] = 'days/deadline';

$route['tasks/create/(:any)'] = 'tasks/create/$1';
$route['tasks/delete/(:any)'] = 'tasks/delete/$1';
$route['tasks/stop/(:any)'] = 'tasks/stop/$1';
$route['tasks/start/(:any)'] = 'tasks/start/$1';

$route['notes/create/(:any)'] = 'notes/create/$1';
$route['notes/delete/(:any)'] = 'notes/delete/$1';

$route['reports/report/(:any)/(:any)'] = 'reports/report/$1/$2';
$route['reports'] = 'reports/index';
$route['reports/profile/(:any)'] = 'reports/profile/$1';

$route['sub_tasks/create/(:any)'] = 'sub_tasks/create/$1';
$route['sub_tasks/delete/(:any)'] = 'sub_tasks/delete/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
