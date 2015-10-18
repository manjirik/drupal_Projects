<?php
global $base_path,$theme_path;
//echo '<pre>';
//print_r($node);
//echo '</pre>';
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
      <div class="taglineInner"><?php echo $node->title; ?> </div>
      <div id="taglineDescription"><?php echo $node->body['und'][0]['value']; ?> </div>
      <div id="taglineImage">
<?php if($node->field_shortimage['und'][0]['uri']!=''){ ?>
        <ul>
          <li> <img src="<?php print file_create_url($node->field_shortimage['und'][0]['uri']); ?>" alt="<?php print $node->field_shortimage['und'][0]['alt']; ?>"/></li>
        </ul>
<?php } ?>
      </div>
    </article>
    <!-- accordian block -->
    <div class="accordion" id="accordionVerityCycle">
		<!-- accordian group 1 -->
      <div class="accordion-group">
       <div class="accordion-heading">
	<?php if(!empty($node->field_benefit1_icon['und'][0]['uri'])){ ?>
		 <div class="imgHolder">
       		<img src="<?php print file_create_url($node->field_benefit1_icon['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit1_icon['und'][0]['alt']; ?>"/> 
		
         </div>
	<?php } ?>

         <div>
             <a class="accordion-toggle" data-toggle="" data-parent="#accordionVerityCycle" href="#benefit1_header"> 
                 <?php echo $node->field_header_title1['und'][0]['value']; ?>
             </a>
         </div> 


        </div>
        <div id="prepare" class="accordion-body collapse">

        </div>
      </div>
		<!-- accordian group 2 -->      
      <div class="accordion-group">
       
	<div class="accordion-heading">
	<?php if(!empty($node->field_benefit2_icon['und'][0]['uri'])){ ?>

		 <div class="imgHolder">
         		<img src="<?php print file_create_url($node->field_benefit2_icon['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit2_icon['und'][0]['alt']; ?>"/>

         </div>
	<?php } ?>
         <div>
             <a class="accordion-toggle" data-toggle="" data-parent="#accordionVerityCycle" href="#benefit2_header">
             <?php echo $node->field_header_title2['und'][0]['value']; ?>
             </a>
         </div>

        </div>
        <div id="define" class="accordion-body collapse">

        </div>
      </div>
		<!-- accordian group 3 -->
      <div class="accordion-group">
        <div class="accordion-heading">
		<?php if(!empty($node->field_benefit3_icon['und'][0]['uri'])){ ?>

	 <div class="imgHolder">
		<img src="<?php print file_create_url($node->field_benefit3_icon['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit3_icon['und'][0]['alt']; ?>"/>
         </div>
		<?php } ?>

         <div>
             <a class="accordion-toggle" data-toggle="" data-parent="#accordionVerityCycle"  href="#benefit3_header"> <?php echo $node->field_header_title3['und'][0]['value']; ?>
             </a>
         </div>

        </div>
        <div id="vote" class="accordion-body collapse">
          
        </div>
      </div>                
    </div><!--#accordionVerityCycle ends-->
  </section><!-- end of section hart container-->
  <!--section Porduct Overview 1-->
  <section class="productOverview">
  	<article class="productContent" id="benefit1_header">
      <div class="taglineInner"> <?php print $node->field_benefit_one_header['und'][0]['value']; ?> </div>
      <div class="taglineDescription"> <?php print $node->field_benefit_one_subtext['und'][0]['value']; ?> </div>
      <div class="taglineImage">
        <ul>
          <li>
		<?php if(!empty($node->field_benefit_one_image['und'][0]['uri'])){ ?>
		<img src="<?php print file_create_url($node->field_benefit_one_image['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit_one_image['und'][0]['alt']; ?>" />
		<?php } ?>
	   </li>
		
        </ul>
      </div> 
      <div class="taglineInner Secondary"> <?php print $node->field_benefit1_secondary_header['und'][0]['value']; ?>  </div>         	
      <div class="taglineDescription Secondary"> 
        <p><?php print $node->field_benefit1_details['und'][0]['value']; ?></p>
      </div>      
    </article>
  </section><!--end of section product Overview-->
  <!--section Porduct Overview 2-->
  <section class="productOverview alternate">
  	<article class="productContent" id="benefit2_header">
      <div class="taglineInner"><?php print $node->field_benefit2_header['und'][0]['value']; ?> </div>
      <div class="taglineDescription"> <?php print $node->field_benefit2_subtext['und'][0]['value']; ?> </div>
      <div class="taglineImage">
        <ul>
          <li>
		<?php if(!empty($node->field_benefit2_image['und'][0]['uri'])){ ?>
		<img src="<?php print file_create_url($node->field_benefit2_image['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit2_image['und'][0]['alt']; ?>" />
		<?php } ?>
	   </li>
        </ul>
      </div> 
      <div class="taglineInner Secondary"> <?php print $node->field_benefit2_secondary_header['und'][0]['value']; ?> </div>         	
      <div class="taglineDescription Secondary"> 
      	<p><?php print $node->field_benefit2_details['und'][0]['value']; ?></p>
      </div>      
    </article>
  </section><!--end of section product Overview-->
  <!--section Porduct Overview 3-->
  <section class="productOverview">
  	<article class="productContent" id="benefit3_header">
      <div class="taglineInner" > <?php print $node->field_benefit3_header['und'][0]['value']; ?> </div>
      <div class="taglineDescription"> <?php print $node->field_benefit3_subtext['und'][0]['value']; ?> </div>
      <div class="taglineImage">
        <ul>
          <li>
		<?php if(!empty($node->field_benefit3_image['und'][0]['uri'])){ ?>
		<img src="<?php print file_create_url($node->field_benefit3_image['und'][0]['uri']); ?>" alt="<?php print $node->field_benefit3_image['und'][0]['alt']; ?>" /> 
		<?php } ?>
	  </li>
        </ul>
      </div> 
      <div class="taglineInner Secondary"> <?php print $node->field_benefit3_secondary_header['und'][0]['value']; ?> </div>         	
      <div class="taglineDescription Secondary"> 
      	<p><?php print $node->field_benefit3_details['und'][0]['value']; ?></p>
      </div>      
    </article>
  </section><!--end of section product Overview-->    
  <section class="hartContainer">
    <!--Connect with block-->

    <div class="ConnectWith"> <?php print_r($page['content']['block_3']['#markup']); ?> </div>

  </section><!--section hartcontainer ends here-->
  <footer><!--footer main starts-->
    <section class="hartContainer">
	 <?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
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

</body>
</html>
