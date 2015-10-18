<?php
	/*
	|===================================================================================================|
	|	Project Name:	timesheet
	|	Page Name:		tblTasksController.php
	|	Developed By:	Harshal S. Hirve
	|	Email:			harshalh@synechron.com
	|	Date:			29-04-2010
	|	Purpose:		class file, for executing the queries on tasks table.
	|===================================================================================================|
	*/
?>
<?php 
include_once("database.php");
include_once("phpFunctions.php");
class tblTasksController
{
	//----------------------------------------------------------------------------		
		public static function saveTask($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$db = new database;
				$noHrs = "";
				
				$dbStTime = trim($paramArray["tStTime"]);
				$dbEnTime = trim($paramArray["tEnTime"]);										
				if($diff=phpFunctions::get_time_difference($dbStTime, $dbEnTime))
				{					 
					$noHrs = sprintf('%02d:%02d', $diff['hours'], $diff['minutes'] );
				}
				
				$qry = " INSERT INTO `tasks` (`task_emp_code` , `task_date` , `task_st_time` , `task_en_time` , `task_type` , `task_project` , `task_desc` , `task_status`, `task_hrs` , `task_post_date`)
						VALUES (
							'". trim($paramArray["tEmpCode"]) ."', 
							'". trim($paramArray["tDate"]) ."', 
							TIME( STR_TO_DATE( '". $dbStTime ."', '%h:%i %p' ) ),
							TIME( STR_TO_DATE( '". $dbEnTime ."', '%h:%i %p' ) ),
							'". trim($paramArray["tType"]) ."',
							'". phpFunctions::getStr($paramArray["tProject"]) ."',  
							'". phpFunctions::getStr($paramArray["tDesc"]) ."', 
							'". trim($paramArray["tStatus"]) ."',
							'". $noHrs ."', 
							'". date('Y-m-d H:i:s') ."'
						); ";						
				$lastInsertId = $db->insertQuery($qry);
				$db = null;
			}
			return $lastInsertId; 
		}					
	//----------------------------------------------------------------------------		
		public static function updateTask($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$db = new database;
				$noHrs = "";
				
				$dbStTime = trim($paramArray["tStTime"]);
				$dbEnTime = trim($paramArray["tEnTime"]);										
				if($diff=phpFunctions::get_time_difference($dbStTime, $dbEnTime))
				{					 
					$noHrs = sprintf('%02d:%02d', $diff['hours'], $diff['minutes'] );
				}
							
				$qry = " update `tasks` set 
					task_date 		 = '". trim($paramArray["tDate"]) ."', 
					task_st_time 	 = TIME( STR_TO_DATE( '". trim($paramArray["tStTime"]) ."', '%h:%i %p' ) ),
					task_en_time 	 = TIME( STR_TO_DATE( '". trim($paramArray["tEnTime"]) ."', '%h:%i %p' ) ),
					task_type 		 = '". trim($paramArray["tType"]) ."',
					task_project 	 = '". phpFunctions::getStr($paramArray["tProject"]) ."',  
					task_desc 		 = '". phpFunctions::getStr($paramArray["tDesc"]) ."', 
					task_status 	 = '". trim($paramArray["tStatus"]) ."', 					 
					task_hrs 		 = '". $noHrs ."', 
					task_last_modify = '". date('Y-m-d H:i:s') ."'
					where task_id 	 = '". trim($paramArray["hTid"]) . "'; ";						
				$retVal = $db->simpleQuery($qry);
				$db = null;
			}
			return $lastInsertId; 
		}
	//----------------------------------------------------------------------------		
		public static function dactivateTask($paramArray)
		{			
			$aFlag = 0;
			if(count($paramArray)>0)
			{
				$db = new database;			
				$qry = " update `tasks` set task_active = 0 where task_id = '". trim($paramArray["tid"]) . "'; ";						
				$aFlag = $db->simpleQuery($qry);
				$db = null;
			}
			return $aFlag; 
		}
	//----------------------------------------------------------------------------		
		public static function getTasksForTheDay($paramArray)
		{
			$recArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();			
				$qry = "select * from tasks where task_active = 1 and task_emp_code = '".$paramArray["empCode"]."' and task_date = '".$paramArray["tDate"]."' ORDER BY `task_st_time` ASC; ";	
				$recordsArray = $db->executeQuery($qry);				
				return $recordsArray;
			}
			return $recArray;
		}	
	//----------------------------------------------------------------------------		
		public static function getTaskDetails($paramArray)
		{
			$recArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();			
				$qry = "select * from tasks where task_id = '".$paramArray["tid"]."';";
				$recordsArray = $db->executeQuery($qry);				
				return $recordsArray;
			}
			return $recArray;		
		}				
	//----------------------------------------------------------------------------		
}?>