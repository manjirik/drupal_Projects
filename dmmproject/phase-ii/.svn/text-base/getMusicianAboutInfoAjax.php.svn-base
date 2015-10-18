<?php
session_start();
include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblSongsController.php";
include_once "controller/tblUserController.php";

$songId = trim($_POST["songId"]);
$paramArray['songid'] = $songId;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);
$tblUserObj = new tblUserController($conObj);

$userId = $tblSongObj->getUserIdBySongId($songId);
$userDetailsArray = $tblUserObj->getUserDetailsById($userId);
if($userDetailsArray['musician_type'] != ''){
	$musicianStatus = $tblUserObj->getMusicianType($userDetailsArray['musician_type']);
}

$status = ($musicianStatus=='')? 'NA' : $musicianStatus;
$country = ($userDetailsArray['country']=='')? 'NA' : $userDetailsArray['country'];
$years_making_music = ($userDetailsArray['years_making_music']=='')? 'NA' : $userDetailsArray['years_making_music'];
//$status = ($userDetailsArray['status']=='')? 'NA' : $userDetailsArray['status'];
$zoneUrl = SITE_URL.'/'.$userDetailsArray['dmm_company_name'];

//echo '<pre>';print_r($userDetailsArray);
$HTML = "<div id='popUpWrapper'>
		<div id='popPanel'> 
			<div class='popUpWindow'>
				<div class='popUpWindowHeader'>
					<h2 class='songname popUplH2'> <strong>".$userDetailsArray['dmm_company_name']."</strong></h2>
					<img src='" . SITE_URL . "/images/closeIcon.png' alt='No image found' onClick='closeModelPopup()'/>
				</div>
				<div class='popUpContent'> 
					<div class='textContainer'>
					<div class='modelDesc'>
						<ul>";
							if($status != 'NA'){
		                      	$HTML .= "<li class='status'><span>Status:</span><br>
								".$status."</li>";
							}
							if($country != 'NA'){
		                      	$HTML .= "<li class='country'><span>Country:</span><br>
								 ".$country."</li>";
							}
							if($years_making_music != 'NA'){
	                      		$HTML .= "<li class='experience'><span>Experience:</span><br>
								".$years_making_music."</li>";
							}
	         $HTML .= "</ul>
				   </div>";						   
						$HTML .= "<div class='aboutModelContent'>
							<p>
								".nl2br($userDetailsArray['musician_info'])."
							</p>
						</div> 
					</div>
				</div>
				<div class='footer'>
				  	<div class='footerLft'><a target='_blank' href='".$zoneUrl."'> ".$_SERVER['SERVER_NAME']."/".$userDetailsArray['dmm_company_name']."</a></div>
				    <div class='footerRgt'>";
						if($userDetailsArray['personal_website'] != ""){
				    		$HTML .= "<a target='_blank' href='".$userDetailsArray['personal_website']."'><span>Website</span></a>";
						}
						if($userDetailsArray['twitter'] != ""){
				    		$HTML .= "<a target='_blank' href='".$userDetailsArray['twitter']."'><span><img src='images/footer-tweet-icon.png' alt='twitter icon' /></span></a>";
						}
						if($userDetailsArray['facebook'] != ""){
				    		$HTML .= "<a target='_blank' href='".$userDetailsArray['facebook']."'><span><img src='images/footer-fb-icon.png' alt='Facebook icon' /></span></a>";
						}    
		 $HTML .= "</div>
				</div>
			</div>
		</div>
	</div>";		
echo $HTML;
?>