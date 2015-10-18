<?php
// echo "<pre>";
//print_r($page['content']);
//exit;
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
  
	
<section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">
      <div class="newsIteamTopSection">
        <?php if ($title): ?>
        <h1 class="title" id="page-title">
          <?php print $title; ?>
        </h1>
    	  <?php endif; ?>
	        <p><?php if($node->body['und'][0]['value'] !='') echo ($node->body['und'][0]['value']); ?></p>
      </div>
  	<section class="MidBlogWhite"><!--<middle section start>-->
        <div class="blogHolder">
          <section class="interiorBlogArticle newsTopwhiteBottomGrey left marginbottom24px"><!--<authorname section start>-->          	
	    <?php if($node->field_details['und'][0]['value'] !='') //echo ($node->field_details['und'][0]['value']);
			
 ?>
			<!-- Content Area ( Block ) -->
	            <?php 
	unset($page['content']['menu_menu-blog-detail']);
	unset($page['content']['block_14']);

	print render($page['content']); ?>
			<!-- Content Area ( Block ) -->
	  </section>
	<section class="interiorBlogCatagories left"><!--<catagories section start>-->
		<div class="blogCatagories">
			 <article class="categories">
			 	<?php if ($page['sidebar_first']): ?>     
		        	<?php print render($page['sidebar_first']); ?> 	   
	 		 	<?php endif; ?>
			 </article>
			
			 <article class="archives">
				 <?php if ($page['sidebar_second']): ?> 	     
	 		        <?php print render($page['sidebar_second']); ?> 	    
	 			 <?php endif; ?>
			 </article>
		</div>
	</section>
     </div>
 </section>
</div>


	
	
<section class="MidWrapperWhite marginBotTop1em">
   <div class="bottomBreadCrum clearBoth">
    <?php if ($breadcrumb): ?>
      <?php print_r($breadcrumb); ?>
	<a class="active" href="<?php print $base_path . "BlogList"; ?>">Blog</a>
	<a class="active" href=""><?php print $node->title; ?></a>
    <?php endif; ?>
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
	
  

  