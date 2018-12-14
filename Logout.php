<?php
	session_start();
	session_destroy();
	//setcookie ("nama","");
	
	#echo "<script> location.replace('login.php'); </script>";
	header('Refresh: 1; url=login.php');
?>