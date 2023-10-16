
         <?php
            $sql_table="SALES";
            




		// Get data from the form
		$transactionId	= trim($_POST["tid"]);
		$memberId	= trim($_POST["mid"]);
		$orderDate = trim($_POST["date"]);



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
						."(transactionId, memberId, orderDate)"
					. " values "
						."('$transactionId', '$memberId', '$orderDate')";
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
	// if successful database connection
?>

