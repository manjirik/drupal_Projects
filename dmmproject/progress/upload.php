<?php
if($_FILES['file']['error'] == UPLOAD_ERR_OK){
   $path = '/httpdocs/progress/uploads/';
   $path .= basename($_FILES['file']['name']);
   if(move_uploaded_file($_FILES['file']['tmp_name'], $path)){
      // upload successful
   }
}
?>