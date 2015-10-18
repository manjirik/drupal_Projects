<script type="text/javascript">

	changeProgressbar('100%','CONVERT YOUR FRIENDS TO BE ELIGIBLE');

 </script>
<script type="text/javascript">
	function send_myentry_message(mess_id,mess_status)
	{
	var notify='<?php echo SEND_NOTIFICATION_EMAIL_WALL;?>';
	if(notify=='false'){
	return false;
	}
	  $(function(){
		$("#loader").show();
	 });
	  $.ajax({
                type: "GET",
				async :false,
                url: "index.php?r=myentries/send_email_notification&mess_id="+mess_id+"&mess_status="+mess_status,

                success: function(data) { 
				 $(function(){
					$("#loader").hide();
				 });
				
                  if(data=='fail')
				  {
					   alert('<?php echo MYENTRY_MAIL_FAIL_MESSASE;?>');
				  }
				  if(data=='email')
				  {
						alert('<?php echo MYENTRY_MAIL_SUCCESS_MESSASE;?>');
				  }
				  if(data=='fb_notification')
				  {
						alert('<?php echo MYENTRY_NOTIFICATION_SUCCESS_MESSAGE;?>');
				  }
					
                    
                }
			});

	}

	function modify_user_entry(entry_id,user_id,location_id,lat,longi, action)
	{
			
			$("#loader").show();
		 
		 var removeVal=$("#removeVal").val();
		 var url_path="index.php?r=myentries/modify_user_entry_data&entry_id="+entry_id+"&user_id="+user_id+"&location_id="+location_id+"&old_latitide="+lat+"&old_longitude="+longi+"&removeVal="+removeVal;
		 
	  $.ajax({
                type: "GET",
				async :false,
                  url: url_path,

                success: function(data) { 
							
                  if(data=='success')
				  {
					
					window.location='index.php?r=gmap/map_view_emerites_city&status=change_'+action;
				  <?php 
					
						/* header("Location: ".SITE_URL."/index.php?r=gmap/map_view_emerites_city&status=modify_entry"); */
					   ?>
				  }
				 
					
                    
                }
			});
	}
	</script>


	<!-- Middle content section -->
            <div class="tabs">
            	<?php 
				$ENtrycnt = count($data['skywardsEntries']);
				$tabarray=Array('First','Second','Third','Fourth','Fifth');
				
				$fields = array('user_id');
				$fb_id=$_SESSION['fb_user_id'];
				$where="fb_id='".$fb_id."'";
				$getresultuser = $this->Myentries->getResults($fields, $table_name='user', $where, $limit=1);
				if(!empty($getresultuser))
				{
					$user_id=$getresultuser[0]->user_id;
					$fields = array('user_entry_id','location_id');
					$where="user_id='".$user_id."'";
					$getresultuesrentry = $this->Myentries->getResults($fields, $table_name='user_entry', $where, $limit='all');
				}
				foreach($getresultuesrentry as $res)
				{
				$array_user_entry_id[]= $res->user_entry_id;
				$array_location_id[]= $res->location_id;
				}
				$cnt_array_user_entry_id=count($array_user_entry_id);
				$_REQUEST['location_id']=($_REQUEST['location_id'])? $_REQUEST['location_id']:$array_location_id[$cnt_array_user_entry_id-1];
				
				$_REQUEST['user_entry_id']=($_REQUEST['user_entry_id'])? $_REQUEST['user_entry_id']:$array_user_entry_id[$cnt_array_user_entry_id-1];
				
				$location_data=$this->Myentries->getLocationData($_REQUEST['location_id']);

					  //check image exists or not
						$city_image_path2 = '';
						if( isset($location_data['city_image2']) && $location_data['city_image2'] != '') 
						{
							$city_image_path2 = SITE_URL . '/city_images/'. $location_data['city_image2']; 
						} 
				
				?>
					<div class="myEntryDashboard">
						<ul>
						
						<?php 
						for($i=0; $i<$ENtrycnt;$i++) { 
						$classdtls='';
						if($_REQUEST['tab']==$i+1) { $classdtls="active"; $temp=$i+1;}
						else if($i+1==$ENtrycnt && $_REQUEST['tab']=='') { $classdtls="active"; if($i<5) {$temp=$i+1;} 
							}
						?>
						<li class="<?php echo $classdtls;?>"><a href="<?php echo SITE_URL?>index.php?r=myentries/show_entries&user_entry_id=<?php echo $array_user_entry_id[$i]; ?>&location_id=<?php echo $array_location_id[$i];?>&tab=<?php echo $i+1;?>">My <?php echo $tabarray[$i];?> Entry</a></li>
						<?php } ?>
						</ul>
						<div class="myEntryCity">
						<div class="desc">
						<h4>Say Hello to<br />
						<?php echo $location_data['city_name'];?><?php if($location_data['country_name']!="") { echo ", ".$location_data['country_name']; }?></h4>
						<span><?php echo $location_data['short_desc'];  ?></span>
						</div>
						<?php if($temp==$ENtrycnt && $temp<4) 
						{

							$fields = array('user_entry_details_id');
							$user_entry_id=$_REQUEST['user_entry_id'];
							$where="user_entry_id='".$user_entry_id."' && acceptance_status !=1";
							$getresult_user_entry_details = $this->Myentries->getResults($fields, $table_name='user_entry_details', $where, $limit='all');

						if(empty($getresult_user_entry_details)) {
						?>
						<div class="btn"><a  href="<?php echo SITE_URL?>index.php?r=gmap/map_view_emerites_city" id="">Create your <?php echo $tabarray[$temp];?> entry</a></div>
						<?php }
							}
						?>
						<?php if($city_image_path2!="") { ?>
						
						<img src="<?php echo $city_image_path2;?>" width="623" height="329" />
						<!--<img src="<?php echo SITE_URL;?>images/myEntry_city_jeddah.jpg" width="623" height="329" />-->
						<?php } else { ?>
						<div class="cityimg"></div>
						<?php }?>
						</div>
					</div>
				
				<?php 
					
					  $cnt=0;
				      $total_ticket=5;  
				      $converted_cnt=0;
					  
					  if(!empty($data['skywardsEntries']))
					  {
				      foreach ($data['skywardsEntries'] as $keyEntry => $entryVal) { 
					  if($keyEntry==$_REQUEST['user_entry_id'])
					  {
					 
					  $cnt++;
					  $location_data=$this->Myentries->getLocationData($entryVal['ticketEntry'][0]->location_id);

					  //check image exists or not
						$city_image_path2 = '';
						if( isset($location_data['city_image2']) && $location_data['city_image2'] != '') 
						{
							$city_image_path2 = SITE_URL . '/city_images/'. $location_data['city_image2']; 
						}
					 
				?>
              
					
					<div class="btm-content-box clearfix dispNo">
					 <div class="convrtFrnds">
                         <h3 class="fL">Convert Your friends into Emirates Skywards Member to qualify.</h3>
                         <span class="fR"><a href="#">Share on your wall</a></span>
                     </div>
					<div style="" class="addFrndBox w460">
                            <ul class="myEntryFrnds">
							<?php 
						  if(!empty($entryVal['ticketEntry']))
						  {
							$chkfrnd=0;
							foreach ($entryVal['ticketEntry'] as $keyMember => $MemberVal) { 
							if(!empty($MemberVal->friend_id))
							{  							    
								 $user_data=$this->fb_common_func->getFriendDetail($this->facebook,$MemberVal->friend_id);
								 $first_name=$user_data['first_name'];
								 $profile_img="https://graph.facebook.com/".$MemberVal->friend_id."/picture?width=53&height=53";
								 $message_status="fb_notification";
								 $message_id=$MemberVal->friend_id;
								 if(!empty($user_data["location"]["name"]))
								  {
									
									  $location= explode(",",$user_data["location"]["name"]);
									  $location=  $location[1];
									   if($location=="United Arab Emirates")
									  {
										$location = "UAE";
									  }
								  }
								  else
									{
									  $location="";
									}

								  if(!empty($user_data["hometown"]["name"]))
								  {
									 $home_town= explode(",",$user_data["hometown"]["name"]);
									  $home_town=  $home_town[1];
									  if($home_town=="United Arab Emirates")
									  {
										$home_town = "UAE";
									  }
									 
								  }
								  else
									{
									  $home_town="";
									}
															   
								   
								   if(!empty($location))
									{
									   $user_location=$location;
										if($user_location=="United Arab Emirates")
										{
											$user_location = "UAE";
										}
									}
									else if(!empty($home_town))
									{
									   $user_location=$home_town;
									   if($user_location=="United Arab Emirates")
										{
											$home_town = "UAE";
										}
									}
									else
									{
									   $user_location="";
									}
						      }
							  else
							{
                               //if(!empty($MemberVal->friend_email))
                               if(!empty($MemberVal->firstname))
                               {
                                  //$email_address=explode('@',$MemberVal->friend_email);
								  //$first_name=substr($email_address[0], 0, 10);
								    $first_name=$MemberVal->firstname;	
								}
								else
								{
								   $first_name="";	 
								}
							   
							  // echo $first_name;
							   $message_status="email";
							   $message_id=$MemberVal->friend_email;
							   $user_location="";
							   $profile_img=BLANK_PROFILE_IMG;
							}

							$mem_status=$this->Myentries->checkskywardsmember($message_id);

							if($mem_status > 0 && $MemberVal->acceptance_status ==1)
							//if($MemberVal->acceptance_status ==1)
							{
                                $mem_type='Member';
								$converted_cnt++;
							}
							else if($mem_status > 0 && $MemberVal->acceptance_status ==0)
							{
								$mem_type='Not Yet Converted';
							}
							else
							{
                               $mem_type='Not Member';
							}
							
							?>
                                <li>
                    				<img src="<?php echo $profile_img;?>"  width="53px" height="53px" />
									<p class="name"><?php echo substr($first_name, 0,10); //$first_name; ?> </p>
                                    <p class="loc"><?php echo $user_location; ?></p>
                                  
									
									<?php if($mem_type == "Not Yet Converted" ||  $mem_type=='Not Member'){
									// || $mem_type == "Not Member"?>
									<div class="changeddest" id="chaneg_friend_<?php echo $chkfrnd;?>"> Change</div>
									<script type="text/javascript">
									$('#chaneg_friend_<?php echo $chkfrnd;?>').on('click', function(){
										<?php
										$removeVal="";
										if(isset($MemberVal->friend_id) && $MemberVal->friend_id!="") {
											$removeVal=$MemberVal->friend_id;
										}
										else if(isset($MemberVal->friend_email) && $MemberVal->friend_email!="") {
											$removeVal=$MemberVal->friend_email;
										}
										?>
										$("#removeVal").val('<?php echo $removeVal; ?>');
									modify_user_entry('<?php echo $entryVal['ticketEntry'][0]->user_entry_id;?>','<?php echo $entryVal['ticketEntry'][0]->user_id;?>','<?php echo $entryVal['ticketEntry'][0]->location_id;?>','<?php echo $location_data['latitude'];?>','<?php echo $location_data['longitude'];?>','friends');
									});
								</script>
									
									<?php }else{ ?>
									<div class="changeddest"><?php echo $mem_type; ?></div>
									<?php } ?>
									
									<?php if($mem_type!='Member'){ ?>
                                    <span class="addEmail w40" onclick="javascript:send_myentry_message('<?php echo $message_id;?>','<?php echo $message_status;?>')">Message</span>
									<?}?>
                                </li>
                               
								<?php $chkfrnd++; }
						  }
						  else
						  {
							  ?>
							  <li>
							  <p>Member Not Found..........</p>
							  </li>
							  <?php
						  }
								?>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
			
			<!--<div class="btm-content-text-wrapper" id="your_location">
				Use the map to <b>select one of more than 121 destination</b> offered by Emirates.
				
				  				 
			</div>-->
			      	<div class="btm-content-rt-container w310 pT0">
			<div class="info w230 pT0"> 
				<p>Your location: <span id="userLocation"> 
				<?php if($_SESSION['fb_user_location']!=""){
					echo $_SESSION['fb_user_location'];
				} else {
					echo $_SESSION['fb_user_hometown'];
				}?></span></p>
				<p style="display: block;" id="user_selected_location">Your Selected destination <br/> <span><?php echo $location_data['city_name'];?><?php if($location_data['country_name']!="") { echo ", ".$location_data['country_name']; }?></span></p>
				<?php if(!empty($getresult_user_entry_details)) { ?>
				<p><strong><a onclick="return false" style="" id="changeDestinationBtn_<?php echo $cnt;?>" href="#">change your destination</a></strong></p>
				<?php } ?>
				<script type="text/javascript">
							      $('#changeDestinationBtn_<?php echo $cnt;?>').on('click', function(){
									modify_user_entry('<?php echo $entryVal['ticketEntry'][0]->user_entry_id;?>','<?php echo $entryVal['ticketEntry'][0]->user_id;?>','<?php echo $entryVal['ticketEntry'][0]->location_id;?>','<?php echo $location_data['latitude'];?>','<?php echo $location_data['longitude'];?>','destination');
								});
				 </script>
			</div>			
            <div class="profile-pic-wrapper"> 
			<?php  $profile_img="https://graph.facebook.com/".$_SESSION['fb_user_id']."/picture?width=67&height=67";
			
			?>
       	    	<img src="<?php echo $profile_img;?>"> 
                <h3>(<?php  echo $_SESSION['fb_user_first_name']; ?>)</h3>
        	</div>
        </div>
				<div class="social_support_users">
			<div style="float:right;">
				
				
				<a style="display:none;" onclick="return false" id="nextBtn" href="#">Next</a>&nbsp;
				
			</div>
		</div>
		
        
        
		

    <!--</div>-->
                
				<?php } 
				}
				
				   
					  $fin_cnt=$total_ticket*$cnt;
					  //if($cnt <= 5 || $converted_cnt <= 5)
					  if($converted_cnt < $fin_cnt )
					  {
						  ?>
						  <script type="text/javascript">
							   $(function(){
								   $("#modify_entry_btn_<?php echo $cnt;?>").show();
							   });
				 						   
							  
						  </script>
						  <?php
					  }
					 /*  if($converted_cnt >= $fin_cnt && $cnt!=$total_ticket)
					  {
				   ?>
				 
				<div class="moreChances">
					<h1>Create another entry and get more chances to win!</h1>
					<h2>Are you ready to select five more friends</h2>
					<h2>and raise your chances of winning? <a href="index.php?r=gmap/map_view_emerites_city">choose a continent</b></h2>
				</div>
				<?
					  } */
				?>
            </div>
			<?php
					  }
				else
				{
					?>
					<div class="myEntries-content-wrapper">
                	  <div class="myEntries-top-content">
					      <p>No Entries Found..........</p>
				   	  </div>
					</div>
					<?php
				}
				?>
            <!-- Middle content section ends -->

<input type="hidden" name="removeVal" id="removeVal" />