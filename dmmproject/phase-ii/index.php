<?php
	session_start();
	error_reporting(!E_ALL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 

<?php
if($_REQUEST['musician'] != '' && $_REQUEST['songidm'] != '') {
	$title = 'http://dmmcompany.com/' . $_REQUEST['musician'] . '/' . $_REQUEST['songidm'];
} else {
	$title = 'DMMCompany';
}

include_once 'inc/config.php';
include_once 'controller/tblSongsController.php';
include_once 'controller/tblAddsController.php';
include_once 'controller/tblUserController.php';
include_once 'controller/tblSettingsController.php';

$dbObj = new database();
$conObj = $dbObj->connectDB();

$userObj = new tblUserController($conObj);

$login_status = 0;

/* Check if user is alrady logged in (at the time of last login user select remember me option) */
if( !isset($_SESSION['user_id']) && isset($_COOKIE['DMMID']) && isset($_COOKIE['DMMKEY']) ) {
	$login_status = $userObj->isUserAlreadyLoggedin();
	
	if('musician' == $_SESSION['user_type']) {
		/* Redirect user to zone if user is logged in using remember me option */
		header('location: '. SITE_URL . '/' . $_SESSION['dmm_company_name']);
	}
}

if(isset($_SESSION['user_id'])) {
	$userDetails = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $_SESSION['user_id']) );
	// $userDetails[0] = $_SESSION['user_details'];
	$_SESSION['user_details'] = $userDetails[0];
}

/* $_SERVER['REDIRECT_STATUS'] added to avoid redirect in loop */
/* once redirected REDIRECT_STATUS is set to 200 */
if('listener' == $userDetails[0]['user_type'] && 0 != $userDetails[0]['selected_lifestyle'] && !isset($_SERVER['REDIRECT_STATUS']) ) {

	switch($userDetails[0]['selected_lifestyle']) {
		case '1':
			$type = 'night-life';
			break;

		case '2':
			$type = 'thrillseeker';
			break;

		case '3':
			$type = 'bipolar';
			break;

		case '4':
			$type = 'space-gazer';
			break;

		case '5':
			$type = 'head-banger';
			break;

		case '6':
			$type = 'creative-best';
			break;
	}
	
	/* Redirect user to select lifestyle */
	// header("location: " . SITE_URL . "/lifestyle/{$type}/{$userDetails[0]['selected_lifestyle']}");
}

/* Used to set background color for loader image */
$background_style = 'background: #000000;';
	
$already_visited = 0;
if(isset($_COOKIE['already_visited'])) {
	$already_visited = $_COOKIE['already_visited'];
} else if(0 == $_COOKIE['already_visited']) {	
	$background_style = 'background: #FBFBFB;';
}

if($login_status) {
	$already_visited = 1;
	setcookie('already_visited', '1');
} else if(!$already_visited) {
	setcookie('already_visited', '1');
}

$paramArray = array(
	'table_name' => 'songs',
	'user_id' => $_SESSION['user_id'],
);
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getSongsDetailsByUser($paramArray);

// $paramArray1 = array(
	// 'table_name' => 'advertise',
	// 'user_id' => $_SESSION['user_id'],
// );
// $addsObj = new tblAddsController($conObj);
// $addsDetails = $addsObj->getAddsDetailsStatusByUser($paramArray1);

if($userDetails[0]['zone'] != '') {
	$zoneImage = HOST_URL . '/uploads/user_' . $_SESSION['user_id'] . '/user_zone/' . $userDetails[0]['zone'];
} else {
	$zoneImage = HOST_URL . '/images/avatarzoneImg2.jpg';
}

$settingObj = new tblSettingsController($conObj);
$settingDetails = $settingObj->getSettings();


?>
<html xmlns="http://www.w3.org/1999/xhtml" style="<?php echo $background_style; ?>">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="<?php echo $title; ?>"/>
<meta property="og:type" content="movie"/>
<meta property="og:image" content="http://dmmcompany.com/images/img_dmm.gif"/>
<meta property="og:description" content="Definitive Music Media™"/>

<title><?php echo $title; ?></title>

<link href="<?php echo HOST_URL;?>/css/style.css?time=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/default.css" rel="stylesheet" type="text/css" /> 

<link href="<?php echo HOST_URL;?>/css/fileuploader.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/search/styles.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/jplayer_skin/pink.flag/jplayer.pink.flag.css?time=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo HOST_URL;?>/css/song_settings.css?time=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/jquery.jscrollpane.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/jqtransform.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/jquery-ui.css"  rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/m4PopUpStyles.css"  rel="stylesheet" type="text/css" /> 
<link href="<?php echo HOST_URL;?>/css/advertisement.css" rel="stylesheet" type="text/css" />
<link href="<?php echo HOST_URL;?>/css/lifestyle.css"  rel="stylesheet" type="text/css" /> 

<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->

<link href="<?php echo HOST_URL; ?>" rel="canonical" />

<script type="text/javascript"> var siteURL = "<?php echo HOST_URL; ?>"; </script>
<script type="text/javascript"> var hostURL = "<?php echo HOST_URL; ?>"; </script>

