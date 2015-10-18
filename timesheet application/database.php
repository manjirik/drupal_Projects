<?php
	/*
	|===================================================================================================|
	|	Project Name:	PEOJECT NAME HERE
	|	Page Name:		database.php
	|	Developed By:	Harshal S. Hirve
	|	Email:			harshalh@synechron.com
	|	Date:			00-00-0000
	|	Purpose:		class file, for executing the queries on the DB.
	|===================================================================================================|
	*/
?>
<?php
include_once("config.php");
class database
{
	//-----------------------------------------------------------------------------------------------------------
		private $connectlink;	//Database Connection Link
		private $result;	//Database Result Recordset link
		private $rows;		//Stores the rows for the resultset
 	//-----------------------------------------------------------------------------------------------------------
		public function connectDB()
		{
			try
			{
				$this->connectlink = mysql_connect(DB_HOST_NAME,DB_USERNAME,DB_PASSWORD);	
				if($this->connectlink)
				{
					mysql_select_db(DB_NAME); 
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
		public function __construct() 
		{
			try
			{
				$retVal = $this->connectDB();		
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
								while($row = mysql_fetch_array($this->result)) 
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