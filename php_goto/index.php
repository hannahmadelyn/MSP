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
							<td>Member id</td>
							<td>Name</td>
							<td>Join Date</td>
							<td>phone</td>
							<td colspan="3">address</td>
						</tr>
					</thead>
					<tbody>
					<?php
	// connect to the database
	include "includes/connect.php";

try {
    // First SQL Query
    $sql1 = "SELECT * FROM MEMBER";

    // Execute the first SQL statement and store the output
    $resultSet1 = $pdo->query($sql1);

    $showTotal = 0; // Initialize the variable before using it

    // Extract data from the result set row by row
    foreach($resultSet1 as $row) {
         echo "<tr>";
        echo "<td>" . $row['memberID'] . "</td>";
        echo "<td>" . $row['firstName'] . " " .$row['lastName'] . "</td>";
        echo "<td>" . $row['joinDate'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
         echo "<td><a href='userEdit.php?memberID=" . $row['memberID'] . "'>Edit</a></td>"; // Edit button
            echo "<td><a class ='del' href='UserDel.php?memberID=" . $row['memberID'] . "'>Delete</a></td>"; // Delete button
        echo "</tr>";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    exit();
}
?>
					</tbody>
				</table>
			</section>
		</main>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>