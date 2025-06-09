script.js
function addToCart(productName, price) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push({ name: productName, price: price });
  localStorage.setItem("cart", JSON.stringify(cart));
  alert("Produto adicionado ao carrinho!");
}

function loadCart() {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  let cartItems = document.getElementById("cart-items");
  let total = 0;

  cartItems.innerHTML = "";
  cart.forEach(item => {
    let li = document.createElement("li");
    li.textContent = `${item.name} - R$ ${item.price.toFixed(2)}`;
    cartItems.appendChild(li);
    total += item.price;
  });

  document.getElementById("total").textContent = `Total: R$ ${total.toFixed(2)}`;
}

if (document.getElementById("cart-items")) {
  window.onload = loadCart;
}
const products = [
  { name: "Fone Bluetooth", price: 129.90, img: "https://images.unsplash.com/photo-1585386959984-a41552262f79?auto=format&fit=crop&w=400&q=80" },
  { name: "Relógio Inteligente", price: 199.90, img: "https://images.unsplash.com/photo-1587825140708-dfaf72ae4b04?auto=format&fit=crop&w=400&q=80" },
  { name: "Smartphone X", price: 1499.00, img: "https://images.unsplash.com/photo-1512496015851-a90fb38ba796?auto=format&fit=crop&w=400&q=80" },
  { name: "Caixa de Som", price: 89.90, img: "https://images.unsplash.com/photo-1615800001421-16e9c8d6b1be?auto=format&fit=crop&w=400&q=80" },
  { name: "Mouse Gamer RGB", price: 79.90, img: "https://images.unsplash.com/photo-1617957741500-6219bfb9e0f5?auto=format&fit=crop&w=400&q=80" }
];

// Adicionar produtos na tela
function renderProducts(filter = "") {
  const list = document.getElementById("product-list");
  list.innerHTML = "";
  products
    .filter(p => p.name.toLowerCase().includes(filter.toLowerCase()))
    .forEach(prod => {
      const div = document.createElement("div");
      div.className = "product-card";
      div.innerHTML = `
        <img src="${prod.img}" alt="${prod.name}" />
        <h3>${prod.name}</h3>
        <p>R$ ${prod.price.toFixed(2)}</p>
        <button class="btn" onclick="addToCart('${prod.name}', ${prod.price})">Adicionar ao Carrinho</button>
      `;
      list.appendChild(div);
    });
}

function addToCart(name, price) {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  cart.push({ name, price });
  localStorage.setItem("cart", JSON.stringify(cart));
  alert("Produto adicionado ao carrinho!");
}

// Filtro de pesquisa
document.getElementById("search").addEventListener("input", (e) => {
  renderProducts(e.target.value);
});

// Carregar produtos na inicialização
if (document.getElementById("product-list")) {
  renderProducts();
}
