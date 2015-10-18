<?php 
include_once("inc/database.php");
class tblCmsPageController extends database
{
		public function __construct($conObj) 
		{
			$this->conObj = $conObj;
		}
		
	//----------------------------------------------------------------------------
	
		public function getCmsPageDetailsById($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$sql = "select * from cms_page where id = '". $this->getDBString($paramArray["id"])."'";
				$recordsArray = $this->executeQuery($this->conObj, $sql);				
			}
			return $recordsArray;
		}
	
}?>