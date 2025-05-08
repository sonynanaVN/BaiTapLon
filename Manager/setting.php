<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Manager/manager.css">
    <link rel="stylesheet" href="manager.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/Manager/"></script>
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
      
<!-- setting -->
<div class="content">
    <nav>
        <h2>Cài đặt</h2>
    </nav>
    <main>
        <form>
            <label for="language">Ngôn ngữ:</label>
            <select id="language">
                <option value="vi">Tiếng Việt</option>
                <option value="en">English</option>
            </select>

            <label for="notifications">Thông báo:</label><!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="/Manager/manager.css">
                <title>Cài đặt</title>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .settings-container {
                        width: 80%;
                        margin: 20px auto;
                        background: white;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
                    }
                    .settings-header {
                        display: flex;
                        align-items: center;
                        justify-content: space-between;
                        border-bottom: 2px solid #ddd;
                        padding-bottom: 10px;
                        margin-bottom: 20px;
                    }
                    .settings-header h2 {
                        margin: 0;
                        color: #333;
                    }
                    .settings-section {
                        margin-bottom: 20px;
                    }
                    .settings-section h3 {
                        background: #007bff;
                        color: white;
                        padding: 10px;
                        border-radius: 5px;
                    }
                    .settings-item {
                        display: flex;
                        justify-content: space-between;
                        padding: 10px;
                        border-bottom: 1px solid #ddd;
                    }
                    .settings-item label {
                        font-weight: bold;
                    }
                    .settings-item select, .settings-item input {
                        padding: 8px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        width: 50%;
                    }
                    .save-btn {
                        background: #28a745;
                        color: white;
                        padding: 10px 15px;
                        border: none;
                        border-radius: 5px;
                        cursor: pointer;
                        width: 100%;
                        margin-top: 20px;
                    }
                    .save-btn:hover {
                        background: #218838;
                    }
                </style>
            </head>
            <body>
                <div class="settings-container">
                    <div class="settings-header">
                        <h2>Cài đặt hệ thống</h2>
                        <button class="save-btn">Lưu thay đổi</button>
                    </div>
            
                    <div class="settings-section">
                        <h3>Tài khoản</h3>
                        <div class="settings-item">
                            <label>Email:</label>
                            <input type="email" value="user@example.com">
                        </div>
                        <div class="settings-item">
                            <label>Mật khẩu:</label>
                            <input type="password" value="********">
                        </div>
                    </div>
            
                    <div class="settings-section">
                        <h3>Thông báo</h3>
                        <div class="settings-item">
                            <label>Bật thông báo:</label>
                            <select>
                                <option value="on">Bật</option>
                                <option value="off">Tắt</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="settings-section">
                        <h3>Giao diện</h3>
                        <div class="settings-item">
                            <label>Chủ đề:</label>
                            <select>
                                <option value="light">Sáng</option>
                                <option value="dark">Tối</option>
                            </select>
                        </div>
                    </div>
                </div>
            </body>
            </html>
            
            <input type="checkbox" id="notifications" checked>

            <label for="dark-mode">Chế độ tối:</label>
            <input type="checkbox" id="dark-mode">

            <button type="submit">Lưu Cài Đặt</button>
        </form>
    </main>
</div>
