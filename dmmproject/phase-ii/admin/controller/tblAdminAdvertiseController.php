<?php 
include_once "inc/database.php";
function DBVarConv($var,$isEncoded = false)
		{
		if($isEncoded)
		return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
		else
		return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
		}
class tblAdminAdvertiseController extends database
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
						$qry = "SELECT * FROM `admin_advertise` $qrySub order by id asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `admin_advertise` order by id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qry = "SELECT COUNT(*) AS numrows FROM `admin_advertise` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM admin_advertise";
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

			public function updateAdvertiseRecord()
				{	
						global $newname, $newname1;
						$today_date = date("Y-m-d H:i:s");
						$tmp_adv_link = $_REQUEST["adv_link"];
						if($tmp_adv_link != ""){
						$tmp_adv_link = "http://".$_REQUEST["adv_link"];
						}
						if($_POST['status']=='1')
							{
								$status='1';
							}else{
								$status='0';
							}

						if($newname==""){
							}else{
							$ad_thumb_path = "ad_thumb_path = '".$newname."',";
							}

						if($newname1==""){
							}else{
							$ad_path = "ad_path = '".$newname1."',";
							}

						if($_POST['flag']=="edit"){
						$qry = "update admin_advertise set
						ad_name = '".$_REQUEST["ad_name"]."',
						adv_link = '".$tmp_adv_link."',
						$ad_thumb_path
						$ad_path
						status = '".$status."',
						modify_date = '".$today_date."'
						where id ='".$_POST['admin_advertise_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
					$qry = "INSERT INTO admin_advertise (user_adv_id,user_id,ad_name,res_party,ad_thumb_path,ad_path,status,create_date) VALUES ('".$_REQUEST["adv_id"]."','".$_REQUEST["user_id"]."','".$_REQUEST["ad_name"]."','".$_REQUEST["res_party"]."','".$newname."','".$newname1."','0','".$today_date."')";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
					}
				}
	//----------------------------------------------------------------------------	
}?>