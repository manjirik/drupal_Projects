<?php 
include_once("inc/config.php");
include_once("inc/database.php");

class tblUserEntryController extends database
{
	//----------------------------------------------------------------------------	
	 public function __construct(){
	 parent::__construct();		 
		 $this->tablename = 'user_entry';
		 $this->tablename_details = ' user_entry_details';		 
		 $this->user_entry_id = 'user_entry_id';	
		 $this->user_id = 'user_id';	
		 $this->location_id = 'location_id';	
		 $this->vote_count = 'vote_count';	
		 $this->entry_status = 'entry_status';	
		 $this->entry_ticket_number = 'entry_ticket_number';
		 $this->entry_story = 'entry_story';
		 $this->is_featured =  'is_featured';
		 
		 $this->user_entry_details_id = 'user_entry_details_id';
		 $this->user_entry_details_user_entry_id = 'user_entry_id';
		 $this->friend_id = 'friend_id';
		 $this->friend_email = 'friend_email';
		 $this->user_entry_details_entry_status = 'entry_status';
		 $this->acceptance_status = 'acceptance_status';
		 $this->acceptance_status = 'acceptance_status';
		 $this->acceptance_date = 'acceptance_date';
		 $this->user_entry_detailscol = 'user_entry_detailscol';
		 $this->user_entry_detailscol1 = 'user_entry_detailscol1';		 
	} 	 
	
	public function renderGridHeaders(){
		
		?>
		<tr>
			<td align="center" class="headertable">Sr.No.</td>
            <td align="center" class="headertable">FName</td>
			 <td align="center" class="headertable">LName</td>
			 <td align="center" class="headertable">Skywards Member ID</td>
			  <td align="center" class="headertable">Created Date</td>
			<td align="center" class="headertable">Acceptance Date</td>	
			 <td align="center" class="headertable">FirstName</td>
			 <td align="center" class="headertable">LastName</td>
			<td align="center" class="headertable">Winner</td>										
         </tr>
		<?php
		
	}
	
	
	public function renderGridData($tblArrCount,$tblArr,$offset){
		
		 	$srNo = $offset + 1;
			$trFlag=0; $trClass="";$tmp_page = "";
			if(isset($_GET['page']))
			{
				$pageNum = $_GET['page'];
				$tmp_page = "&page=".$pageNum;
			}
								 
			for($i=0; $i<$tblArrCount; $i++)
			{
				if($trFlag>0){$trClass="";}else{$trClass="bgcolor";} 
				 
				$fn = $user_entry_id = $tblArr[$i][$this->firstname];
				$ln = $tblArr[$i][$this->lastname];			 
				$sky_mem_id = $tblArr[$i][$this->sky_mem_id];
				$created_date = $tblArr[$i][$this->created_date];
				$acceptance_date = $tblArr[$i][$this->acceptance_date];
				$firstname = $tblArr[$i][$this->firstname];
				$lastname = $tblArr[$i][$this->lastname];
				
				
				
				
				
			?>
				<tr class="<?php echo $trClass; ?>">
					<td align="center"><?php echo $fn; ?></td>
					<td align="center"><?php echo $ln; ?></td>	
					<td align="center"><?php echo $sky_mem_id; ?></td>		
					<td align="center"><?php echo $created_date; ?></td>	
					<td align="center"><?php echo $acceptance_date; ?></td>
					<td align="center"><?php echo $firstname; ?></td>	
					<td align="center"><?php echo $lastname; ?></td> 	
											 
                </tr>										
				<?php $srNo++; if($trFlag==1){$trFlag=0;}else{$trFlag=1;}
			} //end of for loop
		
	}
	
