<?php 
include_once "inc/database.php";
class tblAddsController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
		
	//----------------------------------------------------------------------------
	
		public function getAddsDetailsByUser($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from admin_advertise where user_id = '". $this->getDBString($paramArray["user_id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getAddsDetailsById($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from admin_advertise where id = '". $this->getDBString($paramArray["add_id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function saveNewAdv($paramArray)
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
	
		public function getAddsList($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from admin_advertise where status = '1' and landing = '1' order by adv_order asc";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getAddsDetailsStatusByUser($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from advertise where user_id = '". $this->getDBString($paramArray["user_id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
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
	
		public function getAddsListByUser($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from admin_advertise where status = '1' and user_id = '". $this->getDBString($paramArray["user_id"])."'  order by adv_order asc";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}	
	//----------------------------------------------------------------------------	
	
}?>