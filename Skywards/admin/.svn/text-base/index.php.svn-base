<?php include("inc/config.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Login</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>cms.css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>functions.js"></script>
		<script language="javascript" type="text/javascript">
		<!--
			function setFocus()
			{
				document.frmAdminLogin.txtUserName.focus();
			};
			function formValidate()
			{
				var txtUserName= dotrim(document.getElementById("txtUserName").value);
				var txtPassword= dotrim(document.getElementById("txtPassword").value);
				
				if(txtUserName=="")
				{
					alert("Enter Username");
					document.getElementById("txtUserName").focus();
					return false;				
				}
				if(txtPassword=="")
				{
					alert("Enter Password");
					document.getElementById("txtPassword").focus();
					return false;				
				}				
				document.frmAdminLogin.aciton = "validateAdminLogin.php";
				document.frmAdminLogin.submit();
			};
		//-->
		</script>
	</head>
	<body onLoad="setFocus();">
		<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
		  <tr>
			<td height="1">
				<div class="header">
					<div class="date">
						<span  id="DateTime" class="date"></span>
					  <SCRIPT language="JavaScript">startclock();</SCRIPT>
					</div>
			</div>	</td>
		  </tr>
		  <tr>
			<td align="center" valign="middle" ><table width="100" border="0" cellspacing="0" cellpadding="0">
			  <tr>
				<td><!--<img src="<?php echo ADMIN_IMAGE_PATH; ?>login_logo.png" alt="" width="143" height="73" border="0"/> --></td>
			  </tr>
			<?php if((isset($_SESSION["sucMsg"])&&trim($_SESSION["sucMsg"])!="") || (isset($_SESSION["errMsg"])&&trim($_SESSION["errMsg"])!=""))
			{?>	
				<tr>
					<td align="center" valign="top" style="padding-left:67px;"><?php include(ADMIN_INC_PATH."messages.php"); ?></td>
				</tr>
			<?php } ?>
			  <tr>
				<td>
					<form name="frmAdminLogin" id="frmAdminLogin" method="post" action="validateAdminLogin.php">
						<div class="login">
							<div class="logintextform">User Name:</div>
							<div class="logintextfiledform"><input type="text" name="txtUserName" id="txtUserName" maxlength="30" value="" class="logintextfield"></div>
							<div class="logintextform">Password:</div>
							<div class="logintextfiledform"><input type="password" name="txtPassword" id="txtPassword" maxlength="30" value="" class="logintextfield"></div>
							<div class="submit">
								<a href="#" onClick="return formValidate();" ><input type="image" src="<?php echo ADMIN_IMAGE_PATH; ?>submit-off.jpg" width="58" height="18" border="0" alt=""onmouseover="javascrpit:this.src='<?php echo ADMIN_IMAGE_PATH; ?>submit-on.jpg'" 			onmouseout="javascrpit:this.src='<?php echo ADMIN_IMAGE_PATH; ?>submit-off.jpg'" /></a> </div>
								
							
						</div>
					</form>
					<div class="logintext"></div>
				</td>
			  </tr>      
			</table></td>
		  </tr>
		  <tr>
			<td height="1">
				<?php include(ADMIN_INC_PATH."adminFooter.php"); ?>
			</td>
		  </tr>
		</table>
	</body>
</html>
