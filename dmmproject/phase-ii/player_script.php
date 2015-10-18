<?php

session_start();

include_once 'inc/config.php';
include_once 'inc/database.php';
include_once 'controller/tblSettingsController.php';
include_once 'controller/tblUserController.php';
include_once 'inc/xml_fuc.php';

$dbObj = new database();
$conObj = $dbObj->connectDB();
$settingsObj = new tblSettingsController($conObj);
$settingArr = $settingsObj->getSettings();

if(isset($_REQUEST["songid"])) {
	if($_REQUEST['musician_get'] == 'no'){
		$tmp_user_id = '0';
	}else{
		$tmp_user_id = $settingsObj->getUserID($_REQUEST['musician_get']);
	}

	$xmlGenresFile = SITE_URL . '/playlist_xml.php?tmp_playlist_songid='.$_REQUEST['songdbid'].'&musician_id='.$tmp_user_id;
} 
else if('lifestyle' == $_REQUEST["alias"]) {
	$style_type = $_REQUEST['lifestyle'];
	$style_id = $_REQUEST['styleid'];
	$xmlGenresFile = SITE_URL . '/lifestyle_playlist.php?style_id=' . $style_id;
}
elseif(isset($_REQUEST["musician"])) {
	$tmp_user_id = $settingsObj->getUserID($_REQUEST['musician']);
	
	if($tmp_user_id == '') {
		header('Location: http://dmmcompany.com/zones/');
	}
	
	$tmp_musician_songs_count = $settingsObj->getMusicianSongsCount($tmp_user_id);
	if($tmp_musician_songs_count == '0') {
	?>
		<script type="text/javascript">
			/*$(document).ready(function(){
				$('.songCount').hide();
				$('.commentBox').hide();
				$('#south13').hide();
			});*/
		</script>
	<?php
	}

	if(isset($_REQUEST["songidm"])) {
		$xmlGenresFile = SITE_URL . '/playlist_song_share_xml.php?tmp_playlist_songid='.$_REQUEST['songidm'];
	} else {
		$xmlGenresFile = SITE_URL . '/playlist_share_xml.php?musician_id='.$tmp_user_id;
	}

	$userObj = new tblUserController($conObj);
	$userDetailsTmp = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $tmp_user_id) );

	if( isset($userDetailsTmp[0]['zone']) && !empty($userDetailsTmp[0]['zone']) ) {
		$songPoster = SITE_URL . "/uploads/user_{$tmp_user_id}/user_zone/{$userDetailsTmp[0]['zone']}";
	} else {
		$songPoster = SITE_URL . "/images/zoneimagedefault.jpg";
	}
	
	$musician = $_REQUEST['musician'];
	
} else {
	/* Default songs play list */
	$xmlGenresFile = SITE_URL . '/playlist_first_xml.php';
}

$contents = file_get_contents($xmlGenresFile);
$arrXml1 = xml2array($contents);
$arrXml = $arrXml1['HIPPOP'];

$play_list_array = array();

$play_list_html = '<ul style="display: block;">';
foreach ($arrXml as $key => $value) {
	$artist = htmlentities($value["ARTIST"], ENT_QUOTES);
	$songTitle = htmlentities($value["TITLE"], ENT_QUOTES);
	$purpose = htmlentities($value["PURPOSE"], ENT_QUOTES);

	$play_list_array[] = "{
		song_id:'{$value["SONGID"]}',
		title:'{$songTitle}',
		artist_name:'{$artist}',
		purpose:'{$purpose}',
		video:'{$value["VIDEO"]}',
		mp3:'{$value["PATH"]}',
		poster:'{$value["POSTER"]}',
		review:'{$value["REVIEW"]}',
		songs_count:'{$value["SONGS_COUNT"]}',
		download:'{$value["DOWNLOAD"]}'
	}";
	
	$class = '';
	if( 1 == $value["VIDEO"] && 1 == $value["FOR_SELL"] && 1 == $value["DOWNLOAD"] ) {
		$class = 'song_video_sell_download';
	}
	else if( 1 == $value["VIDEO"] && 1 == $value["FOR_SELL"] ) {
		$class = 'song_video_sell';
	}
	else if( 1 == $value["VIDEO"] && 1 == $value["DOWNLOAD"] ) {
		$class = 'song_video_download';
	}
	else if( 1 == $value["FOR_SELL"] && 1 == $value["DOWNLOAD"] ) {
		$class = 'song_sell_download';
	}
	else if(1 == $value["VIDEO"]) {
		$class = 'song_video';
	}
	else if(1 == $value["FOR_SELL"]) {
		$class = 'song_sell';
	}
	else if(1 == $value["DOWNLOAD"]) {
		$class = 'song_download';
	}
	
	$play_list_html .=<<<STR
