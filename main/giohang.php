<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Giỏ hàng</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
body {
    font-family: 'Roboto', sans-serif;
    margin: 20px;
    background-color: #f9f9f9;
    padding-top: 100px;
}

.top-bar {
    background-color: #007bff;
    color: #fff;
    padding: 10px 0;
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
    border-radius: 0 0 10px 10px;
}
main {
    width: 95%;
    margin: 20px 0;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 30px 40px;
    border-radius: 0;
}
.cart-item {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    margin-bottom: 20px;
    border-bottom: 1px solid #ddd;
    padding-bottom: 15px;
    transition: all 0.5s ease;
}
.cart-item + .cart-item {
    margin-top: 20px;
}
.item-image {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    object-fit: cover;
}
.item-info {
    flex: 2;
    margin-left: 20px;
}
.item-info h2 {
    font-size: 18px;
    color: #444;
    margin: 0 0 5px;
}
.item-details {
    font-size: 14px;
    color: #666;
    margin-top: 5px;
}
.item-details p {
    margin: 2px 0;
}
.item-price {
    margin-top: 8px;
    font-weight: bold;
    color: #ff5722;
}
.quantity-controls {
    display: flex;
    align-items: center;
    gap: 5px;
    margin-top: 10px;
}
.quantity-controls button {
    width: 30px;
    height: 30px;
    border: none;
    background-color: #ff5722;
    color: #fff;
    border-radius: 6px;
    font-size: 16px;
    cursor: pointer;
}
.quantity-controls button:hover {
    background-color: #e64a19;
}
.quantity {
    width: 50px;
    text-align: center;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 4px;
}
.delete-button {
    background-color: #e53935;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 6px;
    cursor: pointer;
}
.delete-button:hover {
    background-color: #c62828;
}
.total-container {
    font-size: 18px;
    text-align: right;
    margin-top: 20px;
    color: #333;
}
footer {
    text-align: center;
    margin-top: 30px;
}
.total-container {
    font-size: 22px;
    text-align: center;
    margin-top: 30px;
    color: #fff;
    background-color: #ff5722;
    padding: 15px 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    font-weight: bold;
}

footer button {
    background-color: #28a745;
    color: #fff;
    padding: 14px 28px;
    font-size: 18px;
    font-weight: bold;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
}

footer button:hover {
    background-color: #218838;
    transform: scale(1.05);
}


/* Responsive */
@media (max-width: 600px) {
    .cart-item {
        flex-direction: column;
        align-items: center;
        text-align: center;
    }
    .item-info {
        margin-left: 0;
        margin-top: 10px;
    }
}

/* Success message */
#success-message {
    display: none;
    padding: 20px;
    background-color: #4CAF50;
    color: white;
    font-size: 18px;
    text-align: center;
    border-radius: 8px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}
</style>
</head>

<body>
    <div class="top-bar">
        🛒 Giỏ hàng (<span id="cart-count">0</span> sản phẩm)
    </div>

    <main class="cart-container">
        <div class="cart-item">
            <img src="https://via.placeholder.com/100" alt="Sữa Cô Gái Hà Lan" class="item-image">
            <div class="item-info">
                <h2>Sữa Cô Gái Hà Lan</h2>
                <div class="item-details">
                    <p>Loại: Sữa tươi tiệt trùng</p>
                    <p>Dung tích: 180ml</p>
                    <p>Xuất xứ: Việt Nam</p>
                </div>
                <div class="quantity-controls">
                    <button class="decrease"><i class="fas fa-minus"></i></button>
                    <input type="number" class="quantity" value="1" min="1" data-price="45000">
                    <button class="increase"><i class="fas fa-plus"></i></button>
                </div>
                <p class="item-price">Giá tiền: 45,000 VNĐ</p>
            </div>
            <button class="delete-button"><i class="fas fa-trash-alt"></i></button>
        </div>
        <div class="cart-item">
            <img src="https://via.placeholder.com/100" alt="Sữa Cô Gái Hà Lan" class="item-image">
            <div class="item-info">
                <h2>Sữa Cô Gái Hà Lan</h2>
                <div class="item-details">
                    <p>Loại: Sữa tươi tiệt trùng</p>
                    <p>Dung tích: 180ml</p>
                    <p>Xuất xứ: Việt Nam</p>
                </div>
                <div class="quantity-controls">
                    <button class="decrease"><i class="fas fa-minus"></i></button>
                    <input type="number" class="quantity" value="1" min="1" data-price="45000">
                    <button class="increase"><i class="fas fa-plus"></i></button>
                </div>
                <p class="item-price">Giá tiền: 45,000 VNĐ</p>
            </div>
            <button class="delete-button"><i class="fas fa-trash-alt"></i></button>
        </div>
    </main>

    <div class="total-container">
        Tổng cộng: <span id="total-price">0 VNĐ</span>  

    <footer>
        <button id="checkout-button">Thanh toán</button>
    </footer>

    <div id="success-message">Bạn đã thanh toán thành công, cảm ơn bạn đã mua hàng!</div>

