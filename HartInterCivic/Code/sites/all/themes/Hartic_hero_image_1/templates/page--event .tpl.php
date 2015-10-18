<?php 
//echo '<pre>';
//print_r($node);
//echo'</pre>' ; 

?>
<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
       <div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>
<!-- Main Menu -->   
   <nav>
      
	<?php 
	   if ($main_menu): ?>
		<div id="main-menu" class="navigation">
        <?php 
		print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'id' => 'main-menu-links',
            'class' => array('links', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
	  </div>
	    <?php endif; ?>
	</nav>
	<!-- End of Main Menu -->
      </section>
    </div>
    <div class="secondoryMenu">
      <div class="secondoryMenuWrap"> <span class="left">PAGE TITLE :</span>
        <ul>
          <li>Nav Item</li>
          <li>Nav Item</li>
          <li>Nav Item</li>
        </ul>
      </div>
    </div>
  </div>
  <section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
      <div class="newsIteamTopSection">
        <h1><?php if($node->title !='') echo $node->title; ?></h1>
        <p><?php if($node->body['und'][0]['value'] !='') echo ($node->body['und'][0]['value']); ?></p>
      </div>
      <section class="GenericContent">
		<article>
	                
		<?php
			$news_img_path = $node->field_news_image['und'][0]['filename'];
			$news_img_uri = file_build_uri($news_img_path); 
			$news_img_url = file_create_url($news_img_uri); 
			if($news_img_path != ''){ 

		?>
			<img src="<?php echo $news_img_url ; ?>"  alt="<?php echo $node->field_news_image['und'][0]['alt']; ?>" title="<?php echo $node->field_news_image['und'][0]['title']; ?>" >

		<?php } ?>

		<p><?php if($node->field_news_details['und'][0]['value'] !='' ) echo $node->field_news_details['und'][0]['value']; ?></p>
		<p>Lorem ipsum dolor sit aet, consectetuer adipiscing elit. Vusce tristique tras ipsum urn, semper vitae, aliquet
bral. Quil palem marg dripo. Sipsum dolor sit amet, consctetuer adipiscing elit. Fusce tristique. Sed ut 
perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem 
aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. 
Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni 
dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor.</p>

		<!-- <a href="#">Text hyperlink &raquo;</a>-->

       	</article>
		<!--end of article-->  
             		
      </section><!--end of Generic content-->   
    
      <div class="clearfix"></div> 
       

	<!-- Connect  Block Starts -->
		<?php print_r($page['content']['block_3']['#markup']); ?>
	<!-- Connect  Block Ends -->

        <div class="bottomBreadCrum">
         
		<?php if ($breadcrumb): 
      			 print_r($breadcrumb);  
    		 endif; ?>
          
        
        </div>

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
    <div class="FooterBottomPart">Copyright &copy; 2013 Hart InterCivic Inc. All rights reserved. <a href="#">Terms of Use</a><a href="#"> | </a><a href="#">Privacy Policy</a> </div>
  </div>
</footer>
</div>
<!-- container end -->
