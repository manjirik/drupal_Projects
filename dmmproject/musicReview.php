<?php
session_start();
include("inc/config.php");
include_once("controller/tblUserController.php");
include_once("controller/tblSongsController.php");
//print $_POST['song_id'];
if($_POST['song_id'] > 0)
{
	$paramArray = array
	(	
		"table_name" => "songs",
		"song_id" => $_POST['song_id'],
	);
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$songsObj = new tblSongsController($conObj);
	$songsDetails = $songsObj->getSongsDetailsById($paramArray);
	$paramArray1 = array
	(	
		"table_name" => "user",
		"id" => $songsDetails[0]['user_id'],
	);
	
	$userObj = new tblUserController($conObj);
	$userDetails = $userObj->getUserDetails($paramArray1);
?>
    <div class="content">
        <h3><?php print $userDetails[0]['dmm_company_name']; ?></h3>
        <div class="shareIco">
            <ul>
				<?php if($userDetails[0]['facebook'] != ""){ 
				$pos = strpos($userDetails[0]['facebook'], 'http://');
				if($pos === false){
				$facebook_link = "http://".$userDetails[0]['facebook'];
				}elseif($pos == '0'){
				$facebook_link = $userDetails[0]['facebook'];
				}
				?>
                <li><a href="<?php echo $facebook_link;?>" target="_blank"><img src="images/ico_fb.gif" alt="Facebook" /></a></li>
				<?php } ?>
				<?php if($userDetails[0]['twitter'] != ""){ 
				$pos_twit = strpos($userDetails[0]['twitter'], 'http://');
				if($pos_twit === false){
				$twitter_link = "http://".$userDetails[0]['twitter'];
				}elseif($pos_twit == '0'){
				$twitter_link = $userDetails[0]['twitter'];
				}
				?>
                <li><a href="<?php echo $twitter_link;?>" target="_blank"><img src="images/ico_skype.gif" alt="Skype" /></a></li>
				<?php } ?>
                <li class="clear"><!----></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="topSec"></div>

        <div class="reviewBox">
            <div class="pane">
                <div class="imgBlock">
                    <?php if($userDetails[0]['avatar'] != ""){ ?>
                    <img src="<?php print ADMIN_AVATAR_PATH."user_".$songsDetails[0]['user_id']."/avatar/".$userDetails[0]['avatar']; ?>" alt="Musician Name" />
					<?php } ?>
                </div>
                <div class="info">
                    <?php print $userDetails[0]['admin_musician_info']; ?><br /><br />
                    
                    <?php print $songsDetails[0]['admin_review']; ?>
                </div>
            </div>
			<div class="clear"></div>
        </div>

    </div>
    <div class="btmPanel"></div>
<?php } ?>