<?php 
include_once("inc/database.php");
class tblSettingsController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
	//----------------------------------------------------------------------------					
		public function getSettings()
		{			
			$recordsArray = array();
			$sql = "select * from dmm_settings where id = '1'";
			$recordsArray = $this->executeQuery($this->conObj, $sql);	
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

		public function getMusicianSongsCount($user_id)
			{	
				$recordsArray = array();					
				$qry = "select count(user_id) as songcount from songs where user_id= '".$user_id."' and status='1'";
				$recordsArray = $this->executeQuery($this->conObj, $qry);					
				return $recordsArray[0]["songcount"];
			}
	//----------------------------------------------------------------------------	
	
}?>