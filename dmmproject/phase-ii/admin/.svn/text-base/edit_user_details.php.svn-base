<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserController.php";
	$tblpageObj = new tblUserController();
	$type='user';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Edit User</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>majid-cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>calendar_us.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>calendar.css" />
		</script>
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

				if (document.getElementById('admin_musician_info').value == "")
				{
				alert("Please Enter Admin Musician Info.");
				document.getElementById('admin_musician_info').focus();
				return false;
				}

				 document.frm1.action = "userUpdate.php";    // First target
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
            <td valign="top" class="titlepage">DMM - User</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
            <tr>
<td class="paddingall border" align="right">
<input id="sval" type="button" onclick="javascript:history.go(-1);" value="Back To User List" name="button">
</td>
</tr>
	 
              <tr>
                <td class="titlebox">Edit User</td>
              </tr>
			 <?php
					$user_id = $_REQUEST['id'];
					$tblUserArr = $tblpageObj->userViewDetails($user_id);
					$tblUserArrCount = count($tblUserArr);
					for($i=0; $i<$tblUserArrCount; $i++)
					{
						$name = $tblUserArr[$i]['name'];
						$dmm_company_name = $tblUserArr[$i]['dmm_company_name'];
						$email = $tblUserArr[$i]['email'];
						$musician_info = $tblUserArr[$i]['musician_info'];
						$admin_musician_info = $tblUserArr[$i]['admin_musician_info'];
						$country = $tblUserArr[$i]['country'];
						$date_of_birth = $tblUserArr[$i]['date_of_birth'];
						$strengths = $tblUserArr[$i]['strengths'];
						$twitter = $tblUserArr[$i]['twitter'];
						$facebook = $tblUserArr[$i]['facebook'];
						$avatar = $tblUserArr[$i]['avatar'];
						$paid = $tblUserArr[$i]['paid'];
						$userStatus = $tblUserArr[$i]['status'];
						$notify = $tblUserArr[$i]['notify'];

						$musician_type = $tblUserArr[$i]['musician_type'];
						$years_making_music = $tblUserArr[$i]['years_making_music'];
						$personal_website = $tblUserArr[$i]['personal_website'];
						$zone = $tblUserArr[$i]['zone'];
						$admin_review = $tblUserArr[$i]['admin_review'];
						$paidmail = $tblUserArr[$i]['paidmail'];
						$notify_message = $tblUserArr[$i]['notify_message'];
						$user_type= $tblUserArr[$i]['user_type'];
						$create_date = $tblUserArr[$i]['create_date'];
						$modify_date = $tblUserArr[$i]['modify_date'];
						$gender = $tblUserArr[$i]['gender'];
						
						
					}

					//for notify user
					if($notify==1){
					$notifyStatus = 'Yes';
					}else{
					$notifyStatus = 'No';	
					}


					//avatar image path
					 $avatar_image = IMAGE_ROOT_URL."user_".$user_id."/avatar/".$avatar;

					//for user Paid		
					if($paid==1){
					$paidStatus = 'checked="Checked"';
					}else{
					$paidStatus = '';	
					}
					
					//for user status		
					if($userStatus==1){
					$userStatus = 'checked="Checked"';
					}else{
					$userStatus = '';	
					}

					//for user twitter		
					if($twitter == "null"){
					$twitter = $twitter;
					}else{
					$twitter = 'Not Specify';	
					}

					//for user facebook		
					if($facebook == "null"){
					$facebook = $facebook;
					}else{
					$facebook = 'Not Specify';	
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="user_id" value="<?php echo $_REQUEST['id'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $_REQUEST['page']; ?>" >

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Avatar:</div> 
				<div id="output_report"><img src="<?php echo $avatar_image;?>" width="64" height="64">
				</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Name:</div> 
				<div id="output_report"><?php echo $name;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">DMM Company Name:</div> 
				<div id="output_report"><?php echo $dmm_company_name;?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Email:</div> 
				<div id="output_report"><?php echo $email;?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Country:</div> 
				<div id="output_report"><?php echo $country;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Date Of Birth:</div> 
				<div id="output_report"><?php echo $date_of_birth;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Strengths:</div> 
				<div id="output_report"><?php echo $strengths;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Musician Type:</div> 
				<div id="output_report"><?php echo $musician_type;?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Years Making Music:</div> 
				<div id="output_report"><?php echo $years_making_music;?></div>
				</td>
				</tr>
								
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Twitter:</div> 
				<div id="output_report"><?php echo $twitter;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Facebook:</div> 
				<div id="output_report"><?php echo $facebook;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Musician Info:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="musician_info" id="musician_info"><?php echo htmlentities( $musician_info);?></textarea>
				</textarea>
				</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Admin Musician Info:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="admin_musician_info" id="admin_musician_info"><?php echo htmlentities( $admin_musician_info);?></textarea>
				</textarea>
				</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Personal Website:</div> 
				<div id="output_report"><?php echo $personal_website;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Paid:</div> 
				<div id="output_report"><input type="checkbox" name="paid" value='1' <?php echo $paidStatus; ?> /></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Paidmail:</div> 
				<div id="output_report"><input type="checkbox" name="paid" value='1' <?php echo paidmail; ?> /></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Notify Message:</div> 
				<div id="output_report"><?php echo $notify_message; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Notify Major Updates:</div> 
				<div id="output_report"><?php echo $notifyStatus; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Publish/Unpublish:</div> 
				<div id="output_report"><input type="checkbox" name="status" value='1' <?php echo $userStatus; ?> /></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">User Type:</div> 
				<div id="output_report"><?php echo $user_type; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Create Date:</div> 
				<div id="output_report"><?php echo $create_date; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Modify Date:</div> 
				<div id="output_report"><?php echo $modify_date; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Gender:</div> 
				<div id="output_report"><?php echo $gender; ?></div>
				</td>
				</tr>


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