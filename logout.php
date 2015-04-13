<?php
	//logs the user out, destroys the session and redirects to the main page
	session_start();
	session_destroy();
	header ("Location: http://hopper.wlu.ca/~ramr0560/final/index.php");
?>