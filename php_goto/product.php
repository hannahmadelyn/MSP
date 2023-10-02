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
			<section class="product-details">
				<img id="productImage" src="" alt="Product Image">
				<h2 id="productName"></h2>
				<p id="productDescription"></p>
				<p>Price: $<span id="productPrice"></span></p>
				<button id="addToCartButton">Add to Cart</button>
			</section>
		</main>

		<!-- Linking the JS files -->
		<script src="../js/USER_addItem.js"></script>
		<script>
			const products = {
				"001": { name: "Product 1", description: "Description for product 1", price: "59.99", image: "/goto/img/banana.png" },
				"002": { name: "Product 2", description: "Description for product 2", price: "12.99", image: "/goto/img/cantaloupe.png" },
				"003": { name: "Product 3", description: "Description for product 3", price: "8.99", image: "/goto/img/orange.png" },
				"004": { name: "Product 4", description: "Description for product 4", price: "9.99", image: "/goto/img/pear.png" }

            // ... add other products as required
			};

			const urlParams = new URLSearchParams(window.location.search);
			const productID = urlParams.get('productID');
			const product = products[productID];

        // Populate the page with product details
			document.getElementById("productName").innerText = product.name;
			document.getElementById("productDescription").innerText = product.description;
			document.getElementById("productPrice").innerText = product.price;
			document.getElementById("productImage").src = product.image;
			const addToCartButton = document.getElementById("addToCartButton");
			addToCartButton.addEventListener("click", function() {
				addItemToCart(productID, product.name, parseFloat(product.price), product.image);
			});
			
			
		</script>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>