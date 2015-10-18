<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminAdvertiseController.php";
	$txtpageObj = new tblAdminAdvertiseController();
	$setAdminAdvertiselandingId = $_POST["setAdminAdvertiselandingId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				//get count of publish advertise
				$sql2="SELECT count(id) as cnt_rec FROM admin_advertise WHERE landing='1'";
				$result2 = mysql_query($sql2);
				while($row2 = mysql_fetch_array($result2))
				{
				$tmp_cnt_rec = $row2['cnt_rec'];
				}

				if($tmp_cnt_rec >= 5)
				{
				echo "You cannot make landing advertise more than 5 Advertise.#*#".$setAdminAdvertiselandingId;
				}elseif($tmp_cnt_rec < 5)
				{
				$qry = "update admin_advertise set landing = '1' where id='".$setAdminAdvertiselandingId."'";					
				$result = mysql_query($qry);
				echo "Record Set as a Landing Advertise.";
				}//end of if
				}elseif($status == 'false'){
				//$txtpageObj->changeStatus($status,$setCommentId);
				$qry = "update admin_advertise set landing = '0' where id='".$setAdminAdvertiselandingId."'";					
				$result = mysql_query($qry);
				echo "Record Unset as a Landing Advertise.";
				}	
?>	