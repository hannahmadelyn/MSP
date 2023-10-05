<?php 
// set the page title
$pageTitle = "Cart";

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
			<h1>Shopping Cart</h1>
			<div class="cartItems"></div>
			<div class="totalCost">
				<div><p>Total: </p></div>
				<div><p id="total"></p></div>
			</div>
			<div class="cartOptions">
				<div id="checkOutButton">
					<button type="button" id="checkOut">Check Out</button>
				</div>
				<div id="clearCartButton">
					<button type="button" id="clearCart">Clear Cart</button>
				</div>
			</div>
		</main>

		<script>
			let totalCost = 0;

			try {

				document.getElementById('clearCart').addEventListener('click', function() {
                // Clear cart from localStorage
					localStorage.removeItem('cart');
					
                // Update UI
					document.querySelector('.cartItems').innerHTML = "<p>Your cart is empty. Add items to view them here.</p>";
					document.getElementById('total').innerText = "$0.00";
				});
				
				const cartItemsDiv = document.querySelector('.cartItems');
				const cart = JSON.parse(localStorage.getItem('cart') || '[]');

            // If cart is empty, display a message
				if (cart.length === 0) {
					cartItemsDiv.innerHTML = "<p>Your cart is empty. Add items to view them here.</p>";
				}

				cart.forEach(item => {
					totalCost += item.price * item.quantity;
					const itemDiv = document.createElement('div');
					itemDiv.classList.add('cart-item');
					itemDiv.innerHTML = `
					<img src="${item.image}" alt="${item.name}">
					<h3>${item.name}</h3>
					<p><strong>Price:</strong> $${item.price.toFixed(2)}</p>
					<p><strong>Quantity:</strong> ${item.quantity}</p>
					`;
					cartItemsDiv.appendChild(itemDiv);
				});
				

            // Display the total cost
				document.getElementById("total").innerText = "$" + totalCost.toFixed(2);
			} catch (error) {
				console.error("An error occurred:", error);
			}
		</script>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>