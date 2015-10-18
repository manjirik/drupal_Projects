<?php session_start();
	ob_start();	
	//===================================================================================================	
	//CHANGE YOUR VALUES HERE...
		//----------------------------------------------
		//'admin' + 'common'	

			define('ROOT_DIR',   realpath(dirname(__FILE__))."/.." );
			if(isset($_SERVER['HTTPS']))
			{
				$protocol = "https://";
			}
			else
			{
				$protocol = "http://";
			}
			define('SHARE_ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."/Skywards");
            define('ROOT_URL', SHARE_ROOT_URL."/admin"); 
			define('IMAGE_ROOT_URL', $protocol. $_SERVER['HTTP_HOST']."/admin/images/"); 
			define('CITY_IMAGES_URL', SHARE_ROOT_URL.'/city_images/'); 			
			define('UPLOAD_IMAGE_PATH', "../city_images/");
			$adminCssPath = ROOT_URL."/css/";
			$adminImagePath = ROOT_URL."/css/images/";
			$adminJsPath = ROOT_URL."/js/";	
			$adminIncludePath = ROOT_DIR."/inc/";		
			$adminEmail = "";
			define("DB_HOST_NAME", "localhost");
			define("DB_USER_NAME", "root");
			define("DB_PASSWORD", "");
			define("DB_NAME", "skywards");
			$adminPageTitle = "Skywards ::";	
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
		 
			define("ADMIN_EMAIL", $adminEmail);
			define("ADMIN_PAGE_TITLE", $adminPageTitle);		
			define("ADMIN_FILE_MAX_UPLOAD_SIZE", $maxFileUploadSize);	
			define("ADMIN_FILE_MAX_UPLOAD_SIZE_NAME", "2mb");					
			define("IP_ADDRESS", $serverIPAddress);
			define("EDIT_IMG", $editImg);
			define("DELETE_IMG", $deleteImg);
			define("ACTIVE_IMG", $activeImg);
			define("INACTIVE_IMG", $inactiveImg);
			define("TRANSLATE_IMG", $translateImg);
                        
                        define("CITY_IMG_2","25");
                        define("CITY_IMG_3","50");
                        define("CITY_IMG_4","75");
                        define("CITY_IMG_5","100");
                        
		//----------------------------------------------		

		//'PAGE'
			define("PAGE_ITEMS_PER_PAGE", $pageItemsPerPage);

	/* start code for the site_admin_url */
			$hostname = $_SERVER['HTTP_HOST'];
			$uri = explode('/',$_SERVER['REQUEST_URI']);

			if( ($hostname == 'creative2.synechron.com')) {
				$hostname = $uri[1];
			}

			switch($hostname) {
				case 'localhost':
					define("ADMIN_SITE_URL","http://localhost/Skywards/");
					
					break;
				case 'Skywards':
					define("ADMIN_SITE_URL","http://creative2.synechron.com/Skywards/");
					
					break;
				case 'skywards_qa':
					define("ADMIN_SITE_URL","http://creative2.synechron.com/skywards_qa/");
					
					break;
				case 's142587.gridserver.com':
				case 'bluebarracudame.com':
					define("ADMIN_SITE_URL","http://s142587.gridserver.com/meet-me-there/");
					
					break;
				default:
					define("ADMIN_SITE_URL","http://localhost/Skywards/");		
					
			}
	/* end code for the site_admin_url  */
			
	/*
		1073741824.000 	= 1gb
		 536870912.000 	= 500mb
		 268435456.000 	= 250mb
		   1073741.824 	= 1mb
		   2147483.648 	= 2mb	
	*/
		
	//===================================================================================================
	
?>