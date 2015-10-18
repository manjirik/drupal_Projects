<?php

class tblCommentController extends database
{
	private $conObj = "";

	//----------------------------------------------------------------------------					
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}

	//----------------------------------------------------------------------------
		public function saveNew($paramArray)
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
		public function getComments($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{							
				$qry = "select * from comments where comment_song_id = '".$paramArray["songId"]."' order by comment_id desc limit 0, ".$paramArray["top"].";";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------				
		public function getAllCommentsCnt($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{							
				$qry = "select comment_id from comments where comment_song_id = '".$paramArray["songId"]."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
			}
			return count($recordsArray);
		}
	//----------------------------------------------------------------------------	
		public function getAllCommentBySongId($paramArray)
		{			
			$recordsArray = array();
				if(count($paramArray)>0)
				{
					$qry = "SELECT * 
								 FROM comments 
								 WHERE status = '1' and song_id = '".$paramArray["songid"]."' order by id desc;";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				}
				
				return $recordsArray;
		}

	//----------------------------------------------------------------------------
	
       public function getUserAvatar($user_id)
		{			
			$recordsArray = array();
				$qry = "SELECT avatar FROM user WHERE id = '".$user_id."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				return $recordsArray[0]["avatar"];
		}
	//----------------------------------------------------------------------------		
	
		public function getUserName($user_id)
		{			
			$recordsArray = array();
			if($user_id != "")
			{			
				$recordsArray = array();
				$sql = "select dmm_company_name from user where id = '". $this->getDBString($user_id)."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray[0]["dmm_company_name"];
		}
	//----------------------------------------------------------------------------	
	
		public function getMusicianInfo($paramArray)
		{			
		
		//print_r($paramArray);
			$recordsArray = array();
				
				if(count($paramArray)>0)
				{
				 $qry = "SELECT s.song_name as song_name,u.name as User_Name, u.dmm_company_name as musician_name,u.email as musician_email, u.status as Status FROM `songs` as s,`user` as u WHERE s.user_id=u.id and s.id='".$paramArray["song_id"]."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				}		
				//print_r($recordsArray);	
				return $recordsArray;
		}
	//----------------------------------------------------------------------------	
	
}

?>