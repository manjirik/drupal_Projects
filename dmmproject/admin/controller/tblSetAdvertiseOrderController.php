<?php 
include_once "inc/database.php";
function DBVarConv($var,$isEncoded = false)
		{
		if($isEncoded)
		return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
		else
		return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
		}
class tblSetAdvertiseOrderController extends database
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
						$qrySub .= " where status='1' and DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT * FROM `admin_advertise` $qrySub order by adv_order asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `admin_advertise` where status='1' order by adv_order ASC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qrySub .= "where status='1' and DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM `admin_advertise` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM admin_advertise where status='1'";
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
				
			public function getAdvertise($adv_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM advertise where id='".$adv_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------			
				
			public function getAdminAdvertise($admin_advertise_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM admin_advertise where id='".$admin_advertise_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
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

			public function updateSetOrder()
				{	
						$arr = $_POST['cnt'];
						$count = count($arr);
						if($count > 0)
						{
						foreach ($arr as &$value) {
						//echo $value."-".$_POST["advorder_".$value]."--  ";
						
						$qry = "update admin_advertise set
						adv_order = '".$_POST["advorder_".$value]."'
						where id ='".$value."'";
						$recordsArray = $this->executeQuery($qry);
						
						}return $recordsArray;
						}
				}
	//----------------------------------------------------------------------------	
}?>