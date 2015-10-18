<?php 
include_once("inc/database.php");
class tblUserController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
	//----------------------------------------------------------------------------					
		public function validateLogin($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."' and password = '". $this->getDBString($paramArray["password"]) ."' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------		
	
		public function userRegistration($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$cnt = 0;
				$qry = "";
				$tempArray = array();
				$tableName = $paramArray["table_name"];
				$qry = "insert into " . $tableName . " (";				
				foreach($paramArray as $key => $value)
				{
					if($cnt>0)	
					{
						$qry .= "".trim($key).", ";
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
				//echo $qry;
				$lastInsertId = $this->insertQuery($this->conObj, $qry);
			}
			return $lastInsertId;
		}
	//----------------------------------------------------------------------------	
	
		public function userRegistrationAvatarUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set avatar = '".$paramArray["avatar"]."' where id = ".$paramArray["user_id"].";";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------	
	
		public function checkuser($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getUserDetails($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where id = '". $this->getDBString($paramArray["id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function getUserDetailsByDmmCompanyName($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from user where dmm_company_name = '". $this->getDBString($paramArray["dmm_company_name"])."' and status = 1";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------
	
		public function userPasswordUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set password = '".$paramArray["password"]."' where id = '".$paramArray["user_id"]."' and status = 1;";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
	
		public function userUpdateNotify($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{								
				$qry = "update user set notify = '1' where id = '".$paramArray["user_id"]."' and status = 1;";					
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
	
		public function userProfileUpdate($paramArray)
		{			
			$retValue = 0;
			if(count($paramArray)>0)
			{
				$cnt = 0;
				$qry = "";
				$qry = "update " . $paramArray["table_name"] . " set ";				
				foreach($paramArray as $key => $value)
				{
					if($cnt>1)	
					{
						$qry .= "".trim($key)."='".addslashes($value)."', ";
					}
					$cnt++;
				}
				$qry = substr($qry, 0, (strlen($qry)-2));
				$qry .= " where id = ".$paramArray["user_id"];
				$retValue = $this->simpleQuery($this->conObj, $qry);
			}
			return $retValue;
		}
	//----------------------------------------------------------------------------
}?>