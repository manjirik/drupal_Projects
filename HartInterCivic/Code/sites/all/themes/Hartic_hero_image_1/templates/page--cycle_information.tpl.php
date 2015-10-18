<?php $current_taxonomy = $node->field_cycle_category['und']['0']['taxonomy_term']->name;
$vocab =  taxonomy_get_tree(9, $parent = 0, $max_depth = NULL, $load_entities = FALSE);

 ?>
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

  <section class="MidInteWrapper">
    <div class="MidInteWrapperTop marginBottom0px">
      <section class="MidInteTopContentArea left overHidden">
	<?php if(!empty($node->field_headline['und'][0]['value'])){ ?>
        <h1><?php echo $node->field_headline['und'][0]['value']; ?></h1>
	<?php } 
	 if(!empty($node->body['und'][0]['value'])){ ?>
        <p><?php echo $node->body['und'][0]['value']; ?></p>
	<?php } ?>
      </section>
     	<?php if(!empty($node->field_cycle_image['und']['0']['uri'])){
		$cycle_image_path = file_create_url($node->field_cycle_image['und']['0']['uri']);
	 ?>
	 <section class="MidInteTopImageArea"> <img src="<?php echo $cycle_image_path; ?>" /> </section>
	<?php  } ?>
    </div>
    <div class="MidInteWrapperMiddle">
      <div class="verifyOverviewMiddleNav">
        <ul>
				<?php $term = taxonomy_term_load($vocab[0]->tid); ?>
        		<li image_value ="<?php echo file_create_url($node->field_tab_1_image['und'][0]['uri']);?>" id ='#<?php echo str_replace(" ","+",$term->name); ?>' onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );">
         		<div class="verifyOverviewNavImage"><img src="<?php echo file_create_url($node->field_tab_1_icon_image['und'][0]['uri']);?>">
				
        		<a href="javascript:void(0);"><?php echo $term->name; ?></a></div></li>
				
				<?php $term = taxonomy_term_load($vocab[1]->tid); ?>
        		<li image_value ="<?php echo file_create_url($node->field_tab_2_image['und'][0]['uri']);?>" id='#<?php echo str_replace(" ","+",$term->name); ?>' onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );">
         		<div class="verifyOverviewNavImage"><img src="<?php echo file_create_url($node->field_tab_2_icon_image['und'][0]['uri']);?>">
				
        		<a href="javascript:void(0);"><?php echo $term->name; ?></a></div></li>
				
				<?php $term = taxonomy_term_load($vocab[2]->tid); ?>
        		<li image_value ="<?php echo file_create_url($node->field_tab_3_image['und'][0]['uri']);?>" id ='#<?php echo str_replace(" ","+",$term->name); ?>' onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );">
         		<div class="verifyOverviewNavImage"><img src="<?php echo file_create_url($node->field_tab_3_icon_image['und'][0]['uri']);?>">
				
        		<a href="javascript:void(0);"><?php echo $term->name; ?></a></div></li>

				<?php $term = taxonomy_term_load($vocab[3]->tid); ?>
        		<li image_value ="<?php echo file_create_url($node->field_tab_4_image['und'][0]['uri']);?>" id ='#<?php echo str_replace(" ","+",$term->name); ?>' onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );">
         		<div class="verifyOverviewNavImage"><img src="<?php echo file_create_url($node->field_tab_4_icon_image['und'][0]['uri']);?>">
				
        		<a href="javascript:void(0);"><?php echo $term->name; ?></a></div></li>
				
				<?php $term = taxonomy_term_load($vocab[4]->tid); ?>
        		<li image_value ="<?php echo file_create_url($node->field_tab_5_image['und'][0]['uri']);?>" id ='#<?php echo str_replace(" ","+",$term->name); ?>' onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );">
         		<div class="verifyOverviewNavImage"><img src="<?php echo file_create_url($node->field_tab_5_icon_image['und'][0]['uri']);?>">
				
        		<a href="javascript:void(0);"><?php echo $term->name; ?></a></div></li>

        </ul>
      </div>
      <div class="benifit1">
	<?php if(!empty($node->field_cycle_headline['und'][0]['value'])){ ?>
       	 <h2><?php echo $node->field_cycle_headline['und'][0]['value']; ?></h2>
	<?php } 
	 if(!empty($node->field_cycle_description['und'][0]['value'])){ ?>
      		  <p><?php echo $node->field_cycle_description['und'][0]['value'];?></p>
	<?php  } ?>
        <div class="contentHolder">
          <div class="cont">
		<?php  if(!empty($node->field_cycle_secondary_header['und'][0]['value'])){ ?>
            		<h2><?php echo $node->field_cycle_secondary_header['und'][0]['value'];?> </h2>
		<?php }
			 if(!empty($node->field_cycle_detail['und'][0]['value'])){ ?>
	      	      <p><?php echo $node->field_cycle_detail['und'][0]['value'];?></p>
		<?php } ?>
          </div>
		<?php $image_path = file_create_url($node->field_cycle_overview_image['und'][0]['uri']);	
			if(!empty($node->field_cycle_overview_image['und'][0]['uri'])){ ?>
		  	        <div class="right"><img src="<?php print $image_path; ?>" alt=""/></div>
			<?php } ?>
        </div>
	<?php if(!empty($node->field_cycle_customer_quote['und'][0]['value']) || !empty($node->field_customer_author['und'][0]['value'])){ ?>
        <div class="testiomonal">
          <div class="top"></div>
          <h5>"<?php echo $node->field_cycle_customer_quote['und'][0]['value']; ?>"</h5>
          <p><?php echo $node->field_customer_author['und'][0]['value']; ?></p>
          <div class="bot"></div>
        </div>
	<?php } ?>
      </div>
      <section class="MidWrapperWhite marginBotTop1em">
       
	<div id="block-block-3" class="block block-block contextual-links-region">
	<div class="content">
	<?php print_r($page['content']['block_3']['#markup']); ?>
	</div>
	</div>
        <div class="bottomBreadCrum">
         <div class="bottomBreadCrum clearBoth">
        
           <?php if ($breadcrumb){ 
			print $breadcrumb;
		} ?>

<a class="active" href=""><?php print $current_taxonomy; ?> </a>

        </div>
      </section>
    </div>
  </section>
</div>
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

