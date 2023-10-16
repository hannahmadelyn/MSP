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

try {
    // First SQL Query
    $sql1 = "SELECT s.orderDate, COUNT(*) as totalOrders
             FROM SALES s
             JOIN SALEDETAILS sd ON s.transactionID = sd.transactionID
             GROUP BY s.orderDate";

    // Execute the first SQL statement and store the output
    $resultSet1 = $pdo->query($sql1);

    $showTotal = 0; // Initialize the variable before using it

    // Extract data from the result set row by row
    foreach($resultSet1 as $row) {
        $totalOrders = $row['totalOrders'];
        $showTotal += $totalOrders; // Increment the $showTotal by $totalOrders
    }

    echo "<article>
             <h2>Total Orders</h2>
             <p>$showTotal</p>
          </article>";

	$showTotalSales = 0;
    // Second SQL Query
    $sql2 = "SELECT sd.transactionID, SUM(i.price * sd.quantity) as totalPrice
             FROM SALEDETAILS sd
             JOIN ITEM i ON sd.itemID = i.itemID
             GROUP BY sd.transactionID";

    // Execute the second SQL statement and store the output
    $resultSet2 = $pdo->query($sql2);

    foreach($resultSet2 as $row) {
    	$showTotalSales +=$row["totalPrice"];;
    }
    echo "<article>
			<h2>total Sale</h2>
			<p>$$showTotalSales</p>
		</article>";


    // Second SQL Query
    $sql3 = "SELECT s.orderDate, COUNT(*) as totalOrders
         FROM SALES s
         JOIN SALEDETAILS sd ON s.transactionID = sd.transactionID
         WHERE s.orderDate = CURDATE()  -- This line is added to filter records by today's date
         GROUP BY s.orderDate";

    // Execute the second SQL statement and store the output
    $resultSet3 = $pdo->query($sql3);
    $showNewOrders = 0;

   
// Check if we have any records for today
if ($resultSet3->rowCount() > 0) {
    // Extract data from the result set row by row
    foreach($resultSet3 as $row) {
        $totalOrders = $row['totalOrders'];
        $showNewOrders += $totalOrders; // Increment the $showTotal by $totalOrders
    }

    echo "<article>
             <h2>Today's Orders</h2>
             <p>$showNewOrders</p>
          </article>";
} 

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
	</section>
	<section>
		<h2>Statistic</h2>

<!-- Create a canvas element where the chart will be rendered -->
<canvas id="salesChart" width="400" height="200"></canvas>

<script>
// Prepare the datasets
let dates = [];
let sales = [];
let backgroundColors = [];
let borderColors = [];

function getRandomColor() {
    let letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
<?php
// connect to the database
include "includes/connect.php";

// SQL Query
$sql = "SELECT s.orderDate, SUM(i.price * sd.quantity) as dailyTotalSales
        FROM SALES s
        JOIN SALEDETAILS sd ON s.transactionID = sd.transactionID
        JOIN ITEM i ON sd.itemID = i.itemID
        GROUP BY s.orderDate
        ORDER BY s.orderDate ASC";

// Execute SQL and handle exceptions
try {
    $resultSet = $pdo->query($sql);
    foreach ($resultSet as $row) {
        $orderDate = date("j/n", strtotime($row['orderDate']));
        $dailyTotalSales = $row['dailyTotalSales'];
        // Output data as JavaScript code
        echo "dates.push('$orderDate');";
        echo "sales.push($dailyTotalSales);";
         // Here we generate a random color for each bar
    echo "backgroundColors.push(getRandomColor());";
    echo "borderColors.push(getRandomColor());";
    }
} catch (PDOException $e) {
    echo "Error fetching daily total sales: " . $e->getMessage();
    exit();
}
?>

// Render the chart
let ctx = document.getElementById('salesChart').getContext('2d');
let salesChart = new Chart(ctx, {
    type: 'bar',  // Specify the chart type
    data: {
        labels: dates,  // X-axis labels
        datasets: [{
            label: 'Daily Total Sales',
            data: sales,  // Data for the Y-axis
              backgroundColor: backgroundColors,
            borderColor: borderColors, 
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


	</section>
</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>