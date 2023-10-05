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
			<section class="card">
				<article>
					<h2>new users</h2>
					<p>300</p>
				</article>
				<article>
					<h2>total users</h2>
					<p>1,200</p>
				</article>
				<article>
					<h2>weekly increased</h2>
					<p>60%</p>
				</article>
			</section>
			<section>
				<div class="btn_group">
					<div>
						<a href="register.php" class="btn_link">Add</a>
					</div>
					<div>

						<button class="btn_action" onclick="toggleSubmenu('sortMenu')">Sort By</button>
						<div class="submenu" id="sortMenu">
							<button>A-Z</button>
							<button>Z-A</button>
						</div>
					</div>
				</div>
				<table>
					<thead>
						<tr>
							<td>Name</td>
							<td>Email</td>
							<td colspan="2">Phone</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>User Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td><a href="#">Edit</a></td>
						</tr>
						<tr>
							<td>User Name</td>
							<td>Email</td>
							<td>Phone</td>
							<td><a href="#">Edit</a></td>
						</tr>
					</tbody>
				</table>
			</section>
		</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>