<?php session_start();
	ob_start();	
	//===================================================================================================	
	//CHANGE YOUR VALUES HERE...
		//----------------------------------------------
		//'admin' + 'common'	

			define('ROOT_DIR',   realpath(dirname(__FILE__))."/.." );

			if($_SERVER['HTTPS'])
			{
				$protocol = "https://";
			}
			else
			{
				$protocol = "http://";
			}
			define('ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."/"); 
		 
			$adminCssPath = ROOT_URL."/css/";
			$adminImagePath = ROOT_URL."/css/images/";
			$adminJsPath = ROOT_URL."/js/";	
			$adminIncludePath = ROOT_DIR."/inc/";		
			$adminUploadPath = ROOT_DIR."/uploads/";	
			$adminAvatarPath = ROOT_URL."/uploads/";
			$adminAdvPath = ROOT_URL."/uploads_adv/";
			
			$adminEmail = "chacon@helen-marie.com";
			//$adminEmail = "ajayshinde10@gmail.com";
			$adminPageTitle = "DMM :: Admin :: ";	
			$maxFileUploadSize = 2147484; //2mb		
			$serverIPAddress = $_SERVER["REMOTE_ADDR"];
			$editImg = $adminImagePath."edit.png";
			$deleteImg = $adminImagePath."delete.png";
			$activeImg = $adminImagePath."active.png";
			$inactiveImg = $adminImagePath."inactive.png";
			$translateImg = $adminImagePath."language.png";
		//----------------------------------------------	

		//'Pages'
		$pageItemsPerPage = 20;

	
	//===================================================================================================
	//DO NOT MODIFY ANYTHING BEYIND THIS LINE...
		//----------------------------------------------
		//'admin' + 'common'	
			define("ADMIN_CSS_PATH", $adminCssPath);
			define("ADMIN_IMAGE_PATH", $adminImagePath);				
			define("ADMIN_JS_PATH", $adminJsPath);					
			define("ADMIN_INC_PATH", $adminIncludePath);	
			define("ADMIN_UPLOAD_PATH", $adminUploadPath);
		 	define("ADMIN_AVATAR_PATH", $adminAvatarPath);
			define("ADMIN_ADV_PATH", $adminAdvPath);
		 
			define("ADMIN_EMAIL", $adminEmail);
			define("ADMIN_PAGE_TITLE", $adminPageTitle);		
			define("ADMIN_FILE_MAX_UPLOAD_SIZE", $maxFileUploadSize);	
			define("ADMIN_FILE_MAX_UPLOAD_SIZE_NAME", "8mb");					
			define("IP_ADDRESS", $serverIPAddress);
			define("EDIT_IMG", $editImg);
			define("DELETE_IMG", $deleteImg);
			define("ACTIVE_IMG", $activeImg);
			define("INACTIVE_IMG", $inactiveImg);
			define("TRANSLATE_IMG", $translateImg);
			define("ADV_START_TIME", 50000);
			define("ADV_TIME_INTERVAL", 5000);
		//----------------------------------------------		

		//'PAGE'
			define("PAGE_ITEMS_PER_PAGE", $pageItemsPerPage);
		
	//===================================================================================================
	
?>