<?php 
// set the page title
$pageTitle = "User";

// import the head section
include "includes/head.php";
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<body>
	<?php include "includes/header.php"; ?>

	<!-- main content -->

	<div class="container">
		<aside>
			<?php include "includes/nav.php";?>
		</aside>
		<main>
			<h1>User Dashboard</h1>
			<section>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post" onsubmit="return checkAddCustomer(this);" method="post" class="form_item">
					
					<h1>Add User</h1>
					<div>
						<label for="fname">First Name:</label>
						<input type="text" id="fname" name="fname" required>
					</div>

					<div>
						<label for="lname">Last Name:</label>
						<input type="text" id="lname" name="lname" required>
					</div>
					<!--Join date hidden-->
					<input type="date" id="dateAdded" name="dateAdded" hidden>

					<div>
						<label for="phone">Phone:</label>
						<input type="tel" id="phone" name="phone" required>
					</div>
					<div>
						<label for="address">Address:</label>
						<input type="text" id="address" name="address" required>
					</div>
					<input type="submit" name="registrationSubmit" value="SUBMIT">
				</div>
			</form>
		</section>
	</main>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>

<?php
if(isset($_POST['registrationSubmit'])){
	
	include "includes/connect.php";

	// capture data from form
	$firstName = cleanInput($_POST['fname']);
	$lastName = cleanInput($_POST['lname']);
	$joinDate = cleanInput($_POST['dateAdded']);
	$address = cleanInput($_POST['address']);
	$phone = cleanInput($_POST['phone']);

	try {
		//create our SQL statment
		 $sql = "INSERT INTO MEMBER (firstName, lastName, joinDate, address, phone) 
            VALUES (:firstName, :lastName, :joinDate, :address, :phone);";
		
		// prepare the statement
		$statement = $pdo->prepare($sql);
		
		// bind the values to the statement's placeholders
		$statement->bindValue(':firstName', $firstName);
		$statement->bindValue(':lastName', $lastName);
		$statement->bindValue(':joinDate', date('Y-m-d'));
		$statement->bindValue(':address', $address);
		$statement->bindValue(':phone', $phone);
		
		//execute the sql statment
		$statement->execute();
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error inserting customer recode:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block
	
	
	//display sucess message
	
	echo "<script type='text/javascript'>alert('Registration Suceessful')</script>";
}
?>