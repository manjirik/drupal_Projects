<?php session_start();
include_once("chkSession.php");
include_once("database.php"); 
include_once("tblEmployeeController.php");
include_once("tblTasksController.php");
include_once("phpFunctions.php");  
include("ExportToExcel.class.php");
$hMonth = trim($_GET["month"]);
$hYear = trim($_GET["year"]);
$monthArray = array("1"=>"January", "2"=>"February", "3"=>"March", "4"=>"April", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"August", "9"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
$empCode = $_SESSION["empCode"];
$empName = tblEmployeeController::getEmployeeFullName(array("empCode"=>$empCode));
$exp=new ExportToExcel();
//$empName = str_replace(".","_",$empName);
$empName = str_replace(" ","_",$empName);
$excelFileName = $empCode."_".$empName."_".$monthArray[(int)$hMonth]."_".$hYear."_timesheet.xls";
$exp->exportWithPage("exportFile.php",$excelFileName);
?>

