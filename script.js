let cart = [];

function addToCart(button) {
    let product = button.parentElement;
    let productName = product.dataset.name;
    let productPrice = parseFloat(product.dataset.price);

    // Verificar si el producto ya está en el carrito
    let existingProduct = cart.find(item => item.name === productName);

    if (existingProduct) {
        existingProduct.quantity++;
    } else {
        cart.push({
            name: productName,
            price: productPrice,
            quantity: 1
        });
    }

    updateCart();
}

function updateCart() {
    let cartList = document.getElementById("cart-list");
    let totalElement = document.getElementById("total");
    let total = 0;

    // Limpiar la lista del carrito
    cartList.innerHTML = "";

    // Actualizar la lista del carrito
    cart.forEach(item => {
        let listItem = document.createElement("li");
        listItem.className = "cart-item";
        listItem.innerHTML = `
            <span>${item.name} x${item.quantity}</span>
            <span>$${(item.price * item.quantity).toFixed(2)}</span>
            <button onclick="removeFromCart('${item.name}')">Eliminar</button>
        `;
        cartList.appendChild(listItem);

        // Calcular el total
        total += item.price * item.quantity;
    });

    // Actualizar el total
    totalElement.textContent = `Total: $${total.toFixed(2)}`;
}

function removeFromCart(productName) {
    cart = cart.filter(item => item.name !== productName);
    updateCart();
}

function checkout() {
    // En un sistema real, aquí deberías enviar la información del carrito al backend para procesar la venta.
    // También podrías reiniciar el carrito después de una venta exitosa.
    alert("Venta realizada con éxito. Total: $" + getTotal().toFixed(2));
    cart = [];
    updateCart();
}

function getTotal() {
    return cart.reduce((total, item) => total + item.price * item.quantity, 0);
}
function logout() {
    // Implementa la lógica para cerrar sesión
    fetch('logout.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Redirigir a la página de inicio de sesión (o a cualquier otra página deseada)
                window.location.href = 'login.php';
            } else {
                console.error('Error al cerrar sesión');
            }
        })
        .catch(error => {
            console.error('Error al realizar la solicitud AJAX:', error);
        });

}

function filterProducts() {
    var input, filter, products, product, i, productName;
    input = document.getElementById("searchInput");
    filter = input.value.toUpperCase();
    products = document.getElementById("product-section").getElementsByClassName("product");

    for (i = 0; i < products.length; i++) {
        product = products[i];
        productName = product.dataset.name.toUpperCase();
        if (productName.indexOf(filter) > -1) {
            product.style.display = "";
        } else {
            product.style.display = "none";
        }
    }
}
