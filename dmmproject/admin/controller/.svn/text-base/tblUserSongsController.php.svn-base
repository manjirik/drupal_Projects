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
class tblUserSongsController extends database
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
						$qrySub .= " where user_id = '".$_REQUEST['id']."' and DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT * FROM `songs` $qrySub order by id asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `songs` where user_id = '".$_REQUEST['id']."' order by id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
						break;	
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray;
			}
		//----------------------------------------------------------------------------	
			public function songsViewDetails($song_id)
			{
				$recordsArray = array();
				
				$qry = "SELECT * FROM `songs` where id=".$song_id.";";
				
				$recordsArray = $this->executeQuery($qry);
				
				return $recordsArray;
			}

		//----------------------------------------------------------------------------	

			public function getSongsDateDownload()
			{			
						$frmDateVal = $_REQUEST["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $_REQUEST["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";

					$recordsArray = array();
					$qry = "SELECT * from `songs` $qrySub order by id DESC";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
			}

		//----------------------------------------------------------------------------	
			public function getSongsDownload()
			{			
					$recordsArray = array();
					$qry = "SELECT * FROM `songs` order by id DESC";
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
						$qrySub .= "where user_id = '".$_REQUEST['id']."' and DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM `songs` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM songs where user_id = '".$_REQUEST['id']."'";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------			
			
			public function changeStatus($status,$setCommentId)
			{		
				if($status == 'true'){
				$tmp_status = '1';
				}elseif($status == 'false'){
				$tmp_status = '0';
				}
				$qry = "update songs set status = '".$status."' where id='".$setCommentId."'";					
				$this->simpleQuery($qry);
				return true;
			}
		
		//----------------------------------------------------------------------------			
			
			public function HTMLVarConv($var)
			{									
				return preg_replace("/&amp;([a-zA-Z0-9#]*;)/", "&\\1", htmlspecialchars($var));	
			}
		
		//----------------------------------------------------------------------------			
				
			public function getSong($song_id)
			{									
				$recordsArray = array();
				$qry = "SELECT u.name,s.user_id,s.song_name,s.song_credit,s.file_path,s.metadata,s.reject_reason,s.admin_review,s.hits,s.download_count,s.is_download,s.billboard_image,s.random,s.status FROM user as u,songs as s where u.id = s.user_id and s.id='".$song_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

		//----------------------------------------------------------------------------
			public function getSongTitle($song_id)
			{
				$recordsArray = array();
				
				$qry = "SELECT song_name FROM `songs` where id=".$song_id.";";
				
				$recordsArray = $this->executeQuery($qry);
				
				return $recordsArray[0]["song_name"];
			}

		//----------------------------------------------------------------------------
			public function getNotifyUserEmail($notify_user_id)
			{
				$recordsArray = array();
				
				$qry = "SELECT dmm_company_name, email FROM `user` where id=".$notify_user_id.";";
				
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
				
				//return $recordsArray[0]["email"];
			}

		//----------------------------------------------------------------------------	

			public function updateSongRecord()
				{	
						
						if($_POST['song_id']!="" || $_POST['song_id']!=" "){
						global $newname;
						$today_date = date("Y-m-d H:i:s");

						if($_POST['is_download']=='1')
							{
								$is_download='1';
							}else{
								$is_download='0';
							}

						if($_POST['random']=='1')
							{
								$random='1';
							}else{
								$random='0';
							}

						if($_POST['status']=='1')
							{
								$status='1';
							}else{
								$status='0';
							}

						if($newname==""){
							}else{
							$tmp_billboard = "billboard_image = '".$newname."',";
							}

						//for status check
						$sql1="SELECT status FROM songs where id = '".$_POST['song_id']."'";
						$result1 = mysql_query($sql1);
							while($row1 = mysql_fetch_array($result1))
							{	
								$song_status = $row1['status'];
							}

						if(($song_status == '0' && $_POST['status'] == '1') || ($song_status == '2' && $_POST['status'] == '1'))
						{
							$share_song_id = $_POST['song_id'];
							$sql2="SELECT u.dmm_company_name as dmm_company_name, n.notify_user_id as notify_user_id FROM notify as n, user as u where n.musician_id = '".$_REQUEST['user_id']."' and n.musician_id = u.id";
							$result2 = mysql_query($sql2);
								while($row2 = mysql_fetch_array($result2))
								{	
									$musician_name = $row2['dmm_company_name'];
									$notifyUser = $this->getNotifyUserEmail($row2['notify_user_id']);
									$notifyUserEmail = $notifyUser[0]["email"];
									$notifyUserName = $notifyUser[0]["dmm_company_name"];
									
									if(isset($notifyUserEmail)){
									mailForNotifySongsUpload($musician_name, $notifyUserEmail, $notifyUserName, $share_song_id);
									}
								}
						}

						$qry = "update songs set
						metadata = '".DBVarConv($_REQUEST["metadata"])."',
						reject_reason = '".DBVarConv($_REQUEST["reject_reason"])."',
						admin_review = '".DBVarConv($_REQUEST["admin_review"])."',
						is_download = '".$is_download."',
						$tmp_billboard
						random = '".$random."',
						status = '".$_POST['status']."',
						modify_date = '".$today_date."'
						where id='".$_POST['song_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}
				}
		//----------------------------------------------------------------------------		
}?>