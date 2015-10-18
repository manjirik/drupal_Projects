<?php session_start();
include_once("tblEmployeeController.php");
$paramArray = array
(
	"empCode"			=> $_POST["txtEmpCode"], 
	"empFname"			=> $_POST["txtFname"],
	"empMname"			=> $_POST["txtMname"],
	"empLname"			=> $_POST["txtLname"],
	"empEmailS"			=> $_POST["txtEmailS"],
	"empPasswordS"		=> $_POST["txtPasswordS"],
	"empRepAuthName"	=> $_POST["txtReportToS"],
	"empReportToEmailS"	=> $_POST["txtReportToEmailS"]
);
/*$paramArray = array
(
	"empCode"			=> "5333", 
	"empFname"			=> "mdjsk",
	"empMname"			=> "djh",
	"empLname"			=> "dsjhdfj",
	"empEmailS"			=> "cdskfj",
	"empPasswordS"		=> "ejhdf",
	"empRepAuthName"	=> "fdkjf",
	"empReportToEmailS"	=> "fdmf"
);*/
 $lastInsertId = tblEmployeeController::saveEmployee($paramArray); 
if((int)$lastInsertId>0)
{
	$_SESSION["sucMsg"] 	= "You have been registered successfully. Redirecting, please wait...";
	$_SESSION["empId"] 		= $lastInsertId;
	$_SESSION["empEmail"] 	= trim($_POST["txtEmailS"]);
}
else
{
	$_SESSION["errMsg"] 	= "Error occured. Please try again";
	$_SESSION["empId"] 		= "";
	$_SESSION["empEmail"] 	= "";
}?>