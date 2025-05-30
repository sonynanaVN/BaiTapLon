<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Manager/manager.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="manager.css">
    <title>Dashboard</title>
    <style>
        .content {

            margin-top: 20px;
            width: 90%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .status.active {
            color: green;
            font-weight: bold;
        }
        .status.inactive {
            color: red;
            font-weight: bold;
        }
        .status.pending{
            color: rgb(242, 242, 70);
            font-weight: bold;
        }
        th {
            background: #333;
            color: white;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .action-btn {
            position: relative;
            display: inline-block;
        }
        .dropdown-menu{
            display: none;
            position: absolute;
            width: 180px;
            background: white;
            border: 1px solid #ddd;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            z-index: 1000;
        }
        .action-btn:hover .dropdown-menu{
            display: block;
        }
        button {
            background: #007bff;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
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
    <!-- Nội dung chính -->
    <div class="content">
        <h2>Quản lý Đơn hàng</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Khách hàng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status active">Đã thanh toán</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a><br>
                                <a href="#">💳 Hoàn tiền</a><br>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>