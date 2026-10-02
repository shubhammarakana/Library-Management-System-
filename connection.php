<?php

	$db=mysqli_connect("localhost","root","",'lms2');
	
	if(!$db)
	{
		die("Connection failed: " .mysqli_connect_error());
	}

?>
