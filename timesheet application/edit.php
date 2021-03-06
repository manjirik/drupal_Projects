<?php include_once("chkSession.php"); 
include_once("tblTasksController.php");
include_once("phpFunctions.php"); 
$hTid = trim($_POST["hTid"]);
$taskArr = tblTasksController::getTaskDetails(array("tid"=>$hTid));

$dateArr = explode("-", $taskArr[0]["task_date"]);

$stTime = date("h:i a",strtotime($taskArr[0]["task_st_time"]));
$stTimeTmpArr = explode(" ",$stTime);
$stTimeArr = explode(":",$stTimeTmpArr[0]);

$enTime = date("h:i a",strtotime($taskArr[0]["task_en_time"]));
$enTimeTmpArr = explode(" ",$enTime);
$enTimeArr = explode(":",$enTimeTmpArr[0]);

$tType = $taskArr[0]["task_type"];
$project = phpFunctions::showStr($taskArr[0]["task_project"]);
$taskDesc = phpFunctions::showStrForEdit($taskArr[0]["task_desc"]);
$hrs = $taskArr[0]["task_hrs"];
$tStatus = $taskArr[0]["task_status"];

$st = strtotime($taskArr[0]["task_st_time"]);
$en = strtotime($taskArr[0]["task_en_time"]);

$c = $en - $st;

