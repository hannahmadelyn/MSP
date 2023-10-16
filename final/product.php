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
            "001": { 
                name: "Organic Banana", 
                description: "Fresh organic bananas packed with essential nutrients. Perfect for a quick snack or smoothies.", 
                price: "59.99", 
                image: "/goto/img/banana.png" 
            },
            "002": { 
                name: "Cantaloupe Melon", 
                description: "Juicy and sweet cantaloupe melons sourced from the best farms. Refreshing and rich in vitamins.", 
                price: "12.99", 
                image: "/goto/img/cantaloupe.png" 
            },
            "003": { 
                name: "Organic Orange", 
                description: "Organic oranges bursting with natural sweetness and vitamin C. Ideal for fresh orange juice or a fruity snack.", 
                price: "8.99", 
                image: "/goto/img/orange.png" 
            },
            "004": { 
                name: "Ripe Pear", 
                description: "Deliciously sweet pears that are soft to bite and perfect for desserts or eating raw.", 
                price: "9.99", 
                image: "/goto/img/pear.png" 
            }
        
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