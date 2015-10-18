<?php

session_start();
include_once 'inc/database.php';

function get_youtube_video_id_from_url($url) {
	$matches = array();
	$result = preg_match('~
        # Match non-linked youtube URL in the wild. (Rev:20111012)
        https?://         # Required scheme. Either http or https.
        (?:[0-9A-Z-]+\.)? # Optional subdomain.
        (?:               # Group host alternatives.
          youtu\.be/      # Either youtu.be,
        | youtube\.com    # or youtube.com followed by
          \S*             # Allow anything up to VIDEO_ID,
          [^\w\-\s]       # but char before ID is non-ID char.
        )                 # End host alternatives.
        ([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
        (?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
        (?!               # Assert URL is not pre-linked.
          [?=&+%\w]*      # Allow URL (query) remainder.
          (?:             # Group pre-linked alternatives.
            [\'"][^<>]*>  # Either inside a start tag,
          | </a>          # or inside <a> element text contents.
          )               # End recognized pre-linked alts.
        )                 # End negative lookahead assertion.
        [?=&+%\w-]*        # Consume any URL (query) remainder.
        ~ix', 
        $url, $matches);

	if ( false !== $result && !empty($matches) ) {
		return $matches[1];
	}
	return 0;
}

function get_src_from_iframe($string) {
	preg_match_all('/<iframe.*src=\"(.*)\".*><\/iframe>/isU', $string, $matches);
	if(empty($matches[1])) {
		return get_youtube_video_id_from_url($string);
	} else {
		return get_youtube_video_id_from_url($matches[1][0]);
	}
	
    return false;
}

$dbObj = new database();
$conObj = $dbObj->connectDB();
	
switch($_POST['service_type']) {
	case 'is_user_logged_in':
		if(empty($_SESSION['user_id'])) {
			echo 0;
		} else {
			echo 1;
		}
		break;
		
	case 'get_user_list':
		include_once 'controller/tblUserController.php';
		$userObj = new tblUserController($conObj);
		print_r($userObj->getDMMCompanyNameList());
		break;
		
	case 'update_video_url':
		if(!empty($_POST['video_url'])) {
			if(get_src_from_iframe($_POST['video_url'])) {
				include_once 'controller/tblSongsController.php';
				$songObj = new tblSongsController($conObj);
				print_r($songObj->updateSongVideoURL($_POST['song_id'], $_POST['video_url']));
			} else {
				echo 0;
			}
		} else {
			echo -999;
		}
		break;
		
	case 'set_song_download_flag':
		include_once 'controller/tblSongsController.php';
		$songObj = new tblSongsController($conObj);
		print_r($songObj->updateSongIsDownloadFlag($_POST['song_id'], $_POST['download_flag']));
		break;
		
	case 'set_song_credits':
		include_once 'controller/tblSongsController.php';
		$songObj = new tblSongsController($conObj);
		print_r($songObj->updateSongCredits($_POST['song_id'], serialize($_POST['credits'])));
		break;
	
	case 'get_song_video_url':
		include_once 'controller/tblSongsController.php';
		$songObj = new tblSongsController($conObj);
		// $iframe = get_src_from_iframe($songObj->getSongVideoURL($_POST['song_id']));
		// $user_name = $songObj->getDmmCompanyNameBySongId($_POST['song_id']);
		echo json_encode(array(
			'video_url' => get_src_from_iframe($songObj->getSongVideoURL($_POST['song_id'])), 
			'musician_name' => $songObj->getDmmCompanyNameBySongId($_POST['song_id'])
			)
		);
		break;
	
	case 'submit_song_video_comment':
		include_once 'controller/tblCommentController.php';
		$commentObj = new tblCommentController($conObj);
		$paramArray = array (
			"table_name" => "video_comments",							
			"song_id" => $_POST['song_id'],
			"user_id" => $_SESSION['user_id'],
			"comment" => $_POST['comment'],
			"status" => 0,
			"create_date" => date('Y-m-d H:i:s')
		);
		$commentObj->saveNew($paramArray);
		$songmusicianInfoArr = $commentObj->getMusicianInfo($paramArray);
		echo json_encode(array(
			'status' => $songmusicianInfoArr[0]['Status'], 
			'song_name' =>$songmusicianInfoArr[0]['song_name'], 
			'musician_name' =>$songmusicianInfoArr[0]['musician_name'], 
			'user_name' => $songmusicianInfoArr[0]['User_Name'])
		);
		break;
		
	case 'send_video_pvt_msg':
		include_once 'controller/tblSongsController.php';
		$songObj = new tblSongsController($conObj);
		$songDetails = $songObj->getSongsDetailsById(array('song_id' => $_POST['song_id']));

		include_once 'controller/tblUserController.php';
		$userObj = new tblUserController($conObj);
		$userDetails = $userObj->getUserDetails(array('id' => $songDetails[0]['user_id']));

		include_once "inc/mailer.php";
		sendSongVideoPvtMsgMail($userDetails[0]['email'], $_POST['message'], $userDetails[0]['dmm_company_name'], $_SESSION['user_details']['dmm_company_name']);
		
		echo json_encode(array('musician_name' => $userDetails[0]['dmm_company_name']));
		break;
	
	case 'get_musician_type':
		include_once 'controller/tblUserController.php';
		$userObj = new tblUserController($conObj);
		$musician_type = $userObj->getMusicianType($_POST['mid']);
		if(empty($musician_type)) {
			echo 0;
		} else {
			echo $musician_type;
		}
		break;
	
	case 'set_zone_jumpout_path':
		$_SESSION['zone_jump_out_path'] = $_POST['zone_jump_out_path'];
		break;
		
	case 'unset_zone_jumpout_path':
		$tmp = $_SESSION['zone_jump_out_path'];
		unset($_SESSION['zone_jump_out_path']);
		echo $tmp;
		break;
	
	case 'Save_lifestyle_selection':
		include_once 'controller/tblUserController.php';
		$userObj = new tblUserController($conObj);
		$userObj->setSelectedLifestyle($_POST['lifestyle_id'], $_SESSION['user_id']);
		break;
	
	case 'user_details':
		if(isset($_SESSION['user_id'])) {
			include_once 'controller/tblUserController.php';
			$userObj = new tblUserController($conObj);
			$userDetails = $userObj->getUserDetails( array('table_name' => 'user', 'id' => $_SESSION['user_id']) );
			echo json_encode($userDetails[0]);
		}
	break;
}

?>