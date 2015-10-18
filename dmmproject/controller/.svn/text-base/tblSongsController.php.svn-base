<?php 
include_once("inc/database.php");
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
				$recordsArray = array();
				$sql = "select * from songs where user_id = '". $this->getDBString($paramArray["user_id"])."'";
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
				$recordsArray = array();
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
				//return $recordsArray;
				return $recordsArray[0]["dmm_company_name"];
		}

	//----------------------------------------------------------------------------
}?>