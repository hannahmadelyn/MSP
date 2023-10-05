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
            <section class="banner">
                <img src="/goto/img/sale.png" alt="Banner Description">
            </section>
            <section class="products">
                <h2>Featured Products</h2>
                <div class="product-grid">

                 <!-- Product 1 -->
                 <div class="product-card" data-product-id="001">
                    <img src="/goto/img/banana.png" alt="Product 1">
                    <p class="product-name">Product 1</p>
                    <p class="product-price">$59.99</p>
                    <a href="product.php?productID=001">View Details</a>
                    <button class="add-to-cart-btn" onclick="addItemToCart('001', 'Product 1', 59.99,'/goto/img/banana.png')">Add to Cart</button>
                </div>

                <!-- Product 2 -->
                <div class="product-card" data-product-id="002">
                    <img src="/goto/img/cantaloupe.png" alt="Product 2">
                    <p class="product-name">Product 2</p>
                    <p class="product-price">$12.99</p>
                    <a href="product.php?productID=002">View Details</a>
                    <button class="add-to-cart-btn" onclick="addItemToCart('002', 'Product 2', 12.99,'/goto/img/cantaloupe.png')">Add to Cart</button>
                </div>

                <!-- Product 3 -->
                <div class="product-card" data-product-id="003">
                    <img src="/goto/img/orange.png" alt="Product 3">
                    <p class="product-name">Product 3</p>
                    <p class="product-price">$8.99</p>
                    <a href="product.php?productID=003">View Details</a>
                    <button class="add-to-cart-btn" onclick="addItemToCart('003', 'Product 3', 8.99,'/goto/img/orange.png')">Add to Cart</button>
                </div>

                <!-- Product 4 -->
                <div class="product-card" data-product-id="004">
                    <img src="/goto/img/pear.png" alt="Product 4">
                    <p class="product-name">Product 4</p>
                    <p class="product-price">$9.99</p>
                    <a href="product.php?productID=004">View Details</a>
                    <button class="add-to-cart-btn" onclick="addItemToCart('004', 'Product 4', 9.99,'/goto/img/pear.png')">Add to Cart</button>
                </div>

            </div>
            <p class="center"><a class="btn_link" href="cart.php">View Cart</a></p>
        </section>
    </main>
    <script src="../js/USER_addItem.js"></script>
    <script>
        // Get all "Add to Cart" buttons
        const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');

        // Add event listener to each button
        addToCartButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                const productDiv = this.closest('.product');
                const productID = productDiv.getAttribute('data-product-id');
                const productName = productDiv.querySelector('h2').innerText;
                const productPrice = productDiv.querySelector('.product-price').innerText;

                // Use the function from USER_addItem.js to add the product to the cart
                addItemToCart(productID, productName, productPrice);
                
                // Alert the user that the item has been added to the cart
                alert(productName + " has been added to your cart!");
            });
        });
    </script>
</div>
<?php include "includes/footer.php"; ?>
</body>
</html>