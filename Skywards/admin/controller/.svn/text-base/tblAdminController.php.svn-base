<?php 
include_once("inc/config.php");
include_once("inc/database.php");
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
						$qry = "SELECT * FROM `tb_cms_user` $qrySub order by id  asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `tb_cms_user` order by id  DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qry = "SELECT COUNT(*) AS numrows FROM `tb_cms_user` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM tb_cms_user";
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
				$recordsArray = $this->executeQuery("select * from tb_cms_user where username = '". $this->getDBString($paramArray["admUsername"])."' and password = '". md5($this->getDBString($paramArray["admPassword"])) ."'");				
			}
			return $recordsArray;
		}

	//----------------------------------------------------------------------------			
				
			public function getAdmin($admin_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_cms_user where id='".$admin_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------			
				
			public function getAllAdminUsers($current_admin_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_cms_user where id != '".$current_admin_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------	

			public function updateAdminRecord()
				{	
						$today_date = $today = date("Y-m-d H:i:s");
						if($_POST['flag']=="edit"){
						if($_POST['password']=='')
							{
								$admin_password='';
							}else{
								$admin_password = "password = '".md5($_POST['password'])."',";
							}

						$qry = "update tb_cms_user set
						name = '".mysql_real_escape_string($_REQUEST["name"])."',
						$admin_password
						email = '".$_REQUEST["email"]."',
						username = '".mysql_real_escape_string($_REQUEST["username"])."'						
						where id = '".$_POST['id']."'";
						$recordsArray = $this->simpleQuery($qry);
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
					$qry = "INSERT INTO tb_cms_user (name,email,username,password) VALUES ('".mysql_real_escape_string($_REQUEST["name"])."','".$_REQUEST["email"]."','".mysql_real_escape_string($_REQUEST["username"])."','".md5($_REQUEST["password"])."')";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
					}
				}

	//----------------------------------------------------------------------------	
	
			public function HTMLVarConv($var)
			{									
				return preg_replace("/&amp;([a-zA-Z0-9#]*;)/", "&\\1", htmlspecialchars($var));	
			}
	//----------------------------------------------------------------------------	

			public function leftMenuList($login_group_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM tb_modules order by sort_order ASC";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}
	//----------------------------------------------------------------------------
	
	public function getDetailsById($id, $tableName)
	{									
		$recordsArray = array();
		$qry = "SELECT * FROM ".$tableName." where id='".$id."'";
		$recordsArray = $this->executeQuery($qry);
		return $recordsArray;	
	}
	//----------------------------------------------------------------------------
	
	public function updateStatus($countryId, $changeStatus, $tableName)
	{	
		$qry = "update ".$tableName." set
		status = '".$changeStatus."' 						
		where id = '".$countryId."'";
		$recordsArray = $this->simpleQuery($qry);
		return $recordsArray;
	}
	//----------------------------------------------------------------------------	

	public function updateOrder($countryId, $orderVal, $tableName)
		{	
			$qry = "update ".$tableName." set
			sort_order = '".$orderVal."' 						
			where id = '".$countryId."'";
			$recordsArray = $this->simpleQuery($qry);
			return $recordsArray;
		}	
	//----------------------------------------------------------------------------	

	public function deleteRecord($deleteId, $tableName)
		{	
			$qry = "delete FROM ".$tableName." 				
			where id = '".$deleteId."' and id != '1'";
			$recordsArray = $this->simpleQuery($qry);
			return $recordsArray;
		}
	//----------------------------------------------------------------------------	

}?>