function addItemToCart(productId, productName, productPrice, productImage, productQuantity = 1) {
    let cart = JSON.parse(localStorage.getItem('cart')) || [];
    const existingProduct = cart.find(p => p.id === productId);

    if (existingProduct) {
        existingProduct.quantity += productQuantity;
    } else {
        cart.push({
            id: productId,
            name: productName,
            price: productPrice,
            image: productImage,
            quantity: productQuantity
        });
    }

    localStorage.setItem('cart', JSON.stringify(cart));
    alert(`${productName} has been added to your cart!`);
}

// Retrieve the cart from local storage or initialize an empty array if it doesn't exist
let cart = JSON.parse(localStorage.getItem('cart') || '[]');

if (!localStorage.getItem('cart')) {
    localStorage.setItem('cart', JSON.stringify([]));
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

function clearCart() {
    localStorage.removeItem('cart');
}
