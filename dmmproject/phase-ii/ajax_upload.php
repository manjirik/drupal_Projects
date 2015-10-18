<?php

session_start();
include_once 'inc/config.php';
include_once 'inc/SimpleImage.php';

/**
 * Handle file uploads via XMLHttpRequest
 */
class qqUploadedFileXhr {
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {    
        $input = fopen("php://input", "r");
        $temp = tmpfile();
        $realSize = stream_copy_to_stream($input, $temp);
        fclose($input);
        
        if ($realSize != $this->getSize()){            
            return false;
        }
        
        $target = fopen($path, "w");        
        fseek($temp, 0, SEEK_SET);
        stream_copy_to_stream($temp, $target);
        fclose($target);
        
        return true;
    }
    function getName() {
        return $_GET['qqfile'];
    }
    function getSize() {
        if (isset($_SERVER["CONTENT_LENGTH"])){
            return (int)$_SERVER["CONTENT_LENGTH"];            
        } else {
            throw new Exception('Getting content length is not supported.');
        }      
    }   
}

/**
 * Handle file uploads via regular form post (uses the $_FILES array)
 */
class qqUploadedFileForm {  
    /**
     * Save the file to the specified path
     * @return boolean TRUE on success
     */
    function save($path) {
        if(!move_uploaded_file($_FILES['qqfile']['tmp_name'], $path)){
            return false;
        }
        return true;
    }
    function getName() {
        return $_FILES['qqfile']['name'];
    }
    function getSize() {
        return $_FILES['qqfile']['size'];
    }
}

class qqFileUploader {
    private $allowedExtensions = array();
    private $sizeLimit = 10485760;
    private $file;

    function __construct(array $allowedExtensions = array(), $sizeLimit = 10485760){        
        $allowedExtensions = array_map("strtolower", $allowedExtensions);
            
        $this->allowedExtensions = $allowedExtensions;        
        $this->sizeLimit = $sizeLimit;
        
        $this->checkServerSettings();       

        if (isset($_GET['qqfile'])) {
            $this->file = new qqUploadedFileXhr();
        } elseif (isset($_FILES['qqfile'])) {
            $this->file = new qqUploadedFileForm();
        } else {
            $this->file = false; 
        }
    }
    
    private function checkServerSettings(){        
        $postSize = $this->toBytes(ini_get('post_max_size'));
        $uploadSize = $this->toBytes(ini_get('upload_max_filesize'));        
        
        if ($postSize < $this->sizeLimit || $uploadSize < $this->sizeLimit){
            $size = max(1, $this->sizeLimit / 1024 / 1024) . 'M';             
            die("{'error':'increase post_max_size and upload_max_filesize to $size'}");    
        }        
    }
    
    private function toBytes($str){
        $val = trim($str);
        $last = strtolower($str[strlen($str)-1]);
        switch($last) {
            case 'g': $val *= 1024;
            case 'm': $val *= 1024;
            case 'k': $val *= 1024;        
        }
        return $val;
    }
    
    /**
     * Returns array('success'=>true) or array('error'=>'error message')
     */
    function handleUpload($uploadDirectory, $replaceOldFile = FALSE){
        if (!is_writable($uploadDirectory)){
            return array('error' => "Server error. Upload directory isn't writable.");
        }
        
        if (!$this->file){
            return array('error' => 'No files were uploaded.');
        }
        
        $size = $this->file->getSize();
        
        if ($size == 0) {
            return array('error' => 'File is empty');
        }
        
        if ($size > $this->sizeLimit) {
            // return array('error' => 'File is too large');
            return array('error' => 'Image must be under ' . $_GET['upload_size'] . 'MB');
        }
        
        $pathinfo = pathinfo($this->file->getName());
        // $filename = $pathinfo['filename'];
		// $filename = 'avatar_' . time();
		switch($this->uploadtype) {
			case 'avatar':
				$filename = 'avatar_' . time();
			break;
			
			case 'zone':
				$filename = 'song_' . time();
			break;
			
			case 'song':
				$filename = $pathinfo['filename'];
				// $filename = strtolower($pathinfo['filename']);
				// $filename = preg_replace("/[^a-zA-Z0-9]/", "", $filename);
			break;
			
		}
		
        //$filename = md5(uniqid());
        $ext = $pathinfo['extension'];
		
        if($this->allowedExtensions && !in_array(strtolower($ext), $this->allowedExtensions)){
            $these = implode(', ', $this->allowedExtensions);
            return array('error' => 'File has an invalid extension, it should be one of '. $these . '.');
        }
        
        if(!$replaceOldFile){
            /// don't overwrite previous files that were uploaded
            while (file_exists($uploadDirectory . $filename . '.' . $ext)) {
                $filename .= rand(10, 99);
            }
        }
        
        if ($this->file->save($uploadDirectory . $filename . '.' . $ext)){
			/* Attrib "path, filename" added for DMM */
            return array('success' => true, 
				'path' => SITE_URL . '/' . $uploadDirectory . $filename . '.' . $ext, 
				'filename' => $pathinfo['filename'] . '.' . $ext);
        } else {
            return array('error' => 'Could not save uploaded file.' .
                'The upload was cancelled, or server error encountered');
        }
        
    }    
}

