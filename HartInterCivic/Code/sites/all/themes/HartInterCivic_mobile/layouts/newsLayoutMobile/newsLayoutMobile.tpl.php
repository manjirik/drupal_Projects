<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>

<section class="MiddleMainAreaWhite" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <section class="hartContainer"><!--section hartcontainer starts-->
    <article class="content">
      <?php print $content['top1']; ?>
    </article>

    <div class="accordion" id="accordionVerityCycle"> 
      <!-- accordian group 1 -->
      <div class="accordion-group">
        <div class="accordion-heading"> <a href="#latestnewslist">Latest New</a> </div>
      </div>
      <!-- accordian group 2 -->
      <div class="accordion-group">
        <div class="accordion-heading"> <a href="#pressreleaselist">Press Releases</a> </div>
      </div>
      <!-- accordian group 4 -->
      <div class="accordion-group">
        <div class="accordion-heading"> <a href="#eventlist">Events</a> </div>
        <!--end of accordian heading--> 
      </div>
      <!-- end of accordian group--> 
    </div>
    <!--end of article--> 
    
  </section>
  <!-- end of section hart container-->
  <section id="latestnewslist" class="blogsection newsIndex"> 
    <!-- pagination article 1-->
   
   <?php print $content['top2']; ?>

    </section>

    <!-- end of readmorelink--> 
    <!--end of News--> 


    <!--start of press release-->
    <section id="pressreleaselist" class="blogsection PressRelease"> 
     
       <?php print $content['top3']; ?>

    </section>

     
      <!-- end of readmorelink--> 
      <!-- end of recent press releases-->


      <section id="eventlist" class="upcomingEvents">
        <article class="productContent articleContent">
              
			<?php print $content['top4']; ?>
			                    
        </article>
      </section>

      <!-- end of upcoming events--> 

    <!-- end of blogsection --> 
   

 </section> 
 