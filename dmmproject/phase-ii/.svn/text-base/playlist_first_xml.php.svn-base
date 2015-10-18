<?php

include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblPlaylistController.php";
include_once 'controller/tblUserController.php';

class gameFlash extends database 
{
	private $gameXML;

	function __construct() 
	{
		parent::__construct();
		$this->gameXML = new SimpleXMLElement("<HIPPOP></HIPPOP>");
		$this->fb_userid=0;
	}

	public function createXML()
	{
		$dbObj = new database();
		$conObj = $dbObj->connectDB();
		$tblCommObj = new tblPlaylistController($conObj);
		$searchArr = $tblCommObj->getFirstSongsDetails();
		
		$userObj = new tblUserController($conObj);
		
		/* As we have to use set vars, we are using direct mysql_query instead of $this->executeQuery() method */ 
		$index = 0;
		foreach($searchArr as $songs){
			$song_id = $songs['songid'];
			$user_id = $songs['user_id'];
			$song_name = $songs['song_name'];
			$artist_name = $songs['artist_name'];
			$state_your_purpose = $songs['musician_type'];
			$video = ($songs['video_url']) ? 1 : 0;
			$song_path = HOST_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
			$song_poster = '';
			if($songs['billboard_image']) {
				$song_poster = HOST_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];
			} else {
				$userDetailsTmp = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $user_id) );
				$zone_image = $userDetailsTmp[0]['zone'];
				if($zone_image) {
					$song_poster = HOST_URL . "/uploads/user_{$user_id}/user_zone/{$zone_image}";
				} else {
					$song_poster = HOST_URL . "/images/zoneimagedefault.jpg";
				}
			} 
			$review = empty($songs['admin_review']) ? 0 : 1;
			
			$index++;
			$song_no = "SONG" . $index;
			$node=$this->gameXML->addChild($song_no);
			$node->addChild('SONGID', $song_id);
			$node->addChild('TITLE', $song_name);
			$node->addChild('ARTIST', $artist_name);
			$node->addChild('PURPOSE', $state_your_purpose);
			$node->addChild('VIDEO', $video);
			$node->addChild('PATH', $song_path);
			if(!empty($song_poster)) {
				$node->addChild('POSTER', $song_poster);
			}
			$node->addChild('REVIEW', $review);
			$node->addChild('SONGS_COUNT', $songs['user_songs_count']);
			$node->addChild('DOWNLOAD', $songs['download']);
		}
	}
	
	public function throwXML()
	{
		Header('Content-type: text/xml; charset=utf-8');
		echo $this->gameXML->asXML();
	}

	public function confirmEmail()
	{
		
	}
}

$dataXml = new gameFlash();
$dataXml->createXML();
$dataXml->throwXML();
$dataXml->confirmEmail();
?>