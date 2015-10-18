<?php 
include_once "inc/database.php";
function DBVarConv($var,$isEncoded = false)
		{
		if($isEncoded)
		return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
		else
		return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
		}
class tblAdminController extends database
{
	//----------------------------------------------------------------------------	
	
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
						$qrySub .= " where DATE_FORMAT(admin_post_date , '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(admin_post_date , '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT * FROM `admin` $qrySub order by admin_id  asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `admin` order by admin_id  DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qrySub .= " where DATE_FORMAT(admin_post_date , '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(admin_post_date , '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM `admin` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM admin";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------

		public function validateAdminLogin($paramArray)
		{			
			$recordsArray = array();
			if(count($paramArray)>0)
			{			
				$recordsArray = array();
				$recordsArray = $this->executeQuery("select * from admin where admin_log_status = 1 and admin_username = '". $this->getDBString($paramArray["admUsername"])."' and admin_password = '". $this->getDBString($paramArray["admPassword"]) ."'");				
			}
			return $recordsArray;
		}

	//----------------------------------------------------------------------------			
				
			public function getAdmin($admin_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM admin where admin_id='".$admin_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------	

			public function updateAdminRecord()
				{	
						$today_date = date("Y-m-d H:i:s");
						if($_POST['status']=='1')
							{
								$status='1';
							}else{
								$status='0';
							}
						if($_POST['flag']=="edit"){
						if($_POST['admin_password']=='')
							{
								$admin_password='';
							}else{
								$admin_password = "admin_password = '".$_POST['admin_password']."',";
							}

						$qry = "update admin set
						admin_first_name = '".$_REQUEST["admin_first_name"]."',
						admin_last_name = '".$_REQUEST["admin_last_name"]."',
						admin_email = '".$_REQUEST["admin_email"]."',
						admin_username = '".$_REQUEST["admin_username"]."',
						$admin_password
						admin_log_status = '".$status."',
						modify_date = '".$today_date."'
						where admin_id='".$_POST['admin_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
					$qry = "INSERT INTO admin (admin_first_name,admin_last_name,admin_email,admin_username,admin_password,admin_post_date,admin_log_status) VALUES ('".$_REQUEST["admin_first_name"]."','".$_REQUEST["admin_last_name"]."','".$_REQUEST["admin_email"]."','".$_REQUEST["admin_username"]."','".$_REQUEST["admin_password"]."','".$today_date."','1')";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
					}
				}
	//----------------------------------------------------------------------------			
				
			public function getDefaultSettings()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM dmm_settings where id='1'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------			
				
			public function updateDefaultSettings()
			{					
				$today_date = date("Y-m-d H:i:s");
				$recordsArray = array();
				$qry = "update dmm_settings set
						adv_start_time = '".$_REQUEST["adv_start_time"]."',
						duration_adv_time = '".$_REQUEST["duration_adv_time"]."',
						adv_interval_time = '".$_REQUEST["adv_interval_time"]."',
						duration_comment_time = '".$_REQUEST["duration_comment_time"]."',
						comment_interval_time = '".$_REQUEST["comment_interval_time"]."',
						modify_date = '".$today_date."'
						where id='1'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------			
				
			public function getCmsSettings()
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM cms_page where id='1'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------			
				
			public function updateCmsSettings()
			{					
				$today_date = date("Y-m-d H:i:s");
				$recordsArray = array();
				$qry = "update cms_page set
						dmmcompany_text  = '".DBVarConv($_REQUEST["dmmcompany_text"])."',
						modify_date = '".$today_date."'
						where id='1'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------	
	
			public function HTMLVarConv($var)
			{									
				return preg_replace("/&amp;([a-zA-Z0-9#]*;)/", "&\\1", htmlspecialchars($var));	
			}
	//----------------------------------------------------------------------------	

}?>