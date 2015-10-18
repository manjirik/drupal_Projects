<?php session_start();
include_once("tblEmployeeController.php"); ?>
<input type="hidden" name="hDupCodeFlag" id="hDupCodeFlag" value="<?php echo tblEmployeeController::chkDuplicateCode(array("empCode"=>$_POST["txtEmpCode"], "tType"=>"add")); ?>"  />
<input type="hidden" name="hDupEmailFlag" id="hDupEmailFlag" value="<?php echo tblEmployeeController::chkDuplicateEmail(array("empEmail"=>$_POST["txtEmailS"], "tType"=>"add")); ?>"  />