<?php 

session_start();

$already_visited = $_COOKIE['already_visited'];

if(isset($already_visited)) {
	echo 1;
} else {
	setcookie('already_visited', '1');
	echo 0;
}