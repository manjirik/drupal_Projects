<?php 
	$show_dest_button = false;
	$show_landing_random_users = true;
	$show_user_location = false;
	$sel_dest_text = false;	
	$show_up_down_arrow = false;	
	$done_entry_ticket_text="Done, create my first Entry Ticket";
	
	if (isset($_REQUEST['r'])){
		$req = $_REQUEST['r'];		 
		if ($req == 'landing/index' || $req == 'gmap/map_view_emerites_city' || $req == 'gmap/index' || $req=='myentries' || $req=='myentries/show_entries'){
			$show_landing_random_users = true;
		} else if ($req == 'gmap/map_view_emerites_city'){
			$show_dest_button = true;
		} 
		
		if ($req == 'gmap/map_view_emerites_city' || $req == 'gmap/index'){
			$sel_dest_text = true;		
			$show_user_location = true;
			$show_up_down_arrow = true;
		}
		
	}else{
		$show_landing_random_users = true;
	}
	
	$btm_content_box=false;
	if(isset($_GET['r']) && $_GET['r']!="") $btm_content_box=true;
?>
<div class="social-toolbar-wrapper">
    <?php if($show_up_down_arrow == true){ ?>
		<div class="hide-btm-content-btn dispNo">
			<a href="javascript: void(0);">Move Down <span class="hide-div-arrow">&#8744;</span></a>
		</div>
		<div class="show-btm-content-btn dispNo">
			<a href="javascript: void(0);">Move Up <span class="hide-div-arrow">&#8743;</span></a>
		</div>
	<?php } ?>
	<?php
	if($btm_content_box) { ?>
	<?php if ($req == 'myentries/show_entries')  { ?>
	<div class="">
	<?php } else { ?>
	<div class="btm-content-box clearfix">
	<?php } ?>
		<div class="addFrndBox" style="display:none;">
			<ul>
				<?php for($i=1; $i<=5; $i++) { ?>
				<li id="addFrndBox<?php echo $i; ?>">
					<span class="pic">
						<span class="rdBdr"></span>
					</span>
					<span class="selFrnd">Select friend from map</span>
					<span class="addEmail" id="addEmail_<?php echo $i; ?>">Add by</a>
					<input type="hidden" name="fbidBar<?php echo $i; ?>" id="fbidBar<?php echo $i; ?>" value="" />
				</li>
				<?php } ?>
			</ul>
		</div>
	
	<?php
	//if ($show_dest_button == true){ ?>
		 <div class="btn-wrapper" id="btn_select_friends" style="display: none;">
            <a href="javascript: void(0);" title="Now select five of your friends">Now select five of your friends</a>
        </div>
 
	<?php //}  
		if ($sel_dest_text == true){ ?>	 
			
			<!--<div class="btm-content-text-wrapper" id="your_location">
				Use the map to <b>select one of more than <?php if(isset($location_cnt)){ echo $location_cnt; } ?> destination</b> offered by Emirates.
				
				  <?php 			 
						/*if(isset($landing_random_users) && count($landing_random_users) > 0){
							echo '<ul class="friends-pic">';
							 foreach($landing_random_users as $key=>$val){
									$img = $val['image'];
									$name = $val['name'];
								echo '<li><img src="'.$img.'" width="32" height="32" alt="'.$name.'" title="'.$name.'" /></li>';
							 }
							echo '</ul>';
						}*/
				?>
				 
			</div>-->
	<?php }   ?>
		<?php if ($show_user_location == true) { 
		 //$fb_user_data = BaseController::getFBUserData();
		 $id = $fb_user_info['id'];
		 $name = $fb_user_info['first_name'];
		 $pic="https://graph.facebook.com/".$id."/picture?type=square";
		 //$pic = Fb_common_func::get_fb_user_pic($id);
		 $location = $userCity;
		 
		 
		?>
      	<div class="btm-content-rt-container">
		
		<div class="btn-wrapper" id="nextBtn" style="display: none;">
            <a href="javascript: void(0);" title="<?php echo $done_entry_ticket_text; ?>"><?php echo $done_entry_ticket_text; ?></a>
        </div>
        	<div class="info"> 
				<p>Your location: <span id="userLocation"> <?php echo $location; ?></span></p>
				<p id="user_selected_location" style="display: none;"> Selected destination: <span > <?php echo $location; ?></span></p>
				<p><a href="#" id="changeDestinationBtn" style="display:none;" onclick="return false">change your destination</a></p>
				<!--<p><a class="btm-content-send-email-wrapper"  id="EmailLink" style="display:none;" href="javascript: void(0); ">Send Email</a></p>-->
			</div>			
            <div class="profile-pic-wrapper">
       	    	<img src="<?php echo $pic; ?>" /> 
                <h3>(<?echo $name;?>)</h3>
        	</div>
        </div>
		<?php } ?>
		<div class="social_support_users">
			<div style="float:right;">
				
				
				<a href="#" id="nextBtn" onclick="return false" style="display:none;">Next</a>&nbsp;
				
			</div>
		</div>
		
        
        
		

    </div>
	<?php } ?>
			<?php if ($show_landing_random_users == true) { ?>
		<div class="facebook_like_wrapper" id="facebook_like_wrapper">
		
        	
            <!--<span class="pics">
                <?php 			 
						if(isset($landing_random_users) && count($landing_random_users) > 0){
							$count=0;
							$str = '';
							 foreach($landing_random_users as $key=>$val){
									$img = $val['image'];
									$name = $val['name'];
								echo '<span><img src="'.$img.'" width="32" height="32" alt="'.$name.'" title="'.$name.'" /></span>';
								if($count==0) 
								{
									$str.=$name." , ";									
								}
								if($count==1) 
								{
									$str.=$name." & ";
								}
								if($count==2) 
								{
									$str.=$name;
								}
								if($count==4) break;
								$count++;
							 }
							 
							
						}
				?>
                
            </span>-->
			<!--<p><?php echo "<span>".$str."</span>"." are using Meet me there"; ?></p>-->
			<div id="friends_same_dest" class="facebook_like_wrapper" style="display: none;"></div>
			<div class="fb-like fbLike fL" data-href="<?php echo FB_PAGE_URL_PERMISSION; ?>" data-send="false" data-width="679" data-show-faces="true"></div>
			<div class="fb-send fbLike fR" data-href="<?php echo APP_LINK; ?>" data-font="arial"> </div>
			<div class="clearfix"></div>
        </div>
		
		 
		<?php } ?>
	<!--<div class="fb-like fbLike" data-href="<?php echo FB_PAGE_URL_PERMISSION; ?>" data-send="true" data-width="450" data-show-faces="false"></div>-->
