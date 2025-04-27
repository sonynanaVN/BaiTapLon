let cartCount = 0;

function toggleCart() {
    const cartDetail = document.getElementById('cartDetail');
    cartDetail.style.display = cartDetail.style.display === 'none' || cartDetail.style.display === '' ? 'block' : 'none';
}

function addToCart() {
    cartCount++;
    alert("Sản phẩm đã được thêm vào giỏ hàng!");
    updateCart();
}

function updateCart() {
    const cartDetail = document.getElementById('cartDetail');
    if (cartCount > 0) {
        cartDetail.innerHTML = `<p>Có ${cartCount} sản phẩm trong giỏ hàng.</p><p>Tổng: ${cartCount * 15000}đ</p><button onclick="alert('Thanh toán')">Thanh toán</button>`;
    }
}
function showCartDetail() {
    document.getElementById('cartDetail').style.display = 'block';
}

function hideCartDetail() {
    document.getElementById('cartDetail').style.display = 'none';
}
function showGuessDetail() {
    document.getElementById('guessDetail').style.display = 'block';
}
function hideGuessDetail() {
    document.getElementById('guessDetail').style.display = 'none';
}