<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery-1.6.1.min.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/css_browser_selector.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.textshadow.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.jqtransform.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.colorbox.js"></script>
<!--<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery-scroller-v1.min.js"></script>-->
<!-- <script type="text/javascript" src="<?php echo HOST_URL;?>/js/event_listeners.js"></script>-->
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.jplayer.min.js"></script>	
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jplayer.playlist.min.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/cycle/jquery.cycle.all.2.74.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/fileuploader.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.highlighttextarea.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery-ui.triggeredAutocomplete.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/common.js?time=<?php echo time(); ?>"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/preloadCssImages.jQuery_v5.js"></script>
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.jscrollpane.js"></script> 
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo SITE_URL;?>/js/player_script.js"></script>


<!-- <script type="text/javascript" src="<?php echo HOST_URL;?>/js/upload.js"></script>	
<script type="text/javascript" src="<?php echo HOST_URL;?>/js/ajaxupload.3.5.js"></script> -->
<!--<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-27198020-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script> -->

<script type="text/javascript">
function pagePreLoader() {
	$('#pagePreload').show();
	already_visited = $.cookie('already_visited');
	if(0 == <?php echo $already_visited; ?>) {
		loadWelcomeScreen();
		$.preloadCssImages();
	}
}	
</script>

</head>

