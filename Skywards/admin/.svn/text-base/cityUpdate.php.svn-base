<?php include("inc/config.php");
	include("inc/chkSession.php");
	include('inc/SimpleImage.php');
	include_once("controller/tblCityController.php");
	$tblpageObj = new tblCityController();
	$tmp_page = "";
	$error = false;
	if(isset($_REQUEST['hPageNum']) && $_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	$goTo = "edit_city_details.php";
	
	//for upload image file
	$dataTimeValue = date("d_m_Y_h_i_s_a");
	
	 if(isset($_POST['city_name'])){
		 $city_name = trim($_POST['city_name']);
		 $short_desc = trim($_POST['short_desc']);
		 $city_image = "";
		 $city_image2 = "";
		 $city_image3 = "";
		 $city_image4 = "";
		 $city_image5 = "";
		 $city_latitude = trim($_POST['latitude']);
		 $city_longitude = trim($_POST['longitude']);
		 $country_name = trim($_POST['country_name']);
		 $continent_id = trim($_POST['continent_id']);
		 $city_id = $_POST['id'];
		 $name_reg = "/^([a-zA-Z0-9-.' ]+)$/";
		 $is_error  = false;
		
		 /*if(!preg_match($name_reg,$city_name)){
				$is_error  = true;
				$_SESSION["city_name_error"] = "Please enter valid city name.";
			}
			
		if(!preg_match($name_reg,$short_desc)){
			$is_error  = true;
			$_SESSION["short_desc_error"] = "Please enter valid city description.";
		}*/
		
		if(!preg_match($name_reg,$city_latitude)){
			$is_error  = true;
			$_SESSION["latitude_error"] = "Please enter valid city latitude.";
		}
		
		if(!preg_match($name_reg,$city_longitude)){
			$is_error  = true;
			$_SESSION["longitude_error"] = "Please enter valid city longitude.";
		}
		
		/*if(!preg_match($name_reg,$country_name)){
			$is_error  = true;
			$_SESSION["country_name_error"] = "Please enter valid country name.";
		}*/
			
			if($is_error == false){
		 
			//uploading article image
			if($_FILES["file_image"]["error"]!=4)
			{	
				$filenameext = pathinfo($_FILES["file_image"]["name"], PATHINFO_EXTENSION);	
				//creating img file name
				$imgName = "city_img_".$dataTimeValue; 
				$imgName_for_db = $imgName.".".$filenameext;				
				$city_image =   $imgName_for_db; 
				
				$fileArray = array("fileObj" =>$_FILES["file_image"], "fileUploadPath"=>UPLOAD_IMAGE_PATH, "imgName"=>$imgName);
				$fileRetValArr = $tblpageObj->fileUpload($fileArray);
				
				if($fileRetValArr[0]==1)
				{
					//file size exceeded that ADMIN_FILE_MAX_UPLOAD_SIZE
					$_SESSION["file_image_error"] = "You can not upload Article Image having size greater than ".ADMIN_FILE_MAX_UPLOAD_SIZE_NAME;
					 $tblpageObj = null;
					 header("location: ".$goTo); die;
				}
				elseif($fileRetValArr[0]==3 || $fileRetValArr[0]==4)
				{
					//file object is empty or error occurred while file upload
					$_SESSION["file_image_error"] = "An error occurred while uploading Article Image file. Please try again.";
					 $tblpageObj = null;
					 header("location: ".$goTo); die;
				}
				/*elseif($fileRetValArr[0]==2)
				{			
					$imgName = $fileRetValArr[1];			
				}*/
			}
			
			//Upload extra images 2 to 5 - start
			echo '<pre>';
			// print_r($_FILES);
			for($i=2;$i<=5;$i++){
				$file_arr = array();	
//echo "sandip-->file_image".$i .'<br />'; 				
				$file_arr = $_FILES["file_image".$i];		
	//			print_r($file_arr);	
		//		echo $file_arr["error"];
				if($file_arr["error"]!=4)
				{	
				 
				 
				 $filenameext = pathinfo($file_arr["name"], PATHINFO_EXTENSION);
				 /*$imgName = "city_img_".$i."_".$dataTimeValue; 
				 
					$imgName_for_db = $imgName.".".$filenameext;	
						
					$city_image_new =   $imgName_for_db; */
					
					 switch($i){
						case 2 :
                                                    $imgName = "city_img_".CITY_IMG_2."_".$dataTimeValue; 
                                                    $imgName_for_db = $imgName.".".$filenameext;
                                                    $city_image_new =   $imgName_for_db; 
                                                    $city_image2 = $city_image_new;
						break;
						case 3 :
                                                    $imgName = "city_img_".CITY_IMG_3."_".$dataTimeValue; 
                                                    $imgName_for_db = $imgName.".".$filenameext;
                                                    $city_image_new =   $imgName_for_db; 
                                                    $city_image3 = $city_image_new;
						break;
						case 4 :
                                                    $imgName = "city_img_".CITY_IMG_4."_".$dataTimeValue; 
                                                    $imgName_for_db = $imgName.".".$filenameext;
                                                    $city_image_new =   $imgName_for_db; 
                                                    $city_image4 = $city_image_new;
						break;
						case 5 :
                                                    $imgName = "city_img_".CITY_IMG_5."_".$dataTimeValue; 
                                                    $imgName_for_db = $imgName.".".$filenameext;
                                                    $city_image_new =   $imgName_for_db; 
                                                    $city_image5 = $city_image_new;
						break;						 
					 }			
					
					$fileArray = array("fileObj" =>$file_arr, "fileUploadPath"=>UPLOAD_IMAGE_PATH, "imgName"=>$imgName);
					$fileRetValArr = $tblpageObj->fileUpload($fileArray);
				  
					if($fileRetValArr[0]==1)
					{
						//file size exceeded that ADMIN_FILE_MAX_UPLOAD_SIZE
						$_SESSION["file_image".$i."_error"] = "You can not upload Article Image having size greater than ".ADMIN_FILE_MAX_UPLOAD_SIZE_NAME;
						 $tblpageObj = null;
						//header("location: ".$goTo); die;
					}
					elseif($fileRetValArr[0]==3 || $fileRetValArr[0]==4)
					{
						//file object is empty or error occurred while file upload
						$_SESSION["file_image".$i."_error"] = "An error occurred while uploading Article Image file. Please try again.";
						 $tblpageObj = null;
						 //header("location: ".$goTo); die;
					}  
					/*elseif($fileRetValArr[0]==2)
					{			
						$imgName = $fileRetValArr[1];			
					}*/
					 
				}
			
			}
		
			//Upload extra images 2 to 5 - ends
			 
		 
			$dataArr = array($tblpageObj->short_desc=> $short_desc,
							 $tblpageObj->city_name=>$city_name,
							 $tblpageObj->city_image=>$city_image,
							 $tblpageObj->latitude=>$city_latitude,
							 $tblpageObj->longitude=>$city_longitude,
  							 $tblpageObj->country_name=>$country_name,
  							 $tblpageObj->continent_id=>$continent_id,
							 $tblpageObj->city_image2=>$city_image2,
							 $tblpageObj->city_image3=>$city_image3,
							 $tblpageObj->city_image4=>$city_image4,
							 $tblpageObj->city_image5=>$city_image5);
							 
			 
			$tblpageObj->updateCityRecord($dataArr,$city_id);
			$goTo = "cityList.php";
			header("location: ".$goTo); die;
			}else{
			$flag = @$_REQUEST['flag'];
			$qstr = '?flag='.$flag;
			$id = @$_REQUEST['id'];
			if(isset($id) && $id> 0){
				$qstr .= '&id='.$id;
			}
			 
			$goTo = "edit_city_details.php".$qstr;
			header("location: ".$goTo); die;
			
			}
			
		}else{
			$flag = @$_REQUEST['flag'];
			$qstr = '?flag='.$flag;
			$id = @$_REQUEST['id'];
			if(isset($id) && $id> 0){
				$qstr .= '&id='.$id;
			}
			 
			$goTo = "edit_city_details.php".$qstr;
			header("location: ".$goTo); die;
		}
		
	 

?>