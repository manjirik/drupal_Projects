<!DOCTYPE html 
  PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <title>Listing most viewed videos</title>
    <style type="text/css">
    div.item {
         
      margin: 10px; 
      padding: 2px; 
      width: auto;
      padding-bottom: 20px;
    }
    a {
      color: brown; 
      text-decoration: none;  
    }
    </style>
  </head>
  <body>
    <?php
    // set feed URL
    $feedURL = 'http://gdata.youtube.com/feeds/api/standardfeeds/most_viewed';
    
    // read feed into SimpleXML object
    $sxml = simplexml_load_file($feedURL);
    ?>
      <h1><?php echo $sxml->title; ?></h1>
    <?php
    // iterate over entries in feed
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
      
      // get <yt:stats> node for viewer statistics
      $yt = $entry->children('http://gdata.youtube.com/schemas/2007');
      $attrs = $yt->statistics->attributes();
      $viewCount = $attrs['viewCount']; 
      
      // get <gd:rating> node for video ratings
      $gd = $entry->children('http://schemas.google.com/g/2005'); 
      if ($gd->rating) {
        $attrs = $gd->rating->attributes();
        $rating = $attrs['average']; 
      } else {
        $rating = 0; 
      } 
      ?>
      <div class="item">
         <a href="<?php echo $watch; ?>"><img src="<?php echo $thumbnail;?>" /></a>
      </div>      
    <?php
    }
    ?>
  </body>
</html>    