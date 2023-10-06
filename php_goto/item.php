<!-- Added for visual effects by Mahita, remove later *** -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;700&family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/script.js"></script>
	<title>GOTO Dashboard</title>
</head>

<?php 
// set the page title
$pageTitle = "Item";

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
			<section class="card">
				<article>
					<h2>new Item</h2>
					<p>300</p>
				</article>
				<article>
					<h2>total Item</h2>
					<p>1,200</p>
				</article>
				<article>
					<h2>weekly orders</h2>
					<p>60</p>
				</article>
			</section>
			<section>
				<div class="btn_group">
					<div>
						<a href="itemAdd.php" class="btn_link">Add</a>
					</div>
					<div>
						<button class="btn_action" onclick="toggleSubmenu('categoryMenu')">Category</button>
						<div class="submenu" id="categoryMenu">
							<!-- Categories from the database go here -->
							<button>Category 1</button>
							<button>Category 2</button>
							<!-- ... -->
						</div>

						<button class="btn_action" onclick="toggleSubmenu('sortMenu')">Sort By</button>
						<div class="submenu" id="sortMenu">
							<button>A-Z</button>
							<button>Z-A</button>
							<button>High to Low</button>
							<button>Low to High</button>
						</div>
					</div>
				</div>

				<table>
					<thead>
						<tr>
							<td><input type="checkbox" name="option" value="optionAll">
							</td>
							<td>name</td>
							<td>description</td>
							<td>brand</td>
							<td>category</td>
							<td>prices</td>
							<td>quantity</td>
							<td>date Expiry</td>
							<td colspan="3">Weight</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" name="option" value="option1">
							</td>
							<td>apple</td>
							<td>pink lady</td>
							<td>aussie</td>
							<td>fruit</td>
							<td>1.99</td>
							<td>1300</td>
							<td>12.24.23</td>
							<td>300g</td>
							<td><a href="itemEdit.html">Edit</a></td>
							<td><a href="#"><i class="fas fa-times"></i></a></td>
						</tr>
					</tbody>
				</table>
			</section>
			<section> <!-- dynamic table -->
			<?php 

// connecting to database
require_once ("settings.php"); // connection info

$conn = @mysqli_connect($host, 
		$user, 
		$pwd, 
		$sql_db);

// the table dealt with for this file		
$sql_table = "ITEM";

// checks if connection is successful
	if (!$conn) {
		// displays an error message
		echo "<p>Database connection failure</p>";
	} 
	
	else {		
		// display only query
		$query = "SELECT * FROM $sql_table";
		
		$result = mysqli_query($conn, $query);
		
		if (!$result) {
			echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
		} 
		else {
			// check if any rows were returned 
			if (mysqli_num_rows($result) == 0) {
				echo "<p>No such records found</p>";
				//echo "<p>The query used was $query</p>";
			} 
			else 
			{
				
				echo "<div class=\"table-container\">";
				echo "<table class=\"result-table\" border=\"1\">\n";
		
				echo "<tr>\n"				
					."<th scope=\"col\">itemID</th>\n"
					."<th scope=\"col\">name</th>\n"
					."<th scope=\"col\">description</th>\n"
					."<th scope=\"col\">brand</th>\n"
					."<th scope=\"col\">category</th>\n"
					."<th scope=\"col\">price</th>\n"
					."<th scope=\"col\">quantity</th>\n"
					."<th scope=\"col\">dateAdded</th>\n"
					."<th scope=\"col\">dateExpiry</th>\n"
					."<th scope=\"col\">weight</th>\n"
					."</tr>\n";
					
			
					// retrieve current record pointed by the result pointer 
					while ($row = mysqli_fetch_assoc($result)) {					
						echo "<tr>\n";
						echo "<td>", $row["itemID"],"</td>\n";
						echo "<td>", $row["name"],"</td>\n";
						echo "<td>", $row["description"],"</td>\n";
						echo "<td>", $row["brand"],"</td>\n";
						echo "<td>", $row["category"],"</td>\n";
						echo "<td>", $row["price"],"</td>\n";
						echo "<td>", $row["quantity"],"</td>\n";
						echo "<td>", $row["dateAdded"],"</td>\n";
						echo "<td>", $row["dateExpiry"],"</td>\n";
						echo "<td>", $row["weight"],"</td>\n";
						echo "</tr>\n";
				}
				
				echo "</table>\n";
				
				echo "</div>";
			}
		} 
	}
	
?>

			</section>
		</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>
