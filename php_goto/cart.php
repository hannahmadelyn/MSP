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
		<main class="cart">
        <h1>Shopping Cart</h1>
        <div class="cartItems"></div>
        <div class="totalCost">
            <div><p>Total: </p></div>
            <div><p id="total"></p></div>
        </div>
        <div class="cartOptions">
            <div id="checkOutButton">
                <a href="./CheckOut.html" class="btn">Check Out</a>
            </div>
            <div id="clearCartButton">
                <button type="button" id="clearCart" >Clear Cart</button>
            </div>
        </div>
    </main>

	<script>
        let totalCost = 0;

        function refreshCart() {
            totalCost = 0; // <-- Reset the totalCost here
            const cartItemsDiv = document.querySelector('.cartItems');
            const cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cartItemsDiv.innerHTML = ''; // Reset cart items

            // If cart is empty, display a message
            if (cart.length === 0) {
                cartItemsDiv.innerHTML = "<p>Your cart is empty. Add items to view them here.</p>";
            }

            cart.forEach((item, index) => {
                totalCost += item.price * item.quantity;
                const itemDiv = document.createElement('div');
                itemDiv.classList.add('cart-item');
                itemDiv.innerHTML = `
                    <img src="${item.image}" alt="${item.name}">
                    <h3>${item.name}</h3>
                    <p><strong>Price:</strong> $${item.price.toFixed(2)}</p>
                    <select id="quantity-${index}">
                        <option value="1" ${item.quantity === 1 ? 'selected' : ''}>1</option>
                        <option value="2" ${item.quantity === 2 ? 'selected' : ''}>2</option>
                        <option value="3" ${item.quantity === 3 ? 'selected' : ''}>3</option>
                        <option value="4" ${item.quantity === 4 ? 'selected' : ''}>4</option>
                        <option value="5" ${item.quantity === 5 ? 'selected' : ''}>5</option>
                        <!-- Add more options as needed -->
                    </select>
                    <button onclick="deleteItem(${index})">Delete</button>
                `;
                cartItemsDiv.appendChild(itemDiv);
            
                // Add an event listener to the select element to handle quantity changes
                document.getElementById(`quantity-${index}`).addEventListener('change', function() {
                    cart[index].quantity = parseInt(this.value);
                    localStorage.setItem('cart', JSON.stringify(cart));
                    refreshCart();
                });
            });
            

            // Display the total cost
            document.getElementById("total").innerText = "$" + totalCost.toFixed(2);
        }

        function deleteItem(index) {
            let cart = JSON.parse(localStorage.getItem('cart') || '[]');
            cart.splice(index, 1); // Remove item from cart array
            localStorage.setItem('cart', JSON.stringify(cart)); // Update local storage
            refreshCart(); // Refresh cart display
        }

        document.getElementById('clearCart').addEventListener('click', function() {
            // Clear cart from localStorage
            localStorage.removeItem('cart');
            
            // Update UI
            refreshCart();
        });
        
        refreshCart(); // Load cart items on page load
    </script>
	</div>
	<?php include "includes/footer.php"; ?>
</body>
</html>