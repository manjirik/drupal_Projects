<?php

include_once "inc/database.php";

class tblSongsController extends database
{
		public function __construct($conObj)
		{
			$this->conObj = $conObj;
		}
		
	//----------------------------------------------------------------------------
	
		public function getSongsDetailsByUser($paramArray)
		{
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				// $sql = "select * from songs where user_id = '". $this->getDBString($paramArray["user_id"])."' ORDER BY id";
				$sql = "SELECT * FROM songs WHERE user_id = %d ORDER BY weight, id";
				$sql = sprintf($sql, mysql_real_escape_string($paramArray["user_id"]));
				$recordsArray = $this->executeQuery($this->conObj, $sql);
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getSongsDetailsById($paramArray)
		{
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$sql = "select * from songs where id = '". $this->getDBString($paramArray["song_id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------

		public function addHitSongId($paramArray)
		{
			if(count($paramArray)>0)
			{
				$qry = "update songs set hits = hits + 1 where id = ".$paramArray["songid"].";";
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}

	//----------------------------------------------------------------------------
	
		public function saveNewSong($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$cnt = 0;
				$qry = "";
				$tempArray = array();
				$tableName = $paramArray["table_name"];
				$qry = "insert into `" . $tableName . "` (";
				foreach($paramArray as $key => $value)
				{
					if($cnt>0)
					{
						$qry .= "`".trim($key)."`, ";
						$tempArray[trim($key)] = trim($value);
					}
					$cnt++;
				}
				$qry = substr($qry, 0, (strlen($qry)-2)).") VALUES (";
				foreach($tempArray as $key => $value)
				{					
					$qry .= "'".$this->getDBString3($value)."', ";
				}
				$qry = substr($qry, 0, (strlen($qry)-2));
				$qry .= ");";
				$lastInsertId = $this->insertQuery($this->conObj, $qry);
			}
			return $lastInsertId;
		}
		
	//----------------------------------------------------------------------------
		
		public function updateSongRecord($paramArray)
		{
			if(count($paramArray)>0)
			{
				$qry = "UPDATE `songs` SET weight = %d, song_name = '%s', credits = '%s', video_url = '%s', is_download = %d, for_sell = %d, billboard_image = '%s', modify_date = '%s' WHERE id = %d";
				
				$qry = sprintf($qry, 
					$paramArray['weight'], 
					mysql_real_escape_string($paramArray['name']), 
					$paramArray['credits'], 
					$paramArray['video_url'], 
					$paramArray['is_download'], 
					$paramArray['for_sell'], 
					$paramArray['billborad_image'], 
					date("Y-m-d H:i:s"), 
					$paramArray['id']
				);
				//echo $qry; exit;
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}

	//----------------------------------------------------------------------------
		public function updateSongImage($paramArray)
		{
			if(count($paramArray)>0)
			{
				$qry = "UPDATE `songs` SET billboard_image = '%s' WHERE id = %d";
				
				$qry = sprintf($qry, 
					$paramArray['billboard_image'], 
					$paramArray['id']
				);
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
		
		public function getNextSongWeightByUserId($userId)
		{
			$query = "SELECT (MIN(weight)-1) AS weight FROM `songs` WHERE user_id = %d";
			$query = sprintf($query, $userId);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0]['weight'];
		}
	//----------------------------------------------------------------------------
	
        public function getHitCountBySongId($paramArray)
		{			
			$recordsArray = array();
				if(count($paramArray)>0)
				{
				$qry = "SELECT * FROM songs WHERE id = '".$paramArray["songid"]."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				}
				return $recordsArray;
		}

	//----------------------------------------------------------------------------

		public function updateDownloadSong($paramArray)
		{
				if(count($paramArray)>0)
				{
					$qry = "update songs set download_count = download_count + 1 where id = ".$paramArray["song_id"].";";
					$retValue = $this->simpleQuery($this->conObj, $qry);
				}
				
				return $retValue;
		}
	
	//----------------------------------------------------------------------------
	public function addHitSite()
		{
			$qry = "update dmm_settings set site_hit_count = site_hit_count + 1 where id = '1';";
			$retValue = $this->simpleQuery($this->conObj, $qry);
			return $retValue;
		}

	//----------------------------------------------------------------------------
	
       public function getHitCountOfSite()
		{			
			$recordsArray = array();
				$qry = "SELECT site_hit_count FROM dmm_settings WHERE id = '1';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				//return $recordsArray;
				return $recordsArray[0]["site_hit_count"];
		}

	//----------------------------------------------------------------------------	
		public function getSongName($paramArray)
		{			
			$recordsArray = array();
				if(count($paramArray)>0)
				{
					$qry = "SELECT s.song_name as songname, u.dmm_company_name as mname FROM songs as s, user as u WHERE s.user_id = u.id and s.id = ".$paramArray["songid"].";";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				//$recordsArray = $this->executeQuery($qry);
				}
				
				return $recordsArray;
		}
	//----------------------------------------------------------------------------
       public function getUserPaidStatus($user_id)
		{
			$recordsArray = array();
				$qry = "SELECT paid FROM user WHERE id = '".$user_id."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				//return $recordsArray;
				return $recordsArray[0]["paid"];
		}
	//----------------------------------------------------------------------------
		 public function getDmmCompanyNameBySongId($song_id)
		{
			$recordsArray = array();
				$qry = "select user.dmm_company_name as dmm_company_name from user,songs where user.id = songs.user_id and songs.id='".$song_id."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				return $recordsArray[0]["dmm_company_name"];
		}

	//----------------------------------------------------------------------------
		 public function deletSongBySongId($song_id)
		{
			$query = sprintf("DELETE FROM songs WHERE id = %d", $song_id);
			$retValue = $this->simpleQuery($this->conObj, $query);
			return $retValue;
		}
		
		public function updateSongVideoURL($song_id, $video_url)
		{
			$query = sprintf("UPDATE songs SET video_url = '%s' WHERE id = %d", $video_url, $song_id);
			$retValue = $this->simpleQuery($this->conObj, $query);
			return $retValue;
		}
		
		public function updateSongIsDownloadFlag($song_id, $flag)
		{
			$query = sprintf("UPDATE songs SET is_download = %d WHERE id = %d", $flag, $song_id);
			$retValue = $this->simpleQuery($this->conObj, $query);
			return $retValue;
		}
		
		public function updateSongCredits($song_id, $credits)
		{
			$query = sprintf("UPDATE songs SET credits = '%s' WHERE id = %d", $credits, $song_id);
			$retValue = $this->simpleQuery($this->conObj, $query);
			return $retValue;
		}
		
		public function getSongVideoURL($song_id)
		{		
			$recordsArray = array();
			$query = sprintf("SELECT video_url FROM songs WHERE id = %d", $song_id);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0]["video_url"];
		}
		
		 public function getSongFilePathBySongId($song_id)
		{
			$qry = "SELECT file_path FROM songs WHERE id = '".$song_id."'";
			$recordsArray = $this->executeQuery($this->conObj, $qry);
			return $recordsArray[0]["file_path"];
		}
	//----------------------------------------------------------------------------
	
		 public function saveSongStartTimeAndDuration($song_id, $start_time, $duration, $for_sell)
		{			
			$qry = sprintf("UPDATE songs SET song_start_time = '%f', song_duration = '%f', for_sell = %d WHERE id = '%d'", $start_time, $duration, $for_sell, $song_id);
			$retValue = $this->simpleQuery($this->conObj, $qry);			
			return $retValue;
		}

	//----------------------------------------------------------------------------
	
			public function getSongsFileName()
		{
			$recordsArray = array();
			$sql = "SELECT id, user_id, file_path, billboard_image FROM songs ORDER BY id";
			$recordsArray = $this->executeQuery($this->conObj, $sql);
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
		public function saveSongLength($song_id, $songLength)
		{			
			$qry = "UPDATE songs SET song_length = '".$songLength."' WHERE id = '".$song_id."'";					
			$retValue = $this->simpleQuery($this->conObj, $qry);			
			return $retValue;
		}
		
	//----------------------------------------------------------------------------	
		public function getSongCredits($song_id){
			$recordsArray = array();
			$query = sprintf("SELECT credits FROM songs WHERE id = %d", $song_id);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0]["credits"];
		}
		
	//----------------------------------------------------------------------------			
		public function getSongReviews($song_id)
		{									
			$recordsArray = array();
			$query = sprintf("SELECT admin_brief_review, admin_review FROM songs WHERE id = %d", $song_id);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0];	
		}
		
	//----------------------------------------------------------------------------			
		public function getUserIdBySongId($song_id)
		{									
			$recordsArray = array();
			$query = sprintf("SELECT user_id FROM songs WHERE id = %d", $song_id);
			$recordsArray = $this->executeQuery($this->conObj, $query);
			return $recordsArray[0]['user_id'];	
		}
		
	//----------------------------------------------------------------------------			
		public function autocomplete_json_id_map($string) {
			$string = preg_match_all("/\[(.*?)\]/", $string, $matches);
			$array = array();
			for($i = 0; $i < count($matches[1]); $i++) {
				$array[$matches[1][$i]] = $matches[1][$i];
			}
			return $array;
		}
}

?>