<script>
// Tính tổng tiền
function calculateTotal() {
    const quantities = document.querySelectorAll('.quantity');
    let total = 0;
    quantities.forEach(quantity => {
        const price = parseInt(quantity.getAttribute('data-price'));
        const qty = parseInt(quantity.value);
        total += price * qty;
    });
    document.getElementById('total-price').textContent = total.toLocaleString() + " VNĐ";
    updateCartCount();
}

// Cập nhật số lượng sản phẩm trong giỏ
function updateCartCount() {
    const cartItems = document.querySelectorAll('.cart-item');
    document.getElementById('cart-count').textContent = cartItems.length;
}

// Xóa sản phẩm
function attachDeleteEvent() {
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            if (confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')) {
                const item = this.closest('.cart-item');
                item.style.transform = "scale(0)";
                item.style.opacity = "0";
                setTimeout(() => {
                    item.remove();
                    calculateTotal();
                }, 500);
            }
        });
    });
}

// Tăng giảm số lượng
function attachQuantityButtons() {
    document.querySelectorAll('.increase').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.previousElementSibling;
            input.value = parseInt(input.value) + 1;
            calculateTotal();
        });
    });
    document.querySelectorAll('.decrease').forEach(button => {
        button.addEventListener('click', function() {
            const input = this.nextElementSibling;
            if (parseInt(input.value) > 1) {
                input.value = parseInt(input.value) - 1;
                calculateTotal();
            }
        });
    });
    document.querySelectorAll('.quantity').forEach(input => {
        input.addEventListener('input', function() {
            if (parseInt(this.value) < 1 || isNaN(this.value)) {
                this.value = 1;
            }
            calculateTotal();
        });
    });
}

// Xử lý nút Thanh toán
document.getElementById('checkout-button').addEventListener('click', function() {
    const cartItems = document.querySelectorAll('.cart-item');
    if (cartItems.length === 0) {
        alert('Giỏ hàng trống!');
    } else {
        // Hiển thị thông báo thành công kiểu popup
        const successMessage = document.getElementById('success-message');
        successMessage.style.display = 'block';

        // Ẩn thông báo sau 3 giây
        setTimeout(() => {
            successMessage.style.display = 'none';
        }, 3000);

        // Xóa các sản phẩm trong giỏ hàng
        cartItems.forEach(item => {
            item.style.transition = "opacity 0.5s ease";
            item.style.opacity = "0";
            setTimeout(() => item.remove(), 500);
        });

        // Cập nhật tổng tiền và số lượng sản phẩm trong giỏ hàng sau khi thanh toán
        setTimeout(calculateTotal, 600);
    }
});
// Xử lý nút Thanh toán: lưu dữ liệu vào localStorage và chuyển sang checkout.html
document.getElementById('checkout-button').addEventListener('click', function () {
    const cartItems = document.querySelectorAll('.cart-item');
    if (cartItems.length === 0) {
        alert('Giỏ hàng trống!');
        return;
    }

    const cartData = [];
    cartItems.forEach(item => {
        const name = item.querySelector('h2').textContent;
        const quantity = item.querySelector('.quantity').value;
        const price = item.querySelector('.quantity').getAttribute('data-price');
        cartData.push({ name, quantity, price });
    });

    const total = document.getElementById('total-price').textContent;

    // Lưu vào localStorage
    localStorage.setItem('cartData', JSON.stringify(cartData));
    localStorage.setItem('totalPrice', total);

    // Chuyển sang trang nhập thông tin giao hàng
    window.location.href = "checkout.php";
});
// Khởi tạo
document.addEventListener('DOMContentLoaded', function() {
    attachDeleteEvent();
    attachQuantityButtons();
    calculateTotal();
});

</script>

</body>
</html>
