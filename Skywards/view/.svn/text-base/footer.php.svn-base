<style>
    .sendButtonWrap span{
        color: #3b5998;
    }
</style>
<?php include_once(BASEPATH.DS."view".DS.'social_support_bar_wrapper.php'); ?>
<div class="ltBox"></div> 

<!-- Footer content ends-->
<div class="footer-wrapper">
                
                <div class="footer-nav-wrapper">
                	<div class="footer-nav-left">
                   	  	<h3>Meet me There</h3>
                        <ul>
                        <!--<li><a href="javascript:void(0);" class="first">Meet me There</a></li>-->
                        <li><a href="javascript:void(0);">Emirates Skywards</a></li>
                       	  	<li><a href="javascript:void(0);" onclick="open_me('n');">Notifications <?php if(isset($this->un_read_notifications) && $this->un_read_notifications > 0){ echo "(". $un_read_notifications.")"; }?> &nbsp;&nbsp;</a></li>
                        	<li><a href="javascript:void(0);">My Entries</a></li>
                        	<li><a href="javascript:void(0);" onclick="open_me('prizes');">Prizes</a></li>
                        	<li><a href="javascript:void(0);" onclick="open_me('faq');">FAQ</a></li>							
                        </ul>
                    </div>
                    <div class="flexslider">
	                    <ul class="slides">
	                    	<?php
							/*echo "<pre>";
							print_r($result);*/
							foreach($result_my_entries as $key=>$values){
								$img_path=$this->Fb_common_func->get_fb_user_pic($values->fb_id);
								//$str ="<span>".ucfirst($values->firstname)."</span>". ucfirst($values->lastname). " is going to ".ucfirst($values->city_name)." on the trip of lietime with ".$values->friend_details.".";
								?>
								<!-- <li> 
									<span class="imgOverlay"></span>
									<span class="img"><img src="<?php echo $img_path; ?>" width="65" height="65"></span>
									<span class="text"><?php echo $str;?></span>
								</li> -->
								<li>
								<span class="imgOverlay"></span>
								<span class="img"><img src="<?php echo $img_path; ?>" width="65" height="65"></span>
								<?php 
								//$img_path=$this->Fb_common_func->get_fb_user_pic($values->fb_id);
								$str = '<span>'.ucfirst($values->firstname).' '. ucfirst($values->lastname).'</span>'.' is going to '.ucfirst($values->city_name).' on the trip of lifetime with '.$values->friend_details;
								echo '<span class="text">'.$str.'</span>';
								$city_image_path = ($values->city_image) ?  'city_images/' . $values->city_image : '';
								?><img src="<?php echo $city_image_path;?>" width="505" height="100" alt="<?php echo ucfirst($values->city_name); ?>" title="<?php echo ucfirst($values->city_name);?>" /> </li>
								<?php } ?>
						</ul>
					</div>
                   						
						
						<!-- <div class="flexslider">
						<ul class="slides">
							<li> 
                            <span class="imgOverlay"></span>
								<span class="img"><img src="images/footer-slider-propic.jpg" width="65" height="65"></span>
					            <span class="text"><span>Gemmalouise Wainwright </span> is going to London on the trip of lifetime with Kristina Green, Natalie Chapman, Shona Cameron, Natasha Khatib and Toni Sword.</span>
								<img src="city_images/Malta.jpg" width="505" height="100" alt="Malta" title="Malta" /> </li>
						<li>   
                        <span class="imgOverlay"></span>                       
						        <span class="img"><img src="images/footer-slider-propic.jpg" width="65" height="65"></span>
									<span class="text"><span>Gemmalouise Wainwright </span> is going to London on the trip of lifetime with Kristina Green, Natalie Chapman, Shona Cameron, Natasha Khatib and Toni Sword.</span>
															
								<img src="city_images/Muscat.jpg" width="505" height="100" alt="Muscat" title="Muscat" />
								</li>
						<li>   
                        <span class="imgOverlay"></span>                         	
								<span class="img"><img src="images/footer-slider-propic.jpg" width="65" height="65"></span>
            <span class="text"><span>Gemmalouise Wainwright </span> is going to London on the trip of lifetime with Kristina Green, Natalie Chapman, Shona Cameron, Natasha Khatib and Toni Sword.</span>
								<img src="city_images/Mumbai.jpg" width="505" height="100" alt="Mumbai" title="Mumbai" /> </li>
                    	
                        </ul>
						 </div> -->
<!--<span class="pics">
                <?php 			 
						if(isset($landing_random_users) && count($landing_random_users) > 0){
							$count=0;
							$str1 = '';
							 foreach($landing_random_users as $key=>$val){
									$img = $val['image'];
									$name = $val['name'];
								echo '<span><img src="'.$img.'" width="32" height="32" alt="'.$name.'" title="'.$name.'" /></span>';
								if($count==0) 
								{
									$str1.=$name.", ";									
								}
								if($count==1) 
								{
									$str1.=$name." & ";
								}
								if($count==2) 
								{
									$str1.=$name;
								}
								if($count==4) break;
								$count++;
							 }
							 
							
						}
				?>
                
            </span>-->
			<!--<p></p>-->
            <!-- <div class="sendButtonWrap">
<div class="fb-send" data-href="http://www.facebook.com/pages/Demo-Emirates-skyward/438038999602449?sk=app_467450859982651" data-font="arial"> </div><p><?php echo "<span>".$str."</span>"." are using Meet me there"; ?> </p></div> -->
            <?php if($str1!="") { ?>
                <div class="sendButtonWrap">
                <?php echo "<span>".$str1."</span>"." are using Meet me there"; ?>
                </div>
            <?php } ?>
						
                   
                    <div class="clearfix"></div>
                </div>
                	 

       
			
 	<!-- popup ends-->

 
                <div class="footer clearfix">
                    <div class="terms">
                        <a onclick="open_me('terms');" href="javascript:void(0);">Terms &amp; Conditions</a> 
                        <a href="javascript:void(0);" onclick="open_me('privacy');">Privacy policy</a>
                    </div>
                    <div class="connect">
                    	<div>Connect with Emirates</div> 
                        <img src="images/facebookicon.gif" width="22" height="22" alt="Facebook" /> 
                        <!-- <img src="images/twittericon.gif" width="22" height="22" alt="Twitter" align="absmiddle"/> --> 
                        <img src="images/googleicon.gif" width="22" height="22" alt="Google" align="absmiddle"/>
               		</div>
                    <div class="copyright">Copyright 2013 Emirates. All rights reserved. </div>
                </div>
            </div>
</div>
<script type="text/javascript">
// Can also be used with 

	$('.flexslider').flexslider({     animation: "slide",
									  controlNav: false,
									  directionNav:false
	}); 

</script>
</body>
</html>