		public function getPagging($paramArray)
			{			
			if(count($paramArray)>0)
				{			
					$recordsArray = array();
					$qrySub ='';
					$rows_per_page = $paramArray["rowsPerPage"]; 
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
							$order_by = $this->user_entry_id;
							if(isset($_REQUEST['search_by']) && $_REQUEST['search_by'] =="top_stories"){
								$order_by = $this->vote_count;
								$rows_per_page = $_REQUEST['filter_text'];	
							}else{							 
								$qrySub = " WHERE  $this->entry_story LIKE '%".$_REQUEST['filter_text']."%'";
							}						
						
						$qry = "SELECT * FROM $this->tablename $qrySub order by $order_by DESC LIMIT ".$paramArray["offset"].", ".$rows_per_page.";";
						break;

					 
						case "all":
						$qry = "SELECT u.sky_mem_id , l.city_name, u.firstname, u.lastname, ued.friend_details, 	
						ued.acceptance_date, u.created_date 		
						FROM  `user_entry` ue 
						INNER JOIN  `location` l ON l.location_id = ue.location_id
						INNER JOIN (SELECT user_entry_id, acceptance_date,GROUP_CONCAT(concat(' ',firstname,' ',lastname )) AS
						friend_details
						FROM  `user_entry_details` 
						GROUP BY user_entry_id)ued 
						ON ue.`user_entry_id` = ued.`user_entry_id`
						INNER JOIN user u ON u.user_id = ue.user_id
   						order by ue.user_entry_id DESC LIMIT ".$paramArray["offset"].", ".$rows_per_page.";";						
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
					$rows_per_page = $paramArray["rowsPerPage"]; 								
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
							$qrySub = "";					
							$order_by = $this->user_entry_id;
							if(isset($_REQUEST['search_by']) && $_REQUEST['search_by'] =="top_stories"){
								$order_by = $this->vote_count;
								$rows_per_page = $_REQUEST['filter_text'];								 
							}else{							 
								$qrySub = " WHERE  $this->entry_story LIKE '%".$_REQUEST['filter_text']."%'";
							}	
							
						$qry = "SELECT COUNT(*) AS numrows FROM $this->tablename $qrySub order by location_id DESC LIMIT ".$paramArray["offset"].", ".$rows_per_page.";";
						break;

						case "cityname":
							 $qry = "SELECT COUNT(*) AS numrows FROM $this->tablename";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM  user_entry as ue, user as u, user_entry_details as ued ";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

	//----------------------------------------------------------------------------	

			public function updateCityRecord($data, $city_id=0)
				{	
				 
				
						$city_name = $this->escape($data["city_name"]);
						$short_desc = $this->escape($data["short_desc"]);
						$city_latitude = $this->escape($data["latitude"]);
						$city_longitude = $this->escape($data["longitude"]);
						$continent_id = $this->escape($data["continent_id"]);
						$country_name = $this->escape($data["country_name"]);
						$city_image = $data["city_image"];
				 
						$today_date = $today = date("Y-m-d H:i:s");
						
						if($city_image==""){
							$filename_image = "";
							}else{
							$filename_image = "$this->city_image = '".$city_image."',";
							}

						if($city_id > 0){
						$qry = "update $this->tablename set
						$filename_image
						$this->short_desc = '".($short_desc)."',	
						$this->city_name = '".($city_name)."',	
						$this->latitude = '".($city_latitude)."',
						$this->longitude = '".($city_longitude)."',
						$this->continent_id = '".($continent_id)."',
						$this->country_name = '".($country_name)."'	
						where $this->city_id = '".$city_id."'";
						$recordsArray = $this->simpleQuery($qry);
						//print $qry;
					 
						return $recordsArray;
					}elseif($_POST['flag']=="add"){
					 $qry = "INSERT INTO $this->tablename ($this->city_name,$this->short_desc,$this->latitude,$this->longitude,$this->city_image,$this->continent_id,$this->country_name,$this->status) VALUES ('".$city_name."','".$short_desc."','".$city_latitude."','".$city_longitude."','".$city_image."','".$continent_id."','".$country_name."','1')";
					 $recordsArray = $this->simpleQuery($qry);
					return $recordsArray;
					}
				}

	//----------------------------------------------------------------------------	
	
		 
	
			public function getDetailsById($id, $tableName)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM ".$tableName." where $this->user_entry_id='".$id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------
	
			public function updateStatus($user_entry_id, $changeStatus, $tableName)
			{	
				$qry = "update ".$tableName." set
				$this->entry_status = '".$changeStatus."' 						
				where $this->user_entry_id = '".$user_entry_id."'";
				$recordsArray = $this->simpleQuery($qry);
				return $recordsArray;
			}	
			
			
			public function updateFeaturedStatus($user_entry_id, $changeStatus, $tableName)
			{	
				$qry = "update ".$tableName." set
				$this->is_featured = '".$changeStatus."' 						
				where $this->user_entry_id = '".$user_entry_id."'";
				$recordsArray = $this->simpleQuery($qry);
				return $recordsArray;
			}	
			

	//----------------------------------------------------------------------------	
	
			public function getDetailsForWinner($paramArray)
			{									
				$recordsArray = array();
				$qry = "SELECT u.firstname, u.lastname, u.sky_mem_id, ue.created_date, ued.acceptance_date FROM  user_entry as ue, user as u, user_entry_details as ued";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}
	
	
}?>