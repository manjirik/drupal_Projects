<?php 
include_once("inc/database.php");
class tblNotifyController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
	//----------------------------------------------------------------------------					
		public function checkNotify($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from notify where musician_id = '". $this->getDBString($paramArray["musician_id"])."' and notify_user_id = '". $this->getDBString($paramArray["notify_user_id"]) ."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	//----------------------------------------------------------------------------		
	
		public function notifyInsert($paramArray)
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
				$lastInsertId = $this->insertQuery($this->conObj, $qry);
			}
			return $lastInsertId;
		}
}?>