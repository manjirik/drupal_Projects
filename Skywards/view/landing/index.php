<?php /*
<a href="javascript: void(0);" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view');">Choose Your Destination</a>

<P>
<a href="arc.php" >Draw Arc</a>
</p>

<p><a href="#" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_friends');">Choose Your Friends</a>
<p><a href="#" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_friends2');">Choose Your Friends - Test</a>

<p><a href="#" onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/highlightDestinaiton');">Highlight continent</a>

<?php include('../footer.php'); ?>

*/ ?>
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
						else if(!empty($status_noti) && $status_noti =="friends")
						{ 
                         ?>
								 <!--<div class="landContWrap">
                                    <div class="lftWrap">
                                        <div class="topIcon"><img src="<?php echo SITE_URL; ?>images/popup-icon02.jpg" width="71" height="71" /></div>
                                        <div class="desc">
                                            <h2>Five friends, one<br />amazing destination</h2>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />
                                        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim<br />
                                        veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea<br />
                                        commodo consequat. Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br />
                                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut<br />
                                        aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet,<br />
                                        consectetur adipisicing elit.</p>
                                            <div class="actionButtonBox">
                                                <span id="watch_video_btn" class="actionButton"><span>Watch the introduction video</span></span>
                                                <p>or <a id="select_your_destination_link" href="javascript:void(0)">select your destination</a></p>
                                            </div>
                                        </div> 
                                    </div>
                                        
                                        
                                        
                                    <div class="pinHomeWrap">
                                        <div class="pinHome"><img src="<?php echo SITE_URL; ?>images/home-pin.png" width="323" height="436" /></div>
                                        <div class="thumbWrap">
                                            <div class="thumbBox">
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                                <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>-->
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
                                <h2>Six friends, <br />one amazing <br />destination</h2>
                                <p>You now have a chance to win the trip of a lifetime with Emirates Skywards. Fly yourself and 5 friends to the destination of your choice. Explore the most exciting locations across the globe with over 130 destinations to choose from. 
<span>What are you waiting for? This is the ultimate <br />get together.</span></p>
                                <div class="actionButtonBox">
                                <?php									 
									if(isset($got_fb_user_data) && $got_fb_user_data == false){ ?>
                                    	<span class="actionButton"><a onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_emerites_city');" href="javascript:void(0)" id="select_your_destination_link1" >Start your journey now</a></span>
                                     <?php }else{ ?>
                                     	<span class="actionButton"><a onclick="check_autorized_user('<?php echo FB_PAGE_URL_PERMISSION; ?>','<?php echo PERMISSION_SCOPE; ?>','gmap/map_view_emerites_city');" href="javascript:void(0)" id="select_your_destination_link">Start your journey now</a></span>
									<?php }	?>
                                    <br />
                                    <br />									
                                    <span id="watch_video_btn" class="actionButton"><a>Watch the introduction video</a></span>  
									
                                     
                                    									
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
                            <?php /* ?>
                        <div class="pinHomeWrap">
                            <div class="pinHome"><img src="<?php echo SITE_URL; ?>images/home-pin.png" width="323" height="436" /></div>
                            <div class="thumbWrap">
                                <div class="thumbBox">
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic05.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic06.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic07.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic01.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic02.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic03.jpg" width="32" height="32" /></span>
                                    <span><img src="<?php echo SITE_URL; ?>images/fb-pic04.jpg" width="32" height="32" /></span>
                                </div>
                            </div>
                        </div>
						<?php */ ?>
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