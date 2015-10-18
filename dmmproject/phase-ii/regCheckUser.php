<?php 

session_start();

include_once "inc/config.php";
include_once "controller/tblUserController.php";

$paramArray = array(	
	"table_name" => "user",
	"dmm_company_name" => $_POST["reg_dmm_comp_name"],
);

$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$user_arr = $userObj->checkuser($paramArray);

if(count($user_arr) > 0) {
	echo 0;
} else {
	echo 1;
}

?>