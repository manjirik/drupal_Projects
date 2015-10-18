<?php 

session_start();



if (!empty($_REQUEST['captcha'])) {
    if (empty($_SESSION['captcha']) || trim(strtolower($_REQUEST['captcha'])) != $_SESSION['captcha'])  {
		echo 0;
    } else {
		echo 1;
	}
}