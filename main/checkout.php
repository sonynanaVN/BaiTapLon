<?php
session_start();
// Kiểm tra xem có dữ liệu giỏ hàng trong session không
if (isset($_SESSION['giohangData'])) {
  $giohangData = $_SESSION['giohangData'];  // Lấy dữ liệu giỏ hàng từ session
} else {
  $giohangData = [];  // Nếu không có, khởi tạo giỏ hàng trống
}
// Xử lý khi nhấn nút "Hoàn tất thanh toán"
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullName = $_POST['full-name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Hiển thị thông tin đã nhập sau khi hoàn tất
    $thongbao = "
        <div style='background: #d4edda; color: #155724; padding: 15px; margin-top: 20px; border-radius: 8px; text-align: center;'>
            <h3>✅ Cảm ơn bạn đã đặt hàng,chúng tôi sẽ liên hệ với bạn sớm!</h3>
            <p><strong>Họ tên:</strong> $fullName</p>
            <p><strong>Địa chỉ:</strong> $address</p>
            <p><strong>Số điện thoại:</strong> $phone</p>
            <p><strong>Email:</strong> $email</p>
        </div>
    ";
    
} else {
    $thongbao = "";
}

?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin giao hàng</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f1f1f1;
            padding-top: 60px;
            margin: 0;
        }

        .top-bar {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            border-radius: 0 0 10px 10px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            font-size: 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: white;
            font-size: 18px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        🚚 Thông tin giao hàng
    </div>

    <div class="form-container">
        <h2>Nhập thông tin của bạn</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label for="full-name">Họ và tên</label>
                <input type="text" id="full-name" name="full-name" required>
            </div>
            <div class="form-group">
                <label for="address">Địa chỉ</label>
                <input id="address" name="address" rows="3" required></input>
            </div>
            <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Xác Nhận Đặt Hàng">
            </div>
        </form>

        <?= $thongbao ?>
    </div>
</body>
</html>
