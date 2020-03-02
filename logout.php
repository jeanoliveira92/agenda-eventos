<?php 
	// Inicia sessões, para assim poder destruí-las 
	session_start(); 
	session_destroy();
	
	setcookie("login", "", time()-3600);
	setcookie("password", "", time()-3600);
	
	header("Location: index.php"); 
?>