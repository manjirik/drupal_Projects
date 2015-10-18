<div class="tabs">
                <div class="memc-content-wrapper">
                	<div class="memc-content wid545">
                    	<h2>
						<?php if(isset($_GET['status']) && $_GET['status']=='alreadyMember') { ?>
						Thank you for accepting the invitation.
						<?php } else { ?>
						You are one step closer to the ultimate getaway. Thank you for validating your membership.
						<?php } ?>
						</h2>
                        <div class="memc-already-member">
                            
                            <div class="memc-completed-msg">
                            <?php 
                            $fname=($data['FirstName'])? $data['FirstName'] : $_SESSION['fb_user_first_name'];
                            $lname=($data['LastName'])? $data['LastName'] : $_SESSION['fb_user_last_name'];
                            $skywards_member_number=( $_GET['vmn'])? $_GET['vmn'] : $data['Username'];
                            ?>
                            	Name: <?php echo $fname.' '.$lname;?><br />
                                Emirates Skywards Number: <?php echo $skywards_member_number;?><br />
								Member Since: <?php echo $data['member_since']; //DD/MM/YYYY ?>
                          
                            </div>
                            
                            <p>One of the most exciting aspects of being an Emirates Skywards member is that you now have the chance to win your very own trip of a lifetime. Start your journey and choose from over 130 of the world’s most exciting destinations. Invite five of your friends to meet you there. This is the ultimate get together, what are you waiting for?</p>
    						<div class="memc-btn-wrapper-link">
								<?php if(isset($_GET['status']) && $_GET['status']=='alreadyMember') { ?>
								<a href="javascript:void(0);" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','myentries/show_entries');">Check my current Entry Ticket</a>
								<?php } else { ?>
                                <a href="javascript:void(0);" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_emerites_city');">Start you own journey now</a>
								<?php } ?>
                            </div>
							<br />
							<br />
							<?php if(!(isset($_GET['status']) && $_GET['status']=='alreadyMember')) { ?>
							<div class="memc-btn-wrapper-link">
								<a href="javascript:void(0);" id="watch_video_btn">Watch the tutorial to know more</a>
							</div>
							<?php } ?>
   						</div>
                        
                    </div>
             
                    <div class="clearfix"></div>
                  
                </div>
            </div>
			
<div class="ltBoxPopup greyBox" id="video_popup">
									<div class="close"></div>
									<div class="videoPlayer"><iframe width="640" height="388" src="http://www.youtube.com/embed/sufttvhHNvw?wmode=transparent" frameborder="0" allowfullscreen></iframe></div>
									<div class="actionButtonBox">
										<span class="actionButton" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_emerites_city');"><span>I'm ready to create my entry</span></span>
										<!--<p>or <a href="#">find out more about it</a></p>-->
									</div>
								</div>