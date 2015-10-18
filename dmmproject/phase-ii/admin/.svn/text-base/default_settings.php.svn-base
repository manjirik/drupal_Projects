<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminController.php";
	$tblpageObj = new tblAdminController();
	$type='comment';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Default Settings</title>
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
				 document.frm1.action = "settingsUpdate.php";    // First target
				 document.frm1.submit(); 
		}
		</script>
	
	</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php
			 
			include_once ADMIN_INC_PATH."adminHeaderInner.php"; ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top"><?php include_once ADMIN_INC_PATH."adminLeftComponent.php"; ?></td>
        <td align="left" valign="top" class="padding"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="titlepage">DMM - Default Settings</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <?php if($_REQUEST['flag']){?>
			   <tr>
                <td><div id="message" style="padding:10px;">Settings Updated.</div></td>
              </tr>
			  <?php }?>
	 
              <tr>
                <td class="titlebox">Edit Default Settings</td>
              </tr>
			  
			 <?php
					$tblSettingsArr = $tblpageObj->getDefaultSettings();
					$tblSettingsArrCount = count($tblSettingsArr);
					for($i=0; $i<$tblSettingsArrCount; $i++)
					{
						$site_hit_count = $tblSettingsArr[$i]['site_hit_count'];
						$adv_start_time = $tblSettingsArr[$i]['adv_start_time'];
						$duration_adv_time = $tblSettingsArr[$i]['duration_adv_time'];
						$adv_interval_time = $tblSettingsArr[$i]['adv_interval_time'];
						$duration_comment_time = $tblSettingsArr[$i]['duration_comment_time'];
						$comment_interval_time = $tblSettingsArr[$i]['comment_interval_time'];
						$login_counter = $tblSettingsArr[$i]['login_counter'];
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Site Hits Count:</div> 
				<div id="output_report"><?php echo $site_hit_count; ?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Advertise Start Time:</div> 
				<div id="output_report"><input type="text" name="adv_start_time" value="<?php echo $adv_start_time; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;Sec</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Advertise Duration Time:</div> 
				<div id="output_report"><input type="text" name="duration_adv_time" value="<?php echo $duration_adv_time; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;Sec</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Advertise Interval Time:</div> 
				<div id="output_report"><input type="text" name="adv_interval_time" value="<?php echo $adv_interval_time; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;Sec</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Comments Duration Time:</div> 
				<div id="output_report"><input type="text" name="duration_comment_time" value="<?php echo $duration_comment_time; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;Sec</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Comments Interval Time:</div> 
				<div id="output_report"><input type="text" name="comment_interval_time" value="<?php echo $comment_interval_time; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;Sec</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Login Counter:</div> 
				<div id="output_report"><input type="text" name="login_counter" value="<?php echo $login_counter; ?>" style="width:30px;" class="contenttext1">&nbsp;&nbsp;</div>
				</td>
				</tr>
				
				
				
				<tr>
				<td class="padding">
				<table height="36" cellspacing="0" cellpadding="3" border="0" width="100%">
				<tbody><tr>
				<td width="100%" align='left' id="but_report"><input type='button' onClick="return formValidate();" name='frmsubmit' Value='Save' colspan='3'></td>
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