<?php 
include_once "inc/database.php";
function DBVarConv($var,$isEncoded = false)
		{
		if($isEncoded)
		return addslashes(htmlentities($var, ENT_QUOTES, 'UTF-8', false));
		else
		return htmlentities ($var, ENT_QUOTES, 'UTF-8', false);
		}
class tblCommentController extends database
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
						$qry = "SELECT * FROM `comments` $qrySub order by id asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `comments` order by id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
						break;	
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray;
			}
		//----------------------------------------------------------------------------	
			public function commentsViewDetails($comment_id)
			{
				$recordsArray = array();
				
				$qry = "SELECT * FROM `comments` where id=".$comment_id.";";
				
				$recordsArray = $this->executeQuery($qry);
				
				return $recordsArray;
			}

		//----------------------------------------------------------------------------	

			public function getCommentsDateDownload()
			{			
						$frmDateVal = $_REQUEST["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $_REQUEST["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(create_date, '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(create_date, '%Y-%m-%d') <= '".$toDate."' ";

					$recordsArray = array();
					$qry = "SELECT * from `comments` $qrySub order by id DESC";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
			}

			//----------------------------------------------------------------------------	
			public function getCommentsDownload()
			{			
					$recordsArray = array();
					$qry = "SELECT * FROM `comments` order by id DESC";
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
						$qry = "SELECT COUNT(*) AS numrows FROM `comments` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM comments";
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
				$qry = "update comments set status = '".$status."' where id='".$setCommentId."'";					
				$this->simpleQuery($qry);
				return true;
			}
		
		//----------------------------------------------------------------------------			
			
			public function HTMLVarConv($var)
			{									
				return preg_replace("/&amp;([a-zA-Z0-9#]*;)/", "&\\1", htmlspecialchars($var));	
			}
		
		//----------------------------------------------------------------------------			
				
			public function getComment($comment_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM comments where id='".$comment_id."'";
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

			public function updateCommentRecord()
				{	
				
						if($_POST['comment_id']!="" || $_POST['comment_id']!=" "){
						$today_date = date("Y-m-d H:i:s");
						if($_POST['status']=='1')
							{
								$status='1';
							}else{
								$status='0';
							}

						$qry = "update comments set
						comment = '".DBVarConv($_REQUEST["comment"])."',
						status = '".$status."',
						modify_date = '".$today_date."'
						where id='".$_POST['comment_id']."'";
						$recordsArray = $this->executeQuery($qry);
						return $recordsArray;
					}
				}
		//----------------------------------------------------------------------------		



}?>