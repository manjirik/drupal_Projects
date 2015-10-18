<?php session_start();
include_once("database.php"); 
$_SESSION["empId"] 			= "";
$_SESSION["empCode"] 		= "";
$_SESSION["empEmail"]		= "";
$_SESSION["empReportEmail"]	= "";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Timesheet :: Login</title>
        <link rel="stylesheet" type="text/css" media="screen" href="css/timesheet.css" />
        <script language="javascript" type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
        <script language="javascript" type="text/javascript" src="js/jquery.corner.js"></script>
        <script language="javascript" type="text/javascript" src="js/functions.js"></script>
        <script language="javascript" type="text/javascript">            
			$(document).ready
			(	
				function() 
				{																				
					$('#txtEmail').focus();	
					
					$("#siteHeader").fadeIn(600);	
					
					$('#imgDiv').corner();
					$("#imgDiv").fadeIn(600);	
					
					$('#loginDiv').corner();
					$("#loginDiv").fadeIn(600);	
					
					$('#signUpDiv').corner();
					$("#signUpDiv").fadeIn(600);
						
					$('#signUpFormDiv').corner();
					$("#forgotPassFormDiv").corner();
					
					$('#txtEmpCode').keypress
					(
						function(e) 
						{
							if( e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
							{
								$("#empCodeErr").html("Enter only digits");
								$("#empCodeErr").fadeIn(400);	
								return false;		
							}
							else
							{ $("#empCodeErr").html('').hide(); }						
						}
					)
				}																				
			);	
			function hideSignUpForm()
			{
				$("#signUpFormDiv").fadeOut(300);
				$('#txtEmail').focus();				
			};
			function showSignUpForm()
			{
				$("#signUpFormDiv").fadeIn(600);
				$("#forgotPassFormDiv").fadeOut(300);
				$('#txtEmpCode').focus();	
			};						
			function hideFpassForm()
			{
				$("#forgotPassFormDiv").fadeOut(300);
				$('#txtEmail').focus();				
			};
			function showFpassForm()
			{
				$("#forgotPassFormDiv").fadeIn(600);
				$("#signUpFormDiv").fadeOut(300);
				$("#txtEmailFp").focus();	
			};
			function submitForm() 
			{
				$("#regMsgDiv").html('').hide();
				$("#empCodeErr").html('').hide();
				$("#fnameErr").html('').hide();
				$("#lnameErr").html('').hide();
				$("#emailsErr").html('').hide();
				$("#passSErr").html('').hide();
				$("#reportTo").html('').hide();
				$("#reportToErr").html('').hide();
																
				var txtEmpCode 			= $.trim($("input#txtEmpCode").val());
				var txtFname 			= $.trim($("input#txtFname").val());
				var txtMname 			= $.trim($("input#txtMname").val());
				var txtLname 			= $.trim($("input#txtLname").val());
				var txtEmailS 			= $.trim($("input#txtEmailS").val());
				var txtPasswordS 		= $.trim($("input#txtPasswordS").val());
				var txtReportToS		= $.trim($("input#txtReportToS").val());
				var txtReportToEmailS 	= $.trim($("input#txtReportToEmailS").val());
				var chkFlag = 0;
				
				if(txtEmpCode=="")
				{
					$("#empCodeErr").html("Employee Code can not be empty");
					$("#empCodeErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else{ $("#empCodeErr").fadeOut(400); }
				
				if(txtFname=="")
				{
					$("#fnameErr").html("First Name can not be empty");
					$("#fnameErr").fadeIn(400).fadeOut(400).fadeIn(400);														
					chkFlag = 1;
				}
				else{ $("#fnameErr").fadeOut(400); }
				
				if(txtLname=="")
				{
					$("#lnameErr").html("Last Name can not be empty");
					$("#lnameErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else{ $("#lnameErr").fadeOut(400); }
				
				if(txtEmailS=="")
				{
					$("#emailsErr").html("Email can not be empty");
					$("#emailsErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else
				{ 				
					if(!IsValidEmail(txtEmailS))
					{
						$("#emailsErr").html("Email is invalid");
						$("#emailsErr").fadeIn(400).fadeOut(400).fadeIn(400);									
						chkFlag = 1;
					}
					else{ $("#emailsErr").fadeOut(400); }				
				}
																
				if(txtPasswordS=="")
				{
					$("#passSErr").html("Password can not be empty");
					$("#passSErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else{ $("#passSErr").fadeOut(400); }
				
				if(txtReportToS=="")
				{
					$("#reportTo").html("Reporting to can not be empty");
					$("#reportTo").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else{ $("#lnameErr").fadeOut(400); }
				
				if(txtReportToEmailS=="")
				{
					$("#reportToErr").html("Report to Email can not be empty");
					$("#reportToErr").fadeIn(400).fadeOut(400).fadeIn(400);														
					chkFlag = 1;
				}
				else
				{  
					if(!IsValidEmail(txtReportToEmailS))
					{
						$("#reportToErr").html("Report to Email is invalid");
						$("#reportToErr").fadeIn(400).fadeOut(400).fadeIn(400);														
						chkFlag = 1;
					}
					else{ $("#reportToErr").fadeOut(400); }				
				}
												
				if(parseInt(chkFlag)==0)
				{										
					$("#cmdSubmitSignUp").val('Saving...'); 
					$('#cmdSubmitSignUp').attr("disabled", true);
										
					var dataString = "txtEmpCode=" + txtEmpCode + "&txtFname=" + txtFname + "&txtMname=" + txtMname + "&txtLname=" + txtLname + "&txtEmailS=" + txtEmailS + "&txtPasswordS=" + txtPasswordS + "&txtReportToS=" + txtReportToS + "&txtReportToEmailS=" + txtReportToEmailS;
					$.ajax
					(
						{   
							type: "POST", url: "ajaxChkDupEmailAndCode.php", data: dataString,   
							success: 
								function(data) 
								{ 
									$("#regMsgDiv").fadeIn('slow');
									$("#regMsgDiv").html(data);
									
									var hDupCodeFlag = $.trim($("input#hDupCodeFlag").val());
									var hDupEmailFlag = $.trim($("input#hDupEmailFlag").val());
									
									if(parseInt(hDupCodeFlag)==0 && parseInt(hDupEmailFlag)==0)
									{
										//success, post the form
										$.ajax
										(
											{   
												type: "POST", url: "ajaxSaveEmployee.php", data: dataString,   
												success: 
													function(data) 
													{ 
														$('#regMsgDiv').load("messages.php");
														setTimeout(goToTimesheet, 2000);
													},
												error: 
													function (XMLHttpRequest, textStatus, errorThrown) 
													{
														$('#regMsgDiv').load("messages.php");																					
													}
											}
										)
									}
									else if(parseInt(hDupCodeFlag)>0)
									{
										//error, display en error msg
										$("#cmdSubmitSignUp").val('Sign Up'); 
										$('#cmdSubmitSignUp').attr("disabled", false);
										$("#empCodeErr").html("Duplicate Employee Code. Enter different.");
										$("#empCodeErr").fadeIn(400).fadeOut(400).fadeIn(400);
									}
									else if(parseInt(hDupEmailFlag)>0)
									{
										//error, display en error msg
										$("#cmdSubmitSignUp").val('Sign Up'); 
										$('#cmdSubmitSignUp').attr("disabled", false);
										$("#emailsErr").html("Duplicate Email. Enter different.");
										$("#emailsErr").fadeIn(400).fadeOut(400).fadeIn(400);
									}
								},
							error: 
								function (XMLHttpRequest, textStatus, errorThrown) 
								{
									$("#regMsgDiv").html('Timeout contacting server..');
									$("#regMsgDiv").html(data);								
								}
						}
					)																				
				}						
			};
			function goToTimesheet()
			{
				$(location).attr("href", "timesheet.php");
				//window.location = "timesheet.php";
			};
			function loginFormSubmit()
			{
				$("#loginEmailErr").html('').hide();
				$("#loginPassErr").html('').hide();
				
				var txtEmail	= $.trim($("input#txtEmail").val());
				var txtPassword = $.trim($("input#txtPassword").val());
				var chkFlag = 0;
								
				if(txtEmail=="")
				{
					$("#loginEmailErr").html("Email can not be empty");
					$("#loginEmailErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else
				{ 				
					if(!IsValidEmail(txtEmail))
					{
						$("#loginEmailErr").html("Email is invalid");
						$("#loginEmailErr").fadeIn(400).fadeOut(400).fadeIn(400);									
						chkFlag = 1;
					}
					else{ $("#emailsErr").fadeOut(400); }				
				}
				
				if(txtPassword=="")
				{
					$("#loginPassErr").html("Password can not be empty");
					$("#loginPassErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else{ $("#loginPassErr").fadeOut(400); }
				
				if(parseInt(chkFlag)==0)
				{
					$("#cmdSubmitLogin").val('Logging...'); 
					$('#cmdSubmitLogin').attr("disabled", true);
						
					var dataString = "txtEmail=" + txtEmail + "&txtPassword=" + txtPassword;
										
					$.ajax
					(
						{   
							type: "POST", url: "ajaxValidateLogin.php", data: dataString,   
							success: 
								function(data) 
								{ 
									$("#loginMsgDiv").fadeIn('slow');
									$("#loginMsgDiv").html(data);
									
									var hInvalidLoginFlag = $.trim($("input#hInvalidLoginFlag").val());
									
									if(parseInt(hInvalidLoginFlag)==0)
									{
										//success, post the form
										$(location).attr("href", "timesheet.php");
									}
									else if(parseInt(hInvalidLoginFlag)>0)
									{
										//error, display en error msg
										$("#cmdSubmitLogin").val('Login'); 
										$('#cmdSubmitLogin').attr("disabled", false);
										$("#loginPassErr").html("Invalid Login details");
										$("#loginPassErr").fadeIn(400).fadeOut(400).fadeIn(400);
									}									
								},
							error: 
								function (XMLHttpRequest, textStatus, errorThrown) 
								{
									$("#loginMsgDiv").html('Timeout contacting server..');
									$("#loginMsgDiv").html(data);								
								}
						}
					)
				}
			};	
			function forgotPass()
			{
				$("#fpEmailErr").html('').hide();
				
				var txtEmailFp	= $.trim($("input#txtEmailFp").val());
				var chkFlag = 0;
				
				if(txtEmailFp=="")
				{
					$("#fpEmailErr").html("Email can not be empty");
					$("#fpEmailErr").fadeIn(400).fadeOut(400).fadeIn(400);									
					chkFlag = 1;
				}
				else
				{ 				
					if(!IsValidEmail(txtEmailFp))
					{
						$("#fpEmailErr").html("Email is invalid");
						$("#fpEmailErr").fadeIn(400).fadeOut(400).fadeIn(400);									
						chkFlag = 1;
					}
					else{ $("#emailsErr").fadeOut(400); }				
				}
								
				if(parseInt(chkFlag)==0)
				{
					$("#cmdSubmitFP").val('Processing...'); 
					$('#cmdSubmitFP').attr("disabled", true);
					
					var dataString = "txtEmailFp=" + txtEmailFp;
					$.ajax
					(
						{   
							type: "POST", url: "ajaxForgotPassEmail.php", data: dataString,   
							success: 
								function(data) 
								{ 
									$("#fpMsgDiv").fadeIn('slow');
									$("#fpMsgDiv").html(data);
									
									var hValidEmp = $.trim($("input#hValidEmp").val());
																		
									if(parseInt(hValidEmp)==0)
									{
										$("#cmdSubmitFP").val('Submit'); 
										$('#cmdSubmitFP').attr("disabled", false);
					
										$("#fpEmailErr").html("This Email is not registered");
										$("#fpEmailErr").fadeIn(400).fadeOut(400).fadeIn(400);
									}
									else
									{
										$('#fpMsgDiv').load("messages.php");

										$("#cmdSubmitFP").val('Submit'); 
										$('#cmdSubmitFP').attr("disabled", false);
										
										setTimeout(continueExecution, 2000);
									}									
								},
							error: 
								function (XMLHttpRequest, textStatus, errorThrown) 
								{
									$("#fpMsgDiv").html('Timeout contacting server..');
									$("#fpMsgDiv").html(data);								
								}
						}
					)																				
				}			
			};
			function continueExecution()
			{
				 $("#fpMsgDiv").hide();
			};
			function setFocus()
			{
				$('#txtEmail').focus();	
			};		
        </script>        
    </head>    
    <body onload="setFocus();">        	    
        <table border="0" cellpadding="0" cellspacing="0" width="100%">            
            <tr><td class="header"><?php include_once("inc/header.php"); ?></td></tr>
            <tr><td class="trHeight1"></td></tr>
            <tr>
                <td align="center" valign="top">                                        
                    <table border="0" cellpadding="0" cellspacing="0" align="center" > 
                    	<tr>
                        	<td align="center" valign="top"><div class="logoDiv" id="imgDiv"><img src="images/schedule.png" border="0" hspace="0" vspace="0" /></div></td>
                            <td align="left" valign="top">&nbsp;&nbsp;</td>
                            <td align="left" valign="top">
                            	<table border="0" cellpadding="0" cellspacing="0" align="center" >                        
                                    <tr>
                                        <td align="left" valign="top">
                                            <div class="tDiv" id="loginDiv">                                                                      
                                               <form name="frmLogin" id="frmLogin" method="post" action="#">
                                                   <table border="0" cellpadding="0" cellspacing="0"  >
                                                        <tr><td align="center" valign="middle"colspan="2"><div id="loginMsgDiv"></div></td></tr>
                                                        <tr>
                                                            <td align="left" valign="top">Email:&nbsp;</td>                                                
                                                            <td align="left" valign="top"><input type="text" name="txtEmail" id="txtEmail" maxlength="100" size="40" class="button" /><div id="loginEmailErr" class="formErrMsg"></div></td>
                                                        </tr>
                                                        <tr><td class="trHeight2" colspan="2"></td></tr>
                                                        <tr>
                                                            <td align="left" valign="top">Password:&nbsp;</td>                                                
                                                            <td align="left" valign="top"><input type="password" name="txtPassword" id="txtPassword" maxlength="20" size="40" class="button" /><div id="loginPassErr" class="formErrMsg"></div></td>
                                                        </tr>
                                                        <tr><td class="trHeight2" colspan="2"></td></tr>
                                                        <tr>                                               
                                                            <td align="center" valign="middle" colspan="2"><input type="button" name="cmdSubmitLogin" id="cmdSubmitLogin" value="Login" onClick="loginFormSubmit();" class="button" /></td>
                                                        </tr>
                                                   </table>
                                               </form>                                                                      
                                            </div>
                                        </td>
                                    </tr> 
                                    <tr><td class="trHeight2" colspan="2"></td></tr>                       
                                    <tr>
                                        <td align="center" valign="middle">
                                            <div class="tDiv" id="signUpDiv">
                                                <a href="javascript:void(0);" onClick="showSignUpForm();" alt="Sign Up" title="Sign Up">Sign Up</a>&nbsp;|&nbsp;<a href="javascript:void(0);" onClick="showFpassForm();" alt="Forgot Password" title="Forgot Password">Forgot Password</a>
                                            </div>
                                        </td>
                                    </tr>  
                                </table>                            
                            </td>
                        </tr>
                        <tr><td class="trHeight2" colspan="3"></td></tr>
                        <tr><td class="trHeight2" colspan="3"></td></tr>
                        <tr>
                            <td align="center" valign="top" colspan="3">
                                <div class="tDiv" id="signUpFormDiv">                                                                      
                                   <form name="frmSignUp" id="frmSignUp" method="post" action="#">
                                       <table border="0" cellpadding="0" cellspacing="0"  >
                                            <tr><td align="left" valign="middle" colspan="2"><b>Sign Up</b></td></tr>
                                            <tr><td align="center" valign="middle" colspan="2">&nbsp;</td></tr>
                                            <tr><td align="center" valign="middle" colspan="2"><div id="regMsgDiv"></div></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Employee Code:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtEmpCode" id="txtEmpCode" maxlength="10" size="40" class="button" /><div id="empCodeErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>First Name:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtFname" id="txtFname" maxlength="50" size="40" class="button" /><div id="fnameErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">&nbsp;&nbsp;</span>Middle Name:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtMname" id="txtMname" maxlength="50" size="40" class="button" /></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Last Name:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtLname" id="txtLname" maxlength="50" size="40" class="button" /><div id="lnameErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Email:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtEmailS" id="txtEmailS" maxlength="100" size="40" class="button" /><div id="emailsErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Password:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="password" name="txtPasswordS" id="txtPasswordS" maxlength="20" size="40" class="button" /><div id="passSErr" class="formErrMsg"></div></td>
                                            </tr>
                                            
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Reporting to:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtReportToS" id="txtReportToS" maxlength="100" size="40" class="button" /><div id="reportTo" class="formErrMsg"></div></td>
                                            </tr>
                                            
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>
                                                <td align="left" valign="top"><span class="astrix">*</span>Reporting to Email:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtReportToEmailS" id="txtReportToEmailS" maxlength="100" size="40" class="button" /><div id="reportToErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>
                                            <tr>                                               
                                                <td align="center" valign="middle" colspan="2">&nbsp;&nbsp;<input type="button" name="cmdSubmitSignUp" id="cmdSubmitSignUp" value="Sign Up" onClick="submitForm();" class="button"/>&nbsp;<input type="button" name="cmdCancel" id="cmdCancel" value="Cancel" class="button" onClick="hideSignUpForm()"/></td>
                                            </tr>
                                       </table>
                                   </form>                                                                      
                                </div>                                                                
                                <div class="tDiv" id="forgotPassFormDiv">                                                                      
                                   <form name="frmForgotPass" id="frmForgotPass" method="post" action="#">
                                       <table border="0" cellpadding="0" cellspacing="0"  >                                            
                                            <tr><td align="left" valign="middle" colspan="2"><b>Forgot Password</b></td></tr>
                                            <tr><td align="center" valign="middle" colspan="2">&nbsp;</td></tr>
                                            <tr><td align="center" valign="middle" colspan="2"><div id="fpMsgDiv"></div></td></tr>
                                            <tr>
                                                <td align="left" valign="top">Email:&nbsp;</td>                                                
                                                <td align="left" valign="top"><input type="text" name="txtEmailFp" id="txtEmailFp" maxlength="100" size="40" class="button" /><div id="fpEmailErr" class="formErrMsg"></div></td>
                                            </tr>
                                            <tr><td class="trHeight2" colspan="2"></td></tr>                                          
                                            <tr>                                               
                                                <td align="center" valign="middle" colspan="2"><input type="button" name="cmdSubmitFP" id="cmdSubmitFP" value="Submit" onClick="forgotPass();" class="button"/>&nbsp;<input type="button" name="cmdCancel" id="cmdCancel" value="Cancel" class="button" onClick="hideFpassForm()"/></td>
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
