<?php 
session_start();
include_once "inc/config.php";

?>

<div id="welcomeWrapper">
	<!-- <div id="cboxClose"></div> -->
	<div class="middleCnt">
		<div class="equalTxt" style="height: 110px;">
			<div class="contentBox">
				<div class="contentBoxMain">
					<div class="contentBoxInner">
						<div class="welcomebig">
							Definitive<span style="font-weight: 700">MusicMedia</span>
						</div>
						<div class="subtext">
							<span style="font-weight: 100; font-size: 16px; color: #999999; letter-spacing: -0.7px; font-family: Helvetica, arial, sans-serif;">Real connections through real music</span>
						</div>
					</div>
					<!--<div class="contentBoxInner">
						<div class="welcomebig">
							Equal<span style="font-weight: bold">Platform</span>
						</div>
						<div class="subtext">
							<span style="font-weight: lighter; font-size: 16px; color: #999999; letter-spacing: -0.7px; font-family: Helvetica, arial, sans-serif;">A credible brand built for musicians and by musicains.</span>
						</div>
					</div>
					<!--
					<div class="contentBoxInner">
						<div class="welcomebig">
							Credible<span style="font-weight: bold">Brand</span>
						</div>
						<div class="subtext">
							<span style="font-weight: lighter; font-size: 16px; color: #999999; letter-spacing: -0.7px; font-family: Helvetica, arial, sans-serif;">Brand matters and DMMCompany proves it.</span>
						</div>
					</div>
					
					<div class="contentBoxInner">
						<div class="welcomebig">
							Big<span style="font-weight: bold">Audience</span>
						</div>
						<div class="subtext">
							<span style="font-weight: lighter; font-size: 16px; color: #999999; letter-spacing: -0.7px; font-family: Helvetica, arial, sans-serif;">Put your music in a place where people will listen.</span>
						</div>
					</div> -->
				</div>
			</div>
		</div>
		<div class="breadCrumb">
			<a href="javascript:void(0);" class="video" title="" onclick="loadVideoPopup('dialogVideoPopup', 'videoDisplay', '354', '505', 'piFoLfHsFgY');">Video</a>
			<a href="javascript:void(0);" class="signin" title="" onclick="loadWelcomeLoginPopup('user_click');">Sign in</a>
		</div>
		<div class="entry">
			<div class="top"></div>
			<div class="mid">
				<form name="welcomeRegistrationForm" id="welcomeRegistrationForm">
					<div class="totalWrap">
						<span class="music">Musicians</span>
						<p>Showcase your music properly.</p>
					</div>
					<div class="reg">
						<span>dmmcompany.com/</span>
						<div class="txt">
							<input type="text" name="zone_name" id="zone_name" autocomplete="off" value="" />
						</div>
						<a href="javascript:void(0);" title="" id="musicianRegistrationNxt">Continue</a>
						<span class="placeholder-text zone_name" onclick="set_focus('zone_name');">Musician, band, company</span>
						<div id="zone_name_error_message" class="welcome_zone_name_errorTxt"></div>
					</div>
				</form>
			</div>
			<div class="btm">
				<span class="listeners">Listeners</span>
				<span>Get full access to music and musicians</span>
				<a href="javascript:void(0);" title="" id="listRegContinue">Continue</a>
			</div>
		</div>
		<div class="infoCont">
			<span class="lft"><a href="javascript:void(0);" title="">info</a></span><span class="rht"><a href="javascript:void(0);" onclick="skip_this();" title="">Skip this</a> and give me limited access</span></div>
	</div>
	<div class="logoSec">
		<div class="logo">
			<span>Version 9.0.0</span>
			<div class="txt12">
				<img src="<?php echo SITE_URL; ?>/images/logo.png" />
			</div>
		</div>
	</div>
   <div class="logoBtm"></div>

	<!-- video pop-up related HTML -->
	<div>
		<div id="dialogVideoPopup" class="modelPopupWindow alertmessagebox">
			<div id="dmmvideo">
				<div class="popupContainer">
					<div class="videoDisplay" id="videoDisplay">
					</div>
					<div class="videoLogo"><img src="<?php echo SITE_URL; ?>/images/logo.png" /></div>
				</div>
			</div>
			<a href="javascript:void(0);" onclick="closeYouTubeVideoPopUp('dialogVideoPopup', 'videoDisplay');" class="close">&nbsp;</a>
		</div>
	  
		<!-- Mask to cover the whole screen -->
		<div class="popupMask dialogVideoPopup"></div>
	</div>
	<!-- video pop-up related HTML -->
	
</div>




