<?php
//attempt to connect to MariaDB
try {
	//init variables to store login credentials
	$user = "s102060145";
	$password = "241287";
	$host = "feenix-mariadb.swin.edu.au";
	$dbname = "s102060145_db";

	// create an object from the PDO Data Object ($pdo) class to establish connection
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

	// default mode (silent failure) for establishing connections
	// set our pdo object error mode to throw exceptions
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	// execute the connection, changing the character set to UTF-8
	$pdo->exec("SET NAMES 'utf8'");

} // end of try block
catch(PDOException $e) {
	//create an error message
	echo "Unable to connect to database: ".$e->getMessage();

	//stop script continuing
	exit();


} // end of catch block

// for testing purposes (comment out when live)
// echo "Connection Successful";

?>

