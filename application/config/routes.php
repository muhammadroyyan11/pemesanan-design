<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller claschat/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/claschat/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different claschat/function is called than the one
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
|	$route['404_override'] = 'errorchat/page_missing';
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
$route['default_controller'] = 'Home';
// $route['404_override'] = '';
$route['404_override'] = 'my404';
$route['translate_uri_dashes'] = FALSE;


// Chat Route
$route['chat'] = 'ChatController/index';
$route['send-message'] = 'ChatController/send_text_message';
$route['chat-attachment/upload'] = 'ChatController/send_text_message';
$route['get-chat-history-vendor'] = 'ChatController/get_chat_history_by_vendor';
$route['chat-clear'] = 'ChatController/chat_clear_client_cs';