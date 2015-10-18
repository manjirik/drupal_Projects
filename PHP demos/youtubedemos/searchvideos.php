<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Searching for videos by keyword</title>
    <style>
    img {
      padding: 2px; 
      margin-bottom: 15px;
      border: solid 1px silver; 
    }
    td {
      vertical-align: top;
    }
    td.line {
      border-bottom: solid 1px black;  
    }
    </style>
  </head>
  <body>
    <?php
    // if form not submitted
    // display search box
    if (!isset($_POST['submit'])) {
    ?>
    <h1>Keyword search</h1>  
    <form method="post" action="<?php echo 
      htmlentities($_SERVER['PHP_SELF']); ?>">
      Keywords: <br/>
      <input type="text" name="q" />
      <p/>
      Items to display: <br/>
      <select name="i">
        <option value="10">10</option>
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="100">100</option>
      </select>
      <p/>
      <input type="submit" name="submit" value="Search"/>  
    </form>
    <?php      
    // if form submitted
    } else {
    	//echo $_POST['q'];
      // check for search keywords
      // trim whitespace
      // separate multiple keywords with /
      if (!isset($_POST['q']) || empty($_POST['q'])) {
        die ('ERROR: Please enter one or more search keywords');
      } else {
        $q = $_POST['q'];
        $q = ereg_replace('[[:space:]]+', '/', trim($q));
      }
      
      // set max results
      if (!isset($_POST['i']) || empty($_POST['i'])) {
        $i = 25;
      } else {
        $i = $_POST['i'];
      }
      
      // generate feed URL
      $feedURL = "http://gdata.youtube.com/feeds/api/videos/-/{$q}?orderby=viewCount&max-results={$i}";
      
     // echo $feedURL;
      // read feed into SimpleXML object
      $sxml = simplexml_load_file($feedURL);
      
      // get summary counts from opensearch: namespace
      $counts = $sxml->children('http://a9.com/-/spec/opensearchrss/1.0/');
      $total = $counts->totalResults; 
      $startOffset = $counts->startIndex; 
      $endOffset = ($startOffset-1) + $counts->itemsPerPage;       
      ?>
      
      <h1>Search results</h1>
      <?php echo $total; ?> items found. Showing items 
      <?php echo $startOffset; ?> to <?php echo $endOffset; ?>:
      <p/>
      
      <table>
      <?php    
      // iterate over entries in resultset
      // print each entry's details
      foreach ($sxml->entry as $entry) {
        // get nodes in media: namespace for media information
        $media = $entry->children('http://search.yahoo.com/mrss/');
        
        // get video player URL
        $attrs = $media->group->player->attributes();
        $watch = $attrs['url']; 
        
        // get video thumbnail
        $attrs = $media->group->thumbnail[0]->attributes();
        $thumbnail = $attrs['url']; 
        
        // get <yt:duration> node for video length
        $yt = $media->children('http://gdata.youtube.com/schemas/2007');
        $attrs = $yt->duration->attributes();
        $length = $attrs['seconds']; 
        
        // get <gd:rating> node for video ratings
        $gd = $entry->children('http://schemas.google.com/g/2005'); 
        if ($gd->rating) {
          $attrs = $gd->rating->attributes();
          $rating = $attrs['average']; 
        } else {
          $rating = 0; 
        }

        // print record
        echo "<tr><td colspan=\"2\" class=\"line\"></td>
        </tr>\n";
        echo "<tr>\n";
        echo "<td><a href=\"{$watch}\"><img src=\"$thumbnail\"/></a></td>\n";
        echo "<td><a href=\"{$watch}\">
        {$media->group->title}</a><br/>\n";
        echo sprintf("%0.2f", $length/60) . " min. | {$rating} user 
        rating<br/>\n";
        echo $media->group->description . "</td>\n";
        echo "</tr>\n";
      }
    }
    ?>
    </table>
  </body>
</html> 