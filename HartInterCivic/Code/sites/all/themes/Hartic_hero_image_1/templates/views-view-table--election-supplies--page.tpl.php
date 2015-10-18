<?php
$len = sizeOf($rows);	
?>
  <section class="MiddleMainAreaWhiteElectionResource">
    <div class="MidWrapperWhite">
      <section class="blogIndexContent">
	  <?php
			for($j=0; $j<$len; $j++){
				echo "<article><h4>".$rows[$j]['title']."</h4>
					<div class=\"subHeading\">
						<span class=\"date\">".$rows[$j]['created']."</span>
					 </div>
					<p>".$rows[$j]['field_short_text']."</p>".
					$rows[$j]['field_text_hyperlink']."
					</article>";
			}
	  ?>
  
      </section><!--end of blogIndexContent-->

    </div>
  </section>



  

  
