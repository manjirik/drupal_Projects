<?php include_once("chkSession.php");
include_once("database.php"); 
include_once("tblTasksController.php");
include_once("phpFunctions.php");  
$hMonth = trim($_POST["hMonth"]);
$hYear = trim($_POST["hYear"]);
$monthArray = array("1"=>"January", "2"=>"February", "3"=>"March", "4"=>"April", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"August", "9"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
$empCode = $_SESSION["empCode"];
$todayVal = mktime(0,0,0,date('m'),1,date('Y'));
$dateVal = mktime(0,0,0,(int)$hMonth,1,(int)$hYear);
//echo "todayVal = " . $todayVal . "<br><br>";
//echo "dateVal = " . $dateVal . "<br>";
?> 	       	
<form name="frmTaskList" id="frmTaskList" method="post" action="#">
     <input type="hidden" name="hYear" id="hYear" value="<?php echo $hYear; ?>" />
     <input type="hidden" name="hMonth" id="hMonth" value="<?php echo $hMonth; ?>" />
     <input type="hidden" name="hTid" id="hTid" value="" />          
     <input type="hidden" name="hDateDiffVal" id="hDateDiffVal" value="<?php echo ($dateVal-$todayVal); ?>" />     
     <input type="hidden" name="hTdate" id="hTdate" value="" />
     <table border="0" cellpadding="0" cellspacing="0"  width="100%">
        <tr>
            <td align="left" valign="top">
                <div id="listDataDiv">
                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                        <tr>
                            <td align="left" valign="middle">
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tr>
                                        <td align="left" valign="top" class="monthName"><?php $tmpMonth = (int)$hMonth; echo $monthArray[$tmpMonth]. " " .$hYear;?></td>
                                        <td align="right" valign="top" width="32px">
                                            <table border="0" cellpadding="0" cellspacing="0" >
                                                <tr>
                                                    <td align="left" valign="top"><a href="#" onClick="addNewTask()"><img src="images/add.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Add new Task" title="Add new Task" /></a></td>
                                                    <td align="left" valign="top">&nbsp;</td>
                                                    <td align="left" valign="top"><div id="mailPng"></div><a href="#" onClick="javascript:if(confirm('You are about to mail your Timesheet to your Reporting Authority. Do you want to continue ?')){mailExcelSheet('<?php echo (int)$hMonth; ?>', '<?php echo $hYear; ?>'); }else{return false; }"><img src="images/email.png" id="mailIcon" border="0" height="16" width="16" hspace="0" vspace="0" alt="Mail your Timesheet" title="Mail your Timesheet"/></a></td>
                                                    <td align="left" valign="top">&nbsp;</td>
                                                    <td align="left" valign="top"><div id="excelPng"></div><a href="#" onClick="downloadExcelSheet('<?php echo (int)$hMonth; ?>', '<?php echo $hYear; ?>');"><img src="images/excel.png" border="0" height="16" width="16" hspace="0" vspace="0" alt="Export to Excel" title="Export to Excel"/></a></td>
                                                </tr>
                                            </table>                                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td align="center" valign="middle" class="trHeight1" ><div id="sessMsgErr" class="formErrMsg1"></div><div id="sessMsg"></div></td></tr>
                        <tr>
                            <td align="left" valign="top">                                            	
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <?php 
                                        $days = phpFunctions::daysInMonth($hMonth, $hYear);
										$taskCnt = 1;
										$todayVal = mktime(0,0,0,date('m'),date('d'),date('Y'));
                                        for($i=1; $i<=$days; $i++)
                                        {
                                            $monDate = date("d F Y, l", mktime(0,0,0,$hMonth,$i,$hYear)); 
                                            
											$posSat = strpos($monDate, "Saturday");
											$posSun = strpos($monDate, "Sunday");
											
											if($posSat === false && $posSun === false){$img = "bulb_on.png"; $toolTip = "Working day"; $className="dateDiv";} else {$img = "bulb_off.png"; $toolTip = "Weekly off"; $className="dateOffDiv";}
																				
											$dateDivId = "dateDiv" . $i; 											
											$tempDateArr = explode("-",date("m-d-Y", mktime(0,0,0,$hMonth,$i,$hYear))); 
											$dateVal = mktime(0,0,0,$tempDateArr[0],$tempDateArr[1],$tempDateArr[2]); 
											$dateValDiff = $todayVal - $dateVal; ?>
                                            <tr>                                                
                                                <?php if($dateValDiff>=0)
												{?>  
													<td align="left" valign="top" width="220px;">
														<div class="<?php echo $className; ?>" id="<?php echo $dateDivId; ?>">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td align="center" valign="middle"></td>
																	<td align="center" valign="middle"><a href="javascript:void(0);" onClick="addNewTaskDate('<?php echo date("d-m-Y", mktime(0,0,0,$hMonth,$i,$hYear)); ?>')" alt="Add new task for this date" title="Add new task for this date"><?php echo $monDate; ?></a></td>
																</tr>
															</table>
														</div>
													</td>
												<?php } else
												{?>   
													<td align="left" valign="top" width="220px;">
														<div class="<?php echo $className; ?>" id="<?php echo $dateDivId; ?>">
															<table border="0" cellpadding="0" cellspacing="0">
																<tr>
																	<td align="center" valign="middle"></td>
																	<td align="center" valign="middle"><?php echo $monDate; ?></td>
																</tr>
															</table>
														</div>
													</td>
												<?php } ?>
												<td align="left" valign="top" class="tdHwidth2"></td>
                                                <td align="left" valign="top">                                                        	                                                                                                                                                                                
                                                       <?php 
                                                           //getting all the tasks for current date
                                                           $curDate = $hYear."-".$hMonth."-".$i;
                                                           $daysTasksArr = tblTasksController::getTasksForTheDay(array("empCode"=>$empCode, "tDate"=>$curDate));
                                                           $daysTasksArrCnt = count($daysTasksArr);																						   
                                                           if($daysTasksArrCnt<=0)
                                                           {
                                                                echo "&nbsp;";
                                                           }
                                                           else
                                                           {?>
                                                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                    <?php 
                                                                    for($t=0; $t<$daysTasksArrCnt; $t++)
                                                                    {
                                                                        $tid 			 = $daysTasksArr[$t]["task_id"];                                                                         
                                                                        $dayTaskDiv 	 = "dayTaskDiv" . $taskCnt; 
                                                                        $trDiv 			 = "trDiv" . $taskCnt; 
                                                                        $taskTimeDivId 	 = "taskTimeDiv" . $taskCnt; 
																		$taskTypeDivId 	 = "taskTypeDiv" . $taskCnt;
																		$taskHrsDivId 	 = "taskHrsDiv" . $taskCnt;
																		$taskStatusDivId = "taskStatusDiv" . $taskCnt;
																		if($daysTasksArr[$t]["task_type"]==1){$taskType="Internal";}else{$taskType="External";}
																		if($daysTasksArr[$t]["task_status"]==1){$taskStatus="Completed";}else{$taskStatus="In progress";} ?>
                                                                        <tr>
                                                                            <td align="left" valign="top">																													
                                                                                <div id="<?php echo $dayTaskDiv; ?>">
                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                        <tr>
                                                                                            <td align="left" valign="top">                                                                                                                                    
																								<table border="0" cellpadding="0" cellspacing="0" width="65%">
                                                                                                    <tr>
                                                                                                        <td align="center" valign="middle"><div class="timeDiv" id="<?php echo $taskTimeDivId; ?>"><?php echo date("h:i a",strtotime($daysTasksArr[$t]["task_st_time"])); ?>&nbsp;&nbsp;to&nbsp;&nbsp;<?php echo date("h:i a",strtotime($daysTasksArr[$t]["task_en_time"])); ?></div></td>                                                                                                                                                                                                                
                                                                                                        <td align="left" valign="top" class="smallSpacerWidth">&nbsp;</td>
                                                                                                        <td align="center" valign="middle"><div class="timeDiv" id="<?php echo $taskHrsDivId; ?>"><?php echo $daysTasksArr[$t]["task_hrs"]." hrs"; ?></div></td>
                                                                                                        <td align="left" valign="top" class="smallSpacerWidth">&nbsp;</td>
                                                                                                        <td align="center" valign="middle"><div class="timeDiv" id="<?php echo $taskTypeDivId; ?>"><?php echo $taskType; ?></div></td>                                                                    
                                                                                                        <td align="left" valign="top" class="smallSpacerWidth">&nbsp;</td>
                                                                                                        <td align="center" valign="middle"><div class="timeDiv" id="<?php echo $taskStatusDivId; ?>"><?php echo $taskStatus; ?></div></td>                                                                    
                                                                                                    </tr>
                                                                                                </table>                                                                  
                                                                                            </td>                                                                    
                                                                                        </tr>
                                                                                        <tr><td class="trHeight2"></td></tr>
                                                                                        <tr>
                                                                                            <td align="left" valign="top">
                                                                                                <?php $taskDivId = "taskDiv" . $taskCnt; ?>
                                                                                                <?php $delDivId = "delDivId" . $taskCnt; ?>
                                                                                                <div class="taskDiv" id="<?php echo $taskDivId; ?>">                                                                                        
                                                                                                    <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                                                        <tr>
                                                                                                            <td align="left" valign="top" class="prjText"><?php echo phpFunctions::showStr($daysTasksArr[$t]["task_project"]); ?></td>
                                                                                                        </tr>
                                                                                                        <tr><td class="trHeight2"></td></tr>
                                                                                                        <tr>
                                                                                                            <td align="left" valign="top"><?php echo phpFunctions::showStr($daysTasksArr[$t]["task_desc"]); ?></td>
                                                                                                        </tr>
                                                                                                        <tr><td class="trHeight2"></td></tr>
                                                                                                        <tr>
                                                                                                            <td align="right" valign="top">
                                                                                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                                                                                    <tr>
                                                                                                                        <td align="left" valign="top"><a href="javascript:void(0);" onClick="editTask('<?php echo $tid; ?>')"><img src="images/edit.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Edit" title="Edit" /></a></td>
                                                                                                                        <td align="left" valign="top">&nbsp;</td>
                                                                                                                        <td align="left" valign="top"><div id="<?php echo $delDivId; ?>"></div><a href="javascript:void(0);" onClick="deleteTask('<?php echo $tid; ?>', '<?php echo $dayTaskDiv; ?>', '<?php echo $trDiv; ?>', '<?php echo $delDivId; ?>'); "><img src="images/delete.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Edit" title="Edit" /></a></td>
                                                                                                                    </tr>
                                                                                                                </table>                                                                                                                                                                                        	
                                                                                                            </td>
                                                                                                       </tr>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </td>                                                                    
                                                                                        </tr>                                                                
                                                                                    </table>                                                                                                                                                                                                                                                                                                                                                                                                
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr id="<?php echo $trDiv; ?>"><td class="trHeight2"></td></tr>
                                                                    	<?php $taskCnt++;
																	} //end of inner for loop ?>
                                                                    <input type="hidden" name="hTCount" id="hTCount" value="<?php echo $t; ?>" />
                                                                </table>
                                                           <?php }
                                                       ?>																						
                                                </td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="3"></td></tr>
                                        <?php } //end of outer for loop ?>                                                                                                                                                                                                                       	                                                                       
                                </table>                                                
                            </td>
                        </tr>                                                                                                                                                                               
                    </table>
                </div>
            </td>
        </tr>
	</table>
</form>
<input type="hidden" name="hTaskCnt" id="hTaskCnt" value="<?php echo $taskCnt; ?>" />
<?php if((int)$taskCnt<=1){$_SESSION["errMsg"]="No Task(s) for this month.";}else{$_SESSION["errMsg"]="";}?>