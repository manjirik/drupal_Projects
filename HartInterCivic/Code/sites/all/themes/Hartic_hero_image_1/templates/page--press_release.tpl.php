<!-- container start -->
<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
        <div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>
        <nav>
        	<?php print render($page['header']); ?>
        </nav>
      </section>
    </div>
    <div class="secondoryMenu">
      <div class="secondoryMenuWrap">
		 <?php print render($page['highlighted']); ?>
	</div>
    </div>
  </div>
  <section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
      <div class="newsIteamTopSection">
        <h1><?php if($node->title !='') echo $node->title; ?></h1>
        <p><?php if($node->field_press_release_summary['und'][0]['value'] !='') echo ($node->field_press_release_summary['und'][0]['value']); ?></p>
      </div>
      <section class="MidWrapperWhite">
        <section class="newsTopwhiteBottomGrey marginbottom32px">
          <div class="NewsTextImage marginAuto">
            <h5><?php if($node->name !='') //echo ucfirst($node->name); ?> <?php if($node->field_press_release_date['und'][0]['value'] !=''){ $date=date_create($node->field_press_release_date['und'][0]['value']);  echo '- '.date_format($date,'F d Y'); } ?></h5>
            <p> <?php if($node->field_press_release_details['und'][0]['value'] !='' ) echo $node->field_press_release_details['und'][0]['value']; ?></p>
		
		 <div class="redborder1px"></div>
<?php if(($node->field_pr_email_id['und'][0]['email'] !='' ) || ($node->field_pr_contact_number['und'][0]['value'] !='') || ($node->field_pr_contact_person['und'][0]['value'] !='') ){ ?>
            <div class="mediaContact marginbottom15px">
              <h5>Contact Information:</h5>
	
		<?php	if($node->field_pr_contact_person['und'][0]['value'] !='' ) {?>
               <span class="contact_info"><?php echo $node->field_pr_contact_person['und'][0]['value']; ?></span></br>
		<?php } ?>

		<?php	if($node->field_pr_contact_number['und'][0]['value'] !='' ) {?>
              <span class="contact_info"><?php echo $node->field_pr_contact_number['und'][0]['value']; ?></span></br>
		<?php } ?>

		<?php if($node->field_pr_email_id['und'][0]['email'] !='' ){ ?>
              <span class="blue"> <a href="mailto:<?php echo $node->field_pr_email_id['und'][0]['email']; ?>" >
		<?php echo $node->field_pr_email_id['und'][0]['email']; ?></a></span><br/>
		<?php } ?>

		
	
            </div>
<?php } ?>
          </div>
        

</section>
	 <div class="bottomBreadCrum">
         	<?php if ($breadcrumb): 
      			 print_r($breadcrumb);  
    			$path = drupal_get_path_alias($node->nid); ?> 

	<a class="active" href="<?php print $base_path . "news_events"; ?>">Press Release</a>
	<a class="active" href=""><?php print $node->title; ?></a>
	 <?php endif; ?>
        </div>
      </section>
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
</div>
<!-- container end -->

