<?php

session_start();

include_once "inc/config.php";
include_once "inc/phpFunctions.php";
include_once "controller/tblUserController.php";

define("COOKIE_TIME_OUT", 7); //specify cookie timeout in days (default is 10 days)

// if(isset($_SESSION["user_id"]) || $_SESSION["user_id"] > 0) {
	// header("location: ".HOST_URL);
// }

$paramArray = array(	
	"dmm_company_name" => $_POST["txtUserName"],
	"password" => md5($_POST["txtPassword"])	
);

$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$userDetails = $userObj->validateLogin($paramArray);

// 1 = User name not exist in DB
// 2 = Incorrct password
if(1 == $userDetails || 2 == $userDetails) {
	echo $userDetails;
} else if(count($userDetails)) {
	// Valid user
	unset($_SESSION["errMsg"]);
	$_SESSION["user_id"] = $userDetails[0]["id"];
	//$_SESSION["admin_name"] = trim($adminArr[0]["admin_first_name"]) . " " . trim($adminArr[0]["admin_last_name"]);
	$_SESSION["user_name"] = trim($userDetails[0]["dmm_company_name"]);
	
	if('musician' == $userDetails[0]['user_type']) {
		/* For musician type user */
		echo $_SESSION["user_name"];
		$counterDetails = $userObj->getCounter($userDetails);
		//print_r($counterDetails);
		$counterArray = array(	
						"logcounter" => ($counterDetails['login_counter'])+1,
						"id" =>$userDetails[0]["id"] 	
						);
		$counterIncre = $userObj->setCounter($counterArray);
	} else {
		/* For listener type user */
		echo 3;
	}
	
	if(1 == $_POST['remember_me']) {
		$phpFunc = new phpFunctions();
		$ckey = $phpFunc->GenRandomKey();

		$paramArray = array(
			'user_key' => md5($ckey),
			'user_id' => $_SESSION['user_id']
		);
		$userDetails = $userObj->setUserLoginKey($paramArray);
		
		setcookie("DMMID", $_SESSION['user_id'], time()+60*60*24*COOKIE_TIME_OUT, "/");
		setcookie("DMMKEY", md5($ckey), time()+60*60*24*COOKIE_TIME_OUT, "/");
	} else {
		setcookie("DMMID", $_SESSION['user_id'], time() - 3600, "/");
		setcookie("DMMKEY", md5($ckey), time() - 3600, "/");
		
	}
	
	$userDetails = $userObj->getUserDetails(array('id' => $_SESSION['user_id']));
	$_SESSION['user_details'] = $userDetails[0];
	/* Remove password MD5 from session */
	unset($_SESSION['user_details']['password']);
}
?>