</div>

<div class="send-email-popup ltBoxPopup">  
	<div class="close"></div>
	
	 <div class="topIcon"><img src="<?php echo SITE_URL; ?>images/popup-icon05.jpg" width="71" height="71"></div>
                <div class="desc">
                 <h2>Add a friend by email</h2>
                    
					<div class="formElements">
						<form action="" method="post" onsubmit="return false;">
							<div class="elementBox">
							<p>First Name</p>
							<input type="text" name="fname" class="send-email-field" />
							</div>
							
							<div class="elementBox">
							<p>Last Name</p>
							<input type="text" name="lname" class="send-email-field" />
							</div>
							
							<div class="elementBox">
							<p>Email</p>							
							<input type="text" name="email" class="send-email-field" />
							</div>
							
							
						</form>
					</div>
                    <div class="actionButtonBox">
						<div class="send-email-helper fL">Please enter a 13-digit Skywards number</div>
						<input type="hidden" name="EmailIndex" id="EmailIndex" value="" />
						<span class="actionButton sendEmail"><a href="javascript:void(0);" onclick="validateSendEmail();">Submit</a></span>
					</div>
                </div>
				
			
</div> 
	
	<div class="ltBoxPopup destSelectPopup" id="friends_popup">
			<div class="desc">
					 <div class="actionButtonBox">
					<div class="formHolder">
						<div id="addFrndBox123"></div>  <!-- Get selected FB user list-->
					</div>
				  </div>
                   <div class="actionButtonBox">
					<div class="formHolder">
						<select id="allfriends" name="allfriends" class="selectComman">
						<option value="">Select</option>
						<?php 
						$fbfriends=$_SESSION['fb_user_friends'];
						$temp=explode('#',$fbfriends);
						for($i=0;$i<count($temp);$i++) {
							$temp1=explode(',',$temp[$i]);
							$img = $this->Fb_common_func->get_fb_user_pic($temp1[0]);
							$getval = $temp1[0].'#'.$temp1[1].'#'.$img;
							
						?>
							<option value="<?php echo $getval; ?>"><?php echo $temp1[1]; ?></option>
						<?php } ?>
						</select>
			 		</div>
						<!--<span id="addbyEmail">Add by Email</a>-->
						
				<div  id="changedFrndbtn"><input type="button" name="changedFrnd" id="changedFrnd" value="Change"></div>
			    </div>
			
					<div class="formElements" id="addemailBox" style="display:none;">
						<form action="" method="post" onsubmit="return false;">
							<div class="elementBox">
							<p>First Name</p>
							<input type="text" name="fname" value="First Name" class="send-email-field" />
							</div>
							
							<div class="elementBox">
							<p>Last Name</p>
							<input type="text" name="lname" value="Last Name" class="send-email-field" />
							</div>
							
							<div class="elementBox">
							<p>Email</p>							
							<input type="text" name="email" value="Email Address" class="send-email-field" />
							</div>
							
							<div class="send-email-helper">• Please enter a 13-digit Skywards number</div>
						</form>
					</div>
					
					
				<div id="changedemailbtn"><input type="button" name="changedFrnd" id="changedFrnd" value="Send"></div>
				<!--<div id="cancelemailbtn"><input type="button" name="cancelbtn" id="cancelbtn" value="Cancel"></div>-->
				<div><input type="hidden" name="fname" id="fname" value=""></div>
				<div><input type="hidden" name="lname" id="lname" value=""></div>
				<div><input type="hidden" name="email" id="email" value=""></div>
				<div><input type="hidden" name="selectedfriend" id="selectedfriend" value=""></div>
				<div><input type="hidden" name="allfriends" id="allfriends" value=""></div>
				
			 </div>
	
	</div>
	
	<script>
	$("#cancelbtn").click(function(){
		$('#addemailBox').hide();
		$('#changedemailbtn').hide();
		$('#changedFrndbtn').show();
		 document.getElementById("allfriends").selectedIndex = 0;
	}); 
	
	$("#addbyEmail").click(function(){
		$('#addemailBox').show();
		$('#changedemailbtn').show();
		$('#cancelemailbtn').show();
		$('#changedFrndbtn').hide();
		 document.getElementById("allfriends").selectedIndex = 0;
	}); 
	$("#changedFrnd").click(function(){
	
		$('#changedemailbtn').hide();
		$('#cancelemailbtn').hide();
	 	var selectedfriend = $("#selectedfriend").val();
		var allfriends =  $("#allfriends").val();
		
		
		
		
		if(selectedfriend=="")
		{
			alert("Please select Which user you want to replace.");
			return false;
		}
		if(allfriends=="")
		{
			alert("Please select friend");
			return false;
		}
		//ChooseFriend('<?php echo $Fbval['friend_id']; ?>','<?php echo $first_name; ?>','<?php echo $Fbval['profile_img']; ?>','<?php echo $Fbval['friend_email'];?>','','<?php echo $acceptance_status; ?>','');
		
		
		var selectedfriend1 = selectedfriend.split("#"); 
		var allfriends1 =allfriends.split("#"); 
		
		
			ChooseFriend(selectedfriend1[0],selectedfriend1[1],'','','change','',selectedfriend1[1]);
			finalselectedFrnds = removeByValue(finalselectedFrnds, selectedfriend);
			var newfriendAdd =allfriends1[1].split(" "); 
			var finalfriend = allfriends1[0]+"#"+newfriendAdd[0]+"#"+newfriendAdd[1];
			//alert('selectedfriend1=>'+selectedfriend1);
			//alert('allfriends1=>'+allfriends1);
		
			finalselectedFrnds.push(finalfriend);
			ChooseFriend(allfriends1[0],allfriends1[1],allfriends1[2],'','','',allfriends1[1]);
			
			
		/* if(selectedfriend1[0]!="") {
		
			ChooseFriend(selectedfriend1[0],selectedfriend1[1],'','','change','',selectedfriend1[1]);
			finalselectedFrnds = removeByValue(finalselectedFrnds, selectedfriend);
			var newfriendAdd =allfriends1[1].split(" "); 
			var finalfriend = allfriends1[0]+"#"+newfriendAdd[0]+"#"+newfriendAdd[1];
			
			finalselectedFrnds.push(finalfriend);
			ChooseFriend(allfriends1[0],allfriends1[1],allfriends1[2],'','','',allfriends1[1]);
			
		
		
		}else
		{
			ChooseFriend(selectedfriend1[0],selectedfriend1[1],'','','change','',selectedfriend1[1]);
			finalselectedFrnds = removeByValue(finalselectedFrnds, selectedfriend);
	
			var fname = $("#fname").val();
			var lname = $("#lname").val();
			var email = $("#email").val();
			var finalfriend = email+"#"+fname+"#"+lname; 
			finalselectedFrnds.push(finalfriend);
			ChooseFriend('',fname,'','','','',email);
		} */
		
		
		
		
		$('#friends_popup').hide();
		$('.ltBox').hide();
	
	});
	
	</script>
