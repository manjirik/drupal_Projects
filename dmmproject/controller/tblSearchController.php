<?php
include_once "inc/database.php";

class tblSearchController extends database
{
	private $conObj = "";

	//----------------------------------------------------------------------------					
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}

	//----------------------------------------------------------------------------
		public function getAllSearch($paramArray)
		{			
			$recordsArray = array();
				
				if(count($paramArray)>0)
				{
				$qry = "SELECT s.id as sid,s.user_id as user_id,s.song_name as sname,u.name as uname,u.dmm_company_name as dname
								 FROM songs as s,user as u
								 WHERE s.status = '1' and s.user_id=u.id and (s.metadata LIKE '%".$paramArray["searchstring"]."%' or s.song_name LIKE '%".$paramArray["searchstring"]."%' or u.dmm_company_name LIKE '%".$paramArray["searchstring"]."%') ORDER BY s.id DESC LIMIT 20;";
				$recordsArray = $this->executeQuery($this->conObj, $qry);
				}
				
				return $recordsArray;
		}
	//----------------------------------------------------------------------------				
}
?>