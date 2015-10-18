<!-- Home content -->
<?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>
				<?php if(!empty($status_noti) && $status_noti =="originator")
					{
						?>
								<div class="ltBoxPopup greyBox">
								 <div class="close"></div>
								 <div class="topIcon"></div>
								 <div class="emiratesLogo"><img src="<?php echo SITE_URL; ?>images/emirates-logo.jpg" width="99" height="131" /></div>
							      <div class="desc">
									<h2>Emirates is out <br />with a new offer <br />just for you</h2>
									<p>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim</p>
									<div class="actionButtonBox">
										<span class="actionButton"><span>Tell me more about it</span></span>
										<p>or <a href="#">just close this window</a></p>
									</div>
								</div> 
						      </div>
						<?php
					}
						 else
						 {
							 ?>
							 <!-- popup -->
								 <div class="ltBoxPopup greyBox" id="video_popup">
									<div class="close"></div>
									<div class="videoPlayer"><iframe width="640" height="388" src="http://www.youtube.com/embed/sufttvhHNvw?wmode=transparent" frameborder="0" allowfullscreen></iframe></div>
									<div class="actionButtonBox">
										<span class="actionButton" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_emerites_city');"><span>I'm ready to create my entry</span></span>
										<!--<p>or <a href="#">find out more about it</a></p>-->
									</div>
								</div>
								
							 <?php

						 }
					?>
					<div class="landContWrap">
                        <div class="lftWrap">
                            <div class="topIcon"></div>
                            <div class="desc">
                                <h2 class="padTP85px"><?php echo $toUser->first_name; ?><br />you’re invited</h2>
                                <p class="padTPBT25px"><?php echo $from_user['first_name']; ?> has invited you on the trip of a lifetime to (<?php echo $from_user['city_name']; if(isset($from_user['country_name']) && $from_user['country_name']!=NULL && $from_user['country_name']!="") echo ",".$from_user['country_name']; ?>). Validate your Emirates Skywards membership for the chance to win the ultimate get together with five of your friends.</p>
                                <div class="actionButtonBox">
                                
                                     	<span class="actionButton"><a id="select_your_destination_link" href="javascript:void(0)" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','skywardsmember/invitation');">Accept the invitation</a></span>
								
                                    <br />
                                    <br />									
                                    									
                                </div>
                            </div> 
                        </div>

						<div class="slider-wrapper theme-default">
						<div id="slider" class="nivoSlider">
							<img src="<?php echo SITE_URL; ?>images/image01.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image02.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image03.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image04.jpg" width="810" height="504">
							<img src="<?php echo SITE_URL; ?>images/image05.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image06.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image07.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image08.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image09.jpg" width="810" height="504"> 
							<img src="<?php echo SITE_URL; ?>images/image010.jpg" width="810" height="504">
						</div>
						</div>
                    </div>
					
					
					
<?php 
 //Code added by Sandi P. to show video pou up if not getting facebook data or user not exist in db

 if(isset($got_fb_user_data) && $got_fb_user_data == false){ ?> 
 <script type="text/javascript">
  show_video_popup();
  </script>
 <?php } ?>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
 </script>