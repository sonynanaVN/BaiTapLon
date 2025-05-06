<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Trang Thanh Toán</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(to right, #fceabb, #f8b500);
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .payment-form {
      background: white;
      padding: 40px 30px;
      border-radius: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 450px;
      animation: fadeIn 0.8s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      color: #f57c00;
    }

    label {
      font-weight: bold;
      display: block;
      margin: 10px 0 5px;
    }

    input[type="text"],
    input[type="tel"] {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 10px;
      outline: none;
      transition: 0.3s;
    }

    input:focus {
      border-color: #f57c00;
      box-shadow: 0 0 5px rgba(245, 124, 0, 0.5);
    }

    button {
      margin-top: 25px;
      width: 100%;
      padding: 14px;
      background: #f57c00;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: #e65100;
      transform: scale(1.02);
    }

    .result {
      display: none;
      margin-top: 20px;
      padding: 20px;
      background: #e8f5e9;
      color: #2e7d32;
      border-left: 6px solid #2e7d32;
      border-radius: 10px;
      animation: fadeIn 0.5s ease-in-out;
    }

    .icon-check {
      color: #2e7d32;
      font-size: 22px;
      margin-right: 8px;
    }
  </style>
</head>
<body>

  <div class="payment-form">
    <h2><i class="fas fa-credit-card"></i> Thanh Toán Đơn Hàng</h2>
    <form id="checkoutForm">
      <label for="name">👤 Họ và Tên:</label>
      <input type="text" id="name" name="name" required>

      <label for="phone">📞 Số điện thoại:</label>
      <input type="tel" id="phone" name="phone" required pattern="[0-9]{10,11}">

      <label for="address">📍 Địa chỉ giao hàng:</label>
      <input type="text" id="address" name="address" required>

      <button href="â.html" type="submit"><i class="fas fa-check-circle"></i> Xác Nhận Đặt Hàng</button>
    </form>

    <div class="result" id="result"></div>
  </div>
  <script>
    document.getElementById("checkoutForm").addEventListener("submit", function (e) {
  e.preventDefault();
  const name = document.getElementById("name").value.trim();
  const phone = document.getElementById("phone").value.trim();
  const address = document.getElementById("address").value.trim();
  const result = document.getElementById("result");

  result.style.display = "block";
  result.innerHTML = `
    <p><i class="fas fa-check-circle icon-check"></i><strong>Đặt hàng thành công!</strong></p>
    <p>Khách hàng: <strong>${name}</strong></p>
    <p>Số điện thoại: <strong>${phone}</strong></p>
    <p>Giao đến: <strong>${address}</strong></p>
  `;

  const cart = JSON.parse(localStorage.getItem("cart") || "[]");
  if (cart.length > 0) {
    let productList = `<p><strong>Chi tiết đơn hàng:</strong></p>`;
    cart.forEach(item => {
      productList += `<p>${item.name} - SL: ${item.quantity} - Tổng: ${(item.quantity * item.price).toLocaleString()} VNĐ</p>`;
    });
    result.innerHTML += productList;
    localStorage.removeItem("cart");
  }

  // 👉 Thêm đoạn chuyển trang sau vài giây
  setTimeout(() => {
    window.location.href = "gio-hang.html";
  }, 50000); // chuyển trang sau 3 giây
});

    </script>
    

</body>
</html>
