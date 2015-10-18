<?php 

include_once "inc/config.php";
// include_once "inc/database.php";
include_once "controller/tblUserController.php";

$userObj = new tblUserController($conObj);
$userId = $userObj->userRegistration($paramArray);

$username = trim($_REQUEST['username']);

$db_link = mysql_connect(DB_SERVER, DB_USER_NAME, DB_PASSWORD);

mysql_select_db(DB_NAME, $db_link);

$query = "SELECT COUNT(*) FROM user WHERE dmm_company_name = '%s'";
$query = sprintf($query, $username);

$result = mysql_query($query);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}

$cnt = mysql_result($result, 0);

if($cnt) {
	echo 0;
} else {
	echo 1;
}

?>