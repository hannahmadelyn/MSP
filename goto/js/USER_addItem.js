// Retrieve the cart from local storage or initialize an empty array if it doesn't exist
let cart = JSON.parse(localStorage.getItem('cart') || '[]');

if (!localStorage.getItem('cart')) {
    localStorage.setItem('cart', JSON.stringify([]));
}

/**
 * Adds a product to the cart or updates its quantity if it already exists.
 * @param {string} productId - The ID of the product.
 * @param {string} productName - The name of the product.
 * @param {number} productPrice - The price of the product.
 */
function addItemToCart(productId, productName, productPrice) {
    const cart = JSON.parse(localStorage.getItem('cart'));
    const existingProduct = cart.find(product => product.id === productId);

    if (existingProduct) {
        existingProduct.quantity += 1;
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${productName} added to cart!`);
}

function addItemToCart(id, name, price) {
    let foundProduct = cart.find(p => p.id === id);

    if (foundProduct) {
        // If the product already exists in the cart, increase the quantity
        foundProduct.quantity += 1;
    } else {
        // Otherwise, add a new product entry to the cart
        cart.push({
            id: id,
            name: name,
            price: price,
            quantity: 1
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(name + " has been added to your cart!");
}

// Display cart contents on the cart page
if (document.querySelector('.cartItems')) {
    const cartContainer = document.querySelector('.cartItems');
    cart.forEach(product => {
        let productElement = document.createElement('div');
        productElement.innerText = product.name + ' (' + product.quantity + ') - $' + (product.price * product.quantity).toFixed(2);
        cartContainer.appendChild(productElement);
    });
}

// Clear cart functionality for the cart page
if (document.querySelector('#clearCart')) {
    document.querySelector('#clearCart').addEventListener('click', function() {
        localStorage.removeItem('cart');
        alert("Cart has been cleared!");
        location.reload();
    });
}

function getCartItems() {
    return JSON.parse(localStorage.getItem('cart') || '[]');
}

function addItemToCart(productId, productName, productPrice, productQuantity = 1) {
    // Get cart from local storage or create a new one if it doesn't exist
    let cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Check if product already exists in the cart
    const existingProduct = cart.find(p => p.id === productId);

    if (existingProduct) {
        // If product exists, update the quantity
        existingProduct.quantity += productQuantity;
    } else {
        // If product doesn't exist, add a new product to the cart
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            quantity: productQuantity
        });
    }

    // Save the updated cart to local storage
    localStorage.setItem('cart', JSON.stringify(cart));
    
    // Notify the user that the item has been added to the cart
    alert(`${productName} has been added to your cart!`);
}


function clearCart() {
    localStorage.removeItem('cart');
}