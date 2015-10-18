<?php include("inc/config.php"); 
	include("inc/chkSession.php");
	include_once("controller/tblDrawController.php");	
	$tblpageObj = new tblDrawController();
	$flag = "";
	if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='add')
	{
	$flag_status = "Add";
	}elseif(isset($_REQUEST['flag']) && $_REQUEST['flag']=='edit'){
	$flag_status = "Edit";
	}
	?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?> Draw Detalis</title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>calendar_us.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>calendar.css" />
		
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>jquery-1.4.2.min.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>functions.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>listFunctions.js"></script>
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>sdmenu.js">
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

		function trim(s)
		{
		return rtrim(ltrim(s));
		}

		function ltrim(s)
		{
		var l=0;
		while(l < s.length && s[l] == ' ')
		{	l++; }
		return s.substring(l, s.length);
		}

		function rtrim(s)
		{
		var r=s.length -1;
		while(r > 0 && s[r] == ' ')
		{	r-=1;	}
		return s.substring(0, r+1);
		}


		function formValidate()
		{		
				document.frm1.action = "drawUpdate.php";    // First target
				 document.frm1.submit(); 
		}
		</script>
	
	</head>
<body>
<?php
$draw_id = "";
if(isset($_REQUEST['id'])){
	$draw_id = $_REQUEST['id'];
}
/*$valid_username_arr_final = "";
$valid_username_Arr = $tblpageObj->getAllDrawDetails($draw_id);

if(count($valid_username_Arr) > 0){
	foreach($valid_username_Arr as $key=>$val){
		$valid_username_arr_final .= trim($val['username']) .";";
	}
}*/
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="1">
			<div class="header"><?php
			 
			include_once(ADMIN_INC_PATH."adminHeaderInner.php"); ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" class="leftMenu"><?php include_once(ADMIN_INC_PATH."adminLeftComponent.php"); ?></td>
        <td align="left" valign="top" class="padding rightContent"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td valign="top" class="titlepage">Draw Details</td>
          </tr>
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
             <tr>
			<td class="paddingall border" align="right" id="reports"><!-- <?php include("menu.php"); ?> --></td>
			</tr>
	 
              <tr>
                <td class="titlebox"><?php echo $flag_status;?> Draw Details</td>
              </tr>
			 <?php
					$tmp_draw_date = "";
					//$tmp_user_entry_id = "";
					
					if(isset($_REQUEST['id'])){
					$tblDrawArr = $tblpageObj->getDrawDetail($draw_id);
					$tbldrawArrCount = count($tblDrawArr);
					for($i=0; $i<$tbldrawArrCount; $i++)
						{
							$tmp_draw_date = $tblDrawArr[$i]['draw_date'];
							$tmp_user_entry_id = $tblDrawArr[$i]['user_entry_id'];
						}
					}

			 ?>
				<?php 
				if(isset($_REQUEST['page']))
				{
					$page = $_REQUEST['page'];
				}else{
					$page = "";
				}
				?>
				<form name="frm1" id="frm1" method="post" enctype="multipart/form-data">
				<input type="hidden" id="hid_valid_username" name="hid_valid_username" value="<?php echo $valid_username_arr_final;?>" />

				<input type="hidden" id="drawid" name="drawid" value="<?php echo $draw_id;?>">
				<input type="hidden" id="flag" name="flag" value="<?php echo $_REQUEST['flag'];?>">
				<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $page; ?>">

				<tr>
				<td class="paddingall" align="left" id="reports">
				<div id="title_report">Draw Date:</div> 
				<div id="output_report"><input type="text" id="drawdate" name="drawdate" value="<?php echo $tmp_draw_date;?>"></div>
				<script language="JavaScript">
                		        new tcal ({
                        		// form name
                        		'formname': 'frm1',
		                        // input name
        		                'controlname': 'drawdate'
                        		});
                                </script>
				</td>
				</tr>

				

				<tr>
				<td class="padding">
				<table height="36" cellspacing="0" cellpadding="3" border="0" width="100%">
				<tbody><tr>

				<td width="100%" align='left' id="but_report"><input type='button' onClick="return formValidate();" name='frmsubmit' Value='Save' colspan='3'>&nbsp;&nbsp;<input type="button" name="cmdCancel" id="cmdCancel" value="Cancel" onClick="goBack();" ></td>
				</tr>
				</tbody></table></td>
				</tr>
				</form>
				</table> 
				</td>
				</tr>
			  
            </table>			
			</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="1"><?php include(ADMIN_INC_PATH."adminFooterInner.php"); ?></td>
  </tr>
</table>
</body>
</html>