<?php
include 'settings.php';

$conn = new mysqli($host, $user, $pwd, $sql_db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch items based on search, category, and sort options
function fetchItems($searchTerm = '', $category = '', $sortBy = ''){
    global $conn;
    $searchTerm = $conn->real_escape_string($searchTerm);
    $categoryFilter = $category ? " AND Category = '$category'" : '';
    $order = $sortBy ? " ORDER BY Name $sortBy" : '';

    $query = "SELECT * FROM item WHERE name LIKE '%$searchTerm%'" . $categoryFilter . $order;
    return $conn->query($query);
}
$predefinedCategories = ['Fruits', 'Pasta', 'Canned Goods', 'Snacks', 'Frozen Foods'];
$searchTerm = $_GET['search'] ?? '';
$category = $_GET['category'] ?? '';
$sortBy = $_GET['sortBy'] ?? '';

$items = fetchItems($searchTerm, $category, $sortBy);
?>
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
<body>
	<header>
    <form method="get" action="" id="searchForm">
        <input type="text" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>">
        <button type="submit" class="search-btn">
            <i class="fas fa-search"></i>
        </button>
    </form>
</header>
	<div class="container">
<aside>
	<nav>
		<ul>
			<li>User Id</li>
			<li><a href="index.php"><i class="fas fa-home"></i> HOME</a></li>
            <li><a href="sale.php"><i class="fas fa-shopping-cart"></i> SALE</a></li>
            <li><a href="item.php"><i class="fas fa-box"></i> ITEM</a></li>
            <li><a href=""><i class="fas fa-sign-out-alt"></i> LOG OUT</a></li>
		</ul>
	</nav>
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
        <!-- CATEGORY SELECT -->
    <select name="category" id="categoryDropdown">
        <option value="">All Categories</option>
        <?php 
        foreach($predefinedCategories as $cat) {
            $selected = $cat === $category ? 'selected' : '';
            echo "<option value='{$cat}' $selected>{$cat}</option>";
        }
        
        ?>
    </select>

    <!-- SORTBY SELECT -->
    <select name="sortBy" id="sortDropdown">
        <option value="">Sort By</option>
        <option value="ASC" <?php echo $sortBy === 'ASC' ? 'selected' : ''; ?>>A-Z</option>
        <option value="DESC" <?php echo $sortBy === 'DESC' ? 'selected' : ''; ?>>Z-A</option>
    </select>
<button type="button" onclick="applyFilters();" class="btn">Apply Filters</button>
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
                <?php while ($row = $items->fetch_assoc()): ?>
                <tr>
                    <td><input type="checkbox" name="option" value="option<?php echo $row['ItemID']; ?>"></td>
                    <td><?php echo $row['Name']; ?></td>
                    <td><?php echo $row['Description']; ?></td>
                    <td><?php echo $row['Brand']; ?></td>
                    <td><?php echo $row['Category']; ?></td>
                    <td><?php echo $row['Price']; ?></td>
                    <td><?php echo $row['Quantity']; ?></td>
                    <td><?php echo $row['DateExpiry']; ?></td>
                    <td><?php echo $row['Weight']; ?>g</td>
                    <td><a href="itemEdit.php?id=<?php echo $row['ItemID']; ?>">Edit</a></td>
                    <td><a href="actions.php?delete=<?php echo $row['ItemID']; ?>"><i class="fas fa-times"></i></a></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
		</table>
	</section>
</main>
</div>
<footer>
	<p>GOTO(C)2023</p>
</footer>
<?php
$conn->close();
?>
</body>
</html>