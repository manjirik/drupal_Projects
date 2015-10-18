<?php

include_once "phpFunctions.php";
			
class database extends phpFunctions
{
	//-----------------------------------------------------------------------------------------------------------
		private $connectlink;	//Database Connection Link
		private $result;	//Database Result Recordset link
		private $hostName;
		private $userName;
		private $password;
		private $dbName;
 	//-----------------------------------------------------------------------------------------------------------


		public function __construct() 
		{
			try
			{
				$this->hostName='localhost';
				$this->userName='root';
				$this->password='';
				$this->dbName='db_dmm';
				$this->connectDB();		
			}						
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}
	//-----------------------------------------------------------------------------------------------------------
		public function __destruct() 
		{
			try
			{
				if($this->connectDB()==1) 
				{
					if(mysql_ping($this->connectlink)) 
					{
						mysql_close($this->connectlink);
					}
				}
			}						
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
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
					return 1;
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
		public function executeQuery($sql) 
		{
			try
			{
				$rows = array();			
					if($this->connectDB()==1) 
					{
						if(mysql_ping($this->connectlink))
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
		public function insertQuery($qry)
		{
			try
			{
				if($this->connectDB()==1) 
				{
					if(mysql_ping($this->connectlink))
					{
						mysql_query($qry); 
						return mysql_insert_id();
					}
				}
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}	
	//-----------------------------------------------------------------------------------------------------------	
		public function simpleQuery($qry)
		{
			try
			{
				if($this->connectDB()==1) 
				{
					if(mysql_ping($this->connectlink))
					{					
						return mysql_query($qry);
					}
				}
			}
			catch (Exception $e)
			{
				echo $e->getMessage();
				exit();
			}
		}	
	//-----------------------------------------------------------------------------------------------------------	
}?>