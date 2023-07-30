<?php 
	
	session_start();
	include 'includes/autoLoader.inc.php';
   
    if ($_SESSION['uType'] == "1") {
		echo '<script type="text/javascript"> window.location="chome.php"; </script>';
	}

	if ($_SESSION['uType'] == "2") {
		echo '<script type="text/javascript"> window.location="report.php"; </script>';
	}

	if ($_SESSION['uType'] == "3") {
	    echo '<script type="text/javascript"> window.location="ahome.php"; </script>';
	}



?>