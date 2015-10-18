<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminAdvertiseController.php";
	$txtpageObj = new tblAdminAdvertiseController();
	$setAdminAdvertisefeaturedId = $_POST["setAdminAdvertisefeaturedId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				//get count of publish advertise
				$sql2="SELECT count(id) as cnt_rec FROM admin_advertise WHERE featured='1'";
				$result2 = mysql_query($sql2);
				while($row2 = mysql_fetch_array($result2))
				{
				$tmp_cnt_rec = $row2['cnt_rec'];
				}

				if($tmp_cnt_rec >= 5)
				{
				echo "You cannot make featured more than 5 Advertise.#*#".$setAdminAdvertisefeaturedId;
				}elseif($tmp_cnt_rec < 5)
				{
				$qry = "update admin_advertise set featured = '1' where id='".$setAdminAdvertisefeaturedId."'";					
				$result = mysql_query($qry);
				echo "Record Featured.";
				}//end of if
				}elseif($status == 'false'){
				//$txtpageObj->changeStatus($status,$setCommentId);
				$qry = "update admin_advertise set featured = '0' where id='".$setAdminAdvertisefeaturedId."'";					
				$result = mysql_query($qry);
				echo "Record Unfeatured.";
				}	
?>	