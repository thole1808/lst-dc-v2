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
$route['default_controller'] = 'auth';
$route['404_override'] = 'Not_found';
$route['translate_uri_dashes'] = FALSE;



// ROUTES 
// $route['kabupaten'] = 'kabupaten';
// $route['kabupaten(:any)'] = "kabupaten";
// $route['kabupaten(:any)'] = "kabupaten/update/$1";
// $route['(:num)'] = "kabupaten/update/$1";



// $route['kabupaten'] = 'kabupaten';
// $route['kabupaten/update'] = 'kabupaten/update/$1';
// $route['(:num)'] = "kabupaten/update/$1";










// $route['kabupaten/(:num)'] = "kabupaten/update/$1";

// $route['addNew'] = "admin/addNew";
// $route['addNewUser'] = "admin/addNewUser";
// $route['editOld'] = "admin/editOld";
// $route['editOld/(:num)'] = "admin/editOld/$1";
// $route['editUser'] = "admin/editUser";
// $route['deleteUser'] = "admin/deleteUser";
// $route['log-history'] = "admin/logHistory";
// $route['log-history-backup'] = "admin/logHistoryBackup";
// $route['log-history/(:num)'] = "admin/logHistorysingle/$1";
// $route['log-history/(:num)/(:num)'] = "admin/logHistorysingle/$1/$2";
// $route['backupLogTable'] = "admin/backupLogTable";
// $route['backupLogTableDelete'] = "admin/backupLogTableDelete";
// $route['log-history-upload'] = "admin/logHistoryUpload";
// $route['logHistoryUploadFile'] = "admin/logHistoryUploadFile";


// Parents and Child page.

// $route['kelolamenu'] = 'kelolamenu';
// $route['user'] = 'user';

// $route['kabupaten'] = 'kabupaten';
// $route['kabupaten/create'] = 'kabupaten/create';
// $route['kabupaten/(:any)/(:num)'] = "kabupaten/update/$1";
// // For Main Home Page.
// $route['(:any)'] = "kabupaten/update/$1";


// 
// $route['kabupaten'] = 'kabupaten';
// $route['kabupaten/create'] = 'kabupaten/create';
// $route['kabupaten/update/(:num)'] = 'kabupaten/update/$1';
// $route['kabupaten/update/(:num)'] = 'kabupaten/update/$1';
// $route['kabupaten/create/(:num)'] = "kabupaten/create/get_by_id/$1";
// $route['kabupaten/update/(:any)/(:num)'] = 'kabupaten/update/$id';

// 
// $route['kabupaten']= "kabupaten/";
// $route['kabupaten']= "kabupaten/create/";
// $route['kabupaten/update/(:num)'] = 'kabupaten/update/$id';

// $route['kabupaten/:id'] = 'kabupaten/update/$id';
// $route['kabupaten/(:num)'] = 'kabupaten/update/$1';



