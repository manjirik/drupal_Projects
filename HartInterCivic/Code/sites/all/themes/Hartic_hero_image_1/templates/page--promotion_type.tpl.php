
<!-- container start -->
<div class="container">
  <div id="noImage">
    <div class="HeaderWrapper">
      <section class="HeaderTopArea">
        <div class="logoMain"><a href="#">Hart intetcivic</a></div>
        <nav>
         <?php print render($page['header']); ?>
        </nav>
      </section>
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
        	
            <p><?php if($node->field_detail_description['und'][0]['value'] !='') echo ($node->field_detail_description['und'][0]['value']); ?> </p>
        </article><!--end of article-->  
		         		
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


