<?php 
include_once("inc/config.php");
include_once("inc/database.php");

class tblUserController extends database
{
	//----------------------------------------------------------------------------	
	 public function __construct(){
	 parent::__construct();		 
		 $this->tablename = 'user';	 
		 $this->user_id = 'user_id';	
		 $this->firstname = 'firstname';	
		 $this->lastname = 'lastname';	
		 $this->fb_id = 'fb_id';	
		 $this->email = 'email';	
		 $this->current_location = 'current_location';
		 $this->home_town = 'home_town';
		 $this->sky_mem_id = 'sky_mem_id';
		 $this->is_active = 'is_active';	
		 $this->created_date = 'created_date';	
		 $this->updated_date = 'updated_date';	
	} 

	public function renderGridHeaders(){		
		?>
		<tr>
		<td align="center" class="headertable">Sr.No.</td>
        <td align="center" class="headertable" id="reports"><a href="userList.php?type=firstname&order=<?php if(isset($_REQUEST['order'])){if($_REQUEST['order'] == 'desc'){
		echo 'asc';}elseif($_REQUEST['order'] == 'asc'){ echo 'desc'; }}else{ echo 'asc'; }?>&sval=Show">First Name</a></td>
		<td align="center" class="headertable" id="reports"><a href="userList.php?type=lastname&order=<?php if(isset($_REQUEST['order'])){if($_REQUEST['order'] == 'desc'){
		echo 'asc';}elseif($_REQUEST['order'] == 'asc'){ echo 'desc'; }}else{ echo 'asc'; }?>&sval=Show">Last Name</a></td>
		<td align="center" class="headertable">Email</td>
		<td align="center" class="headertable">Current Location</td>	 	
        </tr>
		<?php
		
	}
	
	public function renderGridData($tblArrCount,$tblArr,$offset){
		$srNo = $offset + 1;
		$trFlag=0; $trClass="";$tmp_page = "";
		
		$srNo = $offset + 1;
		$trFlag=0; $trClass="";
		//---------------------------------------------------------------------------
		for($i=0; $i<$tblArrCount; $i++)
		{
		if($trFlag>0){$trClass="";}else{$trClass="bgcolor";} 
		 
		$id = $tblArr[$i][$this->user_id];
		$firstname = $tblArr[$i][$this->firstname];
		$lastname = $tblArr[$i][$this->lastname];
		$email = $tblArr[$i][$this->email];
		$current_location = $tblArr[$i][$this->current_location];
		
		if($tblArr[$i]["is_active"] == '0')
		{
		if($trClass != "")
		{
		$trClass .= " ";
		}
		$trClass .= "boldClass";
		$status = "Unpublished";
		}elseif($tblArr[$i]["is_active"] == '1')
		{
		$status = "Published";
		}		
		
		?>
		<tr class="<?php echo $trClass; ?>">
		<td align="center"><?php echo $srNo; ?></td>
		<td align="center" id="reports"><a href="viewUserDetails.php?id=<?php echo $id.$tmp_page;?>" style="text-decoration:none;"><?php echo $firstname; ?></a></td>	
		<td align="center" id="reports"><?php echo $lastname; ?></td>	
		<td align="center" id="reports"><?php echo $email; ?></td>	
		<td align="center" id="reports"><?php echo $current_location; ?></td>		
		 </tr>										
		 <?php $srNo++; if($trFlag==1){$trFlag=0;}else{$trFlag=1;}
		} //end of for loop
	}
	
	
		public function getPagging($paramArray)
			{			
			if(count($paramArray)>0)
				{			
					$recordsArray = array();		 
					switch ($paramArray['type']) {		
				
						/*case "date":						
						$frmDateVal = $paramArray["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $paramArray["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(admin_post_date , '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(admin_post_date , '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT * FROM $this->tablename $qrySub order by id  asc LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break; */	
							
						case "filter":						
						 $fil = str_replace(" ","%",$_REQUEST['filter_text']);	
							
						if(isset($_REQUEST['search_by']) && $_REQUEST['search_by'] =="skywards_member"){
							$qrySub = " WHERE  $this->sky_mem_id LIKE '%".$_REQUEST['filter_text']."%'";
						}else{							 
							 $qrySub = " WHERE $this->firstname LIKE '%".$_REQUEST['filter_text']."%' OR $this->lastname LIKE '%".$_REQUEST['filter_text']."%' OR CONCAT($this->firstname,$this->lastname) LIKE '%".$fil."%' 
										   OR $this->email LIKE '%".$_REQUEST['filter_text']."%'";
						}
							
						$qry = "SELECT * FROM $this->tablename $qrySub order by user_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
 
						case "all":
						$qry = "SELECT * FROM $this->tablename order by $this->user_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
						/*case "date":						
						$frmDateVal = $paramArray["frmDate"];
						$frmDateValArr = explode("/",$frmDateVal);				

						$toDateVal = $paramArray["toDate"];
						$toDateValArr = explode("/",$toDateVal);
						
						$frmDate = date('Y-m-d', mktime(0, 0, 0, $frmDateValArr[0], $frmDateValArr[1], $frmDateValArr[2]));
						$toDate = date('Y-m-d', mktime(0, 0, 0, $toDateValArr[0], $toDateValArr[1], $toDateValArr[2]));
						$qrySub .= " where DATE_FORMAT(admin_post_date , '%Y-%m-%d') >= '".$frmDate."' and DATE_FORMAT(admin_post_date , '%Y-%m-%d') <= '".$toDate."' ";
						$qry = "SELECT COUNT(*) AS numrows FROM tbl_cityname $qrySub";
						break;*/

						case "filter":	
						$fil = str_replace(" ","%",$_REQUEST['filter_text']);	
							
						if(isset($_REQUEST['search_by']) && $_REQUEST['filter_text'] =="skywards_member"){
							$qrySub = " WHERE  $this->sky_mem_id LIKE '%".$_REQUEST['filter_text']."%'";
						}else{							 
							 $qrySub = " WHERE $this->firstname LIKE '%".$_REQUEST['filter_text']."%' OR $this->lastname LIKE '%".$_REQUEST['filter_text']."%' OR CONCAT($this->firstname,$this->lastname) LIKE '%".$fil."%' 
										   OR $this->email LIKE '%".$_REQUEST['filter_text']."%'";
						}
							
						  
						  $qry = "SELECT COUNT(*) AS numrows FROM $this->tablename $qrySub order by user_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
 
						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM $this->tablename";
						break;
					}
					
					
					
					
					
					
					$recordsArray = $this->executeQuery($qry);
					 
				}
				return $recordsArray[0]["numrows"];
			}

	//----------------------------------------------------------------------------
	
			public function getDetailsById($id, $tableName)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM ".$tableName." where $this->user_id='".$id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------
	
			public function updateStatus($user_id, $changeStatus, $tableName)
			{	
				$qry = "update ".$tableName." set
				$this->is_active = '".$changeStatus."' 						
				where $this->user_id = '".$user_id."'";
				$recordsArray = $this->simpleQuery($qry);
				return $recordsArray;
			}	

	//----------------------------------------------------------------------------	
	
}?>