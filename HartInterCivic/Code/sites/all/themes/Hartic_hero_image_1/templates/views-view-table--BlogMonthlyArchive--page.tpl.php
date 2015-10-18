<?php
$len = sizeOf($rows);	
?>
  <section class="MiddleMainAreaWhiteElectionResource">
    <div class="MidWrapperWhite">

      <section class="blogIndexContent_new">
	  <?php
			for($j=0; $j<$len; $j++){
				echo "<article>
				<h4>".$rows[$j]['title']."</h4>
				<div class=\"subHeading\">
					<span class=\"date\">".$rows[$j]['created']." | ".$rows[$j]['comment_count']." Comments</span>
				 </div>
				 <div class='field-content'>".$rows[$j]['body']."
				  <br/>".$rows[$j]['field_text_link1'] ."</div>
					</article>";
			}
	  ?>
  
      </section><!--end of blogIndexContent-->

    </div>
  </section>



  

  
