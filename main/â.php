<?php
session_start();

// Lấy giỏ hàng từ session
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalPrice = 0;

// Đảm bảo số lượng mặc định là 1 nếu chưa có
foreach ($cart as &$item) {
    if (!isset($item['quantity']) || $item['quantity'] < 1) {
        $item['quantity'] = 1;
    }
    $totalPrice += $item['price'] * $item['quantity'];
}
unset($item); // Good practice khi dùng reference

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart = json_decode($_POST['cart'], true);
    $totalPrice = $_POST['totalPrice'];
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main.css">
    <link rel="stylesheet" href="MainGuess.css">
    <title>Giỏ hàng</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .top-bar {
            background-color: #007bff;
            color: #fff;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .top-bar-flex {
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.top-bar-flex h1 {
    margin: 0;
    flex: 0;
    text-align: left;
}

.cart-info {
    flex: 1;
    text-align: center;
    font-size: 30px;
    font-weight: bold;
}

        main {
            max-width: 900px;
            margin: 100px auto 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 12px;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        ul li {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
        }

        ul li:last-child {
            border-bottom: none;
        }

        ul li img {
            width: 100px;
            height: 150px;
            object-fit: cover;
            border-radius: 6px;
            margin-right: 10px;
        }

        ul li span {
            font-weight: bold;
            color: #555;
        }

        .total-container {
            text-align: right;
            font-size: 18px;
            margin-top: 20px;
            color: #333;
        }

        .total-container strong {
            color: #ff5722;
        }

        footer {
            text-align: center;
            margin-top: 30px;
        }

        footer button {
            background-color: #007bff;
            color: #fff;
            padding: 12px 24px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        footer button:hover {
            background-color: #0056b3;
        }

        .empty-cart {
            text-align: center;
            font-size: 18px;
            color: #888;
            margin-top: 50px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            ul li {
                flex-direction: column;
                align-items: flex-start;
            }

            ul li span {
                margin-top: 5px;
            }
        }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .quantity-controls button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .quantity-controls button:hover {
        background-color: #0056b3;
    }

    .delete-button {
        background-color: #ff4d4d;
        color: #fff;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        margin-left: 10px;
    }

    .delete-button:hover {
        background-color: #cc0000;
    }
</style>
</head>

<body>
<div class="top-bar">
    <div class="top-bar-flex">
        <h1><img src="img/logo.png" alt="Logo"></h1>
        <span class="cart-info">🛒 Giỏ hàng (<span id="cart-count"><?php echo count($cart); ?></span> sản phẩm)</span>
        <span style="width:100px"></span> <!-- Chặn lệch phải, có thể bỏ nếu không cần -->
    </div>
</div>

    <main>
        <?php if (!empty($cart)): ?>
            <ul>
    <?php foreach ($cart as $index => $item): ?>
        <li>
    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
    <span><?php echo htmlspecialchars($item['name']); ?></span>
    <span>
        <div class="quantity-controls">
            <button onclick="updateQuantity(<?php echo $index; ?>, -1)">-</button>
        <span id="quantity-<?php echo $index; ?>">
    <?php echo isset($item['quantity']) ? $item['quantity'] : 1; ?>
        </span>
            <button onclick="updateQuantity(<?php echo $index; ?>, 1)">+</button>
        </div>
    </span>
    <span id="item-total-<?php echo $index; ?>">
    <?php
        $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
        echo number_format($item['price'] * $quantity, 0, ',', '.');
    ?>đ
</span>
    <button class="delete-button" onclick="removeItem(<?php echo $index; ?>)">Xoá</button>
</li>
    <?php endforeach; ?>
</ul>
            <div class="total-container">
    <p><strong id="total-price"> Tổng tiền: <?php echo number_format($totalPrice, 0, ',', '.'); ?>đ</strong></p>
</div>
        <?php else: ?>
            <div class="empty-cart">
                <p>Giỏ hàng trống.</p>
            </div>
        <?php endif; ?>
        <footer>
    <button id="checkout-button" onclick="handleCheckout()">Thanh toán</button>
</footer>


<script>
    let cart = <?php echo json_encode($cart); ?>;


    function updateQuantity(index, change) {
    let quantityElement = document.getElementById(`quantity-${index}`);
    if (!quantityElement) return; // Kiểm tra phần tử tồn tại

    let currentQuantity = parseInt(quantityElement.textContent);
    if (isNaN(currentQuantity)) currentQuantity = 0;
    let newQuantity = currentQuantity + change;
    if (newQuantity < 1) return;

    cart[index].quantity = newQuantity;
    quantityElement.textContent = newQuantity;

    let itemTotal = cart[index].price * newQuantity;
document.getElementById(`item-total-${index}`).textContent = itemTotal.toLocaleString('vi-VN') + 'đ';

        // Cập nhật tổng tiền
        updateTotalPrice();
    }


    function removeItem(index) {
    cart.splice(index, 1);
    renderCart();
}


    function updateTotalPrice() {
        let total = 0;
        cart.forEach(item => {
            total += item.price * item.quantity;
        });
        document.getElementById('total-price').textContent = total.toLocaleString('vi-VN') + 'đ';
        document.getElementById('cart-count').textContent = cart.length;
        if (cart.length === 0) {
            document.querySelector('main').innerHTML = `
                <div class="empty-cart">
                    <p>Giỏ hàng trống.</p>
                </div>
            `;
        }
    }


    function renderCart() {
    let ul = document.querySelector('main ul');
    if (!ul) return;
    ul.innerHTML = '';
    cart.forEach((item, index) => {
        ul.innerHTML += `
            <li>
                <img src="${item.image}" alt="${item.name}">
                <span>${item.name}</span>
                <span>
                    <div class="quantity-controls">
                        <button onclick="updateQuantity(${index}, -1)">-</button>
                        <span id="quantity-${index}">${item.quantity}</span>
                        <button onclick="updateQuantity(${index}, 1)">+</button>
                    </div>
                </span>
                <span id="item-total-${index}">${(item.price * item.quantity).toLocaleString('vi-VN')}đ</span>
                <button class="delete-button" onclick="removeItem(${index})">Xoá</button>
            </li>
        `;
    });
    updateTotalPrice(); // Thêm dòng này để cập nhật tổng tiền và số lượng
}


    function handleCheckout() {
        alert("Thanh toán thành công!");
        // Bạn có thể thêm logic khác tại đây, ví dụ: chuyển hướng sang trang khác
    }
</script>
    </main>
</body>
</html>