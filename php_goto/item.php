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
		</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>