//echo date("h : i", strtotime($c));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Timesheet :: Edit Task</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/timesheet.css" />
        <script language="javascript" type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.corner.js"></script>
        <script language="javascript" type="text/javascript" src="js/functions.js"></script>
        <script language="javascript" type="text/javascript">            
			$(document).ready
			(	
				function() 
				{																				
					$("#siteHeader").fadeIn(1000);	
															
					$('#titleDiv').corner();
					$("#titleDiv").fadeIn(1000);	
					
					$('#addNewDiv').corner();
					$("#addNewDiv").fadeIn(1000);
					
					$("#cmbDate").focus();																														
				}				
			);
			function formSubmit()
			{
				//-------------------------------------------------------------------------------------
					$("#invDateErr").html('').hide();
					$("#fuDateErr").html('').hide();																
					$("#regMsgDiv").html('').hide();
					$("#prjErr").html('').hide();
					$("#taskDescErr").html('').hide();
					$("#hrsErr").html('').hide();
					$("#statusErr").html('').hide();					
				//-------------------------------------------------------------------------------------
					var hTid 			= $.trim($("input#hTid").val());
					var tDate 			= $.trim($("#cmbYear").val()) + "-" + $.trim($("#cmbMonth").val()) + "-" + $.trim($("#cmbDate").val());
					var tStTime 		= $.trim($("#cmbFrmHour").val()) + ":" + $.trim($("#cmbFrmMin").val()) + " " + $.trim($("#cmbFrmAmpm").val());
					var tEnTime 		= $.trim($("#cmbToHour").val()) + ":" + $.trim($("#cmbToMin").val()) + " " + $.trim($("#cmbToAmpm").val());				
					var tType 			= $("input[name='taskType']:checked").val();				
					
					var txtProject 		= $.trim($("input#txtProject").val());
					txtProject 			= txtProject.replace(/&/gi, "and");
					
					var txtTask 		= $.trim($("textarea#txtTask").val());
					txtTask 			= txtTask.replace(/&/gi, "and");
					
					var cmbTaskStatus	= $.trim($("#cmbTaskStatus").val());
					var usrDay 			= $.trim($("#cmbDate").val());
					var usrMon 			= $.trim($("#cmbMonth").val());				
					var usrYear 		= $.trim($("#cmbYear").val());
					
					var chkFlag = 0;					
					var d = new Date();
				//-------------------------------------------------------------------------------------										
					var curDate = (d.getMonth() + 1) + "/" + d.getDate() + "/" + d.getFullYear();
					var userDate = usrMon + "/" + usrDay + "/" + usrYear;
																						
					if(usrDay<10){var newDay = "0" + usrDay;} else {var newDay = usrDay;}
					if(usrMon<10){var newMon = "0" + usrMon;} else {var newMon = usrMon;}				
				//-------------------------------------------------------------------------------------
					var cDate = newMon + "/" + newDay + "/" + usrYear;
					var validDate = checkdate(cDate);
					if(validDate==false)
					{						
						$("#invDateErr").html("Invalid date");
						$("#invDateErr").fadeIn(400).fadeOut(400).fadeIn(400);														
						chkFlag = 1;
					}
					else{ $("#invDateErr").fadeOut(400); }
				//-------------------------------------------------------------------------------------								
					var dateDiffVal = mydiff(curDate,userDate,"days");
					if(dateDiffVal>0)
					{					
						$("#fuDateErr").html("Task can not be added for future dates");
						$("#fuDateErr").fadeIn(400).fadeOut(400).fadeIn(400);															
						chkFlag = 1;
					}
					else{ $("#dateErr").fadeOut(400); }
				//-------------------------------------------------------------------------------------								
					if(txtProject=="")
					{
						$("#prjErr").html("Project can not be empty");
						$("#prjErr").fadeIn(400).fadeOut(400).fadeIn(400);															
						chkFlag = 1;
					}
					else{ $("#prjErr").fadeOut(400); }
				//-------------------------------------------------------------------------------------
					if(txtTask=="")
					{
						$("#taskDescErr").html("Task Description can not be empty");
						$("#taskDescErr").fadeIn(400).fadeOut(400).fadeIn(400);															
						chkFlag = 1;
					}
					else{ $("#taskDescErr").fadeOut(400); }
				//-------------------------------------------------------------------------------------
					/*
					if(txtHours=="")
					{
						$("#hrsErr").html("Hours can not be empty");
						$("#hrsErr").fadeIn(400).fadeOut(400).fadeIn(400);															
						chkFlag = 1;
					}
					else{ $("#hrsErr").fadeOut(400); }
					*/
				//-------------------------------------------------------------------------------------	
					if(parseInt(chkFlag)==0)
					{							
						$("#cmdSubmit").val('Updating...'); 
						$('#cmdSubmit').attr("disabled", true);
						$('#cmdBack').attr("disabled", true);
						
						//var dataString = "hTid=" + hTid + "&tDate=" + tDate + "&tStTime=" + tStTime + "&tEnTime=" + tEnTime + "&tType=" + tType + "&txtProject=" + txtProject + "&txtTask=" + txtTask + "&txtHours=" + txtHours;
						var dataString = "hTid=" + hTid + "&tDate=" + tDate + "&tStTime=" + tStTime + "&tEnTime=" + tEnTime + "&tType=" + tType + "&txtProject=" + txtProject + "&txtTask=" + txtTask + "&cmbTaskStatus=" + cmbTaskStatus;
						$.ajax
						(
							{   
								type: "POST", url: "ajaxUpdateTask.php", data: dataString,   
								success: 
									function(data) 
									{ 
										$("#addMsgDiv").fadeIn('slow');
										$("#addMsgDiv").html(data);
										
										var hUpdateTaskErrFlag = $.trim($("input#hUpdateTaskErrFlag").val());
										
										if(parseInt(hUpdateTaskErrFlag)==0)
										{
											$('#addMsgDiv').load("messages.php");
											setTimeout(continueExecution, 2000);
										}
										else
										{
											$('#addMsgDiv').load("messages.php");
										}																		
									},
								error: 
									function (XMLHttpRequest, textStatus, errorThrown) 
									{
										$('#addMsgDiv').load("messages.php");																					
									}
							}
						)
					}
				//-------------------------------------------------------------------------------------					
			};
			function continueExecution()
			{
				$(location).attr("href", "timesheet.php");
			};						
        </script>        
    </head>    
    <body>        	    
        <table border="0" cellpadding="0" cellspacing="0" width="100%">            
            <tr><td class="header"><?php include_once("inc/headerInner.php"); ?></td></tr>
            <tr><td class="trHeight1"></td></tr>
            <tr>
                <td align="center" valign="top">                                        
                    <table border="0" cellpadding="0" cellspacing="0" align="center" >                                                                       
                        <tr>
                            <td align="left" valign="middle" class="monthName"><div class="tDiv" id="titleDiv">Edit Task</div></td>
                        </tr>
                        <tr><td class="trHeight2" colspan="2"></td></tr>
                        <tr>
                            <td align="left" valign="top">
                                <div class="tDiv" id="addNewDiv">                                                                      
                                   <form name="frmAdd" id="frmAdd" method="post" action="#">
                                       <input type="hidden" name="hTid" id="hTid" value="<?php echo $hTid; ?>"  />
                                       <table border="0" cellpadding="0" cellspacing="0"  >
                                            <tr><td align="center" valign="middle"colspan="2"><div id="addMsgDiv"></div></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Date:&nbsp;</td>                                                
                                                <td align="left" valign="top">
                                                	<table border="0" cellpadding="0" cellspacing="0"  >
                                                		<tr>
                                                        	<td align="left" valign="top">
                                                            	<select name="cmbDate" id="cmbDate" class="button">                                                                	
																	<?php for($i=1; $i<=31; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $i;?>" <?php if($dateArr[2]==$i){echo "selected"; }?> ><?php echo $no;?></option>																	
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbMonth" id="cmbMonth" class="button">                                                                	
																	<?php for($i=1; $i<=12; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $i;?>" <?php if($dateArr[1]==$i){echo "selected"; }?> ><?php echo $no;?></option>																	
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="middle">
                                                                <select name="cmbYear" id="cmbYear" class="button">                                                                    
																	<?php 
                                                                        $stYear = date("Y")-1; 
                                                                        $enYear = date("Y");
                                                                        for($i=$stYear; $i<=$enYear; $i++)
                                                                        {?>
                                                                            <option value="<?php echo $i;?>" <?php if($dateArr[0]==$i){echo "selected"; }?> ><?php echo $i;?></option>                                                            
                                                                        <?php }
                                                                    ?>
                                                                </select>
                                                			</td>                                                            
                                                        </tr>
                                                	</table><div id="invDateErr" class="formErrMsg"></div><div id="fuDateErr" class="formErrMsg"></div>
                                                </td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Time:&nbsp;</td>                                                
                                                <td align="left" valign="top">
                                                	<table border="0" cellpadding="0" cellspacing="0"  >
                                                		<tr>                                                        	
                                                            <td align="left" valign="top">
                                                            	<select name="cmbFrmHour" id="cmbFrmHour" class="button">                                                                	
																	<?php for($i=1; $i<=12; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $no;?>" <?php if($stTimeArr[0]==$i){echo "selected"; }?> ><?php echo $no;?></option>																
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbFrmMin" id="cmbFrmMin" class="button">                                                                	
																	<?php for($i=0; $i<=59; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $no;?>" <?php if($stTimeArr[1]==$i){echo "selected"; }?> ><?php echo $no;?></option>																
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbFrmAmpm" id="cmbFrmAmpm" class="button">                                                                	
																	<option value="am" <?php if($stTimeTmpArr[1]=="am"){echo "selected"; }?> >am</option>
                                                                    <option value="pm" <?php if($stTimeTmpArr[1]=="pm"){echo "selected"; }?> >pm</option>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="middle">&nbsp;&nbsp;to&nbsp;&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbToHour" id="cmbToHour" class="button">                                                                	
																	<?php for($i=1; $i<=12; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $no;?>" <?php if($enTimeArr[0]==$i){echo "selected"; }?> ><?php echo $no;?></option>																
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbToMin" id="cmbToMin" class="button">                                                                	
																	<?php for($i=0; $i<=59; $i++)
																	{
																		if($i<10){$no="0".$i;}else{$no=$i;}?>
																		<option value="<?php echo $no;?>" <?php if($enTimeArr[1]==$i){echo "selected"; }?> ><?php echo $no;?></option>																
																	<?php }?>
                                                                </select>
                                                            </td>
                                                            <td align="left" valign="top">&nbsp;</td>
                                                            <td align="left" valign="top">
                                                            	<select name="cmbToAmpm" id="cmbToAmpm" class="button">                                                                	
																	<option value="am" <?php if($enTimeTmpArr[1]=="am"){echo "selected"; }?> >am</option>
                                                                    <option value="pm" <?php if($enTimeTmpArr[1]=="pm"){echo "selected"; }?> >pm</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                	</table>
                                                </td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                            	<td align="left" valign="top">Type:&nbsp;</td>                                                
                                                <td align="left" valign="top">
                                                	<table border="0" cellpadding="0" cellspacing="0"  >
                                                		<tr>                                                        	
                                                            <td align="center" valign="middle"><input type="radio" name="taskType" id="int" value="1" <?php if($tType==1){ echo "checked"; } ?> /></td>
                                                            <td align="center" valign="middle">Internal</td>
                                                            <td align="center" valign="middle">&nbsp;&nbsp;</td>
                                                            <td align="center" valign="middle"><input type="radio" name="taskType" id="ext" value="2" <?php if($tType==2){ echo "checked"; } ?> /></td>
                                                            <td align="center" valign="middle">External</td>
                                                       	</tr>
                                                	</table>
                                                </td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Project:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtProject" id="txtProject" value="<?php echo $project; ?>" maxlength="255" size="60" class="button" /><div id="prjErr" class="formErrMsg"></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Description:&nbsp;</td>                                                
                                                <td align="left" valign="top"><textarea name="txtTask" id="txtTask" class="button" rows="8" cols="70" maxlength="5000" onkeyup="return ismaxlength(this)" ><?php echo $taskDesc; ?></textarea><div id="taskDescErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Status:&nbsp;</td>                                                
                                                <td align="left" valign="top">
                                                	<select name="cmbTaskStatus" id="cmbTaskStatus" class="button">
                                                    	<option value="1" <?php if((int)$tStatus==1){echo "selected";} ?> >Completed</option>
                                                        <option value="2" <?php if((int)$tStatus==2){echo "selected";} ?> >In progress</option>
                                                    </select>
                                                <div id="statusErr" class="formErrMsg"></td>
                                            </tr>
                                            <!--                                            
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top">No. of Hours:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtHours" id="txtHours" value="<?php echo $hrs; ?>" maxlength="5" size="5" class="button" /><div id="hrsErr" class="formErrMsg"></td>
                                            </tr>
                                            -->
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>                                               
                                                <td align="center" valign="middle" colspan="2"><input type="button" name="cmdSubmit" id="cmdSubmit" value="Submit" onClick="formSubmit()" class="button"/>&nbsp;<input type="button" name="cmdBack" id="cmdBack" value="Back" onClick="javascript:window.location='timesheet.php';" class="button" /></td>
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
        </table>
    </body>
</html>
