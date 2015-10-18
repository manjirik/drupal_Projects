<?php
session_start();
error_reporting(0);
ini_set("display_errors",0);
header('P3P:CP="IDC DSP COR ADM DEVi TAIi PSA PSD IVAi IVDi CONi HIS OUR IND CNT"');


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
require_once("library/facebook.php");

$facebookObj= new Facebook(array(
				'appId'  => APP_ID,
				'secret' => APP_SEC_KEY,
				'cookie' => true
			));

try {
	$user_id=$facebookObj->getUser();
}
catch(Exception $e) {
	$user_id=0;
	ApplicationErrorHandler("getUser failed",serialize($e),__FILE__,__LINE__);
}
if((!isset($_SESSION['fb_access_token']) || $_SESSION['fb_access_token']=="") && $user_id) 
{
	try {
	$_SESSION['fb_access_token']=$facebookObj->getAccessToken();
	ApplicationErrorHandler("access_token start",$_SESSION['fb_access_token'],__FILE__,__LINE__);
	}
	catch(Exception $e) {
		ApplicationErrorHandler("access token failed",$_SESSION['fb_access_token'],__FILE__,__LINE__);
	}
}


function logMe($err, $file, $line) {
	$msg="Error: ".$err.", File: ".$file.", Line: ".$line." Time: ".date('r')."\n";
		$log_file=LOGS_FOLDER.DS.'logs_'.date('d-m-Y').'.log';
		file_put_contents($log_file,$msg,FILE_APPEND);
		
}
function ApplicationErrorHandler($errno, $errstr, $errfile, $errline='') {
		
		$message="Error No.: ".$errno.", ".$errstr.",".$errfile.", Line No.: ".$errline.", Time: ".date('r')."\n";
		$log_file=LOGS_FOLDER.DS.'logs_'.date('d-m-Y').'.log';
		file_put_contents($log_file,$message,FILE_APPEND);
		return true;
	}
set_error_handler('ApplicationErrorHandler',E_ALL ^ E_NOTICE);

if(isset($_GET['r']) && $_GET['r']!="") {
	$request=$_GET['r'];
}
else {
	$request="home";
}

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
$requests=explode("/",$request);


$controller = $requests[0];
$action = (isset($requests[1]) && $requests[1]!="") ? $requests[1] : 'index';

if($requests[0]=='home' && isset($config['landing']) && $config['landing']!="") 
{	
	$controller=$config['landing'];
}
// Handle the app request

		
// app data end		
$controllerClass=ucfirst($controller)."Controller";
logMe('App Start with '.$_GET['r'],__FILE__, __LINE__);
$controllerObj=new $controllerClass();
//array_shift($requests);
//array_shift($requests);
//call_user_func_array(array($controllerObj,$action),$requests);
$controllerObj->$action();
logMe('App End with '.$_GET['r'],__FILE__, __LINE__);