<?php include_once("chkSession.php");
include_once("database.php"); 
include_once("tblTasksController.php");
include_once("phpFunctions.php"); 
$empCode = $_SESSION["empCode"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Timesheet</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/timesheet.css" />
        <script language="javascript" type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.corner.js"></script> 
        <script language="javascript" type="text/javascript" src="js/common.js"></script>        
        <script language="javascript" type="text/javascript">            
			$(document).ready
			(	
				function() 
				{															
					$("#siteHeader").fadeIn(600);	
					
					$('#yearDiv').corner();
					$("#yearDiv").fadeIn(600);
					
					$('#monthsDiv').corner();
					$("#monthsDiv").fadeIn(600);
					
					$('#listDiv').corner();
					$("#listDiv").fadeIn(600);
					
					$('#addNewDiv').corner();
					$("#addNewDiv").fadeIn(1000);	
					
					$('#janMonthTab').corner();
					$('#febMonthTab').corner();	
					$('#marMonthTab').corner();
					$('#aprMonthTab').corner();
					$('#mayMonthTab').corner();
					$('#junMonthTab').corner();
					$('#julMonthTab').corner();
					$('#augMonthTab').corner();
					$('#sepMonthTab').corner();
					$('#octMonthTab').corner();
					$('#novMonthTab').corner();
					$('#decMonthTab').corner();
					$('#lodingMsgDiv').corner();
					
					
					makeDayDivRound();
					makeRound();
				}				
			);	
			function showMonths()
			{
				$("div[id$='MonthTab']").addClass("tMonthDiv");
				
				$("#listDiv").fadeOut(600);
				$("#monthsDiv").fadeOut(600);
								
				$("#monthsDiv").fadeIn(600);
				$("input#hYear").val( $.trim($("#cmbYear").val()) );			
			};
			function showTasks(monthVal,monName)
			{
				//$("#listDiv").fadeOut(600);
				
				$("div[id$='MonthTab']").addClass("tMonthDiv");
				var actMonthName = monName + "MonthTab";	
				$(actMonthName).removeClass('tMonthDiv').addClass("tActMonthDiv");
				$("input#hMonth").val(monthVal);
				
				var hYear 	= $.trim($("input#hYear").val());
				var hMonth 	= $.trim($("input#hMonth").val());				
				var dataString = "hYear=" + hYear + "&hMonth=" + hMonth;
				
				$.ajax
				(
					{   
						type: "POST", url: "ajaxListDataDiv.php", data: dataString,   
						success: 
							function(data) 
							{ 
								$("#listDiv").fadeIn(600);
								$("#listDataDiv").html(data);
								
								makeDayDivRound();
								makeRound();																																	
							},
						error: 
							function (XMLHttpRequest, textStatus, errorThrown) 
							{
								$("#listDiv").html('Timeout contacting server..');
								$("#listDiv").html(data);																	
							}
					}
				)
			};
			function addNewTask()
			{
				var hDateDiffVal = $.trim($("input#hDateDiffVal").val()); 				
				$("#sessMsgErr").html('').hide();
				if(parseInt(hDateDiffVal)>0)
				{					
					$("#sessMsgErr").html("Task(s) can not be added for future dates.");
					$("#sessMsgErr").fadeIn(400).fadeOut(400).fadeIn(400);				
					setTimeout(hideSessionMsg, 3000); 
				}
				else
				{
					document.getElementById("frmTaskList").action = "addNew.php"; 
					document.getElementById("frmTaskList").submit();			
				}
			};
			function editTask(tid)
			{
				if(parseInt(tid)>0)
				{
					$("input#hTid").val(tid);
					document.getElementById("frmTaskList").action = "edit.php"; 
					document.getElementById("frmTaskList").submit();				
				}
			};
			function deleteTask(tid, dayTaskDiv, trDiv, delDivId)
			{
				if(parseInt(tid)>0 && dayTaskDiv!="" && trDiv!="" && delDivId!="")
				{
					if(confirm("Do you want to delete this task ?"))
					{						
						var dataString = "tid=" + tid;
						$.ajax
						(
							{   
								type: "POST", url: "ajaxDeleteTask.php", data: dataString,   
								success: 
									function(data) 
									{ 										
										var delId = "#" + delDivId; 
										$(delId).html(data);
										
										var hDeleteTaskErrFlag = $.trim($("input#hDeleteTaskErrFlag").val());
										
										if(parseInt(hDeleteTaskErrFlag)>0)
										{
											//$('#addMsgDiv').load("messages.php");
											//setTimeout(continueExecution, 2000);
											
											var tDivName = "#" + dayTaskDiv;
											var trDiv = "#" + trDiv;
											
											$(tDivName).fadeOut(600);
											//$(tDivName).html('');
											//$(tDivName).slideUp("slow");
											//$(tDivName).remove();
																	
											$(trDiv).fadeOut(600);
											//$(trDiv).html('');
											//$(trDiv).slideUp("slow");
											//$(trDiv).remove();										
										}
										else
										{
											//$('#addMsgDiv').load("messages.php");
										}	
									},
								error: 
									function (XMLHttpRequest, textStatus, errorThrown) 
									{
										$(delDivId).html('Timeout contacting server..');
										$(delDivId).html(data);																	
									}
							}
						)
					}
				}			
			};
			function mailExcelSheet(month, year)
			{				
				var hDateDiffVal = $.trim($("input#hDateDiffVal").val()); 				
				$("#sessMsgErr").html('').hide();
				if(parseInt(hDateDiffVal)>0)
				{					
					$("#sessMsgErr").html("Task(s) can not be mailed for future dates.");
					$("#sessMsgErr").fadeIn(400).fadeOut(400).fadeIn(400);				
					setTimeout(hideSessionMsg, 3000); 
				}
				else
				{
					var hTaskCnt = $.trim($("input#hTaskCnt").val()); 				
					$("#sessMsgErr").html('').hide();
													
					if(parseInt(hTaskCnt)<=1)
					{					
						$("#sessMsgErr").html("No Task(s) for this month");
						$("#sessMsgErr").fadeIn(400).fadeOut(400).fadeIn(400);				
						setTimeout(hideSessionMsg, 3000); 
					}
					else
					{
						var dataString = "month=" + month + "&year=" + year;
						
						$("#mailIcon").ajaxStart(function(){document.getElementById("mailIcon").src="images/ajax_loader.gif";});				
						$("#mailIcon").ajaxComplete(function(event,request, settings){document.getElementById("mailIcon").src="images/email.png";});
		 
						$.ajax
						(
							{   
								type: "POST", url: "ajaxMailExcel.php", data: dataString,   						
								success: 
									function(data) 
									{ 								
										$("#mailPng").html(data);
																										
										$('#sessMsg').load("messages.php");																																																
										$("#sessMsg").fadeIn("slow");
										setTimeout(hideSessionMsg, 3000);
									},
								error: 
									function (XMLHttpRequest, textStatus, errorThrown) 
									{
										$("#mailPng").html('Timeout contacting server..');
										$("#mailPng").html(data);																	
									}
							}
						)
					}
				}	
			};			
			function downloadExcelSheet(month, year)
			{
				var hDateDiffVal = $.trim($("input#hDateDiffVal").val()); 				
				$("#sessMsgErr").html('').hide();
				if(parseInt(hDateDiffVal)>0)
				{					
					$("#sessMsgErr").html("Task(s) can not be exported for future dates.");
					$("#sessMsgErr").fadeIn(400).fadeOut(400).fadeIn(400);				
					setTimeout(hideSessionMsg, 3000); 
				}
				else
				{
					var hTaskCnt = $.trim($("input#hTaskCnt").val()); 				
					$("#sessMsgErr").html('').hide();
													
					if(parseInt(hTaskCnt)<=1)
					{					
						$("#sessMsgErr").html("No Task(s) for this month");
						$("#sessMsgErr").fadeIn(400).fadeOut(400).fadeIn(400);				
						setTimeout(hideSessionMsg, 3000); 
					}
					else
					{
						document.frmTaskList.action = "writeExcel.php?month=" + month + "&year=" + year;
						document.frmTaskList.submit();			
					}
				}
			};
			function hideSessionMsg()
			{
				 //$("#sessMsg").remove();
				 $("#sessMsg").hide();
				 $("#sessMsgErr").hide();
			};
			function addNewTaskDate(tDate)
			{
				$("input#hTdate").val(tDate); 	
				document.frmTaskList.action = "addNew.php";
				document.frmTaskList.submit();			
			};							
        </script>        
    </head>    
    <body>
    	<!--<div class="topMsgDiv" id="lodingMsgDiv">
        	<table border="0" cellpadding="0" cellspacing="0" align="center">
            	<tr>
                	<td align="center" valign="middle"><img src="images/ajax_loader.gif" hspace="0" vspace="0" border="0" /></td>
                    <td align="center" valign="middle">&nbsp;</td>
                    <td align="center" valign="top">Processing...</td>
                </tr>
            </table>
        </div>-->    	    
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr><td class="header"><?php include_once("inc/headerInner.php"); ?></td></tr>
            <tr><td class="trHeight1"></td></tr>           
            <tr>
                <td align="center" valign="top">                    
                    <table border="0" cellpadding="0" cellspacing="0" align="center" >
                        <tr>
                            <td align="left" valign="top">
                                <div class="tDiv" id="yearDiv">                                                                      
                                   <form name="frmYear" id="frmYear" method="post" action="#">
                                       <table border="0" cellpadding="0" cellspacing="0"  >
                                            <tr>
                                                <td align="left" valign="middle">Select Year</td>
                                                <td align="left" valign="middle">:&nbsp;</td>
                                                <td align="left" valign="middle">
                                                    <select name="cmbYear" id="cmbYear" class="button">
                                                        <?php 
                                                            $stYear = date("Y")-1; 
                                                            $enYear = date("Y");
                                                            for($i=$stYear; $i<=$enYear; $i++)
                                                            {?>
                                                                <option value="<?php echo $i;?>" <?php if(date("Y")==$i){echo "selected";} ?> ><?php echo $i;?></option>                                                            
                                                            <?php }
                                                        ?>
                                                    </select>
                                                </td>
                                                <td align="left" valign="middle" class="tdHwidth1"></td>
                                                <td align="left" valign="middle"><input type="button" name="cmdSubmit" id="cmdSubmit" value="Go" onClick="showMonths()" class="button"/></td>
                                            </tr>
                                       </table>
                                   </form>                                                                      
                                </div>
                            </td>
                        </tr>                        
                    </table>                    
                </td>
            </tr>            
            <tr><td class="trHeight1"></td></tr>
            <tr>
                <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" align="center" >
                        <tr>
                            <td align="left" valign="top">
                                <div class="tYearDiv" id="monthsDiv">
									<?php $monthClass = "tMonthDiv"; $activeMonthClass = "tActMonthDiv"; ?>        
                                    <table border="0" cellpadding="2" cellspacing="2"  >
                                        <tr>
                                            <td align="left" valign="middle"><div id="janMonthTab" class="<?php if(date("m")==1){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('1',  '#jan')">January</a>&nbsp;</div></td>                                           
                                            <td align="left" valign="middle"><div id="febMonthTab" class="<?php if(date("m")==2){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('2',  '#feb')">February</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="marMonthTab" class="<?php if(date("m")==3){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('3',  '#mar')">March</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="aprMonthTab" class="<?php if(date("m")==4){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('4',  '#apr')">April</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="mayMonthTab" class="<?php if(date("m")==5){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('5',  '#may')">May</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="junMonthTab" class="<?php if(date("m")==6){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('6',  '#jun')">June</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="julMonthTab" class="<?php if(date("m")==7){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('7',  '#jul')">July</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="augMonthTab" class="<?php if(date("m")==8){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('8',  '#aug')">August</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="sepMonthTab" class="<?php if(date("m")==9){echo $activeMonthClass;  } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('9',  '#sep')">September</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="octMonthTab" class="<?php if(date("m")==10){echo $activeMonthClass; } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('10', '#oct')">October</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="novMonthTab" class="<?php if(date("m")==11){echo $activeMonthClass; } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('11', '#nov')">November</a>&nbsp;</div></td>
                                            <td align="left" valign="middle"><div id="decMonthTab" class="<?php if(date("m")==12){echo $activeMonthClass; } else{echo $monthClass;}?>">&nbsp;<a href="javascript:void(0);" alt="" title="" onClick="showTasks('12', '#dec')">December</a>&nbsp;</div></td>
                                        </tr>                                    
									</table>                                    
                                </div>
                            </td>
                        </tr>                        
                    </table>       
                </td>
            </tr>
            <tr><td class="trHeight1"></td></tr>
            <tr>
                <td align="left" valign="top">
                    <table border="0" cellpadding="0" cellspacing="0" align="center" width="70%">
                        <tr>
                            <td align="left" valign="top">
                                <div class="tListDiv" id="listDiv">        
                                     <form name="frmTaskList" id="frmTaskList" method="post" action="#">
                                         <input type="hidden" name="hYear" id="hYear" value="<?php echo date("Y"); ?>" />
                                         <input type="hidden" name="hMonth" id="hMonth" value="<?php echo date("n"); ?>" />
                                         <input type="hidden" name="hTid" id="hTid" value="" />
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
                                                                            <td align="left" valign="top" class="monthName"><?php echo date("F"). " " .date("Y");?></td>
                                                                            <td align="right" valign="top" width="32px">                                                                            	
                                                                                <table border="0" cellpadding="0" cellspacing="0" >
                                                                                    <tr>
                                                                                    	  <td align="left" valign="top"><a href="emplist.php"><img src="images/view2.jpg" border="0" width="16" height="16" hspace="0" vspace="0" alt="View" title="View" /></a></td> 
                                                                                      <!--  <td align="left" valign="top"><a href="javascript:void(0)" onClick="addNewTask()"><img src="images/add.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Add new Task" title="Add new Task" /></a></td> -->
                                                                                        <td align="left" valign="top">&nbsp;</td>
                                                                                        <td align="left" valign="top"><div id="mailPng"></div><a href="#" onClick="javascript:if(confirm('You are about to mail your Timesheet to your Reporting Authority. Do you want to continue ?')){mailExcelSheet('<?php echo date("m"); ?>', '<?php echo date("Y"); ?>'); }else{return false; }"><img src="images/email.png" id="mailIcon" border="0" height="16" width="16" hspace="0" vspace="0" alt="Mail your Timesheet" title="Mail your Timesheet"/></a></td>
                                                                                        <td align="left" valign="top">&nbsp;</td>
                                                                                        <td align="left" valign="top"><div id="excelPng"></div><a href="#" onClick="downloadExcelSheet('<?php echo date("m"); ?>', '<?php echo date("Y"); ?>');"><img src="images/excel.png" border="0" height="16" width="16" hspace="0" vspace="0" alt="Export to Excel" title="Export to Excel"/></a></td>
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
																			$days = phpFunctions::daysInMonth(date("m"), date("Y"));
																			$taskCnt = 1;
																			$todayVal = mktime(0,0,0,date('m'),date('d'),date('Y'));
																			for($i=1; $i<=$days; $i++)
																			{
																				$monDate = date("d F Y, l", mktime(0,0,0,date("m"),$i,date("Y"))); 
																				
																				$posSat = strpos($monDate, "Saturday");
																				$posSun = strpos($monDate, "Sunday");

																				if($posSat === false && $posSun === false){$img = "bulb_on.png"; $toolTip = "Working day"; $className="dateDiv";} else {$img = "bulb_off.png"; $toolTip = "Weekly off"; $className="dateOffDiv";}
																				
																				$dateDivId = "dateDiv" . $i; 
																				$tempDateArr = explode("-",date("m-d-Y", mktime(0,0,0,date("m"),$i,date("Y")))); 
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
                                                                                                        <td align="center" valign="middle"><a href="javascript:void(0);" onClick="addNewTaskDate('<?php echo date("d-m-Y", mktime(0,0,0,date("m"),$i,date("Y"))); ?>')" alt="Add new task for this date" title="Add new task for this date"><?php echo $monDate; ?></a></td>
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
																							   $curDate = date("Y")."-".date("m")."-".$i;
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
                                                                                                                                        
                                                                                                                                        <!-- 	<td align="left" valign="top" class="smallSpacerWidth">&nbsp;&nbsp;</td>
                                                                                                                                      		 <td align="right" valign="middle"><div class="timeDiv"><a href="javascript:void(0)" onClick="addNewTask()"><img src="images/add.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Add new Task" title="Add new Task" /></a></div></td> -->
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
                                                                                                                                                            <td align="left" valign="top"><div id="<?php echo $delDivId; ?>"></div><a href="javascript:void(0);" onClick="deleteTask('<?php echo $tid; ?>', '<?php echo $dayTaskDiv; ?>', '<?php echo $trDiv; ?>', '<?php echo $delDivId; ?>'); "><img src="images/delete.png" border="0" width="16" height="16" hspace="0" vspace="0" alt="Delete" title="Delete" /></a></td>
                                                                                                                                                     
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
                                     <?php if((int)$taskCnt<=1){$_SESSION["errMsg"]="No Task(s) for this month.";}else{$_SESSION["errMsg"]="";} ?>
                                </div>
                             </td>
                         </tr>
                     </table>                                                                                                
                </td>
            </tr>
            <tr><td class="trHeight1"></td></tr>           
        </table>                
    </body>
    <script language="javascript" type="text/javascript">
    	function makeRound()
		{	
			<?php for($i=1; $i<=$taskCnt; $i++)
			{
				$taskTimeDiv 	= "#taskTimeDiv" . $i;
				$taskDiv 	 	= "#taskDiv" . $i; 
				$taskTypeDiv 	= "#taskTypeDiv" . $i; 
				$taskHrsDiv  	= "#taskHrsDiv" . $i; 
				$taskStatusDiv 	= "#taskStatusDiv" . $i?>								
				$('<?php echo $taskTimeDiv; ?>').corner();
				$('<?php echo $taskDiv; ?>').corner();
				$('<?php echo $taskTypeDiv; ?>').corner();		
				$('<?php echo $taskHrsDiv; ?>').corner();
				$('<?php echo $taskStatusDiv; ?>').corner();								
			<?php } //end of for loop ?>		
		}	    
    </script>
</html>
