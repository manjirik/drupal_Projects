<?php
class tblPlaylistController extends database
{
	private $conObj = "";

	//----------------------------------------------------------------------------					
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}

	//----------------------------------------------------------------------------
		public function getAllSearch($paramArray)
		{			
			$recordsArray = array();
				
				if(count($paramArray)>0)
				{
				$qry = "SELECT s.id as sid,s.song_name as sname,u.name as uname
								 FROM songs as s,user as u
								 WHERE s.status = '1' and s.user_id=u.id and (s.song_name LIKE '%".$paramArray["searchstring"]."%' or u.name LIKE '%".$paramArray["searchstring"]."%') LIMIT 10;";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				}
				
				return $recordsArray;
		}
	
	//----------------------------------------------------------------------------	
	
		public function getSpecificSongDetails($song_id){
			$recordsArray = array();
			$qry = "SELECT s.id AS songid, s.user_id AS user_id, s.song_name AS song_name, TRIM(s.admin_review) AS admin_review, s.is_download AS download, s.video_url as video_url, s.for_sell as for_sell, u.dmm_company_name AS artist_name, u.musician_type, s.file_path AS file_path, s.billboard_image AS billboard_image FROM songs AS s,user AS u WHERE s.id = '".$song_id."' AND u.id = s.user_id;";
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	
	//----------------------------------------------------------------------------	
	
		public function getSongsDetails($song_id){
			$recordsArray = array();									
			$qry = "SELECT distinct s.id as songid,s.user_id as user_id, s.song_name as song_name, TRIM(s.admin_review) AS admin_review, s.is_download AS download, s.video_url as video_url, s.for_sell as for_sell, u.dmm_company_name as artist_name, u.musician_type, s.file_path as file_path, s.billboard_image as billboard_image FROM songs as s left join user u on u.id = s.user_id WHERE s.id != '".$song_id."' and s.status = '1' and s.user_id = (select user_id from songs where id = '".$song_id."') ORDER BY s.id ASC;";
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	
	//--------------------------------------------------------------------------------------------------------

		public function getFirstSongsDetails(){
			$recordsArray = array();									
			$qry = "SELECT s.id AS songid, s.user_id AS user_id, u.musician_type, (SELECT COUNT(*) FROM songs WHERE user_id = u.id) AS user_songs_count, s.song_name AS song_name, u.dmm_company_name AS artist_name, s.file_path AS file_path, s.billboard_image AS billboard_image, TRIM(s.admin_review) AS admin_review, s.is_download AS download, s.video_url as video_url FROM songs AS s, user AS u WHERE s.status = '1' AND s.random != '1' AND u.id = s.user_id ORDER BY RAND();";
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	//--------------------------------------------------------------------------------------------------------
		public function getLifestyleSongsDetails($style_id) {
			$recordsArray = array();									
			$qry = "SELECT s.id AS songid, s.user_id AS user_id, (SELECT COUNT(*) FROM songs WHERE user_id = u.id) AS user_songs_count, u.musician_type, s.song_name AS song_name, u.dmm_company_name AS artist_name, s.file_path AS file_path, s.billboard_image AS billboard_image, TRIM(s.admin_review) AS admin_review, s.is_download AS download, s.video_url AS video_url FROM songs AS s, USER AS u, songs_lifestyle_relation AS lsr WHERE s.status = '1' AND lsr.lsid = %d AND lsr.sid = s.id AND u.id = s.user_id ORDER BY RAND();";
			$qry = sprintf($qry, $style_id);
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	//----------------------------------------------------------------------------	
	
		public function getShareSongsDetails($song_id){
			$recordsArray = array();
			$qry = "SELECT distinct s.id as songid,s.user_id as user_id, s.song_name as song_name,u.dmm_company_name as artist_name, s.file_path as file_path, s.billboard_image as billboard_image FROM songs as s left join user u on u.id = s.user_id WHERE s.id = '".$song_id."' and s.status = '1' and s.user_id = (select user_id from songs where id = '".$song_id."');";
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	
	//----------------------------------------------------------------------------	

		public function getUserID($musician)
			{	
				$recordsArray = array();					
				$qry = "SELECT id AS userid FROM user WHERE dmm_company_name = '".$musician."'";
				$recordsArray = $this->executeQuery($this->conObj, $qry);					
				return $recordsArray[0]["userid"];
			}

	//----------------------------------------------------------------------------	
	
		public function getShareMusicianSongsDetails($tmp_user_id){
			$recordsArray = array();
			 $qry = "SELECT s.id as songid,s.user_id as user_id, s.song_name as song_name,u.dmm_company_name as artist_name, u.musician_type, s.file_path as file_path, s.billboard_image as billboard_image, s.video_url as video_url, TRIM(s.admin_review) as admin_review, s.is_download as download, s.video_url as video_url, s.for_sell as for_sell FROM songs as s,user as u WHERE u.id = s.user_id and s.status = '1' and u.id = '".$tmp_user_id."' ORDER BY s.weight ASC;";
			$recordsArray = $this->executeQuery($this->conObj, $qry);		
			return $recordsArray;
		}
	
	//--------------------------------------------------------------------------------------------------------
}
?>