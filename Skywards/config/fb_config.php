<?php
$hostname = $_SERVER['HTTP_HOST'];
$uri = explode('/',$_SERVER['REQUEST_URI']);
if( ($hostname == 'creative2.synechron.com')) {
	$hostname = $uri[1];
}
switch($hostname) {
	case 'localhost':
		define('APP_ID', '467450859982651');
		define('APP_SEC_KEY', '50078282dd196d4323dd3aa97df9401a');
		define("PAGE_ID","438038999602449");
		define('APP_TOKEN','467450859982651|cf5YXgYRZZDJuvBF1_ZOyDyRJHM');
		define("PAGE_NAME","Demo-Emirates-skyward");
		define("APP_NAMESPACE","skywardsdemo");
		define("OPEN_GRAPH_OBJECT_NAME","with_emirates");
		define("OPEN_GRAPH_ACTION_NAME","meeting_friends");
		define("OPEN_GRAPH_ACTION_TITLE","Skywards meet me there");
		define("OPEN_GRAPH_ACTION_IMG",SITE_URL."city_images/Dubai.jpg");
		break;
	case 'Skywards':
		define('APP_ID', '467450859982651');
		define('APP_SEC_KEY', '50078282dd196d4323dd3aa97df9401a');
		define("PAGE_ID","438038999602449");
		define('APP_TOKEN','467450859982651|cf5YXgYRZZDJuvBF1_ZOyDyRJHM');
		define("PAGE_NAME","Demo-Emirates-skyward");
		define("APP_NAMESPACE","skywardsdemo");
		define("OPEN_GRAPH_OBJECT_NAME","with_emirates");
		define("OPEN_GRAPH_ACTION_NAME","meeting_friends");
		define("OPEN_GRAPH_ACTION_TITLE","Skywards meet me there");
		define("OPEN_GRAPH_ACTION_IMG",SITE_URL."city_images/Dubai.jpg");
		break;
	case 'skywards_qa':
		define('APP_ID', '318298064956530');
		define('APP_SEC_KEY', 'cea49924e120056eb177b4021c73f75f');
		define("PAGE_ID","438038999602449");
		define('APP_TOKEN','318298064956530|-LoguyANeyENx0-TldXrZbbetww');
		define("PAGE_NAME","Demo-Emirates-skyward");
		define("APP_NAMESPACE","skywarddemoqa");
		define("OPEN_GRAPH_OBJECT_NAME","with_emirates");
		define("OPEN_GRAPH_ACTION_NAME","meeting_friends");
		define("OPEN_GRAPH_ACTION_TITLE","Skywards meet me there");
		define("OPEN_GRAPH_ACTION_IMG",SITE_URL."city_images/Dubai.jpg");
		break;
	case 's142587.gridserver.com':
	case 'bluebarracudame.com':
		define('APP_ID', '331267290323968');
		define('APP_SEC_KEY', 'a03140392db01362749b0039755b36ff');
		define("PAGE_ID","438038999602449");
		define('APP_TOKEN','331267290323968|W5tc6zmgHzcEL7u7pDhDOxlD5yk');
		define("PAGE_NAME","Demo-Emirates-skyward");
		define("APP_NAMESPACE","skywardclientmachine");
		define("OPEN_GRAPH_OBJECT_NAME","with_emirates");
		define("OPEN_GRAPH_ACTION_NAME","meeting_friends");
		define("OPEN_GRAPH_ACTION_TITLE","Skywards meet me there");
		define("OPEN_GRAPH_ACTION_IMG",SITE_URL."city_images/Dubai.jpg");
		break;
	default:
		define('APP_ID', '467450859982651');
		define('APP_SEC_KEY', '50078282dd196d4323dd3aa97df9401a');
		define("PAGE_ID","438038999602449");
		define('APP_TOKEN','467450859982651|cf5YXgYRZZDJuvBF1_ZOyDyRJHM');
		define("PAGE_NAME","Demo-Emirates-skyward");
		define("APP_NAMESPACE","skywardsdemo");
		define("OPEN_GRAPH_OBJECT_NAME","with_emirates");
		define("OPEN_GRAPH_ACTION_NAME","meeting_friends");
		define("OPEN_GRAPH_ACTION_TITLE","Skywards meet me there");
		define("OPEN_GRAPH_ACTION_IMG",SITE_URL."city_images/Dubai.jpg");
}

define('FB_PAGE_URL_PERMISSION', "http://www.facebook.com/pages/".PAGE_NAME."/".PAGE_ID."?sk=app_".APP_ID);
define("PERMISSION_SCOPE","user_birthday,email,publish_stream,user_location,friends_location,user_hometown,friends_hometown");
define('FB_CANVAS_URL', "http://apps.facebook.com/".APP_ID."/");
define("FB_JS_URL", "http://connect.facebook.net/en_US/all.js");
?>