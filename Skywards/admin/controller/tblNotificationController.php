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

class tblNotificationController extends database
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
						$qry = "SELECT * FROM `notification` $qrySub order by idnotification  asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `notification` order by idnotification  DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qry = "SELECT COUNT(*) AS numrows FROM `notification` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM notification";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------

			public function getNotification($notification_id)	
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM notification where idnotification='".$notification_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------			
				
			public function getAllNotifications($current_admin_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM notification where idnotification != '".$current_admin_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------	
			public function updateNotificationRecord()
				{	
						$today_date = $today = date("Y-m-d H:i:s");
					   $offset=4*60*60; //converting 5 hours to seconds.
					   $dateFormat="Y-m-d H:i:s";
	                   $timeNdate=gmdate($dateFormat, time()-$offset);

						if($_POST['flag']=="edit"){
					
						$qry = "update notification set
						notification_title = '".mysql_real_escape_string($_REQUEST["name"])."',
						notification_desc = '".mysql_real_escape_string($_REQUEST["username"])."',
						notification_desc1 = '".mysql_real_escape_string($_REQUEST["notification_desc1"])."'
						where idnotification = '".$_POST['id']."'";
						$recordsArray = $this->simpleQuery($qry);
						
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
				$qry = "INSERT INTO notification (notification_title,notification_desc,notification_desc1,notification_time) VALUES ('".mysql_real_escape_string($_REQUEST["name"])."','".mysql_real_escape_string($_REQUEST["username"])."','".mysql_real_escape_string($_REQUEST["notification_desc1"])."','".$timeNdate."')";
				
					$recordsArray = $this->executeQuery($qry);
					$last_insert_id=@mysql_insert_id();

						if($last_insert_id){
							$qryInsert="insert into user_notifications						(`id_user_receiver`,`fb_id_receiver`,notification_id) 
								(SELECT user_id, fb_id,".$last_insert_id." FROM `user` where `is_active` = 1)";
							$InsertRecUserNotification= $this->executeQuery($qryInsert);
						}
		
					
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
		    $tableName_new='user_notifications';

			$qry_new = "delete FROM ".$tableName_new." 				
			where notification_id = '".$deleteId."' ";
			$recordsArray_new = $this->simpleQuery($qry_new);
			
			$qry = "delete FROM ".$tableName." 				
			where idnotification = '".$deleteId."' and idnotification != '1'";
			$recordsArray = $this->simpleQuery($qry);
			return $recordsArray;
		}
	//----------------------------------------------------------------------------	

}?>