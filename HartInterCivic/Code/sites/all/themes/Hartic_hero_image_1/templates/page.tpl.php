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
<?php if ($page['highlighted']){ ?>
<div class="secondoryMenu">
	<div class="secondoryMenuWrap"> 
		 <?php print render($page['highlighted']); ?>
	</div>
</div>
<?php } ?>
 <?php if ($page['sidebar_second']){ ?>
	<div class="MidWrapperWhite">
		<div class="newsIteamTopSection">
		<?php 	
			if(!empty($page['content']['block_14'])){
				print render($page['content']['block_14']);}
			if(!empty($page['content']['block_17'])){
				print render($page['content']['block_17']);}
			if(!empty($page['content']['block_18'])){
				print render($page['content']['block_18']);}
			
		?>
		</div>
	</div>

<section class="MiddleMainAreaWhite">
    <div class="MidWrapperWhite">

	          <section class="interiorBlogArticle newsTopwhiteBottomGrey left marginbottom24px"><!--<authorname section start>-->   
			<!-- Content Area ( Block ) -->
			<?php 
	             print render($page['content']); ?>
			<!-- Content Area ( Block ) -->
	          </section>
		   <section class="interiorBlogCatagories left"><!--<catagories section start>-->
	            <div class="blogCatagories">
		     <article class="archives">
			<?php if ($page['sidebar_second']): ?>
		        <?php print render($page['sidebar_second']); ?> 	    
 		      <?php endif; ?>
                  </article>

	     	  </div>
	     </section>
	 </div>
</section>
	 <?php }
	else{
			if(!empty($page['content']['block_19'])){?>
			<div class="MidWrapperWhite">
				<div class="newsIteamTopSection"><?php
					print render($page['content']['block_19']); ?>
				</div>
			</div><?php		
			}
			
		        print render($page['content']);  
	}
	?>




		<section class="MidWrapperWhite marginBotTop1em">	<div class="BreadCrumWrapper"> 	
		   <div class="bottomBreadCrum clearBoth">
		    <?php if ($breadcrumb): ?>
		      <?php  print_r($breadcrumb);  ?>
		    <?php endif; ?>
		   </div></div>
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

	
  

  

  
