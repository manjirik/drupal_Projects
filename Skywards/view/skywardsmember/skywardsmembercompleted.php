<script type="text/javascript">

	changeProgressbar('100%','YOUR ENTRY TICKET IS READY');

 </script>
<div class="tabs">
                <div class="memc-content-wrapper">
                	<div class="memc-content wid545">
                    	<h2><?php if($_GET['validate'] == 'yes') {?>Thank you for being a loyal Emirates Skywards member.<?php } else { echo "Thank you for becoming a loyal Emirates Skywards member."; }?></h2>
                        <div class="memc-already-member">
                            
                            <div class="memc-completed-msg">
                            <?php 
                            $fname=($data['FirstName'])? $data['FirstName'] : $_SESSION['fb_user_first_name'];
                            $lname=($data['LastName'])? $data['LastName'] : $_SESSION['fb_user_last_name'];
                            $skywards_member_number=( $_GET['vmn'])? $_GET['vmn'] : $data['Username'];
                            ?>
                            	Name: <?php echo $fname.' '.$lname;?><br />
                                Emirates Skywards Number: <?php echo $skywards_member_number;?>
                                <!-- Skywards Member tier: Blue<br />
                                Member since: 21/04/2011 -->
                            </div>
                            
                            <p>One of the most exciting aspects of being a Skywards member is the ability to earn and spend Skywards Miles with Emirates and many of our prestigious global partners. Redeem your Miles and fly to over 130 of the world’s most exciting destinations.</p>
    						<div class="memc-btn-wrapper-link">
                                <a href="<?php echo SITE_URL."index.php?r=myentries/show_entries"?>">View My Entry Ticket</a>
                            </div>
   						</div>
                        
                    </div>
                    
                    <!--<div class="memc-right-panel-wrapper">
                        <h3>What next?</h3>
                        <ul class="memc-right-panel">
                        	<li>
                            	<a href="javascript: void(0);" class="selected">Convert your friends</a>
                                <div class="memc-right-panel-list-content" style="display:block;">
                                	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud  exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure.Lorem ipsum dolor sit amet,consectetur adipisicing elit,sed do eiusmod temporincididunt ut labore et doloremagna aliqua. Ut enim adminim veniam, quis nostrudexercitation ullamco laborisnisi ut aliquip ex ea commodoconsequat. Duis aute irure.
                                </div>
                            </li>
                        </ul>
                    </div>-->
                  	
                    <div class="clearfix"></div>
                     <?php 
						/*if($_POST && !empty($data)){ ?>
                    <div>
                    	<?php 
								echo "Response:<br/>";
                    			echo "<pre>";
								print_r($data);
								?>
					 </div>
					 <?php }*/?>
                </div>
            </div>