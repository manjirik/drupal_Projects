<script type="text/javascript">
(function ($) {
    $(document).ready(function(){
       var imageUrl = $('.MidInteTopImageAreaImage').text();
	if(imageUrl!=0){
		$('.MidInteWrapperTop').css({'background-image': 'url(' + imageUrl + ')','background-repeat': 'no-repeat'});	
    };
})
})(jQuery); 
</script>

<?php 
global $base_path;
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
	<?php print render($page['highlighted']); ?>      </div>
</div>



  </div>
  <section class="MidInteWrapper">
    <div class="MidInteWrapperTop benefit">
      <section class="MidInteTopContentArea left overHidden" style="width:50%">
        <h1><?php if(!empty($node->field_benefit_headline['und'][0]['value']))
			echo $node->field_benefit_headline['und'][0]['value'];?></h1>
        <p> <?php if($node->body['und'][0]['value'] !='') echo ($node->body['und'][0]['value']); ?></p>
      </section>
      <section class="MidInteTopImageAreaImage" style="display:none;">
	<?php
		$relativePath = $node->field_shortimage['und'][0]['filename'];
		$uri = file_build_uri($relativePath);  //eg. show public://blabla/abc.jpg
		$url = file_create_url($uri); //eg. show http://www.yoursite.com/sites/default/files/blabla/abc.jpg
		echo $url;
	 ?>
	</section>

    </div>
    <div class="MidInteWrapperMiddle">
      <div class="MidInteWrapperMiddleNav">
        <ul>
          <li><a  href="#benefit1_header">
		<?php
			$benefit1_icon_path = $node->field_benefit1_icon['und'][0]['filename'];
			$benefit1_icon= file_build_uri($benefit1_icon_path);  //eg. show public://blabla/abc.jpg
			$benefit1_iconurl = file_create_url($benefit1_icon); //eg. show http://www.yoursite.com/sites/default/files/blabla/abc.jpg
			if($benefit1_icon_path != ''){
		?>

		<img src="<?php echo $benefit1_iconurl ; ?>"  alt="<?php echo $node->field_benefit1_icon['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit1_icon['und'][0]['title']; ?>" />
		<?php } ?>
 <?php print $node->field_header_title1['und'][0]['value']; ?></a>
		</li>
          <li><a href="#benefit2_header">
		<?php
			$benefit2_icon_path = $node->field_benefit2_icon['und'][0]['filename'];
			$benefit2_icon= file_build_uri($benefit2_icon_path); 
			$benefit2_iconurl = file_create_url($benefit2_icon); 
			if($benefit2_icon_path != ''){
		?>

		<img src="<?php echo $benefit2_iconurl ; ?>"  alt="<?php echo $node->field_benefit2_icon['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit2_icon['und'][0]['title']; ?>" />
		<?php } ?>

		<?php print $node->field_header_title2['und'][0]['value']; ?></a></li>
          <li><a href="#benefit3_header">
		<?php
			$benefit3_icon_path = $node->field_benefit3_icon['und'][0]['filename'];
			$benefit3_icon= file_build_uri($benefit3_icon_path); 
			$benefit3_iconurl = file_create_url($benefit3_icon); 
			if($benefit3_icon_path != ''){
		?>

		<img src="<?php echo $benefit3_iconurl ; ?>"  alt="<?php echo $node->field_benefit3_icon['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit3_icon['und'][0]['title']; ?>" />
		<?php } ?>

		<?php print $node->field_header_title3['und'][0]['value']; ?></a></li>
        </ul>
      </div>
      <div class="benifit1">
        <h2 id="benefit1_header"><?php if($node->field_benefit_one_header['und'][0]['value'] != '') echo $node->field_benefit_one_header['und'][0]['value']; ?></h2>
        <p><?php if($node->field_benefit_one_subtext['und'][0]['value'] !='')  echo $node->field_benefit_one_subtext['und'][0]['value']; ?> </p>
        <div class="contentHolder">
          <div class="cont">
            <h2><?php if($node->field_benefit1_secondary_header['und'][0]['value']!= '') echo $node->field_benefit1_secondary_header['und'][0]['value']; ?> </h2>
            <p><?php if($node->field_benefit1_details['und'][0]['value'] !='' ) echo $node->field_benefit1_details['und'][0]['value']; ?></p>

          </div>
          <div class="right">
		<?php
			$benefit1_rel_path = $node->field_benefit_one_image['und'][0]['filename'];
			$benefit1_uri = file_build_uri($benefit1_rel_path);  //eg. show public://blabla/abc.jpg
			$benefit1_url = file_create_url($benefit1_uri); //eg. show http://www.yoursite.com/sites/default/files/blabla/abc.jpg
			if($benefit1_rel_path != ''){

		?>

			<img src="<?php echo $benefit1_url; ?>"  alt="<?php echo $node->field_benefit_one_image['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit_one_image['und'][0]['title']; ?>" />
		<?php } ?>
	</div>
        </div>
	<?php 
		$benefit1_cust_quotes=$node->field_benefit1_customer_quote['und'][0]['value'];

		if($benefit1_cust_quotes!=''){
			$field_befefit1_cq_author=$node->field_befefit1_cq_author['und'][0]['value'];

		
	?>
       	 <div class="testiomonal">
       	  	 <div class="top"></div>
        	  	<h5>"<?php echo $benefit1_cust_quotes; ?>"</h5>
        	 	 <p><?php echo $field_befefit1_cq_author; ?></p>
       	  	 <div class="bot"></div>
       	 </div>
	<?php } ?>

      </div>

      <div class="benifit2">
        <h2 id="benefit2_header"><?php if($node->field_benefit2_header['und'][0]['value'] != '') echo $node->field_benefit2_header['und'][0]['value']; ?></h2>
        <p><?php if($node->field_benefit2_subtext['und'][0]['value'] !='') echo $node->field_benefit2_subtext['und'][0]['value']; ?></p>
        <div class="contentHolder1">
          <div class="content1">
		
		<div class="left"><div class ="innerclass">
		<?php 
			$benefit2_rel_path = $node->field_benefit2_image['und'][0]['filename'];
			$benefit2_uri = file_build_uri($benefit2_rel_path);  //eg. show public://blabla/abc.jpg
			$benefit2_url = file_create_url($benefit2_uri); //eg. show http://www.yoursite.com/sites/default/files/blabla/abc.jpg
			if(!empty($benefit2_rel_path)){?>
				<img src="<?php echo $benefit2_url; ?>"  alt="<?php echo $node->field_benefit2_image['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit2_image['und'][0]['title']; ?>" />
			<?php } ?>
	    </div></div>
            <h2><?php if($node->field_benefit2_secondary_header['und'][0]['value'] !='') echo $node->field_benefit2_secondary_header['und'][0]['value']; ?></h2>
            <p><?php if($node->field_benefit2_details['und'][0]['value']!= '') echo $node->field_benefit2_details['und'][0]['value']; ?></p>
	     

          </div>
        </div>
		

      </div>
      
      <div class="benifit1">
		<?php 
			$benefit2_cust_quotes=$node->field_benefit2_customer_quote['und'][0]['value'];

			if($benefit2_cust_quotes!=''){
				$field_befefit2_cq_author=$node->field_befefit2_cq_author['und'][0]['value'];

		?>
       		 <div class="testiomonal">
       	  		 <div class="top"></div>
	        	  	 <h5>"<?php echo $benefit2_cust_quotes; ?>"</h5>
	        	 	 <p><?php echo $field_befefit2_cq_author; ?></p>
	       	  	 <div class="bot"></div>
       		 </div>
		<?php } ?>


	 <h2 id="benefit3_header"><?php if($node->field_benefit3_header['und'][0]['value'] !='') echo $node->field_benefit3_header['und'][0]['value']; ?></h2>
	 <p><?php if($node->field_benefit3_subtext['und'][0]['value']!='') echo $node->field_benefit3_subtext['und'][0]['value']; ?></p>

        <div class="contentHolder">
          <div class="cont">
            <h2 ><?php if($node->field_benefit3_secondary_header['und'][0]['value']!='') echo $node->field_benefit3_secondary_header['und'][0]['value']; ?> </h2>
            <p><?php if($node->field_benefit3_details['und'][0]['value'] !='') echo $node->field_benefit3_details['und'][0]['value']; ?></p>

          </div>
          <div class="right">
		<?php
			$benefit3_rel_path = $node->field_benefit3_image['und'][0]['filename'];
			$benefit3_uri = file_build_uri($benefit3_rel_path);  //eg. show public://blabla/abc.jpg
			$benefit3_url = file_create_url($benefit3_uri); //eg. show http://www.yoursite.com/sites/default/files/blabla/abc.jpg
			if($benefit3_rel_path !=''){
		?>

			 <img src="<?php echo $benefit3_url; ?>"  alt="<?php echo $node->field_benefit3_image['und'][0]['alt']; ?>" title="<?php echo $node->field_benefit3_image['und'][0]['title']; ?>" class="right"/> 
		
		<?php } ?>
		 </div> 
	</div>
	
	<?php 
		$benefit3_cust_quotes=$node->field_benefit3_customer_quote['und'][0]['value'];

		if($benefit3_cust_quotes!=''){
			$field_befefit3_cq_author=$node->field_befefit3_cq_author['und'][0]['value'];


	?>
       	 <div class="testiomonal">
       	  	 <div class="top"></div>
        	  	<h5>"<?php echo $benefit3_cust_quotes; ?>"</h5>
        	 	 <p><?php echo $field_befefit3_cq_author; ?></p>
       	  	 <div class="bot"></div>
       	 </div>
	<?php } ?>
        
      </div>
    <!-- Connect  Block Starts -->
