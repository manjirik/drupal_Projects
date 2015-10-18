<?php
include_once "inc/database.php";
include_once "inc/config.php";
include_once "controller/tblCommentController.php";	
include_once "controller/tblSettingsController.php";
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$tblCommObj = new tblCommentController($conObj);
	$settingsObj = new tblSettingsController($conObj);
	$settingArr = $settingsObj->getSettings();
?>
<script type="text/javascript">
$(document).ready(function() {
$('.slideshow').cycle({
fx: 'fade',
speed:  <?php echo $settingArr[0]['comment_interval_time']*1000; ?>,
timeout: <?php echo ($settingArr[0]['duration_comment_time']+$settingArr[0]['comment_interval_time'])*1000; ?>,
sync: <?php if($settingArr[0]['comment_interval_time']=='0'){ echo 1; }else{ echo 0;}?>
});
});

</script>
		<?php
			$commentArr = $tblCommObj->getAllCommentBySongId(array("songid"=>$_POST['songID']));
			$commentArrCnt = count($commentArr);
			if($commentArrCnt >0) {?>

		<div class="slideshow">
			<?php			
			for($i=0; $i<$commentArrCnt; $i++)
			{
				$userAvatar = $tblCommObj->getUserAvatar($commentArr[$i]["user_id"]);
	            $userName = $tblCommObj->getUserName($commentArr[$i]["user_id"]);
				if($userAvatar == '')
				{
					$avatar_image = HOST_URL . "/images/avatarSmll.jpg";
				}else{
					$avatar_image = HOST_URL . "/uploads/user_".$commentArr[$i]["user_id"]."/avatar/".$userAvatar;
				}
			?>
			<div class="commentsDisplay">
				<div class="panel">
					<div class="avatarSmll">
						<img src="<?php echo $avatar_image;?>" alt="Avatar" width="30" height="30" />
					</div>
					<div class="comment">
                    	<strong><?php echo $userName; ?></strong>
                    	<div><?php echo $commentArr[$i]["comment"];?></div>
                    </div>
				</div>
				<div class="btmBg"></div>
			</div>
			<?php
			}
			?>
		</div>
	
<div class="btmBg"></div>
<?php }	?>