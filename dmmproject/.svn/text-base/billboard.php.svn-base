<?php
include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblBillboardController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblBillboardObj = new tblBillboardController($conObj);
$billboardArr = $tblBillboardObj->getBillboardBySongId(array("songid"=>$_POST['songID']));
$billboardArrCnt = count($billboardArr);

			if($billboardArrCnt == 0){
				?>
				<img id="backgroundFade" src="<?php echo $prefix_url;?>images/GettingStarted.gif" />
				<?php
			}
			if($billboardArrCnt >0) {?>

			<?php
			for($i=0; $i<$billboardArrCnt; $i++)
				{
				$tmp_billboard_image = $prefix_url."uploads/user_".$billboardArr[$i]["user_id"]."/songs_billboard/".$billboardArr[$i]["billboard_image"];
			?>
			<img id="backgroundFade" src="<?php echo $tmp_billboard_image;?>" />
			<?php
				}
			?>
		
<?php }	?>
