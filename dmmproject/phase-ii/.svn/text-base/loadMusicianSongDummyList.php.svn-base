<?php

include_once 'inc/config.php';
include_once "inc/database.php";
include_once "controller/tblSettingsController.php";
include_once 'inc/xml_fuc.php';

$xmlGenresFile = SITE_URL . '/playlist_song_share_xml.php?tmp_playlist_songid='.$_REQUEST['song_id'];

$contents = file_get_contents($xmlGenresFile);
$song_list_array = xml2array($contents);
$songs = $song_list_array['HIPPOP'];

$html = '';

$start = '<ul style="display: block;">';
foreach($songs as $key => $value) {
	$song_id = $value["SONGID"];
	$artist = htmlentities($value["ARTIST"], ENT_QUOTES);
	$songTitle = htmlentities($value["TITLE"], ENT_QUOTES);
	$link = SITE_URL . "/{$artist}/{$song_id}";
	
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

	$html .=<<<STR
<li class="{$song_id} {$class}"><div><a tabindex="1" class="jp-playlist-item" href="{$link}">{$songTitle}</a></div></li>
STR;

}
$end = '</ul>';

echo $start.$html.$end;