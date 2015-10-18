<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblCommentController.php";
	$tblpageObj = new tblCommentController();
	$type='comment';
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Edit Comment</title>
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

				if (document.getElementById('comment').value == "")
				{
				alert("Please Enter Comment.");
				document.getElementById('comment').focus();
				return false;
				}

				 document.frm1.action = "commentUpdate.php";    // First target
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
            <td valign="top" class="titlepage">DMM - Comment</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports">&nbsp;&nbsp;<a href="commentList.php"><input id="sval" type="button" value="Back To Comments List" name="button"></a></td>
			</tr>
	 
              <tr>
                <td class="titlebox">Edit Comment</td>
              </tr>
			 <?php
					$comment_id = $_REQUEST['id'];
					$tblCommentArr = $tblpageObj->getComment($comment_id);
					$tblCommentArrCount = count($tblCommentArr);
					for($i=0; $i<$tblCommentArrCount; $i++)
					{
						$song_id = $tblCommentArr[$i]['song_id'];
						$comment = $tblCommentArr[$i]['comment'];
						$status = $tblCommentArr[$i]['status'];
					}
					$songTitle = $tblpageObj->getSongTitle($song_id);

					$commentStatus = $status;
					if($commentStatus==1){
					$commentStatus = 'checked="Checked"';
					}else{
					$commentStatus = '';	
					}
			 ?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" name="comment_id" value="<?php echo $_REQUEST['id'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $_REQUEST['page']; ?>" >

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Song Name:</div> 
				<div id="output_report"><?php echo $songTitle;?></div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Comment:</div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="comment" id="comment"><?php echo htmlentities( $comment);?></textarea>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Publish/Unpublish:</div> 
				<div id="output_report"><input type="checkbox" name="status" value='1' <?php echo $commentStatus; ?> /></div>
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