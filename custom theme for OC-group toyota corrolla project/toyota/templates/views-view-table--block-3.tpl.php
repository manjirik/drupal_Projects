<?php
/* Video Page block view. */
/**
 * @file
 * Template to display a view as a table.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $header: An array of header labels keyed by field id.
 * - $caption: The caption for this table. May be empty.
 * - $header_classes: An array of header classes keyed by field id.
 * - $fields: An array of CSS IDs to use for each field id.
 * - $classes: A class or classes to apply to the table, based on settings.
 * - $row_classes: An array of classes to apply to each row, indexed by row
 *   number. This matches the index in $rows.
 * - $rows: An array of row items. Each row is an array of content.
 *   $rows are keyed by row number, fields within rows are keyed by field ID.
 * - $field_classes: An array of classes to apply to each field, indexed by
 *   field id, then row number. This matches the index in $rows.
 * @ingroup views_templates
 */
?>
<?php global $base_url;?>
  <div class="side_menu">
	<div class="active_rgtnav"><img src="<?php echo $base_url;?>/sites/all/themes/toyota/images/car-icon.png" alt="" title="" />
	</div>
	<ul>
		<li id="1"><a href="#video-block" class="story active"><img src="<?php echo $base_url;?>/sites/all/themes/toyota/images/img-start.png" alt="start" title="start" /></a></li>
		<?php
			$count = 2;
			foreach($rows as $row){
				echo "<li id='{$count}'><a href='#video".$row[nid]."' class='story story_{$row[nid]}'>".$row[field_video_image]."<span>".$row[field_user_name]."</span></a></li>";
				$count++;
			}
		?>
	</ul>
	</div>

