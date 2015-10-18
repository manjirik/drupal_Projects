<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("class.phpmailer.php");
include("class.smtp.php");

$mail             = new PHPMailer();

$ret = "In";

                        $mail->CharSet = "UTF-8";

					$body = "This is test mail.";

                        //$body             = eregi_replace("[\]",'',$html);

                      

                        

                        $mail->IsSendmail(); // telling the class to use SendMail transport

                        

                        

                        //$mail->IsSMTP(); // telling the class to use SMTP

                        /*$mail->Host       = "mail.synechron.net"; // SMTP server

                        $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)

                                                                                                                                                   // 1 = errors and messages

                                                                                                                                                   // 2 = messages only

                        $mail->SMTPAuth   = true;                  // enable SMTP authentication

                        //$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier

                        $mail->Host       = "mail.synechron.net";      // sets GMAIL as the SMTP server

                        $mail->Port       = 2525;                   // set the SMTP port for the GMAIL server

                        $mail->Username   = "apptest1@synechron.net";  // GMAIL username

                        $mail->Password   = "PM23#bmw3";            // GMAIL password

                        */

                        

                        /*$mail->Host       = "mail2.synechron.com";

                        $mail->Port       = 25;*/

 

                        

                        //$mail->SetFrom(EMAIL_FROM, EMAIL_FROM_NAME);

                        

                        $mail->SetFrom('ajays@synechron.com', '');

                        $mail->AddAddress('atul.bhosale@synechron.com', '');

                        $mail->Subject    = "Test mail";

                        

                        //$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

 

                        $mail->MsgHTML($body);

 

if(!$mail->Send()) {

                                                  $ret .=  "Mailer Error: " . $mail->ErrorInfo;

                                                } else {

                                                  $ret .=  "Message sent!";

                                                }

												echo $ret."End";

?>