<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s102060145"; // user name
	$pwd = "241287"; // password
	$sql_db = "s102060145_db"; // database
	
	// connecting
	$conn = @mysqli_connect($host,
			$user,
			$pwd,
			$sql_db
	);
?>