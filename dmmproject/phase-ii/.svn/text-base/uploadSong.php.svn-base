<?php

session_start();
include_once "inc/config.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getUserPaidStatus($_SESSION['user_id']);

?>

<form id="uploadsong" name="uploadsong">
	<div id="songupload">
		<div id="content">
		<img id="songuploader" alt="" title="" src="<?php echo SITE_URL; ?>/images/song-uploder.gif" />
		<h2>Let's add your first song, <strong>FREE!</strong></h2>
		<!-- <h2><span id="addSong"><p >File:<span>songsblastnew.mp3</span></p></span></h2> -->
        <div id="close_Btn"> <a href="javascript:;"  id="close"></a></div>
			<p id="head_Song">30 character max</p>
			<p id="head_mp3">Mp3 only</p>
			
			<div class="fieldWrapper">
				<input type="text" id="txt_SongName" value="" class="inputform" tabindex="1" maxlength="30" 
			onkeydown="onKeyPress_toggle_default_text('uploadsong', 'txt_SongName', 'Song name', event)" 
			onkeyup="onKeyUp_toggle_default_text('uploadsong', 'txt_SongName', 'Song name')" 
			/>
				<input type="hidden" id="uploadSongFilename" value="" />
				<span class="errorTxt musi_song_name_errorTxt">Enter song name</span>
				<span onclick="set_focus('txt_SongName');" class="placeholder-text txt_SongName">Song name</span>
			</div>
			
			<div class="choose" >
				<a href="javascript:;" id="chooseMp3ToUpload">Choose MP3 file</a>
			</div>
			
			<span class="errorTxt musi_upload_song_errorTxt"></span>
			<a id="launchSoundControl" href="javascript:;" onclick="submitSong();">Done</a>
			
			
		</div>
		<div id="bottom_content">
			<img src="<?php echo SITE_URL; ?>/images/symbol.png" id="symbol"/>
			<p id="para_Bottom">Added music will be availble in your zone when upload is completed. Then can set song options.<a href="http://dmmcompany.com/sphere/" target="_blank" id="view_link">View qna</a>.</p>
			<a href="javascript:;" id="uploadpopupcancel" onClick="closeModelPopup();">Cancel</a>
		</div>
	</div>
</form>