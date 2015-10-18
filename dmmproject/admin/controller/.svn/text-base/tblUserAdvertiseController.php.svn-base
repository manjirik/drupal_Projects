<?php 
include_once "inc/database.php";
function DBVarConv($var,$isEncoded = false)
		{
		if($isEncoded)
		return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
		else
		return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
		}
class tblUserAdvertiseController extends database
{
			public function getPagging($paramArray)
			{			
			if(count($paramArray)>0)
				{			
					$recordsArray = array();			
					switch ($paramArray['type']) {		
					
						case "date":						
						$frmDateVal = $paramArray["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $paramArray["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT * FROM `advertise` $qrySub order by id asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `advertise` order by id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
						break;	
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray;
			}

		//----------------------------------------------------------------------------	
	
			public function getTotalRecordCount($paramArray)
			{						
				$recordsArray = array();
				if(count($paramArray)>0)
				{			
					$recordsArray = array();								
					switch ($paramArray['type']) {
						case "date":						
						$frmDateVal = $paramArray["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $paramArray["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= "where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM `advertise` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM advertise";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------			
			
			public function HTMLVarConv($var)
			{									
				return preg_replace("/&amp;([a-zA-Z0-9#]*;)/", "&\\1", htmlspecialchars($var));	
			}
		
		//----------------------------------------------------------------------------			
				
			public function getUserName($userid)
			{									
				$recordsArray = array();
				$qry = "SELECT name FROM user where id='".$userid."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray[0]["name"];	
			}

		//----------------------------------------------------------------------------			
				
			public function getAdv($advid)
			{									
				$recordsArray = array();
				$qry = "SELECT u.name,a.user_id,a.ad_name,a.res_party,a.reject_reason,a.status FROM user as u,advertise as a where u.id = a.user_id and a.id='".$advid."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;
			}
		
		//----------------------------------------------------------------------------	
		
			public function updateAdvRecord()
				{	
						
						if($_POST['adv_id']!="" || $_POST['adv_id']!=" "){
						$today_date = date("Y-m-d H:i:s");

						$qry = "update advertise set
						reject_reason = '".DBVarConv($_REQUEST["reject_reason"])."',
						status = '".$_POST['status']."',
						modify_date = '".$today_date."'
						where id='".$_POST['adv_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}
				}
		//----------------------------------------------------------------------------	
}?>