<?php 
// set the page title
$pageTitle = "Item";
// import the head section
include "includes/head.php"?>
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
				//echo "<table class=\"result-table\" border=\"1\">\n";
				//echo "<table class=\"result-table\" style='border-collapse: collapse; width: 100%;'>\n";
				echo "<table class=\"result-table\" style='border-collapse: collapse; width: 100%; text-align: center;'><thead>\n";

				echo "<tr>\n"				
					."<td scope=\"col\">itemID</td>\n"
					."<td scope=\"col\">name</td>\n"
					."<td scope=\"col\">description</td>\n"
					."<td scope=\"col\">brand</td>\n"
					."<td scope=\"col\">category</td>\n"
					."<td scope=\"col\">price</td>\n"
					."<td scope=\"col\">quantity</td>\n"
					."<td scope=\"col\">dateAdded</td>\n"
					."<td scope=\"col\">dateExpiry</td>\n"
					."<td colspan='3' scope=\"col\">weight</td>\n"
					."</tr></thead>\n";
					
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
						echo "<td><a href='itemEdit.php?itemID=" . $row["itemID"] . "'>Edit</a></td>\n";
						echo "<td class='del'><a href='itemDelete.php?itemID=" . $row["itemID"] . "'>del</a></td>\n";

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
