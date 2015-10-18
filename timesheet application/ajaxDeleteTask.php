<?php session_start();
include_once("tblTasksController.php");
$paramArray = array
(	
	"tid" => $_POST["tid"]
);
$aFlag = tblTasksController::dactivateTask($paramArray); 
if((int)$aFlag>0)
{	
	$_SESSION["sucMsg"] = "Task deleted successfully";
	$_SESSION["errMsg"] = ""; ?>	
    <input type="hidden" name="hDeleteTaskErrFlag" id="hDeleteTaskErrFlag" value="1" />    
	<?php
}
else
{	
	$_SESSION["errMsg"] = "Some error occurred while deleting the selected Task. Please retry.";
	$_SESSION["sucMsg"] = ""; ?>
	<input type="hidden" name="hDeleteTaskErrFlag" id="hDeleteTaskErrFlag" value="0" />	
	<?php 
}?>