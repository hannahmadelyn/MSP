<?php 
// set the page title
$pageTitle = "User View";

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
		<table>
			<thead>
				<tr>
					<td>Name</td>
					<td>phone</td>
					<td>address</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Yeojin Song</td>
					<td>13 Swin st, vic 3003, Australia</td>
					<td><a href="#">Eidt</a></td>
				</tr>
			</tbody>
		</table>
		<table>
			<thead>
				<tr>
					<td>date</td>
					<td>order No</td>
					<td>status</td>
					<td>store</td>
					<td>total</td>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
				<tr>
					<td>02/06/23</td>
					<td>01223</td>
					<td>shipped</td>
					<td>Hawthorn</td>
					<td>$99.40</td>
				</tr>
			</tbody>
		</table>
	</section>
</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>