<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserSongsController.php";
	$txtpageObj = new tblUserSongsController();
	$song_id = $_REQUEST["song_id"];
	$user_id = $_REQUEST["user_id"];

	$sql2="select * from songs WHERE id='".$song_id."'";
				$result2 = mysql_query($sql2);
				while($row2 = mysql_fetch_array($result2))
				{
				$billboard_image = IMAGE_ROOT_URL."user_".$user_id."/songs_billboard/".$row2['billboard_image'];;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>DMM - Billboard Image</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>majid-cms.css" />
	</head>
	<body>
		<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
			 <tr>
			 <td align="left" valign="top" style="padding-left:10px;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td valign="top" class="titlepage">DMM - Billboard Image</td>
				</tr>
				</table>
			</td>
			</tr>

			<tr>
			 <td align="left" valign="top" style="padding-left:10px;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td class="paddingall" align="left" id="reports" width="230" style="font-size:11px; font-weight:bold; font-family:tahoma; vertical-align:top;">Billboard Image:</td> 
				<td class="paddingall" align="left" id="reports"><?php if($row2['billboard_image'] == ""){ ?><span style="font-size:10px; font-weight:bold; font-family:tahoma; color:red;">Not Uploded</span><?php }else{?><img src="<?php echo $billboard_image;?>"><?php } ?></td>
				</tr>
				</table>
			</td>
			</tr>


		</table>
		<?php } ?>
	</body>
</html>