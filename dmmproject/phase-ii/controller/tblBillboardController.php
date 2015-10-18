<?php 
include_once "inc/database.php";
class tblBillboardController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
	//----------------------------------------------------------------------------					
		public function billboardInsert($paramArray)
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
		public function getBillboardBySongId($paramArray)
		{			
			$recordsArray = array();
				if(count($paramArray)>0)
				{
					$qry = "SELECT * 
								 FROM songs 
								 WHERE id = '".$paramArray["songid"]."';";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				//$recordsArray = $this->executeQuery($qry);
				}
				
				return $recordsArray;
		}
	//----------------------------------------------------------------------------	
	
		public function getBillboardByUserId($paramArray)
		{			
			$recordsArray = array();
				if(count($paramArray)>0)
				{
					$qry = "SELECT * 
								 FROM billboard 
								 WHERE user_id = '".$paramArray["user_id"]."' and file_type = 0 order by create_date desc limit 0,1;";
					
					$recordsArray = $this->executeQuery($this->conObj, $qry);
				//$recordsArray = $this->executeQuery($qry);
				}
				
				return $recordsArray;
		}
	//----------------------------------------------------------------------------	
	
}?>