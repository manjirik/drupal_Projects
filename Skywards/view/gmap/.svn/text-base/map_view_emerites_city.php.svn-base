<?php include_once BASEPATH.DS."view".DS."gmap".DS."js_map_view.php"; ?>
<script type="text/javascript">

	changeProgressbar('30%','SELECT YOUR DESTINATION');

 </script>
<div class="tabs">
	 <div class="srchDestWrap">
       	<div class="srchDestination">
        	<input name="" type="text" class="srchFld" id="srchFld" value="Go to destination" />
			<input name="" type="text" class="srchFld" id="srchfriendsinput" style="display:none;" value="Search Friends" />
            <span class="srchIcon"><img id="destSearchIcon" src="images/srch-icon.png" alt="" width="19" height="18" />
			<img id="frndSearchIcon" style="display:none" src="images/srch-icon.png" alt="" width="19" height="18" />
			</span>
        </div>
		<div id="destNotFound" style="display:none;" class="destNotFound">No Matches found</div>
		
       </div> 
	  
	<?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>	
	<div style="clear:both;"> 
	<form method="post" name="UserEntryDetails" id="UserEntryDetails">
	<input type="hidden" name="UsersCurrentCity" id="UsersCurrentCity" value="" />
	<input type="hidden" id="location_id" name="location_id"  />
	<input type="hidden" id="selectedDestionLat" name="selectedDestionLat"  />
	<input type="hidden" id="selectedDestionLong" name="selectedDestionLong"  />
	<input type="hidden" id="preSelectedDestionLat" name="preSelectedDestionLat"  />
	<input type="hidden" id="preSselectedDestionLong" name="preSselectedDestionLong"  />
	<input type="hidden" id="cityName" name="cityName"  />
	<input type="hidden" id="countryName" name="countryName"  />
	<input type="hidden" id="temperature" name="temperature"  />
	<input type="hidden" id="currentSelectedLocation" name="currentSelectedLocation"  />
	
	
	
	
	<input type="hidden" id="CurrentFBID" name="CurrentFBID"  value="<?php echo $CurrentUserID; ?>"/>
	<input type="hidden" name="userEntryId" id="userEntryId" value="" />
	
	<input type="hidden" name="selectedFrnds" id="selectedFrnds" value="" />
	<input type="hidden" name="finalselectedFrnds" id="finalselectedFrnds" value="" />
	</form>
	<input type="hidden" id="lastOpen" name="lastOpen" value="" />
	<input type="hidden" id="lastOpenDest" name="lastOpenDest" value="" />
	<div id="gmap">
	<div id="map_canvas" style="width:100%; height:370px;"></div>
	</div>

	<?php //include('social_support_bar.php'); ?>
	</div>
</div>
<div class="unloctdFrnds" style="display:none;">
<div id="scrollbar1">
		<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>
		<div class="viewport">
			 <div class="overview">
			 <h2 class="h2FriendsFound">0 Friends found</h2>
			<?php /******************* Show All Friends Starts Here*************************/ ?>
			<?php
			
			foreach($friends as $key=>$frnd) { 
			$frndid=$frnd['uid'];
			$uFullNAme=$frnd['first_name']." ".$frnd['last_name'];
			if($frnd['current_location']['city']!="") {
				$city =$frnd['current_location']['city'];
			}else if($frnd['hometown_location']['city']!="" && $frnd['current_location']['city']=="")
			{
				$city =$frnd['hometown_location']['city'];
			}else if($frnd['hometown_location']['city']=="" && $frnd['current_location']['city']=="")
			{
				$city = "";
			}
			$img=$frnd['pic_small'];
			$nameKey=str_replace(" ","",str_replace(".","",str_replace(",","",str_replace("'","",strtolower($uFullNAme)))));
			?>
			<script type="text/javascript">
			allFrndBoxids.push('allFrndBox_<?php echo $nameKey; ?>_<?php echo $frndid; ?>');
			</script>
             <div class="allFrndBox" fid="<?php echo $frndid; ?>" style="display:none;" id="allFrndBox_<?php echo $nameKey; ?>_<?php echo $frndid; ?>" onclick="ChooseFriend('<?php echo $frnd['uid']; ?>','<?php echo $uFullNAme; ?>','<?php echo $img; ?>','','','','<?php echo $uFullNAme; ?>');">
             	<div class="pic">
                	<div class="picRollover"></div>
                    <div class="picSelected"></div>
                	<img src="<?php echo $img; ?>" alt="" width="50" height="50" />              
                </div>
                <div class="info">
                	<span class="name"><?php echo $uFullNAme; ?></span>
                	<span class="name"><?php echo $city; ?></span>
                    <span class="chFrnd">Choose this friend</span>
                    <span class="uncheck" id="checkbox_<?php echo $frnd['uid']; ?>"></span>
                </div>
             </div>  
			 <?php } ?>
			 
			<?php /******************* Show All Friends Ends Here*************************/ ?>
			<?php /* ?>
        	<h2 class="bdrbt pdtop14"><?php echo count($unlocated); ?> unlocated friends</h2>	
            
			<?php foreach($unlocated as $key=>$ufrnd) { 
			$ufrndid=$ufrnd['uid'];
			$uFullNAme=$ufrnd['first_name']." ".$ufrnd['last_name'];
			$img=$ufrnd['pic_small'];
			?>
             <div class="frndBox" id="frndBox_<?php echo $ufrnd['uid']; ?>" onclick="ChooseFriend('<?php echo $ufrnd['uid']; ?>','<?php echo $uFullNAme; ?>','<?php echo $img; ?>','','');">
             	<div class="pic">
                	<div class="picRollover"></div>
                    <div class="picSelected"></div>
                	<img src="<?php echo $img; ?>" alt="" width="50" height="50" />              
                </div>
                <div class="info">
                	<span class="name"><?php echo $uFullNAme; ?></span>
                    <span class="chFrnd">Choose this friend</span>
                    <span class="uncheck" id="checkbox_<?php echo $ufrnd['uid']; ?>"></span>
                </div>
             </div>  
			 <?php } ?>
			 <?php */ ?>
            </div>
		</div>
	</div>
 </div>
 
<?php /*  pop up to select user's city */

 if(!isset($currentUser)) { ?>
	<div class="ltBoxPopup destSelectPopup" id="destSelectPopup">
	 <!--<div class="close"></div>-->
             <div class="topIcon"><img src="<?php echo SITE_URL; ?>images/popup-icon04.jpg" width="71" height="71"></div>
                <div class="desc">
                 <h2>Tell us which city <br />you live in?</h2>
                    <p>Choose from 132 locations Emirates flies to.</p>
                    <div class="actionButtonBox">
					<div class="formHolder">
            <select id="curLocationDropDown" onchange="PlotCurLocation()" name="curLocationDropDown" class="selectComman" >
				<option value="">Select</option>
            <?php foreach($EmiratesCityArray as $ECity) { ?>
					<option value="<?php echo $ECity->location_id."||".$ECity->city_name."||".$ECity->latitude."||".$ECity->longitude; ?>"><?php echo $ECity->city_name; ?></option>
					<?php
					}
					?>
            </select>
				</div>
                  
                 </div>
                </div>
	
	</div>
	
<?php } ?>
<?php //include_once "social_support_bar_wrapper.php"; ?>