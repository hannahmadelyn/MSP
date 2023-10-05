<?php 
// set the page title
$pageTitle = "Sales";

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
	<h1>Sale Dashboard</h1>
	<section class="card">
		<article>
			<h2>new Sale</h2>
			<p>300</p>
		</article>
		<article>
			<h2>total Sale</h2>
			<p>1,200</p>
		</article>
		<article>
			<h2>weekly incrased</h2>
			<p>60%</p>
		</article>
	</section>
	<section>
		<h2>Statistic</h2>
		<canvas id="myChart" width="400" height="400"></canvas>
	</section>
</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>