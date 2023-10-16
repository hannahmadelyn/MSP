
         <?php
            $sql_table="MEMBER";
            

// you need to edit this file to include your mysql info 
       require_once('settings.php');
   
	
	// The @ operator suppresses the display of any error messages
	// mysqli_connect returns false if connection failed, otherwise a connection value
	$conn = @mysqli_connect($host,
		$user,
		$pwd,
		$sql_db
	);
 
	// Checks if connection is successful
	if (!$conn) {
		// Displays an error message, avoid using die() or exit() as this terminates the execution
		// of the PHP script
		echo "<p>Database connection failure</p>";  //Would not show in a production script 
	} else {


		// Get data from the form
		$firstName	= trim($_POST["fname"]);
		$lastName	= trim($_POST["lname"]);
		// dateAdded hidden
		$phone	= trim($_POST["phone"]);
		$address = trim($_POST["address"]);



		// check: if table does not exist, create it
		$sqlString = "show tables like '$sql_table'";  // another alternative is to just use 'create table if not exists ...'
		$result = @mysqli_query($conn, $sqlString);
		// checks if any tables of this name
		if(mysqli_num_rows($result)==0) {
			echo "<p>Table does not exist - create table $sql_table</p>"; // Might not show in a production script 
			$sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";; 
			$result2 = @mysqli_query($conn, $sqlString);
		    // checks if the table was created
		    if($result2===false) {
				echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script 
			} else {
			// display an operation successful message
			echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script 
			} // if successful query operation

		} else {
			// display an operation successful message
			echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script 
		} // if successful query operation
		
		// Set up the SQL command to add the data into the table
		$query = "insert into $sql_table"
						."(firstName, lastName, phone, address)"
					. " values "
						."('$firstName', '$lastName', '$phone', '$address')";
		// execute the query
		$result = mysqli_query($conn, $query);
		// checks if the execution was successful
		if(!$result) {
			echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script 
		} else {
			// display an operation successful message
			echo "<p class=\"ok\">Successfully added New member</p>";
		} // if successful query operation
				
		// close the database connection
		mysqli_close($conn);
	}// if successful database connection
?>

