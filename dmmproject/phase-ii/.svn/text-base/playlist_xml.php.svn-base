<?php

include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblPlaylistController.php";

class gameFlash extends database {
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
		if($_REQUEST['musician_id'] == 0){
			$searchArr2 = $tblCommObj->getFirstSongsDetails();
		}else{
			$searchArr2 = $tblCommObj->getShareMusicianSongsDetails($_REQUEST['musician_id']);
		}

			/* As we have to use set vars, we are using direct mysql_query instead of $this->executeQuery() method */ 
			$index = 0;

			foreach($searchArr as $songs){
				$song_id = $songs['songid'];
				$user_id = $songs['user_id'];
				$song_name = $songs['song_name'];
				$artist_name = $songs['artist_name'];
				$purpose = $songs['musician_type'];
				$video = ($songs['video_url']) ? 1 : 0;
				$song_path = HOST_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
				$song_poster = HOST_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];

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
				$node->addChild('DOWNLOAD', $songs['download']);
			}

			foreach($searchArr1 as $songs){
				$song_id = $songs['songid'];
				$user_id = $songs['user_id'];
				$song_name = $songs['song_name'];
				$artist_name = $songs['artist_name'];
				$purpose = $songs['musician_type'];
				$video = ($songs['video_url']) ? 1 : 0;
				$song_path = HOST_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
				$song_poster = HOST_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];

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
				$node->addChild('DOWNLOAD', $songs['download']);
			}

			foreach($searchArr2 as $songs){
				$song_id = $songs['songid'];
				$user_id = $songs['user_id'];
				$song_name = $songs['song_name'];
				$artist_name = $songs['artist_name'];
				$purpose = $songs['musician_type'];
				$video = ($songs['video_url']) ? 1 : 0;
				$song_path = HOST_URL . "/uploads/user_".$user_id."/user_songs/".$songs['file_path'];
				$song_poster = HOST_URL . "/uploads/user_".$user_id."/songs_billboard/".$songs['billboard_image'];

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