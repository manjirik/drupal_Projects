<?php session_start(); 
include_once("tblEmployeeController.php");
include_once("phpFunctions.php"); 
require_once('class.phpmailer.php'); 
$empEmail = trim($_POST["txtEmailFp"]);
$empDtls = tblEmployeeController::getEmployeeDtlsByEmail(array("empEmail"=>$empEmail));
if(count($empDtls)<=0)
{?>
	<input type="hidden" name="hValidEmp" id="hValidEmp" value="0" />
<?php }
else
{?>
	<input type="hidden" name="hValidEmp" id="hValidEmp" value="1" />
    <?php
	$empFullName = ucfirst($empDtls[0]["emp_fname"])." ".strtoupper($empDtls[0]["emp_mname"]).". ".ucfirst($empDtls[0]["emp_lname"]);
	
	$str = "
		<table border='0' cellpadding='2' cellspacing='2'>
			<tr>
				<td align='left' valign='top'>Dear ". $empFullName .",</td>
			</tr>			
			<tr>
				<td align='left' valign='top'>Below are your Timesheet login details:</td>
			</tr>
			<tr>
				<td align='left' valign='top'>&nbsp;</td>
			</tr>
			<tr>
				<td align='left' valign='top'>
					<table border='0' cellpadding='1' cellspacing='1'>
						<tr>
							<td align='left' valign='top'>Email:</td>
							<td align='left' valign='top'>".$empEmail."</td>
						</tr>						
						<tr>
							<td align='left' valign='top'>Password:</td>
							<td align='left' valign='top'>".trim($empDtls[0]["emp_pass"])."</td>
						</tr>
					</table>				
				</td>
			</tr>
			<tr>
				<td align='left' valign='top'>&nbsp;</td>
			</tr>
			<tr>
				<td align='left' valign='top'>Thank you.</td>
			</tr>
			<tr>
				<td align='left' valign='top'></td>
			</tr>
			<tr>
				<td align='left' valign='top'>Administrator</td>
			</tr>
		</table>	
	";
	
	$mail = new PHPMailer();
	$mail->SetFrom("admin@synechron.com", "Synechron::Timesheet");
	$mail->AddAddress($empEmail, $empFullName);
	$mail->Subject = "Synechron::Timesheet::Login Details";
	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
	$mail->MsgHTML($str);
	if(!$mail->Send()) 
	{
		//echo "Mailer Error: " . $mail->ErrorInfo;  
		$_SESSION["errMsg"] = "Some error occurred while sending your mail. Please retry.";
		$_SESSION["sucMsg"] = "";
	} 
	else 
	{
		$_SESSION["sucMsg"] = "Mail sent successfully.";
		$_SESSION["errMsg"] = "";			
	}
}?>