<?php
//print_r($page['content']['views_fba38f570a24ac6bfc7b49a6fdc810c2']['#markup']); 
$col1_img = file_create_url($node->field_column1_img['und'][0]['uri']);
$col2_img = file_create_url($node->field_column2_img['und'][0]['uri']);
$col3_img = file_create_url($node->field_column3_img['und'][0]['uri']);

if(!empty($node->field_column1_description['und'][0]['value']) || !empty($node->field_column1_link['und'][0]['title']) || !empty($node->field_column2_link['und'][0]['title']) 
|| !empty($node->field_column3_link['und'][0]['title'])){
?>  

<section class="votingSolution">
        <h1><?php print $node->field_label['und'][0]['value']; ?></h1>
        <section class="votingSolSection">
          <div class="MidBottompSection">
            <ul class="votingProductlisting">
              <li> 
			<span class="textAlignLeft"> 
				<?php print $node->field_column1_description['und'][0]['value']; ?>
			</span>
		 </li>
		<li> 
			<img src="<?php print $col1_img; ?>" alt=""> 
			<span><a class="votlink" href="<?php print $node->field_column1_link['und'][0]['url']; ?>"><?php print $node->field_column1_link['und'][0]['title']; ?></a></span> 
		</li>
              <li>
			 <img src="<?php print $col2_img; ?>" alt="">
			<span><a href="<?php print $node->field_column2_link['und'][0]['url']; ?>"><?php print $node->field_column2_link['und'][0]['title']; ?></a></span> 
		</li>
              <li class="last-child">
			 <img src="<?php print $col3_img; ?>" alt="">	
			<span> <a href="<?php print $node->field_column3_link['und'][0]['url']; ?>"><?php print $node->field_column2_link['und'][0]['title']; ?></a></span> 
		</li>
            </ul>
          </div>
		 <div class="bottom">
			<?php print $page['content']['block_10']['#markup']; ?>
		</div>
</section>
<?php } ?>
<div id="block-block-3" class="block block-block contextual-links-region">
<div class="content">
		<?php print_r($page['content']['block_3']['#markup']); ?>
</div>
</div>

	<!-- Connect  Block Ends -->

	<section class="MidWrapperWhite marginBotTop1em">
        <div class="bottomBreadCrum clearBoth">
        
           <?php if ($breadcrumb){ 
			print $breadcrumb;
			$menu_category_tid = $node->field_menu_category['und'][0]['tid'];
			$term_value1 = taxonomy_term_load($menu_category_tid);
			
			if($term_value1->name == "Voting Environments")
			{ $current_path =  $base_path ."voteenvview"; }
			else if($term_value1->name == "Election Services")
			{ $current_path = $base_path . "election_services"; }

			?>  		
      			
			<a class="active" href="<?php print $node->title; ?>"><?php print $node->title; ?></a>
			
    <?php	    } ?>
         
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


