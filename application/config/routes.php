<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

/*
$route['default_controller'] = "welcome";
$route['404_override'] = '';
*/
//路由有優先順序，順位較高者會優先被判斷
//保留的路由必須放在所有萬用字元之前
//$route['form'] = 'form';
$route['login'] = 'account_management/user_login';
$route['logout'] = 'account_management/user_logout';
$route['validation/account'] = 'account_management/reg_account_check';
$route['validation/passwd'] = 'account_management/reg_passwd_check';
$route['project_list'] = 'project/list_all_projects';
$route['project_list/(:any)'] = 'project/list_all_projects/$1';
$route['project_list/(:num)/(:any)'] = 'project/list_all_projects/$1/$2';
$route['project_detail/(:num)'] = 'project/list_project_detail/$1';
$route['project_detail/(:num)/(:any)'] = 'project/list_project_detail/$1/$2';
$route['project_record_create/(:num)'] = 'project/create_project_record_data/$1';
$route['project_minutes_create/(:num)'] = 'project/create_project_minutes_data/$1';
$route['project_minutes_edit/(:num)'] = 'project/update_project_minutes_data/$1';
$route['project_record/(:num)'] = 'project/list_project_record_detail/$1';
$route['project_record/(:num)/(:any)'] = 'project/list_project_record_detail/$1/$2';
$route['project_minutes/(:num)'] = 'project/list_project_minutes_detail/$1';
$route['project_minutes_mail/(:num)'] = 'project/list_project_minutes_for_mail/$1';
$route['project_minutes/(:num)/(:any)'] = 'project/list_project_minutes_detail/$1/$2';
$route['project_create'] = 'project/create_project_data';
$route['project_file_upload'] = 'project/project_file_upload';
$route['project_set_unblocked'] = 'project/project_set_unblocked';
$route['project_check_is_blocked'] = 'project/project_check_is_blocked';
$route['project/data_processing'] = 'project/data_processing';
$route['project_file/(:num)'] = 'project/project_file/$1';
$route['project_file/(:num)/(:any)'] = 'project/project_file/$1/$2';
$route['project_edit/(:any)'] = 'project/edit_project_data/$1';
$route['project/test_template'] = 'project/test_template';
$route['project/index'] = 'project/index';
/*$route['data/getTable'] = 'project/getTable';
$route['data/getTable1'] = 'project/getTable1';
$route['data/getTable2'] = 'project/getTable2';
$route['data/getTable3'] = 'account_management/getTable3';*/
$route['data/project_table'] = 'data/project_table';
$route['data/news_table'] = 'data/news_table';
$route['data/external_tech_table'] = 'data/external_tech_table';
$route['data/manager_opinion_table'] = 'data/manager_opinion_table';
//$route['data/project_table'] = 'data/project_table';
//$route['data/project_table'] = 'data/project_table';
//$route['data/getTable4'] = 'data/getTable4';
//$route['get_data'] = 'project/get_data';
//$route['institute/register'] = 'institute/register';
$route['default_controller'] = 'institute/register';

/*
$route['university_project/university_view_all_projects'] = 'university_project/university_view_all_projects';
$route['university_project/view'] = 'university_project/view';
$route['university_project/view_detail'] = 'university_project/view';
$route['university_register/view_register_page'] = 'university_register/view_register_page';
$route['news/create'] = 'news/create';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';*/


/* End of file routes.php */
/* Location: ./application/config/routes.php */