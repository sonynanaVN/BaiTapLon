let cartCount = 0;

function toggleCart() {
    const cartDetail = document.getElementById('cartDetail');
    cartDetail.style.display = cartDetail.style.display === 'none' || cartDetail.style.display === '' ? 'block' : 'none';
}

let cart = []; // Mảng lưu trữ các sản phẩm trong giỏ hàng

function addToCart(productName, productPrice, productImage) {
    cart.push({ name: productName, price: productPrice, image: productImage });
    alert(`Sản phẩm "${productName}" đã được thêm vào giỏ hàng với giá ${productPrice}đ!`);
    updateCart();
}

function updateCart() {
    const cartDetail = document.getElementById('cartDetail');
    if (cart.length > 0) {
        let totalPrice = 0;
        let cartItemsHTML = cart.map(item => {
            totalPrice += item.price;
            return `<p>${item.name}: ${item.price}đ</p>`;
        }).join('');

        cartDetail.innerHTML = `
            ${cartItemsHTML}
            <p>Tổng: ${totalPrice}đ</p>
            <form action="â.php" method="POST">
                <input type="hidden" name="cart" value='${JSON.stringify(cart)}'>
                <input type="hidden" name="totalPrice" value="${totalPrice}">
                <button type="submit">Thanh toán</button>
            </form>
        `;
    } else {
        cartDetail.innerHTML = `<p>Chưa có sản phẩm nào</p>`;
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

let currentIndex = 0;
const slides = document.querySelectorAll('.slide');

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.remove('active');
        if (i === index) {
            slide.classList.add('active');
        }
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length; // Quay lại đầu nếu đến cuối
    showSlide(currentIndex);
}

// Hiển thị slide đầu tiên
showSlide(currentIndex);

// Tự động chuyển slide mỗi 2 giây
setInterval(nextSlide, 3000)

function filterProducts(type) {
    const products = document.querySelectorAll('.product');
    
    products.forEach(product => {
        if (type === 'all') {
            product.style.display = 'block'; // Hiện tất cả sản phẩm
        } else {
            if (product.classList.contains(type)) {
                product.style.display = 'block'; // Hiện sản phẩm thuộc loại đã chọn
            } else {
                product.style.display = 'none'; // Ẩn sản phẩm không thuộc loại đã chọn
            }
        }
    });
}

document.getElementById('chatCircle').addEventListener('click', function() {
    const chatBox = document.getElementById('chatBox');
    chatBox.style.display = chatBox.style.display === 'none' || chatBox.style.display === '' ? 'flex' : 'none';
});

document.getElementById('closeChat').addEventListener('click', function() {
    document.getElementById('chatBox').style.display = 'none';
});