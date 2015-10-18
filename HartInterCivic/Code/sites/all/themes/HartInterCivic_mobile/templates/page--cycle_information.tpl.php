<?php
global $base_path;
global $theme_path;
//echo '<pre>';
//print_r($node);
//echo '</pre>';

$current_taxonomy = $node->field_cycle_category['und']['0']['taxonomy_term']->name;
$vocab =  taxonomy_get_tree(9, $parent = 0, $max_depth = NULL, $load_entities = FALSE);


?>


<div class="container"><!-- container start --> 
  <!--Header-->
  <header> 
    <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target="#PrimaryNav"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="menu">Menu</span> </button>
          <a class="brand" href="<?php echo $base_path; ?>" ><img src="<?php print $base_path.''.$theme_path; ?>/images/mobile-logo.png" alt="logo"></a>
          <div id="PrimaryNav" class="nav-collapse collapse">
            <ul class="nav">
               <?php print render($page['header']); ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- voting Environment Sub Menu
    ================================================== -->
    <div class="home_image">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
           <div class="container SecondaryNavigation"> <a class="btn-navbar new-navbar" data-toggle="collapse" data-target="#SecondaryNav">+</a>
		<span><a class="btn-navbar new-navbar" data-toggle="collapse" data-target="#SecondaryNav">-</a></span>
	   <a class="brand secondaryMenu" href="#"></a>
            <div class="clearfix"></div>
            <div id="SecondaryNav" class="nav-collapse subnav-collapse collapse">
              <ul class="nav">
                <?php print render($page['highlighted']); ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--header end-->
  <section class="hartContainer"><!--section hartcontainer starts-->
    <article class="content">
      <div class="taglineInner"> <?php echo $node->title; ?> </div>
      <div id="taglineDescription"> <?php echo $node->body['und'][0]['value']; ?> </div>
      <div id="taglineImage">
        <ul>
	<?php if(!empty($node->field_cycle_image['und']['0']['uri'])){
		$cycle_image_path = file_create_url($node->field_cycle_image['und']['0']['uri']);
	 ?>
          <li class="MidInteTopImageArea"><img  src="<?php echo $cycle_image_path; ?>" alt="<?php print $node->field_cycle_image['und'][0]['alt']; ?>" /> </li>
	<?php } ?>

        </ul>
      </div>
    </article>


    <!-- accordian block -->
    <div class="accordion" id="accordionVerityCycle">
		<!-- accordian group 1 -->
	<?php $term = taxonomy_term_load($vocab[0]->tid); ?>
      <div class="accordion-group" id ='#<?php echo str_replace(" ","+",$term->name); ?>'> 
	
	
       <div class="accordion-heading heading"  onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' ) ;" image_value ="<?php echo file_create_url($node->field_tab_1_image['und'][0]['uri']);?>"  data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab1">
		<div class="imgHolder">
         	<img src="<?php print file_create_url($node->field_tab_1_icon_image['und'][0]['uri']); ?>" alt="<?php print $node->field_tab_1_icon_image['und'][0]['alt']; ?>" />
	         </div>
	<div>
         <a class="accordion-toggle" image_value ="<?php echo file_create_url($node->field_tab_1_image['und'][0]['uri']);?>"  data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab1"> 
        	
		<?php echo $term->name; ?>
         </a>
      </div> 
        </div>

        <div id="tab1" class="accordion-body collapse" >

          <div class="accordion-inner"> </div>
                                              
        </div>
      </div>

	<!-- accordian group 2 -->  
	<?php $term = taxonomy_term_load($vocab[1]->tid); ?>    
      <div class="accordion-group" id ='#<?php echo str_replace(" ","+",$term->name); ?>'>


        <div class="accordion-heading heading"  onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );" image_value ="<?php echo file_create_url($node->field_tab_2_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab2"> 
<div class="imgHolder">
   <img src="<?php print file_create_url($node->field_tab_2_icon_image['und'][0]['uri']); ?>" alt="<?php print $node->field_tab_2_icon_image['und'][0]['alt']; ?>" />

</div><div>
	  <a class="accordion-toggle" image_value ="<?php echo file_create_url($node->field_tab_2_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab2">
      
         <?php echo $term->name; ?>
         </a> 
</div>
        </div>
        <div id="tab2" class="accordion-body collapse" >
          <div class="accordion-inner"> </div>                                    
        </div>
      </div>
		<!-- accordian group 3 -->
	<?php $term = taxonomy_term_load($vocab[2]->tid); ?>
      <div class="accordion-group" id ='#<?php echo str_replace(" ","+",$term->name); ?>'>

        <div class="accordion-heading heading" onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );" image_value ="<?php echo file_create_url($node->field_tab_3_image['und'][0]['uri']);?>"  data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab3">
