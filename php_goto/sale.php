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
		<?php
	// connect to the database
	include "includes/connect.php";
	
	// write a sql statement to get data from the tbl_product table
	try {
		//create our SQL statment
		$sql = "SELECT s.orderDate, COUNT(*) as totalOrders
		FROM SALES s
		JOIN SALEDETAILS sd ON s.transactionID = sd.transactionID
		GROUP BY s.orderDate;";
		
		//excute the SQL statment and store the output
		$resultSet = $pdo->query($sql);						
	}//end of try block
	
	// what to do if sql statement fails
	catch(PDOException $e){
		// create an error message with excepiton details
		echo "Error fetching products:".$e->getMessage();
		
		// stop script from contiuning
		exit();						
	}//end of catch block	

	// extract data from the result set row by row
	foreach($resultSet as $row){
		// store row data in variables
		$orderDate = $row['orderDate'];
		$totalOrders = $row['totalOrders'];	}
	?>
		<article>
			<h2>new Sale</h2>
			<p><?echo $totalOrders;?></p>
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