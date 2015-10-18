<?php include_once("chkSession.php");
include_once("database.php"); 
include_once("tblEmployeeController.php");
include_once("tblTasksController.php");
include_once("phpFunctions.php");  
$hMonth = trim($_GET["month"]);
$hYear = trim($_GET["year"]);
$monthArray = array("1"=>"January", "2"=>"February", "3"=>"March", "4"=>"April", "5"=>"May", "6"=>"June", "7"=>"July", "8"=>"August", "9"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
$empCode = $_SESSION["empCode"];
$empName = tblEmployeeController::getEmployeeFullName(array("empCode"=>$empCode));
$str = "
	<table border='0'>
		<tr>			
			<td></td>
		</tr>
		<tr>			
			<td>
				<table border='0'>
					<tr>
						<td>&nbsp;</td>
						<td align='left' valign='top'><b>Timesheet of: ". $empName ." (". $empCode .")</b></td>
						<td>&nbsp;</td>
					</tr>
					<tr><td colspan='3'>&nbsp;</td></tr>
					<tr>
						<td>&nbsp;</td>
						<td align='left' valign='top'><b>". $monthArray[(int)$hMonth] . " ". $hYear ."</b></td>
						<td>&nbsp;</td>
					</tr>
					<tr><td colspan='3'>&nbsp;</td></tr>
					<tr>
						<td>&nbsp;</td>
						<td align='left' valign='top'>
							<table border='1'>								
								<tr style='background-color:#D5E1EB'>
									<td align='center' valign='top'><b>Date</b></td>
									<td align='center' valign='top'><b>Time</b></td>
									<td align='center' valign='top'><b>Type</b></td>
									<td align='center' valign='top'><b>Project</b></td>
									<td align='center' valign='top'><b>Particulars</b></td>	
									<td align='center' valign='top'><b>Status</b></td>								
									<td align='center' valign='top'><b>No. of Hours</b></td>									
								</tr>";																
								$days = phpFunctions::daysInMonth($hMonth, $hYear);
								$taskCnt = 1;
								$net_total = 0;
								for($i=1; $i<=$days; $i++)
								{
									$monDate = date("d F Y, l", mktime(0,0,0,$hMonth,$i,$hYear));									  																													
									$str .= "<tr>			
												<td align='left' valign='top'><font color='darkblue'><b>". $monDate ."</b></font></td>
												<td align='left' valign='top' colspan='6'>													
													<table border='1'>";														
														//getting all the tasks for current date
													   	$curDate = $hYear."-".$hMonth."-".$i;
													   	$daysTasksArr = tblTasksController::getTasksForTheDay(array("empCode"=>$empCode, "tDate"=>$curDate));
													   	$daysTasksArrCnt = count($daysTasksArr);																						   
													   	if($daysTasksArrCnt<=0)
													   	{
															$str .= "<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>";
													   	}
													   	else
													   	{														
															$sub_total = 0;
															for($t=0; $t<$daysTasksArrCnt; $t++)
															{
																$taskHours = str_replace(":",".",$daysTasksArr[$t]["task_hrs"]);
																if($daysTasksArr[$t]["task_status"]==1){$taskStatus="<font color='darkgreen'>Completed</font>";}else{$taskStatus="<font color='red'>In progress</font>";}
																$str .= "
																<tr>
																	<td align='right' valign='top'>".date("h:i a",strtotime($daysTasksArr[$t]["task_st_time"]))." to ".date("h:i a",strtotime($daysTasksArr[$t]["task_en_time"]))."</td>";
																	if((int)$daysTasksArr[$t]["task_type"]==1){$tType="Internal";}else{$tType="External";}
																	$str .= "
																	<td align='left' valign='top'>". $tType ."</td>
																	<td align='left' valign='top'>". phpFunctions::showStr($daysTasksArr[$t]["task_project"]) ."</td>
																	<td align='left' valign='top'>". phpFunctions::showStr($daysTasksArr[$t]["task_desc"]). "</td>												
																	<td align='left' valign='top'>". $taskStatus ."</td>
																	<td align='right' valign='top'>". $taskHours ."</td>									
																</tr>";																		
																$sub_total = $sub_total + $taskHours;
															} //end of inner for loop																					
															$str .= "			
															<tr>																										
																<td align='right' valign='top' colspan='5'><b>Sub-Total</b></td>
																<td align='right' valign='top'><b>". $sub_total ."</b></td>
															</tr>
															<tr><td colspan='6'>&nbsp;</td></tr>";			

															$net_total = $sub_total + $net_total;
														}														
													$str .= "	
													</table>
												</td>
											</tr>";																																		
								} //end of outer for loop								
								$str .= "
								<tr style='background-color:#D4D4D4' >
									<td align='right' valign='top' colspan='6'><b>Net Total</b></td>
									<td align='right' valign='top'><b>". $net_total . "</b></td>
								</tr>
							</table>					
						</td>
						<td>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
";	
echo $str;
?>	
	
	
	