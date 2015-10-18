<?php
session_start();

function getUsersOnline()
{
   $count = 0;

   $handle = opendir(session_save_path());
   if ($handle == false) return -1;

   while (($file = readdir($handle)) != false)
   {
       echo $file."<br>";
	   if (ereg("^sess", $file)) $count++;
   }
   closedir($handle);

   return $count;
}

echo getUsersOnline();
?>