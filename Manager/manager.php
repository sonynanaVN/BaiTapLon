<?php
session_start();
require_once("ketnoi.php");
$sql = "select * from accounts order by id desc";
$kq = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($kq);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manager.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <!-- Sidebar -->
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
        

        <!-- Dashboard Cards -->
        <div class="dashboard-cards">
            <div class="card">
                <h3>Người dùng khả dụng</h3>
                <p><?php echo $row['id']?></p>
            </div>
            <div class="card">
                <h3>Đơn hàng đặt được </h3>
                <p>75</p>
            </div>
            <div class="card">
                <h3>Sản phẩm bán được</h3>
                <p>120</p>
            </div>
        </div>

        <!-- Biểu đồ -->
        <canvas id="salesChart" width="400px" height="200px"></canvas>
    </div>

    <script src="manager.js"></script>
</body>
</html>
