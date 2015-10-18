<?php include_once("inc/config.php"); 
include_once("inc/database.php");
include_once("controllers/tblCommentController.php");
$songId = trim($_POST["songId"]);
$top = trim($_POST["top"]);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblCommObj = new tblCommentController($conObj);
$commentArr = $tblCommObj->getComments(array("songId"=>$songId, "top"=>$top));
$commentArrCnt = count($commentArr);
if($commentArrCnt>0)
{?>
	<input type="hidden" name="songId" id="songId" value="<?php echo $songId; ?>" />
	<input type="hidden" name="top" id="top" value="<?php echo ($top+3); ?>" />
	<table border="0" cellpadding="0" cellspacing="0" width="100%" height="136">	
		<tr>
			<td align="left" valign="top" class="commentsTable">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">	
					<?php for($i=0; $i<$commentArrCnt; $i++)
					{?>
						<tr>
							<td align="left" valign="top">														
								<table border="0" cellpadding="2" cellspacing="0" width="100%" class="commentBox">	
									<tr>
										<td align="left" valign="top" width="16px"><img src="images/user.png" border="0" width="16" height="16" alt="" title="" /></td>
										<td align="left" valign="top" class="commentText"><?php echo $tblCommObj->getStrFrmDb($commentArr[$i]["comment_text"]); ?></td>
									</tr>
								</table>
							</td>
						</tr>
					<?php } //end of for loop
					
					//getting total comments count for a given song.
					$allCommentCnt = $tblCommObj->getAllCommentsCnt(array("songId"=>$songId)); ?>
					<tr>
						<td align="center" valign="middle">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">	
								<tr>																					
									<td align="right" valign="top">										
										<table border="0" cellpadding="2" cellspacing="0" align="right">	
											<tr>
												<td align="center" valign="middle" width="9"><div class="hidden" id="saveCommentLoader"><img src="images/save-comment-loader.gif" border="0" width="16" height="11" alt="" title="" /></div></td>
												<td align="center" valign="middle" width="9"><a href="#" onClick="showComment();"><img src="images/pencil2.png" border="0" width="9" height="9" alt="Write your comment" title="Write your comment" /></a></td>
												<?php if($top<$allCommentCnt)
												{?>
													<td align="center" valign="middle" width="10"><a href="#" onClick="loadMoreComments();"><img src="images/more.png" border="0" width="10" height="10" alt="Load more comments" title="Load more comments" /></a></td>
												<?php } ?>												
											</tr>
										</table>
									</td>
								</tr>
							</table>																			
						</td>
					</tr>
					<tr>
						<td align="center" valign="middle">
							<div id="addComment" class="hidden">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">	
									<tr>																					
										<td align="center" valign="middle"><input type="text" name="txtComemnt" id="txtComemnt" value="" maxlength="1000" size="100" onKeyPress="return postComment(this,event,<?php echo $songId; ?>);" class="textBox" ></td>
									</tr>
								</table>
							</div>
						</td>
					</tr>	
				</table>
			</td>
		</tr>
	</table>
<?php }
else
{?>
	<input type="hidden" name="songId" id="songId" value="<?php echo $songId; ?>" />
	<input type="hidden" name="top" id="top" value="<?php echo COMMENT_LIST_COUNT; ?>" />
	<table border="0" cellpadding="0" cellspacing="0" width="637" height="136">	
		<tr>
			<td align="left" valign="top" class="commentsTable">
				<table border="0" cellpadding="3" cellspacing="0" width="100%">																
					<tr>
						<td align="center" valign="middle">
							<table border="0" cellpadding="0" cellspacing="0" width="100%">	
								<tr>																					
									<td align="right" valign="top">										
										<table border="0" cellpadding="2" cellspacing="0" align="right">	
											<tr>
												<td align="center" valign="middle" width="9"><div class="hidden" id="saveCommentLoader"><img src="images/save-comment-loader.gif" border="0" width="16" height="11" alt="" title="" /></div></td>												
												<td align="center" valign="middle" width="9"><a href="#" onClick="showComment();"><img src="images/pencil2.png" border="0" width="9" height="9" alt="Write your comment" title="Write your comment" /></a></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>																			
						</td>
					</tr>
					<tr>
						<td align="center" valign="middle">
							<div id="addComment" class="hidden">
								<table border="0" cellpadding="0" cellspacing="0" width="100%">	
									<tr>																					
										<td align="center" valign="middle"><input type="text" name="txtComemnt" id="txtComemnt" value="" maxlength="1000" size="115" onKeyPress="return postComment(this,event,<?php echo $songId; ?>);" class="textBox" ></td>
									</tr>
								</table>
							</div>
						</td>
					</tr>	
				</table>
			</td>
		</tr>
	</table>
<?php }
$dbObj->closeConn($conObj); ?>