<script type="text/javascript">
(function ($) {
    $(document).ready(function(){
       var imageUrl = $('.banner').text();
	   var header1 = $('.header1').text();
	   var header2 = $('.header2').text();
	if(imageUrl!=0){
		$('.header').css('background-image', 'url(' + imageUrl + ')');
	}
	if (header1 != "" ){
		$('.TopContentArea h1').text(header1);
	}
	if (header2 != "" ){
		$('.TopContentArea p').text(header2);
	}
	
    });
})(jQuery); 
</script>

<?php 
$node = node_load(155);
?>  
<?php if(!empty( $node->field_banner_image['und'][0]['uri'])){ ?>
<div class= "banner" style="display:none;">
	<?php echo file_create_url($node->field_banner_image['und'][0]['uri']); ?>
</div>
<?php }?>
<?php if(!empty($node->field_header_1['und'][0]['value'])){ ?>
<div class = "header1" style="display:none;">
	<?php echo $node->field_header_1['und'][0]['value']; ?>
</div>
<?php }?>
<?php if(!empty($node->field_header_2['und'][0]['value'])){ ?>
<div class = "header2" style="display:none;">
	<?php echo $node->field_header_2['und'][0]['value']; ?>
</div>
<?php }?>
<div class="container">
  		<!-- menus starts here -->
<header class="header">
  <div class="HeaderWrapper">  
    <section class="HeaderTopArea">
	<div class="logoMain" onclick ="window.location = '<?php print $base_path; ?>'"><a href="#">Hart intetcivic</a></div>

      <nav>
	  
	<?php print render($page['header']); ?>
	</nav>
    </section>
    <section class="TopContentArea">
      <h1>Advancing democracy for over 100 years.</h1>
      <p>Proven election management, voting systems and support to ensure election success.</p>
    </section>
  </div><!--end of HeaderWrapper-->
</header>


<section class="MiddleMainArea">
  <div class="MidWrapper">
    <div class="MidTopSection">   

			<!-- Content Area ( Block ) -->
		<?php
		if(drupal_is_front_page()) {
		    unset($page['content']['system_main']['default_message']);
	       }
		?>
	            <?php print render($page['content']); ?>
			<!-- Content Area ( Block ) -->
    
    </div><!--end of MidTopSection-->
  </div><!-- end of MiddleMainArea -->
</section>
</div> <!-- end of container -->
<footer>
<div class="FooterWrapper">
 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
    <div class="FooterTopPart">
      <div class="FooterColumn1">
       
	 <?php print render($page['footer_firstcolumn']); ?>
	 
      </div><!--end of footercolumn1-->
      <div class="FooterColumn2">
        <?php print render($page['footer_secondcolumn']); ?>
      </div><!--end of footercolumn2-->
      <div class="FooterColumn3">
         <?php print render($page['footer_thirdcolumn']); ?>
      </div><!--end of footercolumn3-->
      <div class="FooterColumn4">
        <?php print render($page['footer_fourthcolumn']); ?>
      </div><!--end of footercolumn4-->
    </div><!--end of footerTopPart-->
	<?php endif; ?>
    <div class="FooterBottomPart"><?php print render($page['footer']); ?></a> 
	</div><!--end of footerBottomPart-->
  </div><!--end of FooterWrapper-->
</footer>




















