<?php session_start();
include_once("tblTasksController.php");
$paramArray = array
(	
	"hTid"		=> $_POST["hTid"],
	"tEmpCode" 	=> $_SESSION["empCode"],
	"tDate"		=> $_POST["tDate"],
	"tStTime"	=> $_POST["tStTime"],
	"tEnTime"	=> $_POST["tEnTime"],
	"tType"		=> $_POST["tType"],
	"tProject"	=> $_POST["txtProject"],
	"tDesc"		=> $_POST["txtTask"],
	"tStatus"	=> $_POST["cmbTaskStatus"]
);
$retVal = tblTasksController::updateTask($paramArray); 
if((int)$lastInsertId<=0)
{	
	$_SESSION["sucMsg"] = "Task updated successfully";
	$_SESSION["errMsg"] = ""; ?>	
    <input type="hidden" name="hUpdateTaskErrFlag" id="hUpdateTaskErrFlag" value="0" />    
	<?php
}
else
{	
	$_SESSION["errMsg"] = "Some error occurred while saving a new Task. Please retry.";
	$_SESSION["sucMsg"] = ""; ?>
	<input type="hidden" name="hUpdateTaskErrFlag" id="hUpdateTaskErrFlag" value="1" />	
	<?php 
}?>