<?php include("inc/config.php"); 
	include("inc/chkSession.php");
	include_once("controller/tblCityController.php");	
	$tableName = "location";
	$tblpageObj = new tblCityController();
	 
	$pageNum = 1;
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

	case "cityname":
		$pType = $type;
			$pageAppend.="&type=".$pType."&order=".$_REQUEST['order']."&sval=".$sval;
			$paramArray = array
				(	
				"offset" => $offset,
				"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
				"type" => $pType,
				"order" => $_REQUEST['order']
				);
		break;

	case "filter":
		$pType = $type;
		$pageAppend.="&filter_text=".$_REQUEST['filter_text']."&type=".$pType."&sval=".$sval;
		$paramArray = array
		(	
			"offset" => $offset,
			"rowsPerPage" => PAGE_ITEMS_PER_PAGE,
			"type" => $pType
		);
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
<?php require_once("header.php");?>

<script type="text/javascript">
function change_status(id, tableName)
{
	// call ajax to interchange order.
	var dataString = "Id=" + id +"&tableName="+tableName;
	//alert(dataString)
	$.ajax
	(
		{   									
			type: "POST", url: "changeCityStatus.php", data: dataString, 
			success: 
				function(data) 
				{ 		
 			
					window.location.reload();
				},
			error: 
				function (XMLHttpRequest, textStatus, errorThrown) 
				{
																					
				}
		}
	)
}
</script>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="1" align="left" valign="top" class="leftMenu"><?php include_once(ADMIN_INC_PATH."adminLeftComponent.php"); ?></td>
        <td align="left" valign="top" class="padding rightContent"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr>
            <td  align="left" valign="top" class="paddingtop"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="bigbox">
              <tr>
                <td class="titlebox">Emirates City Listing</td>
              </tr>
			<!--   <tr>
					<td class="paddingall border" align="left" id="reports">
						<form method="post" id="frm" name="frm" action="">
							<table>
								<tr>
									<td id="reports">
									<?php if(isset($_REQUEST['filter_text'])){
										$filter_text = $_REQUEST['filter_text'];
									}else{
										$filter_text = "";
									}
									
									?>
										<input type="text" name="filter_text" id="filter_text" value="<?php echo $filter_text;?>" />
									</td>
									<td>
										<input type="button" name="sval" id="sval" value="Filter"  onClick="change_filter()" />
									</td>
								</tr>
							</table>
						</form>
					</td>
               </tr> -->
                    <tr>
						<td class="paddingall border" align="left" id="reports" style="padding-left:10px;"><a href="edit_city_details.php?flag=add">Add City</a></td>
					</tr>          
			 	<tr>
                <td class="paddingall" valign="top">
					<?php //--main table-------------------------------------------------------------------?>
							<table width="100%" border="0" cellpadding="2" cellspacing="2" class="bigbox contenttext1">
                            	<div id="message">&nbsp;</div>
								<tr>
									<td align="center" class="headertable">Sr.No.</td>
                                    <td align="center" class="headertable">Image</td>
									<td align="center" class="headertable" id="reports"><a href="cityList.php?type=cityname&order=<?php if(isset($_REQUEST['order'])){if($_REQUEST['order'] == 'desc'){
									echo 'asc';}elseif($_REQUEST['order'] == 'asc'){ echo 'desc'; }}else{ echo 'asc'; }?>&sval=Show">Name</a></td>
									<td align="center" class="headertable">Latitude / Longitude</td>
									<td align="center" class="headertable">Description</td>		
									<td align="center" class="headertable">Status</td>										
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
										 
										$id = $tblArr[$i][$tblpageObj->city_id];
										$city_name = $tblArr[$i][$tblpageObj->city_name];
										$image = CITY_IMAGES_URL.$tblpageObj->getStrFrmDb($tblArr[$i][$tblpageObj->city_image]);
										$desc = stripslashes($tblArr[$i][$tblpageObj->short_desc]);
										$city_latitude = $tblArr[$i][$tblpageObj->latitude];
										$city_longitude = $tblArr[$i][$tblpageObj->longitude];
										
										if($tblArr[$i]["status"] == '0')
										{
											if($trClass != "")
											{
												$trClass .= " ";
											}
											$trClass .= "boldClass";
											$status = "Unpublished";
										}elseif($tblArr[$i]["status"] == '1')
										{
											$status = "Published";
										}
										
										
									?>
										<tr class="<?php echo $trClass; ?>">
											<td align="center"><?php echo $srNo; ?></td>
											<td align="center" id="reports"><img src="<?php echo $image; ?>" width="80" height="80" border="0" /></td>	
											<td align="center" id="reports"><a href="edit_city_details.php?id=<?php echo $id.$tmp_page;?>&flag=edit" style="text-decoration:none;"><?php echo $city_name; ?></a></td>	
											<td align="center" id="reports">Latitude: <?php echo $city_latitude; ?><br />Longitude: <?php echo $city_longitude; ?></td>	<td align="center" id="reports"><?php echo $desc; ?></td>	
											<td align="center"><div class="changeStatus" onClick="change_status(<?php echo $id;?>,'<?php echo $tableName; ?>')"><?php echo $status;?></div></td>
											 
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
  <?php require_once("footer.php"); ?>