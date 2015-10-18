<?php 
include_once("inc/config.php");
include_once("inc/database.php");

class tblCityController extends database
{
	//----------------------------------------------------------------------------	
	 public function __construct(){
	 parent::__construct();		 
		 $this->tablename = 'location';	 
		 $this->city_id = 'location_id';	
		 $this->short_desc = 'short_desc';	
		 $this->city_name = 'city_name';	
		 $this->city_image = 'city_image';	
		 $this->latitude = 'latitude';	
		 $this->longitude = 'longitude';
		 $this->continent_id = 'continent_id';
		 $this->country_name = 'country_name';
		 $this->status = 'status';	
		 $this->is_emirates_location = 'is_emirates_location';
		 $this->city_image2 = 'city_image2';
		 $this->city_image3 = 'city_image3';
		 $this->city_image4 = 'city_image4';
		 $this->city_image5 = 'city_image5';
	} 	 
	
	public function renderGridHeaders(){
		
		?>
		<tr>
			<td align="center" class="headertable">Sr.No.</td>
            <td align="center" class="headertable">Image</td>
			<td align="center" class="headertable" id="reports"><a href="cityList.php?type=cityname&order=<?php if(isset($_REQUEST['order'])){if($_REQUEST['order'] == 'desc'){
			echo 'asc';}elseif($_REQUEST['order'] == 'asc'){ echo 'desc'; }}else{ echo 'asc'; }?>&sval=Show">Name</a></td>
			<td align="center" class="headertable">Latitude / Longitude</td>
			<td align="center" class="headertable">Description</td>		
			<td align="center" class="headertable">Status</td>										
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
				 
				$id = $tblArr[$i][$this->city_id];
				$city_name = $tblArr[$i][$this->city_name];
				$image = CITY_IMAGES_URL.$this->getStrFrmDb($tblArr[$i][$this->city_image]);
				$desc = stripslashes($tblArr[$i][$this->short_desc]);
				$city_latitude = $tblArr[$i][$this->latitude];
				$city_longitude = $tblArr[$i][$this->longitude];
				
				if($tblArr[$i]["status"] == '0')
				{
					if($trClass != "")
					{
						$trClass .= " ";
					}
					$trClass .= "boldClass";
					$status = "Unpublished";
				}elseif($tblArr[$i]["status"] == '1')
				{
					$status = "Published";
				}
				
				
			?>
				<tr class="<?php echo $trClass; ?>">
					<td align="center"><?php echo $srNo; ?></td>
					<td align="center" id="reports"><img src="<?php echo $image; ?>" width="80" height="80" border="0" /></td>	
					<td align="center" id="reports"><a href="edit_city_details.php?id=<?php echo $id.$tmp_page;?>&flag=edit" style="text-decoration:none;"><?php echo $city_name; ?></a></td>	
					<td align="center" id="reports">Latitude: <?php echo $city_latitude; ?><br />Longitude: <?php echo $city_longitude; ?></td>	<td align="center" id="reports"><?php echo $desc; ?></td>	
					<td align="center"><div class="changeStatus" onClick="change_status(<?php echo $id;?>,'<?php echo $this->tablename; ?>')"><?php echo $status;?></div></td>
											 
                </tr>										
				<?php $srNo++; if($trFlag==1){$trFlag=0;}else{$trFlag=1;}
			} //end of for loop
		
	}
	
		public function getPagging($paramArray)
			{			
			if(count($paramArray)>0)
				{			
					$recordsArray = array();
					$default_where = " WHERE $this->is_emirates_location ='1'";					
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
						$qrySub = " $default_where AND ($this->city_name LIKE '%".$_REQUEST['filter_text']."%' OR $this->short_desc like '%".$_REQUEST['filter_text']."%')";
						$qry = "SELECT * FROM $this->tablename $qrySub order by location_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;

						case "cityname":	
							 $qry = "SELECT * FROM $this->tablename $default_where ORDER BY city_name ".$paramArray["order"]." LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;
						
						case "all":
						$qry = "SELECT * FROM $this->tablename $default_where ORDER BY $this->city_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";						
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
					$default_where = " WHERE $this->is_emirates_location ='1'";		
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
						$qrySub = " $default_where AND ($this->city_name LIKE '%".$_REQUEST['filter_text']."%' OR $this->short_desc like '%".$_REQUEST['filter_text']."%')";
						$qry = "SELECT COUNT(*) AS numrows FROM $this->tablename $qrySub ORDER BY location_id DESC LIMIT ".$paramArray["offset"].", ".$paramArray["rowsPerPage"].";";
						break;

						case "cityname":
							 $qry = "SELECT COUNT(*) AS numrows FROM $this->tablename $default_where";
						break;

						case "all":	
						$qry = "SELECT COUNT(*) AS numrows FROM $this->tablename $default_where";
						break;
					}
					$recordsArray = $this->executeQuery($qry);
				}
				return $recordsArray[0]["numrows"];
			}

	//----------------------------------------------------------------------------	

			public function updateCityRecord($data, $city_id=0)
				{	
				 
				
						$city_name = $this->escape(stripslashes($data["city_name"]));
						$short_desc = $this->escape($data["short_desc"]);
						$city_latitude = $this->escape($data["latitude"]);
						$city_longitude = $this->escape($data["longitude"]);
						$continent_id = $this->escape($data["continent_id"]);
						$country_name = $this->escape(stripslashes($data["country_name"]));
						$city_image = $data["city_image"];
						$city_image2 = $data["city_image2"];
						$city_image3 = $data["city_image3"];
						$city_image4 = $data["city_image4"];
						$city_image5 = $data["city_image5"];
				 
						$today_date = $today = date("Y-m-d H:i:s");
						
						if($city_image==""){
							$filename_image = "";
						}else{
							$filename_image = "$this->city_image = '".$city_image."',";
						}
						
						if($city_image2==""){
							$filename_image2 = "";
						}else{
							$filename_image2 = "$this->city_image2 = '".$city_image2."',";
						}
						if($city_image3==""){
							$filename_image3 = "";
						}else{
							$filename_image3 = "$this->city_image3 = '".$city_image3."',";
						}
						if($city_image4==""){
							$filename_image4 = "";
						}else{
							$filename_image4 = "$this->city_image4 = '".$city_image4."',";
						}
						if($city_image5==""){
							$filename_image5 = "";
						}else{
							$filename_image5 = "$this->city_image5 = '".$city_image5."',";
						}			
						

						if($city_id > 0){
						echo $qry = "update $this->tablename set
						$filename_image $filename_image2 $filename_image3 $filename_image4 $filename_image5
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
					 $qry = "INSERT INTO $this->tablename ($this->city_name,$this->short_desc,$this->latitude,$this->longitude,$this->city_image,$this->continent_id,$this->country_name,$this->status,$this->city_image2,$this->city_image3,$this->city_image4,$this->city_image5) VALUES ('".$city_name."','".$short_desc."','".$city_latitude."','".$city_longitude."','".$city_image."','".$continent_id."','".$country_name."','1','".$city_image2."','".$city_image3."','".$city_image4."','".$city_image5."')";
					 $recordsArray = $this->simpleQuery($qry);
					return $recordsArray;
					}
				}

	//----------------------------------------------------------------------------	
	
			public function getCity($city_id)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM $this->tablename where $this->city_id='".$city_id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------
	
			public function getDetailsById($id, $tableName)
			{									
				$recordsArray = array();
				$qry = "SELECT * FROM ".$tableName." where $this->city_id='".$id."'";
				$recordsArray = $this->executeQuery($qry);
				return $recordsArray;	
			}

	//----------------------------------------------------------------------------
	
			public function updateStatus($city_id, $changeStatus, $tableName)
			{	
				$qry = "update ".$tableName." set
				$this->status = '".$changeStatus."' 						
				where $this->city_id = '".$city_id."'";
				$recordsArray = $this->simpleQuery($qry);
				return $recordsArray;
			}	

	//----------------------------------------------------------------------------	
	
}?>