<div class="imgHolder">
	<img src="<?php print file_create_url($node->field_tab_3_icon_image['und'][0]['uri']); ?>" alt="<?php print $node->field_tab_3_icon_image['und'][0]['alt']; ?>" />

</div><div>
         <a class="accordion-toggle" image_value ="<?php echo file_create_url($node->field_tab_3_image['und'][0]['uri']);?>"  data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab3"> 
         
		<?php echo $term->name; ?>
         </a> 
</div>
        </div>
        <div id="tab3" class="accordion-body collapse">
         	<div class="accordion-inner"> </div>                            
        </div>
      </div>
		<!-- accordian group 4 -->
<?php $term = taxonomy_term_load($vocab[3]->tid); ?>
      <div class="accordion-group" id ='#<?php echo str_replace(" ","+",$term->name); ?>'>

	

        <div class="accordion-heading heading" onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' ) ;" image_value ="<?php echo file_create_url($node->field_tab_4_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab4">
<div class="imgHolder">
<img src="<?php print file_create_url($node->field_tab_4_icon_image['und'][0]['uri']); ?>" alt="<?php print $node->field_tab_4_icon_image['und'][0]['alt']; ?>" /> 

</div><div>

         <a class="accordion-toggle" image_value ="<?php echo file_create_url($node->field_tab_4_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab4">

         
		<?php echo $term->name; ?>
         </a> 
</div>
        </div>
        <div id="tab4" class="accordion-body collapse">
         	<div class="accordion-inner"> </div>                                     
        </div>
      </div>
		<!-- accordian group 5 -->
<?php $term = taxonomy_term_load($vocab[4]->tid); ?>
      <div class="accordion-group" id ='#<?php echo str_replace(" ","+",$term->name); ?>'>

	

        <div class="accordion-heading heading"  onclick="hartic_cycle('<?php echo urlencode($term->name); ?>','<?php echo $current_taxonomy; ?>' );" image_value ="<?php echo file_create_url($node->field_tab_5_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab5">
<div class="imgHolder">
<img src="<?php print file_create_url($node->field_tab_5_icon_image['und'][0]['uri']); ?>" alt="<?php print $node->field_tab_5_icon_image['und'][0]['alt']; ?>" />

</div><div>
         <a class="accordion-toggle" image_value ="<?php echo file_create_url($node->field_tab_5_image['und'][0]['uri']);?>" data-toggle="collapse" data-parent="#accordionVerityCycle" href="#tab5">
		<?php echo $term->name; ?>
         </a> 
</div>
        </div>
        <div id="tab5" class="accordion-body collapse">
          	<div class="accordion-inner"> </div>                                       
        </div>
      </div>                 
    </div><!--#accordionVerityCycle ends-->
  </section><!-- end of section hart container-->

  <section class="productOverview">
  	<article class="productContent">
      <div class="taglineInner"> <?php echo $node->field_cycle_headline['und'][0]['value']; ?> </div>
      <div class="taglineDescription"><?php echo $node->field_cycle_description['und'][0]['value']; ?> </div>
      <div class="taglineImage">
        <ul>
		<li><img src="<?php print file_create_url($node->field_cycle_overview_image['und'][0]['uri']); ?>" alt="<?php print $node->field_cycle_overview_image['und'][0]['alt']; ?>" /> </li>

        </ul>
      </div> 
      <div class="taglineInner Secondary"> <?php echo $node->field_cycle_secondary_header['und'][0]['value']; ?> </div>         	
      <div class="taglineDescription Secondary"> 
      	<p><?php echo $node->field_cycle_detail['und'][0]['value']; ?> </p>
      </div>      
    </article>
  </section>

  <section class="hartContainer">
    <!--Connect with block-->
    <div class="ConnectWith"> <?php print_r($page['content']['block_3']['#markup']); ?> </div>
  </section><!--section hartcontainer ends here-->
  <footer><!--footer main starts-->
     <section class="hartContainer">
	 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
		 <div class="footerTitle"> </div>
		 <ul class="footerListing">
		  <?php print render($page['footer_firstcolumn']); ?>
		  </ul>
		     	
        <ul class="footerListing">
        	 <?php print render($page['footer_secondcolumn']); ?>
        </ul>
    	
        <ul class="footerListing">
        	<?php print render($page['footer_thirdcolumn']); ?>
        </ul>
    	
        <ul class="footerListing">
        	<li>Lorem ipsum dolor sit amet, consectetur accumsan consequat nec vel erat.</li>
        </ul>        
		<ul class="footerListing">
            <!--<li>News & Events</li>
            <li>Our Blog</li>-->
			<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		 <?php endif; ?>
        <hr/>
    </section>    
    <div class="copyright">
    	<?php print render($page['footer']); ?>    </div>
  </footer>
  <!-- main footer ends--> 
</div>
<!-- container end -->

