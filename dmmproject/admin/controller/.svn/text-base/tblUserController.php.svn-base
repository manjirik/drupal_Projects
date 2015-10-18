<?php 
include_once "inc/database.php";
include_once "inc/mailer.php";
function DBVarConv($var,$isEncoded = false)
				{
				if($isEncoded)
				return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
				else
				return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
				}
class tblUserController extends database
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
						$qry = "SELECT * FROM `user` $qrySub order by id asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `user` order by id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
						break;	
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray;
			}
		//----------------------------------------------------------------------------	
			public function userViewDetails($user_id)
			{
				$recordsArray = array();
				
				$qry = "SELECT * FROM `user` where id=".$user_id.";";
				
				$recordsArray = $this->executeQuery($qry);
				
				return $recordsArray;
			}

		//----------------------------------------------------------------------------	

			public function getUserDateDownload()
			{			
						$frmDateVal = $_REQUEST["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $_REQUEST["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";

					$recordsArray = array();
					$qry = "SELECT * from `user` $qrySub order by id DESC";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
			}

			//----------------------------------------------------------------------------	
			public function getUserDownload()
			{			
					$recordsArray = array();
					$qry = "SELECT * FROM `user` order by id DESC";
					$recordsArray = $this->executeQuery($qry);
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
						$qrySub .= " where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM `user` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM user";
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

			public function updateUserRecord()
				{	
				
						if($_POST['user_id']!="" || $_POST['user_id']!=" "){
						$today_date = date("Y-m-d H:i:s");
						if($_POST['status']=='1')
							{
								$status='1';
							}else{
								$status='0';
							}

						if($_POST['paid']=='1')
							{
								$paid='1';
							}else{
								$paid='0';
							}
						
						$getuserdetails = $this->getPaidMailStatus($_POST['user_id']);
						$dmm_user_name = $getuserdetails[0]["dmm_company_name"];
						$user_email = $getuserdetails[0]["email"];
						$paidmailstatus = $getuserdetails[0]["paidmail"];

						if($paidmailstatus=='0'){
						if($paid=='1')
							{
								$tmp_paid_status = "paid = '1',";
								$tmp_paid_mail_status = "paidmail = '1',";
								mailForNotifyUserPaid($dmm_user_name,$user_email);
							}
						}elseif($paidmailstatus=='1'){
						if($paid=='1')
							{
								$tmp_paid_status = "";
								$tmp_paid_mail_status = "";
							}elseif($paid=='0'){
								$tmp_paid_status = "paid = '0',";
								$tmp_paid_mail_status = "paidmail = '0',";
							}
						}

						$qry = "update user set
						musician_info = '".DBVarConv($_REQUEST["musician_info"])."',
						admin_musician_info = '".DBVarConv($_REQUEST["admin_musician_info"])."',
						$tmp_paid_status
						$tmp_paid_mail_status
						status = '".$status."',
						modify_date = '".$today_date."'
						where id='".$_POST['user_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}
				}
		
		//----------------------------------------------------------------------------	

			public function getPaidMailStatus($user_id)
			{
			$qry = "SELECT dmm_company_name,email,paidmail FROM user where id = '".$user_id."';";
			$recordsArray = $this->executeQuery($qry);
			return $recordsArray;
			}

		//----------------------------------------------------------------------------	

			public function getSongsUploadedCount($user_id)
			{
			$qry = "SELECT COUNT(*) AS numrows FROM songs where user_id = '".$user_id."';";
			$recordsArray = $this->executeQuery($qry);
			return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------	

			public function getBillboardUploadedCount($user_id)
			{
			$qry = "SELECT COUNT(*) AS numrows FROM billboard where user_id = '".$user_id."';";
			$recordsArray = $this->executeQuery($qry);
			return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------		
}?>