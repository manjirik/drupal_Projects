<?php include("inc/config.php"); 
	include("inc/chkSession.php");
	include_once("controller/tblNotificationController.php");
	$tblpageObj = new tblNotificationController();
	$flag = "";
	if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='add')
	{
	$flag_status = "Add";
	}elseif(isset($_REQUEST['flag']) && $_REQUEST['flag']=='edit'){
	$flag_status = "Edit";
	}
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?> </title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>cms.css" />
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

		function trim(s)
		{
		return rtrim(ltrim(s));
		}

		function ltrim(s)
		{
		var l=0;
		while(l < s.length && s[l] == ' ')
		{	l++; }
		return s.substring(l, s.length);
		}

		function rtrim(s)
		{
		var r=s.length -1;
		while(r > 0 && s[r] == ' ')
		{	r-=1;	}
		return s.substring(0, r+1);
		}


		function formValidate()
		{		
				var re = /\s*((\s*\S+)*)\s*/;

				if (document.getElementById('name').value == "")
				{
				alert("Please Enter From Name.");
				document.getElementById('name').focus();
				return false;
				}

				var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
				
				var y=trim(document.getElementById('username').value);
				var yz=trim(document.getElementById('notification_desc1').value);
				if (y==null || y=="")
				  {
				  alert("Enter Subject");
				  document.getElementById('username').focus();
				  return false;
				  }

				if (yz==null || yz=="")
				  {
				  alert("Enter Message");
				  document.getElementById('notification_desc1').focus();
				  return false;
				  }


				var valid_username = document.getElementById('hid_valid_username').value; 
				
				if (document.getElementById('id').value == "")
				{
					
				}

				 document.frm1.action = "notificationmessageUpdate.php";    // First target
				 document.frm1.submit(); 
		}
		</script>
	
	</head>
<body>
<?php
$admin_id = "";
if(isset($_REQUEST['id'])){
	$admin_id = $_REQUEST['id'];
}
$valid_username_arr_final = "";
$valid_username_Arr = $tblpageObj->getAllNotifications($admin_id);

if(count($valid_username_Arr) > 0){
	foreach($valid_username_Arr as $key=>$val){
		$valid_username_arr_final .= trim($val['notification_desc']) .";";
	}
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php
			 
			include_once(ADMIN_INC_PATH."adminHeaderInner.php"); ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" class="leftMenu"><?php include_once(ADMIN_INC_PATH."adminLeftComponent.php"); ?></td>
        <td align="left" valign="top" class="padding rightContent"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="titlepage">Notification Message</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><!-- <?php include("menu.php"); ?> --></td>
			</tr>
	 
              <tr>
                <td class="titlebox"><?php echo $flag_status;?> Notification Message</td>
              </tr>
			 <?php
					$tmp_name = "";
					$tmp_email = "";
					$tmp_username = "";
					$tmp_notification_desc1 = "";
					$tmp_group_id = "";
					if(isset($_REQUEST['id'])){
					$tblAdminArr = $tblpageObj->getNotification($admin_id);
					$tblAdminArrCount = count($tblAdminArr);
					for($i=0; $i<$tblAdminArrCount; $i++)
						{
							$tmp_name = $tblAdminArr[$i]['notification_title'];
							$tmp_username = $tblAdminArr[$i]['notification_desc'];
							$tmp_notification_desc1 = $tblAdminArr[$i]['notification_desc1'];
						}
					}

			 ?>
				<?php 
				if(isset($_REQUEST['page']))
				{
					$page = $_REQUEST['page'];
				}else{
					$page = "";
				}
				?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" id="hid_valid_username" name="hid_valid_username" value="<?php echo $valid_username_arr_final;?>" />

				<input type="hidden" id="id" name="id" value="<?php echo $admin_id;?>">
				<input type="hidden" id="flag" name="flag" value="<?php echo $_REQUEST['flag'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $page; ?>">

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">From Name:</div> 
				<div id="output_report"><input type="text" id="name" name="name" value="<?php echo $tmp_name;?>"></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Subject:</div> 
				<div id="output_report"><input type="text" id="username" name="username" value="<?php echo $tmp_username;?>"></div>
				</td>
				</tr>
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Message:</div> 
				<div id="output_report">
				
				<textarea cols="25" rows="4" id="notification_desc1" name="notification_desc1"><?php echo $tmp_notification_desc1;?></textarea>
				</div>
				</td>
				</tr>
		
				<tr>
				<td class="padding">
				<table height="36" cellspacing="0" cellpadding="3" border="0" width="100%">
				<tbody>
				<tr>
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