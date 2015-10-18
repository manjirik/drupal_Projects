<?php
global $base_path;
global $theme_path;

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
         <a class="brand" href="<?php echo $base_path; ?>"><img src="<?php print $base_path.''.$theme_path; ?>/images/mobile-logo.png" alt="logo"></a>
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
      <div class="taglineInner"> <?php if($node->title !='' ) { echo $node->title; } ?> </div>
      <div id="taglineDescription"> <?php if($node->field_press_release_summary['und'][0]['value'] !='') { echo $node->field_press_release_summary['und'][0]['value'];  } ?></div>
    </article>
  </section><!-- end of section hart container-->
  <section class="blogsection">
  	<article class="productContent">      
      <div class="blogDescription Secondary"> 
      	<p><?php if($node->field_press_release_details['und'][0]['value'] !=''){ echo $node->field_press_release_details['und'][0]['value']; } ?></p>
               
      </div>      
    </article>
  </section>
  <section class="hartContainer">
    <!--Connect with block-->
<?php if(($node->field_news_email_id['und'][0]['email'] !='' ) || ($node->field_news_contact_number['und'][0]['value'] !='')){ ?>
    <div class="mediaContact">
    	<h5 class="mediaTitle">Media Contact:</h5>
        <div class="mediaAddress">
<?php if($node->field_news_email_id['und'][0]['email'] !='' ){ ?>
        	<label>Email: <a class="media-url" href="mailto:<?php echo $node->field_news_email_id['und'][0]['email']; ?>"><?php echo $node->field_news_email_id['und'][0]['email']; ?></a></label>
<?php }

if($node->field_news_contact_number['und'][0]['value'] !='' ) {?>
            <label>Office: <span><?php echo $node->field_news_contact_number['und'][0]['value']; ?></span></label>
<?php } ?>
        </div>
    </div>
<?php } ?>

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
            <!--<li>News & Events</li>
            <li>Our Blog</li>-->
			<?php print render($page['footer_fourthcolumn']); ?>
        </ul>
		 <?php endif; ?>
        <hr/>
    </section>    

 <div class="copyright"><?php print render($page['footer']); ?></a>  </div>

  </footer>
  <!-- main footer ends--> 
</div>
<!-- container end -->

