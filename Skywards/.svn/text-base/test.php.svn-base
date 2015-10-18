<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);


// TO DO: We need to move below definers in configuration file
// By Rahul Sonar. 
define('BASEPATH',dirname(__FILE__));
define('DS','/');
// Definers ends here

require_once("config/config.php");
require_once("config/fb_config.php");
require_once("config/database.php");
require_once("core/BaseController.php");
require_once("core/BaseModel.php");
require_once("core/ez_sql_core.php");
require_once("core/ez_sql_mysql.php");

function __autoload($class_name) {
	if(file_exists(BASEPATH.DS.'controller'.DS.$class_name.".php")) {
		include(BASEPATH.DS.'controller'.DS.$class_name.".php");
	}
	
	if(file_exists(BASEPATH.DS.'model'.DS.$class_name.".php")) {
		include(BASEPATH.DS.'model'.DS.$class_name.".php");
	}
	
	
	if(file_exists(BASEPATH.DS.'library'.DS.$class_name.".php")) {
		include(BASEPATH.DS.'library'.DS.$class_name.".php");
	}
}
require_once("library/Fb_common_func.php");
$facebook= new Facebook(array(
				'appId'  => APP_ID,
				'secret' => APP_SEC_KEY,
				'cookie' => true
			));
$fb_common_func=new Fb_common_func();


file_put_contents('log.log','func3 starttime '.date('r',time())."\n",FILE_APPEND);
$f1=$fb_common_func->getUserFriends($facebook, $facebook->getAccessToken(), $facebook->getUser());
file_put_contents('log.log','func3 endtime '.date('r',time())."\n",FILE_APPEND);


file_put_contents('log.log','func1 starttime '.date('r',time())."\n",FILE_APPEND);
$f1=$fb_common_func->getUserFriendswithLocation($facebook, $facebook->getAccessToken(), $facebook->getUser());
file_put_contents('log.log','func1 endtime '.date('r',time())."\n",FILE_APPEND);
file_put_contents('log.log','func2 starttime '.date('r',time())."\n",FILE_APPEND);
$f1=$fb_common_func->getUserFriendswithoutLocation($facebook, $facebook->getAccessToken(), $facebook->getUser());
file_put_contents('log.log','func2 endtime '.date('r',time())."\n",FILE_APPEND);



