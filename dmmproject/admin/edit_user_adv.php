<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserAdvertiseController.php";
	
	$tblpageObj = new tblUserAdvertiseController();
	$type='advertise';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Edit User Advertise Details</title>
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

				if ( ( frm1.status[0].checked == false ) && ( frm1.status[1].checked == false ) )
					{ 
						if (document.getElementById('reject_reason').value == "")
						{
							alert("Please Enter Reject Reason.");
							document.getElementById('reject_reason').focus();
							return false;
						}
					}

				 document.frm1.action = "userAdvUpdate.php";    // First target
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
            <td valign="top" class="titlepage">DMM - Edit User Advertise Details</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><input id="sval" type="button" onclick="javascript:history.go(-1);" value="back" name="button"></td>
			</tr>
	 
              <tr>
                <td class="titlebox">Edit User Advertise Details</td>
              </tr>
			 <?php
					$adv_id = $_REQUEST['id'];
					$tblAdvArr = $tblpageObj->getAdv($adv_id);
					$tblAdvArrCount = count($tblAdvArr);
					for($i=0; $i<$tblAdvArrCount; $i++)
					{
						$user_name = $tblAdvArr[$i]['name'];
						$user_id = $tblAdvArr[$i]['user_id'];
						$ad_name = $tblAdvArr[$i]['ad_name'];
						$res_party = $tblAdvArr[$i]['res_party'];
						$reject_reason = $tblAdvArr[$i]['reject_reason'];
						$status = $tblAdvArr[$i]['status'];
					}

					$advStatus = $status;
					if($advStatus==0){
					$advStatusUnpublish = 'checked="Checked"';
					$style_reject = "style='display:none';";
					}elseif($advStatus==1){
					$advStatusPublish = 'checked="Checked"';	
					$style_reject = "style='display:none';";
					}elseif($advStatus==2){
					$advStatusReject = 'checked="Checked"';
					$style_reject = "";
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="adv_id" value="<?php echo $_REQUEST['id'];?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $_REQUEST['page']; ?>" >

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">User Name:</div> 
				<div id="output_report"><?php echo $user_name;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Advertise Name:</div> 
				<div id="output_report"><?php echo $ad_name;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Responsible Party(s):</div> 
				<div id="output_report"><?php echo $res_party;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Publish:</div> 
				<div id="output_report"><input type="radio" name="status" value='1' <?php echo $advStatusPublish; ?> /></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Unpublish:</div> 
				<div id="output_report"><input type="radio" name="status" value='0' <?php echo $advStatusUnpublish; ?> /></div>
				</td>
				</tr>

				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Reject:</div> 
				<div id="output_report"><input type="radio" class="same_group" id="show_reject" name="status" value='2' <?php echo $advStatusReject; ?> /></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id='total2' <?php echo $style_reject;?>>
				<div id="title_report">Reject Reason:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="reject_reason" id="reject_reason"><?php echo htmlentities( $reject_reason);?></textarea>
				</textarea>
				</div></div>
				</td>
				</tr>
				<script type="text/javascript">
				$(function(){     
				$('.same_group').click(function(){
				if ($(this).attr("id") == "show_reject")
				{
				$('#total2').show();
				} else {
				$("#total2").hide();
				}
				});
				});
				</script>

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