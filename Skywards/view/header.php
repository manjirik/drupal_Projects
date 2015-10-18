<?php header('Cache-Control: max-age=900'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="en-US" xmlns:fb="https://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta property="og:image" content="<?php echo SITE_URL;?>images/meet_me_there_og_50x50_logo.jpg"/>
<meta property="og:title" content="Meet me there with Emirates Skywards"/>
<meta property="og:url" content="<?php echo APP_LINK ?>"/>
<meta property="og:description" content="Where do you dream of going? Wouldn't it be amazing if you could take your best friends with you? Now you can with Emirates Skywards. You and five friends could soon be jetting off to one of over 130 amazing destinations for the ultimate get together. Don't miss out on this trip of a lifetime. Start your journey now"/>
<meta property="og:site_name" content="Meet me there with Emirates Skywards"/>
<meta property="og:type" content="Application"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Meet me there</title>
<link href="<?php echo SITE_URL;?>css/combine_css.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo SITE_URL;?>css/jquery.ui.core.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo SITE_URL;?>css/jquery.ui.autocomplete.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo SITE_URL;?>css/jquery.ui.base.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo SITE_URL;?>css/jquery.ui.selectable.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo SITE_URL;?>css/jquery-ui.css" rel="stylesheet" type="text/css" media="all">
<!-- slider footer css start -->
<link href="<?php echo SITE_URL;?>css/flexslider.css" rel="stylesheet" type="text/css" media="all">

 <!-- slider footer css end  -->

<script type="text/javascript">
	var FB_PAGE_URL_PERMISSION='<?php echo FB_PAGE_URL_PERMISSION; ?>';
	var PERMISSION_SCOPE='<?php echo PERMISSION_SCOPE; ?>';
	var SITE_URL='<?php echo SITE_URL; ?>';
</script>
<script src="<?php echo SITE_URL;?>js/jquery-1.9.0.js<?php echo CLEAR_CACHE; ?>"></script>
<script src="<?php echo SITE_URL;?>js/jquery.countdown.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.mousewheel.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.jscrollpane.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.bxslider.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/custom.js<?php echo CLEAR_CACHE; ?>" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.tinyscrollbar.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.core.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.widget.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.position.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.menu.js"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.selectmenu.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.ui.autocomplete.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/jquery.vticker.min.js" type="text/javascript" charset="utf-8"></script>
<!-- slider footer js -->
<script src="<?php echo SITE_URL;?>js/jquery.flexslider.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo SITE_URL;?>js/ticker.js" type="text/javascript" charset="utf-8"></script>
<!-- slider footer js code end --->
<?php 
$module = explode('/',$_GET['r']); 
if(isset($module[0]) && $module[0] == 'gmap') { ?>
	
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry"></script>
<script src="<?php echo SITE_URL;?>js/infobox.js<?php echo CLEAR_CACHE; ?>"></script>
<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.tinyscrollbar.min.js"></script>
<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.fancybox.js?v=2.1.4"></script>
	
	<!-- Add Button helper (this is optional) -->	
	<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->	
	<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php echo SITE_URL; ?>js/jquery.fancybox-media.js?v=1.0.5"></script>
<?php } ?>
<script type="text/javascript">
	$(function(){
	    
		$("#loader").hide();
		
	});

 </script>
</head>
<body>
	<div id="fb-root"></div>
	<div id="loader"><div id="overlay" class="overlay"><div class="loader"><img src="<?php echo SITE_URL; ?>images/bx_loader.gif" alt="Loading"></div></div></div>
	<script src="<?php echo FB_JS_URL;?>"></script>
	<!-- <script src="<?php echo SITE_URL;?>js/facebook_all.js<?php echo CLEAR_CACHE; ?>"></script>-->
	<script src="<?php echo SITE_URL;?>js/functions.js<?php echo CLEAR_CACHE; ?>"></script>
	
	<script type="text/javascript"> 
	var blank_prof_img = '<?php echo SITE_URL;?>images/profile-pic.jpg';
	//window.fbAsyncInit = function() {
		
		FB.init({
		    appId  : '<?php echo APP_ID;?>',
		    status : true, // check login status
		    cookie : true, // enable cookies to allow the server to access the session
		    xfbml  : true  // parse XFBML
		  });
		  FB.Canvas.setAutoGrow();
	 
	//}
	var fb_page_tab = '<?php echo FB_PAGE_URL_PERMISSION; ?>';
 
		
		$(function(){
	     		$('#counter').countdown({
			  image: '<?php echo SITE_URL;?>images/digits.png',
			  startTime: '<?php echo $countdata['day']; ?>:<?php echo $countdata['hr']; ?>:<?php echo $countdata['min']; ?>:<?php echo $countdata['sec']; ?>'
			});
		});

   	</script>
	<script src="<?php echo SITE_URL;?>js/facebook_functions.js<?php echo CLEAR_CACHE; ?>"></script>
	<div class="mainWrapper">
		<!-- Header content-->
		<div class="header-wrapper <?php if(isset($padBt35)) { echo $padBt35; } ?>">
			<div class="header clearfix">
				<div class="heading">Meet me there with Emirates Skywards</div>
				<?php 
				if(isset($this->un_read_notifications) && $this->un_read_notifications > 0){?>
					<a href="javascript:void(0);" onclick="open_me('n');">
					<div class="chaticon">
					<img src="images/nb_newMsg.jpg" alt="11" valign="middle" /></div>
					<div class="welcome">
					<?php 
					if($un_read_notifications==1) {
						//echo $un_read_notifications."  New Message";
						if(strlen($this->res_title)<21)
						{
							echo $this->res_title;
						}else {
						echo substr($this->res_title,0,20)." ...";
						} 
					} else {
						echo $un_read_notifications."  New Messages"; }?></div></a><?php 
				}
				elseif(isset($this->read_notifications) && $this->read_notifications > 0){
					?>
					<a href="javascript:void(0);" onclick="open_me('n');">
					<div class="chaticon">
					<img src="images/nb_msg.jpg" alt="11" valign="middle" /></div>
					<div class="welcome">
					<?php 
					if($read_notifications==1) {
						echo $read_notifications."  Message"; 
					} else {
						echo $read_notifications."  Messages"; 
					}?></div></a><?php 
				}
				else{
					?>
					<div class="chaticon">
					<img src="images/nb_msg.jpg" alt="11" valign="middle" /></div>
					<div class="welcome">Welcome
					<?php if(isset($this->user_fb_name) && $this->user_fb_name !=""){ 
					echo ' '.$this->user_fb_name; 
						} ?>!</div><?php 
				}?>
			</div>
			<div class="top clearfix">
				<div class="logo">
					<img src="images/emirates_logo.gif" width="95" height="95" alt="Emirates" />
				</div>
				<div id="progress-bar-wrapper" class="progress-bar-wrapper">
					<h3>YOUR PROGRESS: <span id="progressid">INSTALL THE APP TO BEGIN</span></h3>
					<div class="progress-bar-container">
						<div class="progress-bar-status" style="width:7%;"></div>
						<img src="images/progressbar-arrow.jpg" />
					</div>
					<div class="ticket-entry-link">
                    	<img src="images/progress-bar-icon.png" width="89" height="38" />
<!--<a href="#">Ticket Entry</a>-->
					</div>
				</div>
				<div class="countdowntimer">
					<div class="countdowntimer-inner clearfix">
						<div id="counter"></div>
						<div class="descCount">
							<div>DAYS</div>
							<div>HOURS</div>
							<div>MINUTES</div>
						</div>
					</div>
					<h4>COUNTDOWN TO NEXT DRAW</h4>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- header ends -->