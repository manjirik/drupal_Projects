<?php

include_once "phpFunctions.php";

class database extends phpFunctions
{
	//-----------------------------------------------------------------------------------------------------------
		private $connectlink;
		private $result;
		private $hostName;
		private $userName;
		private $password;
		private $dbName;
 	//----------------------------------------------------------------------------------------------------------- 	
		public function __construct() 
		{
			$this->hostName = 'localhost';
			$this->userName = 'root';
			$this->password = '';
			$this->dbName = 'db_dmm';			
		}
	//----------------------------------------------------------------------------------------------------------- 	
		public function connectDB()
		{
			try
			{					
				$this->connectlink = mysql_connect($this->hostName,$this->userName,$this->password,$this->dbName);
				mysql_query("set names utf8"); //to store
				if($this->connectlink)
				{
					mysql_select_db($this->dbName); 
					return $this->connectlink;
				}else
				{
					return 0;
				}
			}						
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}
	//-----------------------------------------------------------------------------------------------------------
		public function executeQuery($conObj, $sql) 
		{
			try
			{
				$rows = array();								
				if(mysql_ping($conObj))
				{
					$this->result = mysql_query($sql);
					if (!$this->result) 
					{
						echo 'Could not run query: ' . mysql_error();
						exit;
					}			
					if($this->result) 
					{
						while($row = mysql_fetch_array($this->result, MYSQL_ASSOC)) 
						{
							$rows[] = $row;
						}
						mysql_free_result($this->result);
					}
				}					
				return $rows;
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}
	//-----------------------------------------------------------------------------------------------------------
		public function insertQuery($conObj, $qry)
		{
			try
			{
				if(mysql_ping($conObj))
				{
					mysql_query($qry); 
					return mysql_insert_id();
				}
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}	
	//-----------------------------------------------------------------------------------------------------------	
		public function simpleQuery($conObj, $qry)
		{
			try
			{
				if(mysql_ping($conObj))
				{					
					return mysql_query($qry);
				}
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}	
	//-----------------------------------------------------------------------------------------------------------	
		public function closeConn($conObj) 
		{
			try
			{
				if(mysql_ping($conObj)) 
				{
					mysql_close($this->connectlink);
				}
			}						
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}
	//-----------------------------------------------------------------------------------------------------------	
}
?>