<?php 
// set the page title
$pageTitle = "User";

// import the head section
include "includes/head.php";
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
				<form action="#" method="post" class="form_item">
					
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
					<input type="submit" value="SUBMIT">
				</div>
			</form>
		</section>
	</main>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>