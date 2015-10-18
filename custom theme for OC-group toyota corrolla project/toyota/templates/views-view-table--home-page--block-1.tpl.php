<?php
 /* Creating template for Block View at Home page*/
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

    <div class="video_block_list">
		<ul>
			<?php 
				foreach($rows as $row){ 
					
					echo "<li><div class='country_logo'>";
					if($row[field_country]=='India')
						echo "<img src=".base_path().path_to_theme()."/images/indian-logo.gif /></div>";
					else if ($row[field_country]=='Pakistan')
						echo "<img src=".base_path().path_to_theme()."/images/pakistan-logo.gif /></div>";
					else if ($row[field_country]=='Thailand')
						echo "<img src=".base_path().path_to_theme()."/images/thiland-logo.gif /></div>";
					else if ($row[field_country]=='Singapore')
						echo "<img src=".base_path().path_to_theme()."/images/thiland-logo.gif /></div>";
					else if ($row[field_country]=='Vietnam')
						echo "<img src=".base_path().path_to_theme()."/images/thiland-logo.gif /></div>";
					else if ($row[field_country]=='Philippines')
						echo "<img src=".base_path().path_to_theme()."/images/chiness-logo.gif /></div>";
					else if ($row[field_country]=='Indonesia')
						echo "<img src=".base_path().path_to_theme()."/images/thiland-logo.gif /></div>";
					else if ($row[field_country]=='Cambodia')
						echo "<img src=".base_path().path_to_theme()."/images/tivan-logo.gif /></div>";
					else if ($row[field_country]=='Brunei')
						echo "<img src=".base_path().path_to_theme()."/images/tivan-logo.gif /></div>";
					else if ($row[field_country]=='Malaysia')
						echo "<img src=".base_path().path_to_theme()."/images/thiland-logo.gif /></div>";
						
					else
						echo "</div>";
					echo $row[field_video_image].$row[field_user_name]."<div class=".$row[field_country]."></div></li>";
				}
			?>
		</ul>
    </div>