// list of valid extensions, ex. array("jpeg", "xml", "bmp")
$allowedExtensions = array();
// max file size in bytes

$upload_size = isset($_GET['upload_size']) ? $_GET['upload_size'] : 10;
$sizeLimit = 1024 * 1024 * $upload_size;

$uploader = new qqFileUploader($allowedExtensions, $sizeLimit);

switch($_GET['type']) {
	case 'profile_avatar':
		$uploader->uploadtype = 'avatar';
		$result = $uploader->handleUpload('temp_upload/registration/avatar/');
		if($result['success']) {
			echo htmlspecialchars(json_encode(array('status' => 1, 'path' => $result['path'])), ENT_NOQUOTES);
		} else {
			echo htmlspecialchars(json_encode(array('status' => 0, 'error' => $result['error'])), ENT_NOQUOTES);
		}
		break;

	case 'zone_image':
		$uploader->uploadtype = 'zone';
		$result = $uploader->handleUpload('temp_upload/registration/zone/');
		if($result['success']) {
			
			/* Generate preview */
			$path = $result['path'];
			$basename = basename($path);
			$preview_path = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/zone/preview/' . $basename;
			file_get_contents($path);
			$image = new SimpleImage();
			$image->load($path);
			$image->resize(300, 107);
			$image->save($preview_path);
			$preview_path = str_replace(DOCUMENT_ROOT . BASE_PATH, SITE_URL, $preview_path);
			
			echo htmlspecialchars(json_encode(array('status' => 1, 'path' => $path, 'preview_path' => $preview_path)), ENT_NOQUOTES);
		} else {
			echo htmlspecialchars(json_encode(array('status' => 0, 'error' => $result['error'])), ENT_NOQUOTES);
		}
		break;
	
	case 'song':
		$userDetails = $_SESSION['user_details'];
		/* prevent user to upload song even if user added onlick attribute from browser debug mode */
		if( (0 == $userDetails['paid'] && 0 == $userDetails['all_song_count']) || (1 == $userDetails['paid']) ) {
			$uploader->uploadtype = 'song';
			$result = $uploader->handleUpload('temp_upload/songs/');
			if($result['success']) {
				/* Start mp3 song wave generation */
				$uploadRelativePath = DOCUMENT_ROOT . BASE_PATH . "/temp_upload/songs/{$result['filename']}";
				$content = file_get_contents(SITE_URL."/generateWaveForm.php?songPath=".$uploadRelativePath);

				if(0 != $content) {
					//Store in the filesystem.
					$fp = fopen("temp_upload/songs/{$result['filename']}.png", "w");
					fwrite($fp, $content);
					fclose($fp);
					/* End mp3 song wave generation */
				}
				echo htmlspecialchars(json_encode(array('status' => 1, 'filename' => $result['filename'], 'path' => $result['path'])), ENT_NOQUOTES);
				
			} else {
				echo htmlspecialchars(json_encode(array('status' => 0, 'error' => $result['error'])), ENT_NOQUOTES);
			}
		} else {
			echo htmlspecialchars(json_encode(array('status' => 0, 'error' => 'Invalid request')), ENT_NOQUOTES);
		}
		break;
}

// to pass data through iframe you will need to encode all html tags
// echo htmlspecialchars(json_encode($result), ENT_NOQUOTES);
