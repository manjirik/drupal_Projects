<?php
	/*
	|===================================================================================================|
	|	Project Name:	timesheet
	|	Page Name:		tblEmployeeController.php
	|	Developed By:	Harshal S. Hirve
	|	Email:			harshalh@synechron.com
	|	Date:			31-03-2010
	|	Purpose:		class file, for executing the queries on employees table.
	|===================================================================================================|
	*/
?>
<?php 
include_once("database.php");
include_once("phpFunctions.php");
class tblEmployeeController
{
	//----------------------------------------------------------------------------
	
	public static function getEmployeeName()
		{			
			//$empFullName = "";
				$db = new database;
				$recordsArray = array();	
				 $qry=	"select emp_fname from employee";
				
				$recordsArray = $db->simpleQuery($qry);				
							
			
			return $recordsArray;			
		}	
	
	
		public static function getEmployeeFullName($paramArray)
		{			
			$empFullName = "";
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();				
				$recordsArray = $db->executeQuery("select emp_fname, emp_mname, emp_lname from employee where emp_code = '".$paramArray["empCode"]."'; ");				
				if(count($recordsArray)>0)
				{
					if(trim($recordsArray[0]["emp_mname"])!="")
						$empFullName = ucfirst($recordsArray[0]["emp_fname"])." ".strtoupper($recordsArray[0]["emp_mname"]).". ".ucfirst($recordsArray[0]["emp_lname"]);
					else
						$empFullName = ucfirst($recordsArray[0]["emp_fname"])." ".ucfirst($recordsArray[0]["emp_lname"]);
				}					
				$db = null;				
			}
			return $empFullName;			
		}	
	//----------------------------------------------------------------------------
		public static function getEmployeeDtlsByCode($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();				
				$recordsArray = $db->executeQuery("select emp_id, emp_fname, emp_mname, emp_lname from employee where emp_code = '".$paramArray["empCode"]."'; ");				
				$db = null;
			}
			return $recordsArray;			
		}
	//----------------------------------------------------------------------------			
		public static function getEmployeeDtlsByEmail($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();				
				$recordsArray = $db->executeQuery("select emp_id, emp_fname, emp_mname, emp_lname, emp_pass from employee where emp_email  = '".$paramArray["empEmail"]."'; ");				
				$db = null;
			}
			return $recordsArray;			
		}
	//----------------------------------------------------------------------------		
		public static function chkDuplicateCode($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();
				if($paramArray["tType"]=="add")				
					$recordsArray = $db->executeQuery("select emp_id from employee where emp_code = '".$paramArray["empCode"]."'; ");				
				elseif($paramArray["tType"]=="edit")
					$recordsArray = $db->executeQuery("select emp_id from employee where emp_code = '".$paramArray["empCode"]."' and emp_id != '".$paramArray["empId"]."'; ");				
				
				$db = null;
			}
			return count($recordsArray);			
		}	
	//----------------------------------------------------------------------------		
		public static function chkDuplicateEmail($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();
				if($paramArray["tType"]=="add")				
					$recordsArray = $db->executeQuery("select emp_id from employee where emp_email = '".$paramArray["empEmail"]."'; ");				
				elseif($paramArray["tType"]=="edit")
					$recordsArray = $db->executeQuery("select emp_id from employee where emp_email = '".$paramArray["empEmail"]."' and emp_id != '".$paramArray["empId"]."'; ");				
				
				$db = null;
			}
			return count($recordsArray);			
		}
	//----------------------------------------------------------------------------		
		public static function saveEmployee($paramArray)
		{			
			$lastInsertId = 0;
			if(count($paramArray)>0)
			{
				$db = new database;			
			 $qry = " INSERT INTO `employee` (`emp_code` , `emp_fname` , `emp_mname` , `emp_lname` , `emp_email` , `emp_pass` , `emp_rep_auth_name`, `emp_report_email` , `emp_add_date`)
						VALUES (
							'". phpFunctions::getStr($paramArray["empCode"]) ."', 
							'". phpFunctions::getStr($paramArray["empFname"]) ."', 
							'". phpFunctions::getStr($paramArray["empMname"]) ."', 
							'". phpFunctions::getStr($paramArray["empLname"]) ."', 
							'". trim($paramArray["empEmailS"]) ."', 
							'". phpFunctions::getStr($paramArray["empPasswordS"]) ."', 					
							'". phpFunctions::getStr($paramArray["empRepAuthName"]) ."', 
							'". trim($paramArray["empReportToEmailS"]) ."', 
							'". date('Y-m-d H:i:s') ."'
						); ";						
				$lastInsertId = $db->insertQuery($qry);
				$db = null;
			}
			return $lastInsertId; 
		}					
	//----------------------------------------------------------------------------		
		public static function validateLogin($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{
				$db = new database;
				$recordsArray = array();
				$recordsArray = $db->executeQuery("select * from employee where emp_email = '".$paramArray["empEmail"]."' and emp_pass = '".$paramArray["empPassword"]."'; ");							
				$db = null;
			}
			return $recordsArray;			
		}	
	//----------------------------------------------------------------------------		
}?>