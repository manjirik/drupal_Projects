<?php 
	global $base_path,$theme_path;
	//echo "<pre>";
	//print_r($node);
	//EXIT;
?>

<!-- container start -->
<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
        <div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>
		<nav>  
		<!-- Main Menu -->
			<?php print render($page['header']); ?>
		</nav>
		<!-- End of Main Menu -->
      </section>
    </div>

	<div class="secondoryMenu">
		<div class="secondoryMenuWrap"> 
		<?php print render($page['highlighted']); ?>
		</div>
	</div>
 </div>
 
 <section class="MidInteWrapper">
    <div class="MidInteWrapperTop">
	
		<!-- Copy div from Views header -->
		<div class="MidWrapperWhite">
		<div class="MidTopSectionWhite">
		<h1><?php if(!empty($node->field_overview_headline['und'][0]['value'])) echo $node->field_overview_headline['und'][0]['value'];?></h1>
		<p><?php echo $node->body['und'][0]['value']?></p>
		</div>

	
	
	<section class="MiddleMainAreaWhite">
		<div class="MidWrapperWhite">
			<div class="MidMiddleSectionWhite">
				<div class="votingBig">
					<div class="middleImage"><img src = "<?php echo $base_path.$theme_path; ?>/images/middleVoting.png">
					</div>
						<div class="votingWrapMain left marginbottom15px">
							<div class="votingWrap">
								<div class="VotingWrap_Inside">
									<div class="VotingWrap_ImageArea"><img src="<?php print file_create_url($node->field_block_image_1['und'][0]['uri']); ?>" width="121" height="121"></div>
										<div class="VotingWrap_ContentArea">
										<h3><?php print $node->field_block_title_1['und'][0]['value']; ?></h3>
										<p></p>
										<p><?php  print $node->field_block_description_1['und'][0]['value']; ?></p>
										</div>
								</div>
							</div>
							<div class="bottom">
								<a href="<?php  print $node->field_block_link_1['und'][0]['url']; ?>"><h4>Learn more about <?php print $node->field_block_title_1['und'][0]['value']; ?> &raquo;</h4></a>
							</div>
						</div>
							
						<div class="votingWrapMain left marginLeft15px marginbottom15px">
							<div class="votingWrap">
								<div class="VotingWrap_Inside">
									<div class="VotingWrap_ImageArea"><img src="<?php print file_create_url($node->field_block_image_2['und'][0]['uri']); ?>" width="121" height="121"></div>
									<div class="VotingWrap_ContentArea">
									<h3><?php print $node->field_block_title_2['und'][0]['value']; ?></h3>
									<p></p>
									<p><?php  print $node->field_block_description_2['und'][0]['value']; ?></p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<a href="<?php  print $node->field_block_link_2['und'][0]['url']; ?>"><h4>Learn more about <?php print $node->field_block_title_2['und'][0]['value']; ?> &raquo;</h4></a>
							</div>
						</div>

						<div class="votingWrapMain left">
							<div class="votingWrap">
								<div class="VotingWrap_Inside">
									<div class="VotingWrap_ImageArea"><img src="<?php print file_create_url($node->field_block_image_3['und'][0]['uri']); ?>" width="121" height="121"></div>
									<div class="VotingWrap_ContentArea">
									<h3><?php print $node->field_block_title_3['und'][0]['value']; ?></h3>
									<p></p>
									<p><?php  print $node->field_block_description_3['und'][0]['value']; ?></p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<a href="<?php  print $node->field_block_link_3['und'][0]['url']; ?>"><h4>Learn more about <?php print $node->field_block_title_3['und'][0]['value']; ?> &raquo;</h4></a>
							</div>
						</div>

					
						<div class="votingWrapMain left marginLeft15px">
							<div class="votingWrap">
								<div class="VotingWrap_Inside">
									<div class="VotingWrap_ImageArea"><img src="<?php print file_create_url($node->field_block_image_4['und'][0]['uri']); ?>" width="121" height="121"></div>
									<div class="VotingWrap_ContentArea">
									<h3><?php print $node->field_block_title_4['und'][0]['value']; ?></h3>
									<p></p>
									<p><?php  print $node->field_block_description_4['und'][0]['value']; ?></p>
									</div>
								</div>
							</div>
							<div class="bottom">
								<a href="<?php  print $node->field_block_link_4['und'][0]['url']; ?>"><h4>Learn more about <?php print $node->field_block_title_4['und'][0]['value']; ?> &raquo;</h4></a>
							</div>
						</div>
			
			
				</div>
			</div>
		</div>
	</section>
		</div>
    </div>
	
</section>

<div id="block-block-3" class="block block-block contextual-links-region">
<div class="content">
		<?php print_r($page['content']['block_3']['#markup']); ?>
</div>
</div>

	<!-- Connect  Block Ends -->

	<section class="MidWrapperWhite marginBotTop1em">
        <div class="bottomBreadCrum clearBoth">
        
           <?php if ($breadcrumb) 
			print $breadcrumb; 
			?>
         
        </div>
	</section>
      
    </div>

<footer>
<div class="FooterWrapper">
 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div class="FooterTopPart">
      <div class="FooterColumn1">
       
	 <?php print render($page['footer_firstcolumn']); ?>
	 
      </div>
      <div class="FooterColumn2">
        <?php print render($page['footer_secondcolumn']); ?>
      </div>
      <div class="FooterColumn3">
         <?php print render($page['footer_thirdcolumn']); ?>
      </div>
      <div class="FooterColumn4">
        <?php print render($page['footer_fourthcolumn']); ?>
      </div>
    </div>
	<?php endif; ?>
    <div class="FooterBottomPart"><?php print render($page['footer']); ?></a> 
  </div>
</footer>

<!-- container end -->


