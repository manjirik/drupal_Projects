<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserSongsController.php";
	$tblpageObj = new tblUserSongsController();
	$type='songs';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Edit Song</title>
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
				/*alert(document.frm1.show_reject.checked);
				if(document.frm1.show_reject.checked = true)
					{
					alert('hi');
					return false;
						if (document.getElementById('reject_reason').value == "")
						{
							alert("Please Enter Reject Reason.");
							document.getElementById('reject_reason').focus();
							return false;
						}
					}
				if (document.getElementById('comment').value == "")
				{
				alert("Please Enter Comment.");
				document.getElementById('comment').focus();
				return false;
				}*/

				 document.frm1.action = "songUpdate.php";    // First target
				 document.frm1.submit(); 
		}

			function seeAsset() {
				song_id = document.forms["frm1"]["song_id"].value;
				user_id = document.forms["frm1"]["user_id"].value;
				popUpFixedR('asset.php?song_id='+song_id+'&user_id='+user_id, 442, 1240);
			}

			function popUpFixedR(URL,height,width,name) {
			var str="toolbar=0,location=0,refresh=no,statusbar=yes,scrollbars=yes,resizable=yes,menubar=0,width="+width+",height="+height+",top=50,left=80";
			win = window.open(URL, name, str);
			return true;
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
            <td valign="top" class="titlepage">DMM - Song</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><input id="sval" type="button" onclick="javascript:history.go(-1);" value="back" name="button"></td>
			</tr>
	 
              <tr>
                <td class="titlebox">Edit Song</td>
              </tr>
			 <?php
					$song_id = $_REQUEST['song_id'];
					$tblSongArr = $tblpageObj->getSong($song_id);
					$tblSongArrCount = count($tblSongArr);
					for($i=0; $i<$tblSongArrCount; $i++)
					{
						$user_name = $tblSongArr[$i]['name'];
						$user_id = $tblSongArr[$i]['user_id'];
						$song_name = $tblSongArr[$i]['song_name'];
						$song_credit = $tblSongArr[$i]['song_credit'];
						$file_path = $tblSongArr[$i]['file_path'];
						$hits = $tblSongArr[$i]['hits'];
						$download_count = $tblSongArr[$i]['download_count'];
						$is_downloadStatus = $tblSongArr[$i]['is_download'];
						$tmp_random = $tblSongArr[$i]['random'];
						$admin_review = $tblSongArr[$i]['admin_review'];
						$metadata = $tblSongArr[$i]['metadata'];
						$reject_reason = $tblSongArr[$i]['reject_reason'];
						$billboard_image = $tblSongArr[$i]['billboard_image'];
						$status = $tblSongArr[$i]['status'];
					}

					if($is_downloadStatus==0){
					$is_downloadStatus = '';
					}elseif($is_downloadStatus==1){
					$is_downloadStatus = 'checked="Checked"';	
					}

					if($tmp_random==0){
					$random_status = '';
					}elseif($tmp_random==1){
					$random_status = 'checked="Checked"';	
					}

					$songStatus = $status;
					if($songStatus==0){
					$songStatusUnpublish = 'checked="Checked"';
					$style_reject = "style='display:none';";
					}elseif($songStatus==1){
					$songStatusPublish = 'checked="Checked"';	
					$style_reject = "style='display:none';";
					}elseif($songStatus==2){
					$songStatusReject = 'checked="Checked"';
					$style_reject = "";
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="song_id" value="<?php echo $_REQUEST['song_id'];?>">
				<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $_REQUEST['page']; ?>" >

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">User Name:</div> 
				<div id="output_report"><?php echo $user_name;?></div>
				</td>
				</tr>
				<?php $song_download = "fileDownload.php?id=".$user_id."&type=user_songs&download_file=".$file_path; ?>
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Song Name:</div> 
				<div id="output_report"><a href="<?php echo $song_download;?>" target='blank'><?php echo $song_name;?></a></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Make for download:</div> 
				<div id="output_report"><?php echo $song_credit;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Hits:</div> 
				<div id="output_report"><?php echo $hits;?></div>
				</td>
				</tr>
								
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Download Count:</div> 
				<div id="output_report"><?php echo $download_count;?></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Metadata:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="metadata" id="metadata"><?php echo htmlentities( $metadata);?></textarea>
				</textarea>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Admin Review:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="admin_review" id="admin_review"><?php echo htmlentities( $admin_review);?></textarea>
				</textarea>
				</div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Publish:</div> 
				<div id="output_report"><input type="radio" name="status" id="show_publish" value='1' <?php echo $songStatusPublish; ?> /></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Unpublish:</div> 
				<div id="output_report"><input type="radio" name="status" id="show_unpublish" value='0' <?php echo $songStatusUnpublish; ?> /></div>
				</td>
				</tr>

				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Reject:</div> 
				<div id="output_report"><input type="radio" class="same_group" id="show_reject" name="status" value='2' <?php echo $songStatusReject; ?> /></div>
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
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Remove from the DMMPlaylist:</div> 
				<div id="output_report"><input type="checkbox" name="random" value='1' <?php echo $random_status; ?> /></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Available For Download:</div> 
				<div id="output_report"><input type="checkbox" name="is_download" value='1' <?php echo $is_downloadStatus; ?> /></div>
				</td>
				</tr>

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Billboard Image:</div> 
				<div id="output_report"><input type="file" name="billboard_image"><?php if(isset($_REQUEST['id']) && $billboard_image != "")
				{ ?>&nbsp;&nbsp;&nbsp;<input type="button" class="btnDownload" value="Billboard Image" id="button" name="button" onclick="JavaScript:seeAsset();"><?php } ?></div>
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