<?php
require_once("ketnoi.php");

// Xử lý khi submit form
if (isset($_POST['submit'])) {
    $name = ($_POST['name']);
    $price = (float)$_POST['price'];
    $category = ($_POST['category']);
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
        $uploadDir = '../main/uploads';
        $uploadPath = $uploadDir . $imageName;

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($imageTmpPath, $uploadPath)) {
            $stmt = $conn->prepare("INSERT INTO products (name, price, category, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("sdss", $name, $price, $category, $uploadPath);

            if ($stmt->execute()) {
                echo "";
            } else {
                echo "<p style='color:red;'>Lỗi khi thêm vào cơ sở dữ liệu.</p>";
            }

            $stmt->close();
        } else {
            echo "<p style='color:red;'>Lỗi khi tải hình ảnh.</p>";
        }
    }
}

$conn->close();
?>
<style>
form input[type="text"],
form input[type="number"],
form input[type="file"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 6px;
    margin-top: 5px;
}

form input[type="submit"] {
    background-color: rgb(50, 249, 249);
    color: white;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

form input[type="submit"]:hover {
    background-color: #1ac6c6;
}
.content {
    padding: 100px 40px 40px 40px; /* đẩy nội dung xuống dưới header */
    text-align: center;
}

form {
    max-width: 500px;
    margin: auto;
    text-align: left;
}

</style>

</style>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="manager.css">
</head>
<body>
<div class="sidebar">
        <h2>Quản lý</h2>
        <ul>
            <li><a href="manager.php"><i class="home"></i> Doanh thu</a></li>
            <li>
                <a href=""><i class="user"></i> Trình quản lý </a>
                <ul class="submenu">
                    <li><a href="user/Users.php">📂 Quản lý tài khoản</a></li>
                    <li><a href="Trìnhquảnlýsảnphẩm.php">📋 Trình thêm sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="bill"></i> Đơn thanh toán</a>
                <ul class="submenu">
                    <li><a href="Quảnlýđơnhàng.php">🛒 Quản lý đơn hàng</a></li>
                    <li><a href="thanhtoánhoàntiền.php">💳 Thanh toán & Hoàn tiền </a></li>
                </ul></li>
            <li><a href="#"><i class="store"></i> Kho hàng</a><ul class="submenu">
                <li><a href="Kho.php">📊 Tồn kho & Nhập xuất hàng</a></li>
                <li><a href="NhaCungCap/danhsachNCC.php">🚚 Quản lý nhà cung cấp</a></li>
            </ul></li>
            <li><a href="#"><i class="Support user"></i> Hỗ trợ người dùng</a><ul class="submenu">
                <li><a href="messenger/Hỗtrợkháchhàng.php">💬 Hỗ trợ khách hàng</a></li>
            </ul></li>
            <li><a href="#"><i class="config"></i> Cài đặt</a><ul class="submenu">
                <li><a href="setting.php">⚙️ Cài đặt chung</a></li>
                <li><a href="chínhsáchvàbảomật.php">🔒Chính sách bảo mật & Quyền riêng tư</a></li>
            </ul></li>
            <li id="logout"><a href="../login/test.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Nội dung chính -->
    <div class="main-content">
        <div class="header">
            <div class="search">
                <input type="text" class="search-bar" placeholder="Tìm kiếm...">
            </div>
            <div class="bingbong">
                <div class="notification-icon">🔔</div>
                <div class="notifications">
                    <p>🛒 Khách hàng A vừa mua 2 sản phẩm</p>
                    <p>🛍️ Khách hàng B đã hoàn thành đơn hàng</p>
                    <p>💳 Khách hàng C vừa thanh toán đơn hàng</p>
                    <p>📦 Khách hàng D đã nhận hàng</p>
                    <p>🔄 Khách hàng E yêu cầu đổi hàng</p>
                    <p>📢 Khách hàng F để lại đánh giá 5 sao</p>
                    <p>🎉 Khách hàng G đăng ký thành viên VIP</p>
                </div>
            </div>
            <div class="avatar">
                <img src="OIP.jpg" alt="Avatar">
                <div class="dropdown">
                    <p>Thông tin tài khoản</p>
                    <p>Ghi chú</p>
                </div>
            </div>
            <div class="logo">
                <img src="Logo_DutchLady.jpg" alt="Logo">
            </div>
        </div>
    <h2>Thêm sản phẩm mới</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="name">Tên sản phẩm:</label><br>
        <input type="text" name="name" id="name" required><br><br>

        <label for="price">Giá:</label><br>
        <input type="number" name="price" id="price" required><br><br>

        <label for="category">Loại sản phẩm:</label><br>
        <input type="text" name="category" id="category" required><br><br>

        <label for="image">Hình ảnh:</label><br>
        <input type="file" name="image" id="image" accept="image/*" required><br><br>

        <input type="submit" name="submit" value="Thêm sản phẩm">
    </form>
</body>
</html>
