<?php

$userfriend_count='';
$fb_id=$_SESSION['fb_user_id'];
	if($fb_id){
			$user_iddetails =$this->getUserIdFromFbId($fb_id);
			$user_id = $user_iddetails[0]->user_id;

			if($user_id!=''){
				$userfriend_count=$this->Myentries->getCountUserEntries($user_id);
			}
	}


?>
<!-- Middle content section -->
            <div class="tabs">
                <ul class="tab-list">
                   <?php
				 if( $userfriend_count > 0 ){ ?>
					<li><a href="<?php echo SITE_URL;?>index.php?r=myentries/show_entries">Return</a></li>
<?php				 }else{ ?>
				    <li><a href="<?php echo SITE_URL;?>index.php?r=home">Return</a></li>
<?php				 } ?>
       
                </ul>
                <div class="tc-content-wrapper">
                	<ul class="tc-left-nav">
                    	<li><a href="#agreement_tc" id="link_agreement_tc">Agreement</a></li>
                    	<li><a href="#modification_terms_tc" id="link_modification_terms_tc">Modification of Terms</a></li>
                    	<li><a href="<?php echo SITE_URL.'index.php?r=landing/Prizes';?>" id="link_prizes_tc">Prizes</a></li>
                    	<li><a href="#entire_agreement_tc" id="link_entire_agreement_tc">Entire Agreement</a></li>
                    	<li><a class="no-btm-brdr" href="#dates_tc" id="link_dates_tc">Dates</a></li>
                    </ul>
                    
                  	<div class="tc-content">
                    	<h2 id="top_content_tc">Prizes</h2>
                        
                    	<h3 class="no-brdr-top" id="agreement_tc">Dummy Prizes</h3>
                        <p>loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem</p>
                        <p>loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem</p>
                    	<p>loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem loreum postreum iptreum dortruem</p>
                   </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Middle content section ends -->
            <script type="text/javascript">
			$(document).ready(function(){
				$('.tc-content').jScrollPane();
			});
			</script>
<?php include_once BASEPATH.DS."view".DS."navigation.php"; ?>	