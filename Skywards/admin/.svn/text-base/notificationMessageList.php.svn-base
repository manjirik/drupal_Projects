<?php include("inc/config.php"); 
	
	include("inc/chkSession.php");
	include_once("controller/tblNotificationController.php");
	$tableName = "notification";

	$tblpageObj = new tblNotificationController();
	$pageNum = 1;

	if(isset($_GET['flg']) && isset($_GET['id'])){
		 if($_GET['flg']=='del'){
		$delid=$_GET['id'];
			$tblpageObj->deleteRecord($delid,$tableName); 
		 }
		
	}
	if(isset($_GET['page']))
	{
		$pageNum = $_GET['page'];
		$tmp_page = "&page=".$pageNum;
	}
	$sval = "";
	$type="";
	$tmp_page = "";
	if(isset($_GET['page']))
	{
		$pageNum = $_GET['page'];
		$tmp_page = "&page=".$pageNum;
	}
	$offset = ($pageNum - 1) * PAGE_ITEMS_PER_PAGE;
	if(isset($_REQUEST['type'])){
	$type = $_REQUEST['type'];
	}

	if(isset($_REQUEST['sval'])){
	$sval = $_REQUEST['sval'];
	}
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
		$_SESSION['errMsg'] = 'No records found';
		//if(!isset($_SESSION['errMsg'])&& trim($_SESSION['errMsg'])==""){$_SESSION['errMsg'] = 'No records found';}
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
		<title><?php echo ADMIN_PAGE_TITLE; ?></title>
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>cms.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="<?php echo ADMIN_CSS_PATH; ?>sdmenu.css" />
        <?php if($type=="date" || $type=="dwnload"){?>
            
        <?php
        }?>
		
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>listFunctions.js"></script>       
		<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>sdmenu.js">
		
			/***********************************************
			* Slashdot Menu script- By DimX
			* Submitted to Dynamic Drive DHTML code library: http://www.dynamicdrive.com
			* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
			***********************************************/
		</script>
		<script type="text/javascript">
			
			function delete_record(delid,path){
				
				var cy=confirm('Are you Sure you want to delete notification');
				if(cy){
				
				window.location=path+"admin/notificationMessageList.php?flg=del&id="+delid;	
			
				}else{ return false; }
				
			}
		</script>
	
	</head>
<body>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="mainwrapper">
	
	<tr>
		<td height="100">
			<div class="header"><?php include_once(ADMIN_INC_PATH."adminHeaderInner.php"); ?></div>
		</td>
	</tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" class="leftMenu" ><?php include_once(ADMIN_INC_PATH."adminLeftComponent.php"); ?></td>
        <td align="left" valign="top" class="padding rightContent"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td  align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
              <tr>
                <td class="titlebox">Notification Listing</td>
              </tr>
                    <tr>
						<td class="paddingall border" align="left" id="reports" style="padding-left:10px;"><a href="edit_notification_message.php?flag=add">Add Notification</a></td>
					</tr>          
			 	<tr>
                <td class="paddingall" valign="top">
					<?php //--main table-------------------------------------------------------------------?>
							<table width="100%" border="0" cellpadding="2" cellspacing="2" class="bigbox contenttext1">
                            	<div id="message">&nbsp;</div>
								<tr>
									<td align="center" class="headertable">Sr.No.</td>
									<td align="center" class="headertable">Title</td>
									<td align="center" class="headertable">Message</td>
									<td align="center" class="headertable">Description</td>
									<td align="center" class="headertable">Delete</td>
                                </tr>
								<?php
								
								if($tblArrCount<=0)
								{?>
								<tr><td align="center" colspan="7">
								<?php
									include_once(ADMIN_INC_PATH."noRecordsFound.php");
								?>
								</td></tr> 
								<?php }
								
								$srNo = $offset + 1;
								$trFlag=0; $trClass="";
								//---------------------------------------------------------------------------
									for($i=0; $i<$tblArrCount; $i++)
									{
										if($trFlag>0){$trClass="";}else{$trClass="bgcolor";} 
										$id = $tblArr[$i]["idnotification"];															
										$name  = $tblpageObj->getStrFrmDb($tblArr[$i]['notification_title']);
									?>
										<tr class="<?php echo $trClass; ?>">
											<td align="center"><?php echo $srNo; ?></td>
											<td align="center" id="reports"><a href="edit_notification_message.php?id=<?php echo $id.$tmp_page;?>&flag=edit" style="text-decoration:none;"><?php echo substr($name,0,15); ?></a></td>	
											<td align="center" id="reports"><a href="edit_notification_message.php?id=<?php echo $id.$tmp_page;?>&flag=edit" style="text-decoration:none;"><?php echo substr($tblArr[$i]["notification_desc"],0,40);?></a></td>	
											<td align="center" id="reports"><a href="edit_notification_message.php?id=<?php echo $id.$tmp_page;?>&flag=edit" style="text-decoration:none;"><?php echo substr($tblArr[$i]["notification_desc1"],0,40);?></a></td>
											<td align="center"><div class="changeStatus" onClick="delete_record(<?php echo $tblArr[$i]["idnotification"];?>,'<?php echo ADMIN_SITE_URL; ?>')">Delete</div></td>
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
    <td height="100"><?php include(ADMIN_INC_PATH."adminFooterInner.php"); ?></td>
  </tr>
</table>
</body>
</html>