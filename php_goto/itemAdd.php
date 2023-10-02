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
			<h1>Item Dashboard</h1>
			<section>
				<form action="#" method="post" class="form_item">
					<!-- Name -->
					<h1>Add item</h1>
					<div>
						<label for="name">Name:</label>
						<input type="text" id="name" name="name" required>
					</div>

					<!-- Description -->
					<div>
						<label for="description">Description:</label>
						<textarea id="description" name="description" rows="4" required></textarea>
					</div>

					<!-- Brand -->
					<div>
						<label for="brand">Brand:</label>
						<input type="text" id="brand" name="brand" required>
					</div>

					<!-- Category -->
					<div>
						<label for="category">Category:</label>
						<input type="text" id="category" name="category" required>
					</div>

					<div class="input-group">
						<div class="input-field">
							<!-- Price -->
							<div>
								<label for="price">Price:</label>
								<input type="number" id="price" name="price" step="0.01" min="0" required>
							</div>
						</div>
						<div class="input-field">
							<!-- Quantity -->
							<div>
								<label for="quantity">Quantity:</label>
								<input type="number" id="quantity" name="quantity" min="0" required>
							</div>
						</div>
						<div class="input-field">
							<!-- Weight -->
							<div>
								<label for="weight">Weight (grams):</label>
								<input type="number" id="weight" name="weight" min="0" required>
							</div>
						</div>
					</div>

					<!-- Date Added -->
					<input type="date" id="dateAdded" name="dateAdded" required hidden>

					<!-- Date Expiry -->
					<div>
						<label for="dateExpiry">Date Expiry:</label>
						<input type="date" id="dateExpiry" name="dateExpiry">
					</div>

					<!-- Submit Button -->
					<div>
						<input type="submit" value="Add Item">
					</div>
				</form>


			</section>
		</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>