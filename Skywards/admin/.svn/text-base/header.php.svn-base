<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
        <?php if(isset($type) && ($type=="date" || $type=="dwnload")){?>
       
            <link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>calendar.css" />
            <script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>calendar_us.js"></script>
        <?php
        }?>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>functions.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>listFunctions.js"></script>       
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>sdmenu.js">
		
			/***********************************************
			* Slashdot Menu script- By DimX
			* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
			* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
			***********************************************/
		</script>
		<script type="text/javascript">
			// <![CDATA[
			var myMenu;
			window.onload = function() {
				myMenu = new SDMenu("my_menu");
				myMenu.init();
				myMenu.collapseAll();
			};
		// ]]>
			function validate(ref){
				if(ref=='date'){
					var toDate = frm.toDate.value;
					var frmDate = frm.frmDate.value;
					if(frmDate==""){
						alert ("Please enter FromDate");
						document.frm.frmDate.focus();	
						return false;			
					}
					
					if(toDate==""){
						alert ("Please enter ToDate");
						document.frm.toDate.focus();	
						return false;			
					}
				}
				
				return true;
				
			}
		</script>
	
	</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php include_once(ADMIN_INC_PATH."adminHeaderInner.php"); ?></div>
		</td>
	</tr>