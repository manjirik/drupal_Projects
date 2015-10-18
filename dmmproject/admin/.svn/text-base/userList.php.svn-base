<?php
	include_once "inc/config.php"; 
	include_once "inc/chkSession.php";
	include_once "controller/tblUserController.php";
	$tblpageObj = new tblUserController();
	$pageNum = 1;
	if(isset($_GET['page']))
	{
		$pageNum = $_GET['page'];
		$tmp_page = "&page=".$pageNum;
	}
	$offset = ($pageNum - 1) * PAGE_ITEMS_PER_PAGE;
	$type = $_REQUEST['type'];
	$sval = $_REQUEST['sval'];
	$pageAppend="";
	$pageAppend="";
	
	if($sval=="Show"){
	switch ($type) {
	case "country":
		$pType = $type;
		$countryName = $_REQUEST['countryList'];
		if($countryName=="all"){
			$paramArray = array
			(	
				"offset" => $offset,
				"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
				"type" => $countryName
			);
		}else{
			$pageAppend.="&type=".$pType."&countryList=".$countryName."&sval=".$sval;
			$paramArray = array
			(	
				"offset" => $offset,
				"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
				"type" => $pType,
				"countryName" => $countryName
			);
		}
		break;
	case "date":
		$pType = $type;
		$frmDate = $_REQUEST['frmDate'];
		$toDate = $_REQUEST['toDate'];
		$pageAppend.="&type=".$pType."&frmDate=".$frmDate."&toDate=".$toDate."&sval=".$sval;
		$paramArray = array
		(	
			"offset" => $offset,
			"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
			"type" => $pType,
			"frmDate" => $frmDate,
			"toDate" => $toDate
		);
		break;
		default:
	   $pType = "all";
	   $pageAppend.="&type=all";
	   $paramArray = array
	   (	
			"offset" => $offset,
			"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
			"type" => $pType
		);
	}
	
	}
	else
	{
		$pType = "all";
		$paramArray = array
		(	
			"offset" => $offset,
			"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
			"type" => $pType
		);
	}
	
	$tblArr = $tblpageObj->getPagging($paramArray);
	$tblArrCount = count($tblArr);
	
	
	if($tblArrCount <=0)
	{
		if(!isset($_SESSION['errMsg'])&& trim($_SESSION['errMsg'])==""){$_SESSION['errMsg'] = 'No records found';}
	}
	
	$numrows = $tblpageObj->getTotalRecordCount($paramArray);
	
	/*if($numrows>0 && $tblArrCount<=0)
	{					
		 $goTo = "userList.php?page=".($pageNum-1).$pageAppend;
		header("location: ".$goTo);
		die;
	}*/
	
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo ADMIN_PAGE_TITLE; ?>Users Listing</title>
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
                <td class="titlebox">Users Listing</td>
              </tr>
              	
             <tr>
                <td class="paddingall border" align="right" id="reports">
                <?php if($type!="") {?>
                	<form method="post" id="frm" name="frm" action="">
					<!-- <?php if($type=="country"){?>
                        <select name='countryList' id="countryList" class="selList">
                        	<option value="all" <?php if(!$countryName) { print "selected"; }?>>All</option>
                            <?php
                            for($k=0;$k<sizeof($arCountryList);$k++)
                            {
                            	if($_REQUEST["countryList"]==$arCountryList[$k]['country_res'])
                            	{
                            ?>
                   			<option value="<?php echo $arCountryList[$k]['country_res']?>" selected><?php echo $arCountryList[$k]['country_res'];?></option>
                            	
                            <?php
                            }
                            else
                            {
                            ?>
                            <option value="<?php echo $arCountryList[$k]['country_res']?>"><?php echo $arCountryList[$k]['country_res'];?></option>	
                            <?php 
                             }
							} 
                            ?>
                            
                       </select>	
                        <input type="submit" name="sval" id="sval" value="Show"  onClick="return validate('country')">
                    <?php
                    } ?> -->
                    
                    <?php if($type=="date"){?>
                        From&nbsp;<input type="text" id="frmDate" name="frmDate" value="<?php print $frmDate;?>" readonly>
						<script language="JavaScript">
                        new tcal ({
                        // form name
                        'formname': 'frm',
                        // input name
                        'controlname': 'frmDate'
                        });
                        
                        </script>
                        &nbsp;&nbsp; To&nbsp;<input type="text"  readonly id="toDate" value="<?php print $toDate;?>" name="toDate">
						<script language="JavaScript">
                        new tcal ({
                        // form name
                        'formname': 'frm',
                        // input name
                        'controlname': 'toDate'
                        });
                        
                        </script>
                        <input type="submit" name="sval" id="sval" value="Show"  onClick="return validate('date')">			
                    <?php
                    } if($type=="dwnload"){?>
                        From&nbsp;<input type="text" id="frmDate" name="frmDate" value="<?php print $frmDate;?>" readonly>
						<script language="JavaScript">
                        new tcal ({
                        // form name
                        'formname': 'frm',
                        // input name
                        'controlname': 'frmDate'
                        });
                        
                        </script>
                        &nbsp;&nbsp; To&nbsp;<input type="text"  readonly id="toDate" value="<?php print $toDate;?>" name="toDate">
						<script language="JavaScript">
                        new tcal ({
                        // form name
                        'formname': 'frm',
                        // input name
                        'controlname': 'toDate'
                        });
                        
                        </script>
                        <input type="submit" name="sval" id="sval" value="Show"  onClick="return validate('date')">			
                    <?php
                    }?>
                    
                    </form>
					<?php
				}
				?>
                &nbsp;
               <!--  <a href="userList.php?page=1&type=country" <?php if($type=="country") {?> class="selLink" <?php }?>>Countrywise</a>&nbsp;|&nbsp; --><a href="userList.php?page=1&type=date" <?php if($type=="date") {?> class="selLink" <?php }?>>Datewise</a></td>
              </tr>
			  <!-- <tr>
                <td class="paddingall border" align="right" id="reports"><?php if(isset($_REQUEST['frmDate'])){?><a href="dmmDownload.php?type=date&frmDate=<?php echo $_REQUEST['frmDate']?>&toDate=<?php echo $_REQUEST['toDate']?>"><?}else{?><a href="dmmDownload.php?type=all"><?php } ?>Export to Excel</a>
				</td>
              </tr> -->
              
			 	<tr>
                <td class="paddingall" valign="top">
							<form name="frmListForm" id="frmListForm" action="#" method="post">
								<input type="hidden" name="hTotalChkBoxes" id="hTotalChkBoxes" value="<?php echo $tblArrCount; ?>" >
								<input type="hidden" name="hIsAllSelected" id="hIsAllSelected" value="0" >
								<input type="hidden" name="hSelectedCount" id="hSelectedCount" value="0" >
								<input type="hidden" name="hRecordId" id="hRecordId" value="0" >
								<input type="hidden" name="hAllIds" id="hAllIds" value="" >
								<input type="hidden" name="hActType" id="hActType" value="0" >
								<input type="hidden" name="hPageNum" id="hPageNum" value="<?php echo $pageNum; ?>" >
								<input type='hidden' name='hRefLangId' id='hRefLangId' value='' >	
								<input type='hidden' name='hConverTo' id='hConverTo' value='' >								
							</form>
							<table width="100%" border="0" cellpadding="2" cellspacing="2" class="bigbox contenttext1">
                            	<div id="message">&nbsp;</div>
								<tr>
									<td align="center" class="headertable">Sr.No.</td>
									<td align="center" class="headertable">Name</td>
									<td align="center" class="headertable">DMM Company Name</td>
                                    <td align="center" class="headertable">Email</td>
                                    <td align="center" class="headertable">Songs Uploaded</td>
									<td align="center" class="headertable">Billboard Uploaded</td>
                                    <td align="center" class="headertable">Status</td>
                                    <td align="center" class="headertable">Create Date</td>
                                </tr>
								<?php
								
								if($tblArrCount<=0)
								{?>
								<tr><td align="center" colspan="7">
								<?php
									include_once ADMIN_INC_PATH."noRecordsFound.php";
								?>
								</td></tr> 
								<?php }
								
								$srNo = $offset + 1;
								$trFlag=0; $trClass="";
								//---------------------------------------------------------------------------
									for($i=0; $i<$tblArrCount; $i++)
									{
										if($trFlag>0){$trClass="";}else{$trClass="bgcolor";} 
										$id = $tblArr[$i]["id"];
										$userStatus = $tblArr[$i]["status"];
										if($userStatus==1){
											$userStatus = 'checked="Checked"';
										}else{
											$userStatus = '';	
										}

										$getSongsUploadedCount = $tblpageObj->getSongsUploadedCount($tblArr[$i]["id"]);
										$getBillboardUploadedCount = $tblpageObj->getBillboardUploadedCount($tblArr[$i]["id"]);
									?>
										<tr class="<?php echo $trClass; ?>">
											<td align="center"><?php echo $srNo; ?></td>
											<td align="center" id="reports"><a href="edit_user_details.php?id=<?php echo $id.$tmp_page;?>"><?php echo $tblpageObj->getStrFrmDb($tblArr[$i]["name"]); ?></a></td>									
											<td align="center" id="reports"><a href="edit_user_details.php?id=<?php echo $id.$tmp_page;?>"><?php echo $tblpageObj->getStrFrmDb($tblArr[$i]["dmm_company_name"]); ?></a></td>
                                            <td align="center"><?php echo $tblpageObj->getStrFrmDb($tblArr[$i]["email"]); ?></td>
                                            <td align="center" id="reports"><a href="userSongsList.php?id=<?php echo $id;?>"><?php echo $getSongsUploadedCount; ?></a></td>
											<td align="center" id="reports"><a href="userBillboardList.php?id=<?php echo $id;?>"><?php echo $getBillboardUploadedCount; ?></a></td>
                                            <td align="center"><input type="checkbox" name="<?php echo $chkBox; ?>" id="<?php echo $chkBox; ?>" value="<?php echo $id; ?>" <?php echo $userStatus;?> onclick="setUser(this,<?php echo $tblArr[$i]["id"];?>)"></td>
											<td align="center"><?php echo $tblpageObj->getStrFrmDb($tblArr[$i]["create_date"]); ?></td>
                                        </tr>										
										<?php $srNo++; if($trFlag==1){$trFlag=0;}else{$trFlag=1;}
									} //end of for loop
								//---------------------------------------------------------------------------
								
								$showPagination = 0;																		
								$maxPage = ceil($numrows/PAGE_ITEMS_PER_PAGE);
								$self = $_SERVER['PHP_SELF'];
								if($pageNum > 1)
								{
									$page = $pageNum - 1;
									$prev = "<a title='' alt=''  href=\"$self?page=$page$pageAppend\"><img src='". ADMIN_IMAGE_PATH ."leftarrow.png' alt='' width='21' height='19' border='0'></a>";	
									$first = "<a title='' alt=''  href=\"$self?page=1$pageAppend\"><img src='". ADMIN_IMAGE_PATH ."leftarrows.png' alt='' width='21' height='19' border='0'></a>";
									$showPagination = 1;
								} 
								else
								{
									$prev  = "<img src='". ADMIN_IMAGE_PATH ."leftarrow-off.png' alt='' width='21' height='19' border='0'>";
									$first = "<img src='". ADMIN_IMAGE_PATH ."leftarrows-off.png' alt='' width='21' height='19' border='0'>";
								}
								if ($pageNum < $maxPage)
								{
									$page = $pageNum + 1;
									$next = "<a title='' alt=''  href=\"$self?page=$page$pageAppend\"><img src='". ADMIN_IMAGE_PATH ."rightarrow.png' alt='' width='21' height='19' border='0'></a>";	
									$last = "<a title='' alt=''  href=\"$self?page=$maxPage$pageAppend\"><img src='". ADMIN_IMAGE_PATH ."rightarrows.png' alt='' width='21' height='19' border='0'></a>";
									$showPagination = 1;
								} 
								else
								{
									$next = "<img src='". ADMIN_IMAGE_PATH ."rightarrow-off.png' alt='' width='21' height='19' border='0'>";
									$last = "<img src='". ADMIN_IMAGE_PATH ."rightarrows-off.png' alt='' width='21' height='19' border='0'>";
								}
								if((int)$showPagination ==1)
								{?>
									<tr>
										<td colspan="12" class="bottomtable">
											<table border="0" align="center" cellpadding="0" cellspacing="0">
												<tr>
													<td width="42" align="right"><?php echo $first; ?></td>
													<td width="38" align="right"><?php echo $prev; ?></td>
													<td align="center" valign="middle" width="161" class="smalltext">Showing page <strong><?php echo $pageNum; ?></strong>&nbsp;of&nbsp;<strong><?php echo $maxPage; ?></strong> pages</td>
													<td width="38" align="left"><?php echo $next; ?></td>
													<td width="42" align="left"><?php echo $last; ?></td>
												</tr>
											</table>
										</td>
									</tr>
								<?php } ?>
							</table>							
						<?php// } ?>
					<?php //--main table-------------------------------------------------------------------?>
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