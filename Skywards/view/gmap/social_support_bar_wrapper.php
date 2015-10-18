<div class="social-toolbar-wrapper">
                <div class="hide-btm-content-btn">
                    <a href="javascript: void(0);">Hide <span class="hide-div-arrow">&#8744;</span></a>
                </div>
                <div class="show-btm-content-btn">
                    <a href="javascript: void(0);">Show <span class="hide-div-arrow">&#8743;</span></a>
                </div>
                <div class="btm-content-box clearfix" id="btm_contentBox">
					<div id="destinationImgBox">
						<div class="btn-wrapper" id="btn_select_destination">
							<a href="#" id="SelectThisDestinationBtn" onclick="return false" title="Select This Destination">Select this destination</a>
						</div>
						<a class="send-email-btn" href="javascript: void(0);">Send email</a>
						<div class="send-email-popup">  
								
                            <form action="" method="post" onsubmit="return false;">
                                <input type="text" name="fname" value="First Name" class="send-email-field" />
                                <input type="text" name="lname" value="Last Name" class="send-email-field" />
                                <div class="clearfix"></div>
                                <input type="text" name="email" value="Email Address" class="send-email-field" />
                                <input type="button" name="send-email" value="Send Email" class="send-email-submit-btn" onclick="validateSendEmail();"  />
                            </form>
                        </div> 
						
						<div class="facebook_like_wrapper">
                        	<div class="fb-like" data-href="https://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_467450859982651" data-send="true" data-width="450" data-show-faces="false" style="margin-bottom:10px;"></div>
							<?php foreach($fbfriendImg as $res) { 
                                $img = "https://graph.facebook.com/$res/picture?type=small";							
                            ?>							
                                    <img src="<?php echo $img; ?>" alt="" height="35px" width="35px" style="margin-right:10px;" />              							
                            <?php
                            }
                            ?>
						</div>
						<div class="destination-thumb">
							<img src="images/destination-thumb.jpg" width="281" height="145" alt="Are you already a Skyward member?" /> 
						</div>
					</div>
					<div class="social_support_users">
						<div id="btn_next_step" class="btn-wrapper">
							<a href="#" id="nextBtn" onclick="return false">Next</a>
						</div>
					</div>
                </div>
				
				
</div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=<?php echo APP_ID;?>";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>