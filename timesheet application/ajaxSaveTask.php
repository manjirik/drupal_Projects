<?php session_start();
include_once("tblTasksController.php");
$paramArray = array
(	
	"tEmpCode" 	=> $_SESSION["empCode"],
	"tDate"		=> $_POST["tDate"],
	"tStTime"	=> $_POST["tStTime"],
	"tEnTime"	=> $_POST["tEnTime"],
	"tType"		=> $_POST["tType"],
	"tProject"	=> $_POST["txtProject"],
	"tDesc"		=> $_POST["txtTask"],
	"tStatus"	=> $_POST["cmbTaskStatus"]
);
$lastInsertId = tblTasksController::saveTask($paramArray); 
if((int)$lastInsertId<=0)
{	
	$_SESSION["errMsg"] = "Some error occurred while saving a new Task. Please retry.";
	$_SESSION["sucMsg"] = ""; ?>	
    <input type="hidden" name="hSaveTaskErrFlag" id="hSaveTaskErrFlag" value="1" />    
	<?php
}
else
{
	$_SESSION["sucMsg"] = "New Task saved successfully";
	$_SESSION["errMsg"] = "";?>
	<input type="hidden" name="hSaveTaskErrFlag" id="hSaveTaskErrFlag" value="0" />	
	<?php 
}?>