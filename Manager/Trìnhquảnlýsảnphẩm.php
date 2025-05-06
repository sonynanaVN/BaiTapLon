<?php
// Cấu hình kết nối MySQL
$host = 'localhost';
$db = 'shop';
$user = 'root'; 
$pass = '';     
$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Xử lý khi submit form
if (isset($_POST['submit'])) {
    $name = htmlspecialchars($_POST['name']);
    $price = (float)$_POST['price'];
    $category = htmlspecialchars($_POST['category']);
    
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
        $uploadDir = '../main/uploads';
        $uploadPath = $uploadDir . $imageName;

        // Tạo thư mục nếu chưa có
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        if (move_uploaded_file($imageTmpPath, $uploadPath)) {
            // Lưu vào database
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
            <li><a href="http://localhost/Animated%20Login%20Page/Manager/manager.php"><i class="fas fa-home"></i> Doanh thu</a></li>
            <li>
                <a href=""><i class="fas fa-user-cog"></i> Trình quản lý </a>
                <ul class="submenu">
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/user/Users.php">📂 Quản lý tài khoản</a></li>
                    <li><a href=
                    http://localhost/Animated%20Login%20Page/Manager/Tr%c3%acnhqu%e1%ba%a3nl%c3%bds%e1%ba%a3nph%e1%ba%a9m.php
                    >📋 Trình thêm sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fas fa-file-invoice"></i> Đơn thanh toán</a>
                <ul class="submenu">
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/Qu%e1%ba%a3nl%c3%bd%c4%91%c6%a1nh%c3%a0ng.php">🛒 Quản lý đơn hàng</a></li>
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/thanhto%c3%a1nho%c3%a0nti%e1%bb%81n.php">💳 Thanh toán & Hoàn tiền </a></li>
                </ul></li>
            <li><a href="#"><i class="fas fa-box"></i> Kho hàng</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Kho.php">📊 Tồn kho & Nhập xuất hàng</a></li>
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Qu%e1%ba%a3nl%c3%bdnh%c3%a0cungc%e1%ba%a5p.php">🚚 Quản lý nhà cung cấp</a></li>
            </ul></li>
            <li><a href="#"><i class="fas fa-users"></i> Người dùng</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/messenger/H%e1%bb%97tr%e1%bb%a3kh%c3%a1chh%c3%a0ng.php">💬 Hỗ trợ khách hàng</a></li>
            </ul></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Cài đặt</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/setting.php">⚙️ Cài đặt chung</a></li>
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Ch%c3%adnhs%c3%a1chv%c3%a0b%e1%ba%a3om%e1%ba%adt.php">🔒Chính sách bảo mật & Quyền riêng tư</a></li>
            </ul></li>
            <li id="logout"><a href="http://localhost/Animated%20Login%20Page/login/test.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
