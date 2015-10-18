<?php include("inc/config.php"); 
	include("inc/chkSession.php");
	include_once("controller/tblCityController.php");	
	$tblpageObj = new tblCityController();
	$flag = "";
	if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='add')
	{
	$flag_status = "Add";
	}elseif(isset($_REQUEST['flag']) && $_REQUEST['flag']=='edit'){
	$flag_status = "Edit";
	}
	?>
 <?php require_once("header.php");?>
		<script type="text/javascript">
		var fileExtArray = ['jpg', 'jpeg', 'gif', 'png'];	
		
				function isValidFile(fileName)
		{		
			var i=fileName.length;
			i=i-1;
			var revFilename = "";
			
			for (var x = i; x >=0; x--)
			{
				revFilename = revFilename + fileName.charAt(x);
			}
					
			var fileNameArr = revFilename.split(".");
			
			var revFileExt = fileNameArr[0];
			var fileExt = "";
			
			i=revFileExt.length;
			i=i-1;
			var ext = "";
			
			for (var x = i; x >=0; x--)
			{
				fileExt = fileExt + revFileExt.charAt(x);
			}
			
			return fileExtArray.in_array(fileExt);
		}
		Array.prototype.in_array = function(p_val) {
			for(var i = 0, l = this.length; i < l; i++) {
				if(this[i] == p_val) {
					return true;
				}
			}
			return false;
		}
		
		
		 function trim(s){ 
		   if(s != null) 
			 return s.replace(/^\s+/,'').replace(/\s+$/,'') ; 
		}
		
		function maxtitle(txt,maxlength)
		{
		  if(txt.value.length > (maxlength-1))
			{
			  txt.value = txt.value.slice(0,maxlength-1);
			  return false;
			}
		}

		function formValidate()
		{	
			var err = 0;
			var city_name = $.trim($("#city_name").val());
			var short_desc = $.trim($("#short_desc").val());
			var latitude = $.trim($("#latitude").val());
			var longitude = $.trim($("#longitude").val());
			var file_image_val = $.trim($("#file_image").val());
			var city_id = $.trim($("#id").val());
			var nameRegExPattern= /^([a-zA-Z0-9-.' ])+$/;
			var country_name = $.trim($("#country_name").val());
			var continent_id = $.trim($("#continent_id").val());
	
 		 
			var re = /\s*((\s*\S+)*)\s*/;
			/*if ($.trim($('.nicEdit-main').html().replace('<br>', '')) == "")
			{
				alert("Please Enter Description.");
				$('.nicEdit-main').focus();
				return false;
			}*/
			
			if (city_name == "")
			{
				alert("Please Enter City Name.");
				document.getElementById('city_name').focus();
				return false;
			}
			
			/*if(!nameRegExPattern.test(city_name)){
				alert("Please Enter valid City Name.");
				document.getElementById('city_name').focus();
				return false;
			}*/
			
			if (latitude == "")
			{
				alert("Please Enter latitude.");
				document.getElementById('latitude').focus();
				return false;
			}
			
			/*if(!nameRegExPattern.test(latitude)){
				alert("Please Enter valid City Latitude.");
				document.getElementById('latitude').focus();
				return false;
			}*/
			
			if (longitude == "")
			{
				alert("Please Enter longitude.");
				document.getElementById('longitude').focus();
				return false;
			}
			
			if(!nameRegExPattern.test(longitude)){
				alert("Please Enter valid City Longitude.");
				document.getElementById('longitude').focus();
				return false;
			}
			
			if (country_name == "")
			{
				alert("Please Enter Country Name.");
				document.getElementById('country_name').focus();
				return false;
			}
			
			if (continent_id == "")
			{
				alert("Please Select Continent.");
				document.getElementById('continent_id').focus();
				return false;
			}
				
		 if(city_id == 0){	
			
			if (file_image_val == "")
				{
				alert("Please choose image to upload.");	
				$("#file_image").focus();							
					return false;
				}else{
				if(isValidFile(file_image_val)==false) 
						{
							alert("Image can contain only .jpg .gif or .png files");
							$("#file_image").focus();												
							return false;	
						}
				}				
				
			 }else {
				if(isValidFile(file_image_val)==false && file_image_val != "" ) 
				{
					alert("Image can contain only .jpg .gif or .png files");
							$("#file_image").focus();												
							return false;	
				}
				
			 } 
			 
			 for(var i=2;i<=5;i++){
				var curr_img_val = $.trim($("#file_image"+i).val());				 
				if(isValidFile(curr_img_val)==false && curr_img_val != "" ) 
				{
					alert("Image "+i+" can contain only .jpg .gif or .png files");
					$("#file_image"+i).val('');
					$("#file_image"+i).focus();												
					return false;	
				}
			 }
			
			 
					 
			if (short_desc == "")
			{
				alert("Please Enter City Description.");
				document.getElementById('short_desc').focus();
				return false;
			}
			/*
			if(!nameRegExPattern.test(short_desc)){
				alert("Please Enter valid City Description.");
				document.getElementById('short_desc').focus();
				return false;
			}
			*/
				

			
			
			//for(var i=0;i<niceEdit.nicInstances.length;i++){niceEdit.nicInstances[i].saveContent();}
			document.frm1.action = "cityUpdate.php";    // First target
			document.frm1.submit(); 
		}
		</script>
 
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" class="leftMenu" ><?php include_once(ADMIN_INC_PATH."adminLeftComponent.php"); ?></td>
        <td align="left" valign="top" class="padding rightContent"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="titlepage">City Details</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><!-- <?php include("menu.php"); ?> --></td>
			</tr>
	 
              <tr>
                <td class="titlebox"><?php echo $flag_status;?> City Details</td>
              </tr>
			 <?php
			 
			 function print_error($field){
			 $var  = $field."_error"; 
			 if(is_array($_SESSION) && array_key_exists($var,$_SESSION )){
				if($_SESSION[$var] !="") { echo '<span id="message">'. $_SESSION[$var]. '</span>'; $_SESSION[$var] ="";} 
			 }
			 }
					$max_desc = 500;
					$tmp_image_name = "";
					$tmp_description = "";
					$tmp_language = "";
					$tmp_publish_date ="";
					$city_id = 0;
					$tmp_cityname = "";
					$tmp_latitude = "";
					$tmp_longitude = "";
					$tmp_country_name = "";
					$tmp_continent_id = "";
					if(isset($_REQUEST['id'])){
					$city_id = $_REQUEST['id'];
					$tblAdminArr = $tblpageObj->getCity($city_id);
					$tblAdminArrCount = count($tblAdminArr);
					for($i=0; $i<$tblAdminArrCount; $i++)
						{
							$tmp_description = $tblAdminArr[$i][$tblpageObj->short_desc];
							$tmp_cityname = $tblAdminArr[$i][$tblpageObj->city_name];
							$tmp_latitude = $tblAdminArr[$i][$tblpageObj->latitude];
							$tmp_longitude = $tblAdminArr[$i][$tblpageObj->longitude];
							$tmp_country_name = $tblAdminArr[$i][$tblpageObj->country_name]; 
							$tmp_continent_id = $tblAdminArr[$i][$tblpageObj->continent_id]; 
						}
					}

			 ?>
				<?php 
				if(isset($_REQUEST['page']))
				{
					$page = $_REQUEST['page'];
				}else{
					$page = "";
				}
				?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" id="id" name="id" value="<?php echo $city_id;?>">
				<input type="hidden" id="flag" name="flag" value="<?php echo $_REQUEST['flag'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $page; ?>">

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> City Name:<span id="message"> * </span></div> 
				<div id="output_report">
				<input type="text" id="city_name" name="city_name" value="<?php echo $tmp_cityname;?>" />
				 <?php print_error("city_name"); ?>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> Latitude:<span id="message"> * </span></div> 
				<div id="output_report">
				<input type="text" id="latitude" name="latitude" value="<?php echo $tmp_latitude;?>" />
				 <?php print_error("latitude"); ?>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports"> 
				<div id="title_report"> Longitude:<span id="message"> * </span></div> 
				<div id="output_report">
				<input type="text" id="longitude" name="longitude" value="<?php echo $tmp_longitude;?>" />
				 <?php print_error("longitude"); ?>
				</div>
				</td>
				</tr>
				
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> Destination city:<span id="message"> * </span></div> 
				<div id="output_report"><input type="file" name="file_image" id="file_image" />
				<br /> <span id="message">Only JPG,PNG,GIF are allowed</span>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> My Entries:</div> 
				<div id="output_report"><input type="file" name="file_image2" id="file_image2" />
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> My Story:</div> 
				<div id="output_report"><input type="file" name="file_image3" id="file_image3" />
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> Upload Image 4:</div> 
				<div id="output_report"><input type="file" name="file_image4" id="file_image4" />				
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report"> Upload Image 5:<span id="message"> * </span></div> 
				<div id="output_report"><input type="file" name="file_image5" id="file_image5" />
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Description:<span id="message"> * </span> </div> 
				<div id="output_report">
				<textarea cols="50" rows="5" name="short_desc" id="short_desc" onkeyup="return maxtitle(this,<?php echo $max_desc; ?>);" onblur="return maxtitle(this,<?php echo $max_desc; ?>);" id="description"><?php echo stripslashes($tmp_description);?></textarea>
				</textarea><br />
				<?php print_error("short_desc"); ?>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports"> 
				<div id="title_report"> Country Name:<span id="message"> * </span></div> 
				<div id="output_report">
				<input type="text" id="country_name" name="country_name" value="<?php echo $tmp_country_name;?>" />
				 <?php print_error("country_name"); ?>
				</div>
				</td>
				</tr>
				
				<tr>
				<td class="paddingall" align="left" id="reports"> 
				<div id="title_report"> Continent:<span id="message"> * </span></div> 
				<div id="output_report">
				<select name="continent_id" id="continent_id">
				<option value="">Select</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				</select>
				 <?php print_error("country_name"); ?>
				</div>
				</td>
				</tr>
				        
				<tr>
				<td class="padding">
				<table height="36" cellspacing="0" cellpadding="3" border="0" width="100%">
				<tbody><tr>

				<td width="100%" align='left' id="but_report"><input type='button' onClick="return formValidate();" name='frmsubmit' Value='Save' colspan='3'>&nbsp;&nbsp;<input type="button" name="cmdCancel" id="cmdCancel" value="Cancel" onClick="goBack();" ></td>
				</tr>
				</tbody></table></td>
				</tr>
				</form>
				</table> 
				</td>
				</tr>
			  
            </table>			
			</td>
      </tr>
    </table></td>
  </tr>
<?php require_once("footer.php");?>