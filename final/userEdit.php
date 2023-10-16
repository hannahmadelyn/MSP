
	<?php 
// set the page title
$pageTitle = "User";

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Include database connection file
include "includes/head.php";
include "includes/connect.php";

// Get memberID from URL parameter, ensuring it is an integer
$memberID = isset($_GET['memberID']) ? intval($_GET['memberID']) : 0;

// If form is submitted, process the input data
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
    // Clean and assign POST data to variables
    $firstName = htmlspecialchars(trim($_POST['fname']));
    $lastName = htmlspecialchars(trim($_POST['lname']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $address = htmlspecialchars(trim($_POST['address']));

    // Prepare and execute the UPDATE SQL statement
    $sql = "UPDATE MEMBER SET firstName = ?, lastName = ?, phone = ?, address = ? WHERE memberID = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$firstName, $lastName, $phone, $address, $memberID])) {
        echo "<script type='text/javascript'>alert('Member updated successfully!')</script>";
    } else {
         echo "<script type='text/javascript'>alert('Error updating member.')</script>";
    }
}

// Fetch existing member data from the database
$sql = "SELECT * FROM MEMBER WHERE memberID = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$memberID]);
$member = $stmt->fetch(PDO::FETCH_ASSOC);

if ($member) {
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
				<form action="" method="post" class="form_item">
					
					<h1>Add User</h1>
					<div>
						<label for="fname">First Name:</label>
						<input type="text" id="fname" name="fname" value="<?= htmlspecialchars($member['firstName']) ?>"required>
					</div>

					<div>
						<label for="lname">Last Name:</label>
						<input type="text" id="lname" name="lname" value="<?= htmlspecialchars($member['lastName']) ?>"required>
					</div>
					<!--Join date hidden-->
					<input type="date" id="dateAdded" name="dateAdded" hidden>

					<div>
						<label for="phone">Phone:</label>
						<input type="tel" id="phone" name="phone" value="<?= htmlspecialchars($member['phone']) ?>"required>
					</div>
					<div>
						<label for="address">Address:</label>
						<input type="text" id="address" name="address" value="<?= htmlspecialchars($member['address']) ?>"required>
					</div>
					 <input type="submit" name="update" value="Update Member">
				</div>
			</form>
		</section>
	</main>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>

<?php
} else {
    echo "Member not found.";
}
?>
