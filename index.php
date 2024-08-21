</main>

<!-- Modal for Checkout -->
<div id="checkout-modal" class="modal">
    <div class="modal-content">
        <span class="close-button">&times;</span>
        <h2>Checkout</h2>
        <div id="order-summary"></div>
        <button id="complete-purchase">Complete Purchase</button>
    </div>
</div>

<footer>
    <p>&copy; 2024 Shopping Website. All rights reserved.</p>
</footer>

<script>
    // Variables
    let cart = [];
    const products = [
        { id: 1, name: 'Product 1', price: 10 },
        { id: 2, name: 'Product 2', price: 15 },
        { id: 3, name: 'Product 3', price: 20 },
        { id: 4, name: 'Product 4', price: 25 },
        { id: 5, name: 'Product 5', price: 30 },
        { id: 6, name: 'Product 6', price: 35 },
        { id: 7, name: 'Product 7', price: 40 },
        { id: 8, name: 'Product 8', price: 45 },
        { id: 9, name: 'Product 9', price: 50 },
        { id: 10, name: 'Product 10', price: 55 }
    ];

    // Function to update cart count
    function updateCartCount() {
        document.getElementById('cart-count').innerText = cart.length;
    }

    // Function to add product to cart
    function addToCart(productId) {
        const product = products.find(p => p.id === productId);
        cart.push(product);
        updateCartCount();
    }

    // Event listeners for "Add to Cart" buttons
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = parseInt(this.parentElement.getAttribute('data-id'));
            addToCart(productId);
        });
    });

    // Checkout process
    const checkoutButton = document.getElementById('checkout-button');
    const checkoutModal = document.getElementById('checkout-modal');
    const closeButton = document.querySelector('.close-button');
    const completePurchaseButton = document.getElementById('complete-purchase');
    const orderSummary = document.getElementById('order-summary');

    checkoutButton.addEventListener('click', () => {
        checkoutModal.style.display = 'flex';
        orderSummary.innerHTML = cart.map(product => `
            <p>${product.name} - $${product.price}</p>
        `).join('');
    });

    closeButton.addEventListener('click', () => {
        checkoutModal.style.display = 'none';
    });

    completePurchaseButton.addEventListener('click', () => {
        alert('Purchase Complete!');
        cart = [];
        updateCartCount();
        checkoutModal.style.display = 'none';
    });

    // Search Functionality
    const searchInput = document.getElementById('search-input');

    searchInput.addEventListener('input', function() {
        const query = searchInput.value.toLowerCase();
        document.querySelectorAll('.product').forEach(product => {
            const productName = product.querySelector('h2').innerText.toLowerCase();
            if (productName.includes(query)) {
                product.style.display = 'block';
            } else {
                product.style.display = 'none';
            }
        });
    });
</script>
