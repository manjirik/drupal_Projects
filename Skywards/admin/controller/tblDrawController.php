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
class tblDrawController extends database
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
						$qry = "SELECT * FROM `draw_details` $qrySub order by draw_id  asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM `draw_details` order by draw_id  DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						$qry = "SELECT COUNT(*) AS numrows FROM `draw_details` $qrySub";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM draw_details";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

		//----------------------------------------------------------------------------
		
		public function getAllDrawDetails($current_draw_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM draw_details where draw_id != '".$current_admin_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------	

		public function getDrawDetail($draw_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM draw_details where draw_id='".$draw_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------

		
		public function updateDrawRecord()
				{	
						
						$today_date = $today = date("Y-m-d H:i:s");
						if($_POST['flag']=="edit"){
						
						echo $qry = "update draw_details set
						draw_date = '".$_REQUEST["drawdate"]."'
						where draw_id = '".$_POST['drawid']."'";
						$recordsArray = $this->executeQuery($qry);
						//echo "<pre>";
						//print_r($recordsArray);
						
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
					$qry = "INSERT INTO tb_cms_user (name,email,username,password) VALUES ('".mysql_real_escape_string($_REQUEST["name"])."','".$_REQUEST["email"]."','".mysql_real_escape_string($_REQUEST["username"])."','".md5($_REQUEST["password"])."')";
					$recordsArray = $this->executeQuery($qry);
					return $recordsArray;
					}
				}

	//----------------------------------------------------------------------------	
}
