<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminController.php";
	
	$tblpageObj = new tblAdminController();
	$type='admin';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Edit Admin User</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>majid-cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>calendar_us.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>calendar.css" />
		
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>functions.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>listFunctions.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>sdmenu.js">
		</script>
		<script type="text/javascript">
			// <![CDATA[
			var myMenu;
			window.onload = function() {
				myMenu = new SDMenu("my_menu");
				myMenu.init();
				myMenu.collapseAll();
			};
		// ]]>

		function formValidate()
		{		
				var re = /\s*((\s*\S+)*)\s*/;

				if (document.getElementById('admin_first_name').value == "")
				{
				alert("Please Enter First Name.");
				document.getElementById('admin_first_name').focus();
				return false;
				}

				if (document.getElementById('admin_last_name').value == "")
				{
				alert("Please Enter Last Name.");
				document.getElementById('admin_last_name').focus();
				return false;
				}

				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				var address = document.getElementById('admin_email').value;
				if(reg.test(address) == false) {
				alert('Invalid Email Address');
				document.getElementById('admin_email').focus();
				return false;
				}

				
				if (document.getElementById('admin_email').value == "")
				{
				alert("Please Enter Email Id.");
				document.getElementById('admin_email').focus();
				return false;
				}

				if (document.getElementById('admin_username').value == "")
				{
				alert("Please Enter User Name.");
				document.getElementById('admin_username').focus();
				return false;
				}

				//alert(document.getElementById('admin_id').value);

				if (document.getElementById('admin_id').value == "")
				{
				if (document.getElementById('admin_password').value == "")
				{
				alert("Please Enter Password.");
				document.getElementById('admin_password').focus();
				return false;
				}
				}

				 document.frm1.action = "adminUpdate.php";    // First target
				 document.frm1.submit(); 
		}
		</script>
	
	</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php include_once ADMIN_INC_PATH."adminHeaderInner.php"; ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top"><?php include_once ADMIN_INC_PATH."adminLeftComponent.php"; ?></td>
        <td align="left" valign="top" class="padding"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="titlepage">DMM - Admin User</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><!-- <?php include("menu.php"); ?> --></td>
			</tr>
	 
              <tr>
                <td class="titlebox">Edit Admin User</td>
              </tr>
			 <?php
					$admin_id = $_REQUEST['id'];
					$tblAdminArr = $tblpageObj->getAdmin($admin_id);
					$tblAdminArrCount = count($tblAdminArr);
					for($i=0; $i<$tblAdminArrCount; $i++)
					{
						$tmp_admin_first_name = $tblAdminArr[$i]['admin_first_name'];
						$tmp_admin_last_name = $tblAdminArr[$i]['admin_last_name'];
						$tmp_admin_email = $tblAdminArr[$i]['admin_email'];
						$tmp_admin_username = $tblAdminArr[$i]['admin_username'];
						$tmp_admin_log_status = $tblAdminArr[$i]['admin_log_status'];
					}

					$adminStatus = $tmp_admin_log_status;
					if($adminStatus==1){
					$adminStatus = 'checked="Checked"';
					}else{
					$adminStatus = '';	
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" id="admin_id" name="admin_id" value="<?php echo $_REQUEST['id'];?>">
				<input type="hidden" id="flag" name="flag" value="<?php echo $_REQUEST['flag'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $_REQUEST['page']; ?>" >

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">First Name:</div> 
				<div id="output_report"><input type="text" id="admin_first_name" name="admin_first_name" value="<?php echo $tmp_admin_first_name;?>"></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Last Name:</div> 
				<div id="output_report"><input type="text" id="admin_last_name" name="admin_last_name" value="<?php echo $tmp_admin_last_name;?>"></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Email:</div> 
				<div id="output_report"><input type="text" id="admin_email" name="admin_email" value="<?php echo $tmp_admin_email;?>"></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Username:</div> 
				<div id="output_report"><input type="text" id="admin_username" name="admin_username" value="<?php echo $tmp_admin_username;?>"></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Password:</div> 
				<div id="output_report"><input type="password" id="admin_password" name="admin_password" value=""></div>
				</td>
				</tr>
				<?php if($_REQUEST['flag']=='edit')	{?>
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Publish/Unpublish:</div> 
				<div id="output_report"><input type="checkbox" name="status" value='1' <?php echo $adminStatus; ?> /></div>
				</td>
				</tr>
				<?php } ?>

				<tr>
				<td class="padding">
				<table height="36" cellspacing="0" cellpadding="3" border="0" width="100%">
				<tbody><tr>

				<td width="100%" align='left' id="but_report"><input type='button' onClick="return formValidate();" name='frmsubmit' Value='Save' colspan='3'>&nbsp;&nbsp;<input type="button" name="cmdCancel" id="cmdCancel" value="Cancel" onClick="goBack();" ></td>
				</tr>
				</tbody></table></td>
				</tr>
				</form>
				</table> 
				</td>
				</tr>
			  
            </table>			
			</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1"><?php include(ADMIN_INC_PATH."adminFooterInner.php"); ?></td>
  </tr>
</table>
</body>
</html>