<li class="{$value["SONGID"]} {$class}"><div><a tabindex="1" class="jp-playlist-item" href="javascript:;">{$songTitle}</a></div></li>
STR;
	
}

$play_list_html .= '</ul>';


$playListStr = implode(',', $play_list_array);
$play_list_count = count($play_list_array);

?> 

<script type="text/javascript">
var myPlaylist;

$(document).ready(function() {
	
	/* set playlist */
	$('#jp-playlist-tmp').html('<?php echo $play_list_html; ?>');

	$('.jp-controls-holder a').each(function() {
		$(this).attr('title', '');
	});

	<?php if(0 == $play_list_count) { ?>
	
		emptyPlayListInit('<?php echo $musician; ?>');

		myPlaylist = new jPlayerPlaylist(
			{
				jPlayer: "#jquery_jplayer_1",
				cssSelectorAncestor: "#jp_container_1",
				cssSelector: {
			          play:".jp-play",
			          pause: ".jp-pause"
			    }
			}, 
			[], 
			{
				playlistOptions: {
					autoPlay: false
				},
				ready: function() {
					emptyPlayListReady('<?php echo $songPoster; ?>', '<?php echo $musician; ?>');
					<?php if($musician == $userDetails[0]['dmm_company_name']) { ?>
							$('.jp-musicianbox .show_hide').attr('original-title', 'you are in your Zone');
					<?php } ?>
				},
				loop: false,
				swfPath: "<?php echo SITE_URL; ?>/js",
				solution:"flash,html",
				supplied: "mp3",
				wmode:"window",
				preload: 'none'
			}
		);
	<?php } else { ?>
		
		musicianPlayListInit();

		myPlaylist = new jPlayerPlaylist({
			jPlayer: "#jquery_jplayer_1",
			cssSelectorAncestor: "#jp_container_1",
			cssSelector: {
				  play:".jp-play",
				  pause: ".jp-pause"
			}
		}, 
		[
		<?php echo implode(',', $play_list_array); ?>
		], {
			playlistOptions: {
				autoPlay: true
			},
			ready: function() {
				musicianPlayListReady();
			},
			play: function() {
				<?php if($_SESSION['user_id'] == '') { ?>
					fadeTrackVolumn();
				<?php } ?>

				$('#jp-playlist-tmp ul li').removeClass('jp-playlist-current');
				$('#jp-playlist-tmp ul li').eq(myPlaylist.current).addClass('jp-playlist-current');
				<?php if( !isset($musician) && empty($musician) ) { ?>
					var currentTrackInfo = myPlaylist.playlist[myPlaylist.current];
					loadMusicianSongDummyList(currentTrackInfo.artist_name, currentTrackInfo.song_id);
					$('.jp-musicianbox .show_hide').attr('original-title', 'enter the ' + currentTrackInfo.artist_name + ' Zone');
				<?php } else { ?>
					<?php if($musician == $userDetails[0]['dmm_company_name']) { ?>
							$('.jp-musicianbox .show_hide').attr('original-title', 'you are in your Zone');
					<?php } else if(isset($musician)) { ?>
							$('.jp-musicianbox .show_hide').attr('original-title', 'You are now in the <?php echo $musician; ?> zone');
					<?php }	?>
				<?php } ?>
				getCurrentTrackInfo();
			},
			swfPath: "<?php echo SITE_URL; ?>/js",
			solution:"flash,html",
			supplied: "mp3",
			wmode:"window",
			preload: 'none'
		});
		
		/** Hack for IE7 some times playlist not load, following code loads forcefully */
		var classNames = $('html').attr('class');
		if( classNames.indexOf("ie7") ) {
			myPlaylist.setPlaylist([<?php echo implode(',', $play_list_array); ?>]);
			myPlaylist.play();
		}
		
		if('' != myPlaylist.playlist) {
			if(!$('.commentwrap .comment').is(':visible')) {
				$('.commentwrap .comment').show();
			}
			/** Hack for IE7 comment box width */
			$('.ie7.win .commentwrap .message').css('width', '242px');
		} else {
			/** Set musician name into message to musician cover */
			var artist_name = 'Message <?php echo $musician; ?>';
			$('.commentcontent .message span').html(artist_name.substring(0, 16));
		
			$('.commentwrap .comment').hide();
			
			/** Hack for IE7 comment box width */
			$('.ie7.win .commentwrap .message').css('width', '484px');
		}
		
		<?php if( isset($musician) && !empty($musician) ) { ?>
			if($('#jp-playlist-tmp ul').size()) {
				$('#jp-playlist-tmp ul li').click(function(){
					myPlaylist.play($(this).index());
				});
			}
		<?php } ?>
		
	<?php } ?>
	
	/** */
	$('.jp-notifications ul li a[rel=tipsy]').tipsy({ gravity: 's', html: true, opacity: 1, delayIn: 500 });

});


</script>