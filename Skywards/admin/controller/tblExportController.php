<?php 
include_once("inc/database.php");
class tblExportController extends database
{
		//----------------------------------------------------------------------------			
			public function getApplyNow()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_apply_now order by id ASC";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
			public function getApplyOnline()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_apply_online order by id ASC";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
			//Get City
			public function getCity($cityId)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_city where id = '".$cityId."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
			//Get Contact Online
			public function getContact()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_contact order by id ASC";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
			//Get Request Call Back
			public function getCallBack()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_call_back order by id ASC";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
}