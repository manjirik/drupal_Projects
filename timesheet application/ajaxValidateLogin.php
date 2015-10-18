<?php session_start();
include_once("tblEmployeeController.php");
$paramArray = array
(	
	"empEmail"			=> $_POST["txtEmail"],
	"empPassword"		=> $_POST["txtPassword"]	
);
$empArr = tblEmployeeController::validateLogin($paramArray); 
if(count($empArr)<=0)
{
	//$_SESSION["errMsg"] 	= "Invalid Login details"; 
	$_SESSION["empId"] 		= "";
	$_SESSION["empCode"] 	= "";
	$_SESSION["empEmail"]	= "";
	$_SESSION["empReportEmail"]	= ""; ?>	
    <input type="hidden" name="hInvalidLoginFlag" id="hInvalidLoginFlag" value="1" />    
	<?php
}
else
{?>
	<input type="hidden" name="hInvalidLoginFlag" id="hInvalidLoginFlag" value="0" />	
	<?php 
	$_SESSION["empId"] 			= trim($empArr[0]["emp_id"]);
	$_SESSION["empCode"] 		= trim($empArr[0]["emp_code"]);
	$_SESSION["empEmail"] 		= trim($empArr[0]["emp_email"]);
	$_SESSION["empReportEmail"] = trim($empArr[0]["emp_report_email"]);
}?>