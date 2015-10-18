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
		$searchArr = $tblCommObj->getSpecificSongDetails($_REQUEST['tmp_playlist_songid']);
		$searchArr1 = $tblCommObj->getSongsDetails($_REQUEST['tmp_playlist_songid']);
		
		$userObj = new tblUserController($conObj);
		
		$songs_count = 0;
		$songs_count = count($searchArr);
		$songs_count += count($searchArr1);
		
			/* As we have to use set vars, we are using direct mysql_query instead of $this->executeQuery() method */ 
			$index = 0;

			foreach($searchArr as $songs){
			$song_id = $songs['songid'];
			$user_id = $songs['user_id'];
			$song_name = $songs['song_name'];
			$artist_name = $songs['artist_name'];
			$purpose = $songs['musician_type'];
			$video = ($songs['video_url']) ? 1 : 0;
			$for_sell = $songs['for_sell'];
			$song_path = SITE_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
			// $song_poster = SITE_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];
			
			$song_poster = '';
			if($songs['billboard_image']) {
				$song_poster = SITE_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];
			} else {
				$userDetailsTmp = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $user_id) );
				$zone_image = $userDetailsTmp[0]['zone'];
				if($zone_image) {
					$song_poster = SITE_URL . "/uploads/user_{$user_id}/user_zone/{$zone_image}";
				} else {
					$song_poster = SITE_URL . "/images/zoneimagedefault.jpg";
				}
			}
			$review = empty($songs['admin_review']) ? 0 : 1;

			$today_date = date("Y-m-d");
			$index++;
			$song_no = "SONG" . $index;
			$node=$this->gameXML->addChild($song_no);
			$node->addChild('SONGID',$song_id);
			$node->addChild('TITLE',$song_name);
			$node->addChild('ARTIST',$artist_name);
			$node->addChild('PURPOSE', $purpose);
			$node->addChild('VIDEO', $video);
			$node->addChild('PATH',$song_path);
			$node->addChild('POSTER',$song_poster);
			$node->addChild('REVIEW', $review);
			$node->addChild('SONGS_COUNT', $songs_count);
			$node->addChild('DOWNLOAD', $songs['download']);
			$node->addChild('FOR_SELL', $for_sell);
			}

			foreach($searchArr1 as $songs){
			$song_id = $songs['songid'];
			$user_id = $songs['user_id'];
			$song_name = $songs['song_name'];
			$artist_name = $songs['artist_name'];
			$purpose = $songs['musician_type'];
			$video = ($songs['video_url']) ? 1 : 0;
			$for_sell = $songs['for_sell'];
			$song_path = SITE_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
			// $song_poster = SITE_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];
			
			$song_poster = '';
			if($songs['billboard_image']) {
				$song_poster = SITE_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];
			} else {
				$userDetailsTmp = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $user_id) );
				$zone_image = $userDetailsTmp[0]['zone'];
				if($zone_image) {
					$song_poster = SITE_URL . "/uploads/user_{$user_id}/user_zone/{$zone_image}";
				} else {
					$song_poster = SITE_URL . "/images/zoneimagedefault.jpg";
				}
			}
			$review = empty($songs['admin_review']) ? 0 : 1;

			$today_date = date("Y-m-d");
			$index++;
			$song_no = "SONG" . $index;
			$node=$this->gameXML->addChild($song_no);
			$node->addChild('SONGID',$song_id);
			$node->addChild('TITLE',$song_name);
			$node->addChild('ARTIST',$artist_name);
			$node->addChild('PURPOSE', $purpose);
			$node->addChild('VIDEO', $video);
			$node->addChild('PATH',$song_path);
			$node->addChild('POSTER',$song_poster);
			$node->addChild('REVIEW', $review);
			$node->addChild('SONGS_COUNT', $songs_count);
			$node->addChild('DOWNLOAD', $songs['download']);
			$node->addChild('FOR_SELL', $for_sell);
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