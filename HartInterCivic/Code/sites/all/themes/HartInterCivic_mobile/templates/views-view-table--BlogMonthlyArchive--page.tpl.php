<?php
$len = sizeOf($rows);	
?>
  <section class="MiddleMainAreaWhiteElectionResource">
    <div class="MidWrapperWhite">

      <section class="blogIndexContent_new">
	  <?php
			for($j=0; $j<$len; $j++){
				echo "<article class='productContent articleContent'>
				<h4>".$rows[$j]['title']."</h4>
				<span class=\"blogDate\">".$rows[$j]['created']."</span>
				<span class=\"blogcomments\"> | ".$rows[$j]['comment_count']." Comments </span>
				
				 <div class='blogDescription'>".$rows[$j]['body']."</div>
				<div class='blogfooter'>
				<div class='hyperlink'>".$rows[$j]['field_text_link1'] ." &raquo;</div></div>
					</article>";
			}
	  ?>
  
      </section><!--end of blogIndexContent-->

    </div>
  </section>



  

  
