<?php
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserController.php";
	
	$tblpageObj = new tblUserController();
	$id = $_REQUEST['id'];	
	$tblArr = $tblpageObj->userViewDetails($id);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>User Details</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>majid-cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
        <?php if($type=="date" || $type=="dwnload"){?>
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
		
		</script>
	
	</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php include_once ADMIN_INC_PATH."adminHeaderInner.php"; ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top"><?php include_once ADMIN_INC_PATH."adminLeftComponent.php"; ?></td>
        <td align="left" valign="top" class="padding"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
              <tr>
                <td class="titlebox">User Details</td>
              </tr>
               <tr><td align="right" class="paddingall border"><input type="button" name="button" value="back" onClick="javascript:history.go(-1);" id="sval"></input></td></tr>
              <tr>
                <td class="paddingall" valign="top">
				<table width="100%" border="0" cellpadding="4" cellspacing="4" class="bigbox contenttext1">
                          <tr>
							<td class="details_title">Name:</td><td><?php echo $tblArr[0]['name'];?></td>		
                           </tr>
							<tr class="bgcolor">
							<td class="details_title">DMM Company Name:</td><td><?php echo $tblArr[0]['dmm_company_name'];?></td>		
                           </tr>
                           <tr>
							<td class="details_title">Email:</td><td><?php echo $tblArr[0]['email'];?></td>		
                           </tr>
                           <tr class="bgcolor">
							<td class="details_title">Country:</td><td><?php echo $tblArr[0]['country'];?></td>		
                           </tr>
                          <tr>
							<td class="details_title">Status:</td><td><?php echo $tblArr[0]['status'];?></td>		
                           </tr>
                           <tr class="bgcolor">
							<td class="details_title">Create Date:</td><td><?php echo $tblArr[0]['create_date'];?></td>		
                           </tr>
                           </table>							
						
				</td>
              </tr>              
            </table>			
			</td>
            </tr>          
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1"><?php include(ADMIN_INC_PATH."adminFooterInner.php"); ?></td>
  </tr>
</table>
</body>
</html>