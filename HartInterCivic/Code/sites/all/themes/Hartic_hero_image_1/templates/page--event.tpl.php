<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
       <div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>
<!-- Main Menu -->   
	<nav>
      		<?php print render($page['header']); ?>
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
        <p>Event Date : <?php if($node->field_event_date['und'][0]['value'] !='') echo ($node->field_event_date['und'][0]['value']); ?> </p>
      </div>
      <section class="GenericContent">
		<article>
	                	<p>Event Location : <?php if($node->field_event_location['und'][0]['value'] !='' ) echo $node->field_event_location['und'][0]['value']; ?></p>
				<a href="<?php if($node->field_event_link['und'][0]['url'] !='' ) echo $node->field_event_link['und'][0]['url']; ?>"><?php if($node->field_event_link['und'][0]['title'] !='' ) echo $node->field_event_link['und'][0]['title']; ?> &raquo;</a>

       	</article>
		<!--end of article-->  
             		
      </section><!--end of Generic content-->   
    
      <div class="clearfix"></div> 
       	
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
    <div class="FooterBottomPart"><?php print render($page['footer']); ?></a> 
  </div>
</footer>
</div>
<!-- container end -->
