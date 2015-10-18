<?php 
$count_row = count($rows);
?>

  <div class="MidWrapper">
  
	<div class="MidBottompSection">
<?php
	for($i=0; $i<$count_row; $i++)
	{ 
		if($i == 0){
	?>
          <div class="div1">
            <div class="imageIcon"><?php print $rows[$i]['field_promotion_image']; ?></div>
            <p> <a href="#"><?php print $rows[$i]['title']; ?></a> <?php print $rows[$i]['body']; ?> </p>
          </div>

	<?php } 
	
	if($i == 1){
	?>
          <div class="div1">
            <div class="imageIcon"><?php print $rows[$i]['field_promotion_image']; ?></div>
            <p> <a href="#"> <?php print $rows[$i]['title']; ?></a> <?php print $rows[$i]['body']; ?> </p>
          </div>
	<?php } 
	
	if($i == 2){
	?>
          <div class="div3">
            <div class="imageIcon"><?php print $rows[$i]['field_promotion_image']; ?></div>
            <p> <a href="#"><?php print $rows[$i]['title']; ?></a> <?php print $rows[$i]['body']; ?> </p>
          </div>
        
	<?php } 
	}
?>
	</div>
    
     </div>
