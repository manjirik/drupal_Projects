<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminAdvertiseController.php";
	$txtpageObj = new tblAdminAdvertiseController();
	$admin_advertise_id = $_REQUEST["admin_advertise_id"];
	$user_id = $_REQUEST["user_id"];

	$sql2="select * from admin_advertise WHERE id='".$admin_advertise_id."'";
				$result2 = mysql_query($sql2);
				while($row2 = mysql_fetch_array($result2))
				{
				$adv_thumb_image = IMAGE_ROOT_ADV_URL."thumb/".$row2['ad_thumb_path'];;
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>DMM - Advertise Thumbnail Image</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>majid-cms.css" />
	</head>
	<body>
		<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
			 <tr>
			 <td align="left" valign="top" style="padding-left:10px;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td valign="top" class="titlepage">DMM - Advertise Thumbnail Image</td>
				</tr>
				</table>
			</td>
			</tr>

			<tr>
			 <td align="left" valign="top" style="padding-left:10px;">
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
				<tr>
				<td class="paddingall" align="left" id="reports" width="230" style="font-size:11px; font-weight:bold; font-family:tahoma; vertical-align:top;">Advertise Thumbnail Image:</td> 
				<td class="paddingall" align="left" id="reports"><?php if($row2['ad_thumb_path'] == ""){ ?><span style="font-size:10px; font-weight:bold; font-family:tahoma; color:red;">Not Uploded</span><?php }else{?><img src="<?php echo $adv_thumb_image;?>"><?php } ?></td>
				</tr>
				</table>
			</td>
			</tr>


		</table>
		<?php } ?>
	</body>
</html>