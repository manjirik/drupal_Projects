<?php
session_start();
include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblSongsController.php";

$songId = trim($_POST["songId"]);
$paramArray['songid'] = $songId;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);

$reviewArray = $tblSongObj->getSongReviews($songId);
$songName = $tblSongObj->getSongName($paramArray);
//echo '<pre>';print_r($reviewArray);
$adminReview = $reviewArray['admin_review'];
$adminBriefReview = $reviewArray['admin_brief_review'];

$HTML = "<div id='reviewMainWrapper'>
	<div id='reviewPanel'> 
		<div class='reviewWindow'>
			<div class=' reviwWindowHeader'>
				<h2 class='songname reviewH2'> <strong>".$songName[0]['songname']."</strong> DMMReview </h2>
				<img src='" . SITE_URL . "/images/closeIcon.png' alt='' onClick='closeModelPopup();'/>
			</div>
			<div class=' reviewPane'> 
				<div class='textContainer'>
					<span>".$adminBriefReview."</span>
					<p>
					".nl2br($adminReview)."
					</p>						
				</div>
			</div>
		</div>
	</div>
</div>";
echo $HTML;
?>