<!-- <body onload="init(); pagePreLoader();" ondragstart="return false;" >	-->
<body onload="init(); pagePreLoader();" >	
	<div style="display: block; <?php echo $background_style; ?>" id="loading" class="loading">
		<div id="load" class="load">
			<img src="<?php echo HOST_URL;?>/images/loader-welcome.gif" />
			<div class="clear pad5"></div>
		</div>
	</div>
	<div style="display: none;" id="nextLoading" class="nextLoading">
		<div id="nextLoad" class="nextLoad">
		   <img src="<?php echo HOST_URL;?>/images/loading.gif" />
		</div>
	</div>
	<script type="text/javascript" src="<?php echo HOST_URL;?>/js/page_loader.js"></script>
	
	<div id="pagePreload">

	<?php 
		include_once 'hits_count.php';
	?>

	<input type="hidden" name="hid_songid" id="hid_songid" value="" />
	<input type="hidden" name="comment_popup_freez" id="comment_popup_freez" value="" />
	<input type="hidden" name="comment_adv_freez" id="comment_adv_freez" value="" />
	<input type="hidden" name="site_root_path" id="site_root_path" value="<?php echo HOST_URL;?>" />
	<input type="hidden" name="musician_name" id="musician_name" value="<?php echo $_REQUEST['musician']; ?>" />
	
	<div id="container">
	<!-- start comment -->
		<div id="commentsDisplay"></div><!--  style='float:right;' -->
	<!-- end comment -->
	
		<span id="StateYourPurpose"></span>
	<div class="commentwrap">
		<!-- Comment Box -->
		<div class="commentbox">
			<div class="commentcontent">
				<!-- Message Box -->
				<?php if($_SESSION['user_id'] != ''){ ?>
					<div class="message"> <a href="javascript:void(0);" onclick="toggleCommentForm('messageToMusician');"><span></span></a> </div>
				<?php } else {  ?>
					<div class="message"> <a href="javascript:void(0);" onclick="userlogincheck('Sorry, you must sign in to leave comments on song and<br />send musicians private messages.');"><span>Message Red Zebra</span></a> </div>
				<?php }?>
					
				<!-- Comment Box -->
				<?php if($_SESSION['user_id'] != ''){ ?>
					<div class="comment"> <a href="javascript:void(0);" onclick="toggleCommentForm('songComment');"><span>Post a comment</span></a> </div>
				<?php } else { ?>
					<div class="comment"> <a href="javascript:void(0);" onclick="userlogincheck('Sorry, you must sign in to leave comments on song and<br />send musicians private messages.');"><span>Post a comment</span></a> </div>
				<?php } ?>
			</div>
		</div>
		<!-- Comment Box Form -->
		<div class="commentboxform" id="commentform" style="display: none;">
			<form name="myForm" id="myForm" class="jqtransformdone">
				<textarea name="message" id="message" value="" cols="" rows="" onkeydown="commentTextCounter(document.myForm.message,document.myForm.remLen2,321)" onkeyup="commentTextCounter(document.myForm.message,document.myForm.remLen2,321)"></textarea>
				<input readonly disabled="disabled" type="text" name="remLen2" id="remLen2" size="3" maxlength="3" value="321" class="lettercount" />
				<input type="hidden" name="hiddenComentType" id="hiddenComentType" value="" />
				<input name="Send" type="button" value="Send" id="btnSend" onclick="submitCommentForm()" />
				<input type="hidden" name="commentSongId" id="commentSongId" value="" />
			</form>
		</div>
		
		<!-- Comment/message box related login alert -->
		<div class="alertbox alertmessagebox" id="alertbox">
			<h2>Oops!</h2>
			<p></p>
			<div class="alertlinks">
				<a href="javascript:void(0);" id="alertBoxRegister" onClick="closeCommentBox(); loadWelcomeScreen();"><span>Create Account</span></a>
				<a href="javascript:void(0);" id="alertBoxSignIn" onClick="closeCommentBox(); loadLoginScreen('user_click');"><span>Sign in</span></a>
			</div>
			<div class="close">
				<a href="javascript:void(0);" onclick="closeCommentBox();"><img src="<?php echo SITE_URL; ?>/images/confirm-close.png" width="21" height="20" border="0" /></a>
			</div>
		</div>
		<!-- Comment/message box related login alert -->
		
		<div class="alertbox alertmessagebox" id="alertbox2">
			<h2>Oops!</h2>
			<p></p>
			<div class="close">
				<a href="javascript:void(0);" onclick="closeAlertBox2()"><img src="<?php echo SITE_URL; ?>/images/confirm-close.png" width="21" height="20" border="0" /></a>
			</div>
		</div>
		
		<!-- message Confirmation Alert -->
		<!-- <div class="confirmbox alertmessagebox" id="confirmbox">
			<h2>Comment added</h2>
			<p>Your comment was added to <strong>You've Got The Touch </strong><br />by Red Zebra.</p>
			<div class="close"><a href="javascript:void(0);" onclick="closeCommentBox()">Close</a></div>
		</div> -->
		<div class="confirmbox alertmessagebox" id="confirmbox">Comment added</div>
		<!-- message Confirmation Alert -->
	 
		<!-- comment confirmation Alert -->
		<!-- <div class="messageconfirm alertmessagebox" id="messageconfirm">
			<h2>Message send</h2>
			<p>Your message was delivered to <strong>Red Zebra</strong> successfully!<br />Be sure to check your junk mail for 	replies.</p>
			<div class="close"><a href="javascript:void(0);" onclick="closeCommentBox()">Close</a></div>
		</div> -->
		<div class="messageconfirm alertmessagebox" id="messageconfirm">Message send</div>
		<!-- comment confirmation Alert -->
		
		<!-- notify related login alert -->
		<div class="notifyactivated alertmessagebox" id="notifyalertbox" style="display:none">
			<h2>Oops!</h2>
			<p>Sorry, you must sign in to activate notify.</p>
			<div class="alertlinks">
				<a href="javascript:void(0);" id="alertBoxRegister" onClick="closeNotifyLoginAlert(); loadWelcomeScreen();"><span>Create Account</span></a>
				<a href="javascript:void(0);" id="alertBoxSignIn" onClick="closeNotifyLoginAlert();  loadLoginScreen('user_click');"><span>Sign in</span></a>
			</div>
			<div class="close"><a href="javascript:void(0);" onclick="notifyAlertClose()">Close</a></div>
		</div>
		<!-- notify related login alert -->
		
		<div class="alertbox alertmessagebox" id="selfnotify">
			<h2>Whoops!</h2>
			<p>You can't track yourself. Use this great feature to track other companies and musicians.</p>
			<div class="close">
				<a href="javascript:void(0);" onclick="closeSelfNotify()"><img src="<?php echo SITE_URL; ?>/images/confirm-close.png" width="21" height="20" border="0" /></a>
			</div>
		</div>
		
		<!-- Notify Activated -->
		<div class="notifyactivated alertmessagebox" id="notifyactivated">
			<h2>Notify Activated</h2>
			<p>You will now be notified when <strong>RedZebra</strong> posts news<br /> music and videos.</p>
			<div class="close"><a href="javascript:void(0);" onclick="notifySubscribeClose()">Close</a></div>
		</div>
		<!-- Notify Activated -->
		
		<!-- Cancel Notify -->
		<div class="notifyactivated alertmessagebox" id="cancelnotify" style="display:none">
			<h2>Cancel Notify</h2>
			<p>You will nolonger be notified when <strong>RedZebra</strong> posts new<br /> music of video. Click the Notify button to revert.</p>
			<div class="close"><a href="javascript:void(0);" onclick="notifyCancelClose()">Close</a></div>
		</div>
		<!-- Cancel Notify -->

	</div>
 
	    <div id="wrapper">
			<div id="main_wrapper" style="display:block;">	
				<div class="homeContent"></div>
			</div> 
			<div id="addDisplay" style="display:none; width:100%; height:100%">
				<?php //include 'adddisplay.php'; ?>
			</div> 
		</div>
		
		<?php include 'player_script.php'; ?>


	<div id="footerWrapper">
		<div id="jp_container_1" class="jp-video jp-video-270p">
		  <div class="jp-type-playlist">
			<div id="jquery_jplayer_1" class="jp-jplayer"></div>
			<?php
				if( $_SESSION['user_id'] != '' && $userDetails[0]['login_counter'] <= $settingDetails[0]['login_counter'] && $userDetails[0]['user_type'] == "musician" && $_COOKIE['SHOWZONTIPS'] == 1 || $_COOKIE['FIRSTVISIT'] == 1) {
					setcookie("SHOWZONTIPS", 0, 0, "/");
					setcookie("FIRSTVISIT", 0, 0, "/");
					$style = '';
				} else {
					$style = 'display: none;';
				}
			?>
			
			<div class="zonetipsoutterwrap" id="zonetipsoutterwrap" style="<?php echo $style; ?>"> 
				<div class="zonetipswrap" > 
					<!-- Zone Image Tips -->
					<?php
						$style = '';
						
						if( (0 == $_COOKIE['FIRSTVISIT']) && !empty($userDetails[0]['zone']) ) {
							$style = 'visibility: hidden;';
						}
					?>
					<div class="zoneimagetips" id="zoneimagetips" style="<?php echo $style; ?>">
						<h1>Zone Image Tips</h1>
						<p>Be sure that your Zone image is carefully config-ured to stop a user in their tracks in order to find out more. <a href="#">Download the image template</a> to get all the art direction you need.</p>
						<a href="javascript:void(0);" class="close" onclick="zoneimageDisplay()">Close</a>
					</div>
				
					<!-- Upgrade Your Zone -->
					<div class="upgradezonetip" id="upgradezonetip">
						<h1>Upgrade Your Zone</h1>
						<p>As a company you should understand the power of perception. Take the time to create a zone image that nowcases your brand as well as demonstrate your products or services. You can download an image template here.cks in order to find out more. <a href="#">Download the image template</a>. For more question check our <a href="#">QNA</a>.</p>
						<a href="javascript:void(0);" class="close" onclick="upgradeDisplay()">Close</a>
					</div>
					<!--Music Feature Tips -->
					<div class="musicfeaturetip" id="musicfeaturetip">
						<h1>Music Features You Should Know About <span>(for upgraded accounts only)</span></h1>
						<div id="self">
							<h2>Sell Music</h2>
							<p>All you need is a PayPal account to make earnings from selling your music.
							 Watch a <a href="#">video tutorial</a>.</p>
						</div>
						<div id="addvideo">
							<h2>Add Video</h2>
							<p>Attach a video to your music to allow potential fans see you in action. <a href="#">Video tutorial</a>.</p>
						</div>
						<div id="arrange">
							<h2>Arrange</h2>
							<p>one image is carefully configured to stop a user in their tracks in order to find out more.<a href="#">Video tutorial</a></p>
						</div>
						<a href="javascript:void(0);" class="close" onclick="featureDisplay()">Close</a>
					</div>
				</div>
			</div>
			
			<?php //if( 'lifestyle' == $_REQUEST["alias"] || isset($_REQUEST["musician"]) ) { ?>
			<div class="zone-jump">
				<?php if($_REQUEST["musician"]) { ?>
					<span class="zone-in-out" id="out" onClick="unsetZoneJumpOutPath();">out</span>
				<?php } else { ?>
					<span class="zone-in-out" id="in" onClick="setZoneJumpOutPath();">in</span>
					<input type="hidden" id="zoneJumpInPath" value="" />
				<?php } ?>
			</div>
			<?php //} ?>

			<div class="jp-gui">
				<div id="notificationBox" style="display:none"><div class="data">Sign in required.</div></div>
				<?php if(empty($_SESSION['user_id'])) { ?>
				<div class="jp-limitaccess">
					<p>You have limited access and only 50 seconds of songs will play until you sign in. 
						<a href="javascript:void(0);" id="limitedSignIn"> Sign in</a>
						<a href="javascript:void(0);" id="limitedCreateAccountSignIn">Create an Account</a>
					</p>
				</div>
				<?php } ?>
			  <div class="jp-video-play"> <a href="javascript:;" class="jp-video-play-icon" tabindex="1">play</a> </div>

			  <div class="jp-trackinfo">
				<div class="jp-thumbs">
				</div>
				<div class="jp-desc">
				<div class="jp-trackdetail">
				  <div class="jp-title">
					<ul class="horizontal_scroller"><li class="scrollingtext"></li></ul>
					<!-- <a href="javascript:void(0);" class="adminReview" original-title="">read review</a> -->
					<div class="jp-review">
						<div id="review" class="adminReview"><a onclick='loadReviewDetailsPopUp();' href="javascript:;">review</a></div>				
						<div id="credits"><a onclick='loadCreditDetailsPopUp();' href="javascript:;">Credits</a></div>
					</div>
				  </div>
				</div>
				</div>
				<div class="jp-toolbar">
				 <div class="jp-current-time"></div>
				  <div class="jp-duration"></div>
					<ul>
						<li id="add" style="position: relative;"><a href="javascript:void(0);" original-title="Music">Settings</a></li>
						<li id="download"><a href="javascript:void(0);" rel="tipsy" original-title="Music">Music</a></li>
						<li id="playvid"><a href="javascript:void(0);" rel="tipsy" original-title="Album">Album</a></li>
						<li id="info"><a href="javascript:void(0);" rel="tipsy" original-title="Cart" onclick='loadAboutMusicianPopUp();'>Cart</a></li>
					</ul>
					<div id="shareTooltip" class="shareTooltip-outer">
						<div class="shareTooltip-inner">
							<span class="songTitle"></span>
							<a id="share_facebook" href="javascript:void(0);" title="" ><img src="<?php echo SITE_URL;?>/images/blank-share.png" alt="" /></a>
							
							<a id="share_twitter" href="javascript:void(0);" title="" target="_blank" ><img src="<?php echo SITE_URL;?>/images/blank-share.png" alt="" /></a>
							
							<a id="share_mailto" href="javascript:void(0);" title="" target="_blank" ><img src="<?php echo SITE_URL;?>/images/blank-share.png" alt="" /></a>
							<span class="arrw"><!----></span>
						</div>
						<div class="tipsy-arrow"></div>
					</div>
				
				</div>
					<div class="jp-notify" id="notifyMeSubscribe"> 
						<a href="javascript:void(0);" onClick="notifyMeSubscribe();" class="notify" rel="tipsy" original-title="">notify</a>
						<span class="activate"><a href="javascript:void(0);">Activate</a></span>
					</div>

					<div class="jp-musicianbox"> 
						<?php
							$class = '';
							if(isset($_REQUEST["musician"])) {
								$class = 'on';
							}
						?>							
						<a href="javascript:void(0);" class="show_hide" original-title=""><span></span></a>
						<span class="activate <?php echo $class; ?>"><a href="javascript:void(0);">Activate</a></span>
						<span class="jp-count-left">
							<span class="jp-count"></span><span class="jp-count-right">Right Counter</span>
						</span>
							
						<div class="scroll-pane">
							<div class="jp-playlist jp-playlist-hidden" id="jp-playlist" >
								<ul>
									<!-- The method Playlist.displayPlaylist() uses this unordered list -->
									<li></li>
								</ul>
							</div>
							
							<!-- tmp -->
							<div id="jp-playlist-tmp" class="jp-playlist-tmp"></div>
							<!-- tmp -->
						</div>
					</div>
			  </div>

			  <div class="jp-interface">
			  <?php if($_SESSION['user_id'] != ''){ ?>
				<div class="jp-notifications">
				  <ul>
					<?php if($userDetails[0]['user_type'] == 'musician') { ?>
						<li id="settings"><span style="visibility: hidden;"></span><a id="musicianSettings" href="javascript:void(0);" original-title="Settings" rel="tipsy">Settings</a></li>
						<!-- <li id="music"><span><?php echo $userDetails[0]['song_count']; ?></span><a href="#" original-title="Add songs" rel="tipsy">Add songs</a></li> -->
						<li id="music"><span><?php echo $userDetails[0]['song_count']; ?></span>
							<?php if(0 != count($songsDetails)) { ?>
								<a href="#" original-title="My Music" rel="tipsy" onclick="loadSongSettingsForm();">My Music</a>
							<?php } else { ?>
								<a href="#" id="uploadFirstSong" original-title="Add songs" rel="tipsy" onclick="loadUploadSong(1);">Add songs</a>
							<?php } ?>
						</li>
						<!--<li id="album"><span>0</span><a href="javascript:;" original-title="Add advertisements" rel="tipsy" onclick="loadAdvertisementForm();">Add advertisements</a></li> -->
						<li id="album"><span>0</span><a href="javascript:;" original-title="Add advertisements" rel="tipsy">Add advertisements</a></li>
					<?php } else { ?>
						<li id="settings"><span style="visibility: hidden;"></span><a id="listenerSettings" href="javascript:void(0);" original-title="Settings" rel="tipsy">Settings</a></li>
					<?php } ?>
						<li id="cart"><span>0</span><a href="javascript:;" original-title="My music market" rel="tipsy">My music market</a></li>
				  </ul>
				</div>
				<?php }  ?>
				<div class="jp-accountmenu">
					<ul>
						<?php if($_SESSION['user_id'] == '') { ?>
							<li><a href="javascript:;" id="userLoginScreen1">Login</a></li>
							<li><a href="javascript:;" id="welcomeScreen">Create Account</a></li>
						<?php } else { ?>
							<?php if($userDetails[0]['user_type'] == 'musician') { ?>
								<li><a href="<?php echo SITE_URL; ?>/<?php echo $userDetails[0]['dmm_company_name']; ?>" id="userZone"><?php echo $userDetails[0]['dmm_company_name']; ?></a></li>
							<?php } else { ?>
								<li><?php echo $userDetails[0]['dmm_company_name']; ?></li>
							<?php } ?>
						<?php } ?>
						
						<?php if($userDetails[0]['user_type'] == 'musician') { ?>
							<li id="upgrade"><a href="javascript:;">Upgrade</a></li>
							<li id="tipsrecall"><a href="javascript:;" onClick="showMusicianZoneTips();">T</a></li>
						<?php } ?>
					</ul>
					</div>
					<div class="logout">
					<?php if($_SESSION['user_id'] != '') { ?>
					<ul>
						<li><a href="javascript:;" id="userLogout">Logout</a></li>
					</ul>
					<?php } ?>
				</div>
				<div id="lifestyle_search">
					<input name="Submit" type="submit" value="Submit" />
					<input name="" type="button" value="listen by lifestyle" onClick="openLifestyleMenu();" />
				</div>
				<div class="jp-copyright"> dmm, co.&copy;2012 Version 9.0 </div>
				<div class="jp-progress">
					<div class="jp-seek-bar">
					  <div class="jp-play-bar"></div>
					</div>
				  </div>
				<div class="jp-controls-holder">
				  <ul class="jp-toggles">
					<!--<li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
					<li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>-->
					<li><a href="javascript:;" class="jp-repeat" style="display: none;" tabindex="1" title="repeat">repeat</a></li>
					<li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
					<li><a href="javascript:;" class="jp-shuffle" tabindex="1" title="shuffle">shuffle</a></li>
					<li><a href="javascript:;" class="jp-shuffle-off" style="display: none;" tabindex="1" title="shuffle off">shuffle off</a></li>
				  </ul>
				  <ul class="jp-controls">
					<li id="jp-play1"><a href="javascript:;" class="jp-play" title="play" id="jp-play" tabindex="1">play</a></li>
					<li><a href="javascript:;" class="jp-pause" style="display: none;" title="pause" tabindex="1">pause</a></li>
					<li><a href="javascript:;" class="jp-previous" title="previous" tabindex="1">previous</a></li>
					<li><a href="javascript:;" class="jp-next" title="next" tabindex="1">next</a></li>
					<!--<li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
					<li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
					<li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
					<li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>-->
				  </ul>
				  <!--<div class="jp-volume-bar"><div class="jp-volume-bar-value"></div>--> 
				</div>
				<div class="dmmlogo"><a href="javascript:;">dmm company</a></div>
			  </div>
			</div>
		  </div>
		  <div class="jp-no-solution"> <span>Update Required</span> To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>. </div>
		</div>
		</div>
	</div>

		<!-- start comment -->
		<div id="commentsDisplay"></div>
		<!-- end comment -->
	
		<div id="forLoginBox" class="successMsg" style="display:none">
			<div class="data">Sign in required.</div>
			<div class="rhtBg"></div>
		</div>	
		
		<!-- Edit profile upload avatar error message-->
		<div id="err_profile_avtar" style="display:none"></div>

	</div><!--container-->
	
	<div style='display:none'>
		<?php include_once "welcome.php"; ?>
	</div>
	
	<div style='display:none'>
		<?php //include_once "userLogin.php"; ?>
	</div>
	
	<div style='display:none'>
		<?php include_once "listenerRegistration.php"; ?>
	</div>
	
	<div style='display:none'>
		<?php include_once "songs_setting.php"; ?>
	</div>
	
	<div style='display:none'>
		<?php //include_once "musicianRegistration.php"; ?>
	</div>
	
	<div style='display:none'>
		<?php //include_once "edit_account.php"; ?>
	</div>
	
	
	<div style='display:none'>
		<?php include_once "aboutDmmCompany.php"; ?>
	</div>

	<div style='display:none' id="displayMusicReview">
		<div class="popup popupBg" id="inline_example3">
			<?php include_once "musicReview.php"; ?>
		</div>
	</div>
	
	<div id="songsStatusMain" style='display:none'>
		<?php include_once "songStatus.php"; ?>
	</div>
	
	<div id="addStatusMain" style='display:none'>
		<?php include_once "addStatus.php"; ?>
	</div>
	
	<div id="advAddMain" style='display:none'>
		<?php //include_once "advAdd.php"; ?>
	</div>
	
	<div id="songsAddMain" style='display:none'>
		<?php include_once "songsAdd.php"; ?>
	</div>

	<div id="hideimage" style="display:none;"><img id="hideImageImg" src="" /></div>

	<div class="billboardDisplay" id="billboardDisplay">
		<?php
			// $zone_image_tag = '';
			if(!empty($userDetails[0]['zone'])) {
				$image_path = HOST_URL . '/uploads/user_' . $userDetails[0]['id'] . '/user_zone/' . $userDetails[0]['zone'];
				// $zone_image_tag = '<img id="backgroundFade" src="' . $image_path . '" />';
			} else {
				$image_path = HOST_URL . '/images/zoneimagedefault.jpg';
				// $zone_image_tag = '<img id="backgroundFade" src="' . $image_path . '" />';
			}
		?>
		<!-- <img id="backgroundFade" src="<?php echo $image_path; ?>" /> -->
		<!-- <img id="backgroundFade" src="" width="" height="" /> -->
	</div>
	
	<!-- User Login 1 -->
	<div>
		<div id="dialogUserLogin1" class="modelPopupWindow alertmessagebox">
			<?php include_once "userLogin.php"; ?>
			<a href="javascript:void(0);" class="close" onClick="closeModelPopup();">&nbsp;</a>
		</div>
	</div>
	<!-- User Login 1 -->


	<!-- User Login 2 -->
	<div>
		<div id="dialogUserLogin2" class="modelPopupWindow alertmessagebox">
			<?php include_once "userLogin2.php"; ?>
			<a href="javascript:void(0);" class="close" onClick="closeModelPopup();">&nbsp;</a>
		</div>
		<!-- Mask to cover the whole screen -->
		<div class="popupMask dialogUserLogin2"></div>
	</div>
	<!-- User Login 2 -->


	<!-- Forgot password -->
	<div>
		<div id="dialogForgotPassword" class="modelPopupWindow alertmessagebox">
			<?php include_once "userForgotPassword.php"; ?>
			<a href="javascript:void(0);" class="close" onClick="closeModelPopup();">&nbsp;</a>
		</div>
	  
		<!-- Mask to cover the whole screen -->
		<div class="popupMask"></div>
	</div>
	<!-- Forgot password -->


	<!-- image upload loader -->
	<div id="imageUploaderLoader"><img src="images/loader-image.gif" /></div>
	<!-- image upload loader -->

	</div>
	
	<div>
		<div id="dialogUploadSong" class="modelPopupWindow alertmessagebox">
			<?php include_once 'uploadSong.php'; ?>
			<!-- Mask to cover the whole screen -->
		</div>
		<div class="popupMask dialogUploadSong"></div>
	</div>
	
	<div id="dialogUploadAdvertisementImage">
			<?php include 'advAdd.php'; ?>
	</div>
	
	<div>
		<div id="dialogCreditDetails" class="modelPopupWindow alertmessagebox creditWindow">
	    </div>
	    <div class="popupMask dialogCreditDetails"></div>
	</div>
	
	<div>
		<div id="dialogReviewDetails" class="modelPopupWindow alertmessagebox">			
		</div>
		<div class="popupMask dialogReviewDetails"></div>
	</div>
	
	<div>
		<div id="dialogShowAdGuide" class="modelPopupWindow alertmessagebox">
		    <?php include 'advGuidePopUp.php'; ?>
	    </div>
	    <div class="popupMask dialogShowAdGuide"></div>
	</div>
	

	
	<div>
		<div id="dialogAboutMusicianDetails" class="modelPopupWindow alertmessagebox">
			
		</div>
		<div class="popupMask dialogAboutMusicianDetails"></div>
	</div>
	
	<!-- first song upload Congratulations -->
	<div>
		<div id="dialogFirstSongCongratulations" class="first-song-add-success modelPopupWindow alertmessagebox">
			<div id="upperdiv">
				<a class="close_Btn" onclick="closeModelPopup();" href="javascript:;"></a>
				<span>You are up-and-running.Congratulations!</span>
				<p>You Have added your first song.Now,You may access song settings to add creditsand unlock your first upgrade.</p>
			</div>
			<div id="lowerdiv">
				<div id="delete-yes"><a href="javascript:;" onClick="loadSongSettingsForm();">Access your song settings</a></div>
				<div id="delete-no"><a href="javascript:;" onClick="closeModelPopup();">Not now</a></div>
			</div>
		</div>
		<div class="popupMask dialogFirstSongCongratulations"></div>
	</div>
	<!-- first song upload Congratulations -->
	
	<div style='display:none'>
		<div id="popupSongVideo">
			<div id="headerpreview">
				<span id="header-left"><img src="<?php echo SITE_URL;?>/images/embed-vid-back.png" alt="" /></span> 
				<span id="header-right"><img src="<?php echo SITE_URL;?>/images/close-video.png" alt="" /></span>
			</div>
			<div id="center">
				<div class="iframe"></div>
				
				<!-- Comment Box Form -->
				<div class="commentboxvideo" id="commentvideo">
					<form name="commentvideo" class="jqtransformdone">
						<textarea name="message" id="songVideoComment" wrap="physical" cols="" rows="" onKeyDown="commentTextCounter(document.commentvideo.message,document.commentvideo.remLen2,321)"
					onKeyUp="commentTextCounter(document.commentvideo.message,document.commentvideo.remLen2,321)"></textarea>					
						<input readonly disabled="disabled" type="text" name="remLen2" id="remLen2" size="3" maxlength="3" value="321" class="lettercount" >
						<input type="hidden" name="commentVideoSongId" id="commentVideoSongId" value="" />
						<input name="Send" type="button" value="Send" onclick="submitSongVideoComment();" />
					</form>
				</div>
				
				<div class="alertbox alertmessagebox" id="videoCommentAlertbox">
					<h2>Oops!</h2>
					<p></p>
					<div class="close">
						<a href="javascript:void(0);" onclick="closeVideoCommentAlertbox()"><img src="images/confirm-close.png" width="21" height="20" border="0" /></a>
					</div>
				</div>
				
				
				<div class="alertbox alertmessagebox" id="videoCommentAlertbox2">
					<h2>Oops!</h2>
					<p>Sorry, you must sign in to leave comments on song video.</p>
					<div class="alertlinks">
						<a href="javascript:void(0);" id="alertBoxRegister" onClick="closeVideoCommentAlertbox2(); playMainJPlayer(); loadWelcomeScreen();"><span>Create Account</span></a>
						<a href="javascript:void(0);" id="alertBoxSignIn" onClick="closeVideoCommentAlertbox2(); loadLoginScreen('user_click');"><span>Sign in</span></a>
					</div>
					<div class="close">
						<a href="javascript:void(0);" onclick="closeVideoCommentAlertbox2()"><img src="images/confirm-close.png" width="21" height="20" border="0" /></a>
					</div>
				</div>
			
				<!-- message Confirmation Alert -->
				<div class="confirmbox alertmessagebox" id="videoCommentConfirmbox">
					<h2>Comment added</h2>
					<p>Your comment was added to <strong>You've Got The Touch </strong><br />by Red Zebra.</p>
					<div class="close"><a href="javascript:void(0);" onclick="closeSongVideoCommentBox()">Close</a></div>
				</div>
				<!-- message Confirmation Alert -->
				
				
				<!-- song video pvt message -->
				<div class="sngvideopvtmsg" id="sngvideopvtmsg">
					<form name="sngvideopvtmsgfrom" class="jqtransformdone">
						<textarea name="message" id="songVideoPvtMsg" wrap="physical" cols="" rows="" onKeyDown="commentTextCounter(document.sngvideopvtmsgfrom.message,document.sngvideopvtmsgfrom.PvtMsgRemLen,321)"
					onKeyUp="commentTextCounter(document.sngvideopvtmsgfrom.message,document.sngvideopvtmsgfrom.PvtMsgRemLen,321)"></textarea>					
						<input readonly disabled="disabled" type="text" name="PvtMsgRemLen" id="PvtMsgRemLen" size="3" maxlength="3" value="321" class="lettercount" >
						<input type="hidden" name="VideoPvtMsgSongId" id="VideoPvtMsgSongId" value="" />
						<input name="Send" type="button" value="Send" onclick="submitSongVideoPvtMsg();" />
					</form>
				</div>
				
				<div class="alertbox alertmessagebox" id="videoPvtMsgAlertbox2">
					<h2>Oops!</h2>
					<p>Sorry, you must sign in to send private message to musician.</p>
					<div class="alertlinks">
						<a href="javascript:void(0);" id="alertBoxRegister" onClick="closeVideoPvtMsgAlertbox2(); playMainJPlayer(); loadWelcomeScreen();"><span>Create Account</span></a>
						<a href="javascript:void(0);" id="alertBoxSignIn" onClick="closeVideoPvtMsgAlertbox2(); loadLoginScreen('user_click');"><span>Sign in</span></a>
					</div>
					<div class="close">
						<a href="javascript:void(0);" onclick="closeVideoPvtMsgAlertbox2();"><img src="images/confirm-close.png" width="21" height="20" border="0" /></a>
					</div>
				</div>
				
				<div class="alertbox alertmessagebox" id="videoPvtMsgAlertbox">
					<h2>Oops!</h2>
					<p></p>
					<div class="close">
						<a href="javascript:void(0);" onclick="closeSongVideoPvtMsgAlertbox();"><img src="images/confirm-close.png" width="21" height="20" border="0" /></a>
					</div>
				</div>
				
				<!--<div class="confirmbox alertmessagebox" id="videoPvtMsgConfirmbox">
					<h2>Message send</h2>
					<p>Your comment was send to by Red Zebra.</p>
					<div class="close"><a href="javascript:void(0);" onclick="closeSongVideoPvtMsgBox();">Close</a></div>
				</div> -->
				
				<div class="messageconfirm alertmessagebox" id="videoPvtMsgConfirmbox">
					<h2>Message send</h2>
					<p>Your message was delivered to <strong>Red Zebra</strong> successfully!<br />Be sure to check your junk mail for 	replies.</p>
					<div class="close"><a href="javascript:void(0);" onclick="closeSongVideoPvtMsgBox();">Close</a></div>
				</div>
				
				<!-- song video pvt message -->
				
				
				
			</div>
			<div class="jp-footer-container">
				<div class="jp-trackinfo">
					<p class="video-text">10TH</p>
					<!--<a href="javascript:void(0);" class="commentvideo" onclick="toggleSongVideoCommentBox();">Comment on this video</a> 	-->
					<div class="commentvideo">
						<a id="emailtomusician" href="javascript:void(0);" onclick="toggleSongVideoPvtMsg();">Email MUSICIAN_NAME</a>
						<a href="javascript:void(0);" onclick="toggleSongVideoCommentBox();">Comment on this video</a>
					</div>
				</div>
				</div>
				<div id="footer">
					<div class="jp-accountmenu">
						<ul>
							<li><a id="userZone" href="#">test9</a></li>
						</ul>
					</div>
					<div class="logout">
						<ul>
							<li> <a id="userLogout" href="javascript:;">Logout</a> </li>
						</ul>
					</div>
					<div class="jp-copyright"> dmm, co.&copy;2012 Version 9.0 </div>
					<div class="dmmlogo" id="dmmlogo"> <a href="javascript:;">dmm company</a> </div>
				</div>
			</div>
		</div>
		
		<!-- life style menu -->
		<div id="lifestyle">
			<form>
				<div id="lifestyle_head">
					<h1>Listen by lifestyle</h1>
					<img src="<?php echo SITE_URL; ?>/images/close3.png" alt="close" width="10" height="10" onClick="$.colorbox.close();" />
				</div>
				<div id="lifestyle_body">
					<p>A high flying mix of great music from hard to soft.</p>
					<ul>
						<li id="night"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/night-life/1','1');"><span>Night Life</span></a></li>
						<li id="thrill"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/thrillseeker/2', '2');"><span>Thrillseeker</span></a></li>
						<li id="bipolar"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/bipolar/3', '3');"><span>Bipolar</span></a></li>
						<li id="space"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/space-gazer/4', '4');"><span>Space Gazer</span></a></li>
						<li id="banger"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/head-banger/5', '5');"><span>Head Banger</span></a></li>
						<li id="creative"><a href="javascript:;" onmousedown="saveLifestyleSelection('<?php echo SITE_URL; ?>/lifestyle/creative-best/6', '6');"><span>Creative Best</span></a></li>
					</ul>
					<?php if('listener' == $userDetails[0]['user_type']) { ?>
						<p id="selection"><label><input name="savemyselection" id="savemyselection" type="checkbox" value=""><span class="selection">Save my selection</span> so I won&prime;t have to do this again when I sign back in.</label></p>
					<?php } ?>
				</div>
			</form>
		</div>
		<!-- life style menu -->

	</div>
	
</body>
</html>