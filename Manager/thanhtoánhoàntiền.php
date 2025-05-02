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
            height: 300px;
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
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            border-radius: 5px;
            padding: 5px 0;
            min-width: 180px;
            z-index: 1000;
            white-space: nowrap;
        }
        .dropdown-menu a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }
        .dropdown-menu a:hover {
            background: #f1f1f1;
        }
        .action-btn:hover .dropdown-menu {
            display: block;
        }
        .payment-section, .refund-section {
            margin-top: 20px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0,0,0,0.1);
            width: 80%;
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
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Quản lý</h2>
        <ul>
            <li><a href="http://localhost/Animated%20Login%20Page/Manager/manager.php"><i class="fas fa-home"></i> Doanh thu</a></li>
            <li>
                <a href=""><i class="fas fa-user-cog"></i> Trình quản lý </a>
                <ul class="submenu">
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/user/Users.php">📂 Quản lý tài khoản</a></li>
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/Tr%c3%acnhqu%e1%ba%a3nl%c3%bds%e1%ba%a3nph%e1%ba%a9m.php  ">📋 Trình thêm sản phẩm</a></li>
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
                <li><a href="/Manager/User.html">💬 Hỗ trợ khách hàng</a></li>
            </ul></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Cài đặt</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/setting.php">⚙️ Cài đặt chung</a></li>
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Ch%c3%adnhs%c3%a1chv%c3%a0b%e1%ba%a3om%e1%ba%adt.php">🔒Chính sách bảo mật & Quyền riêng tư</a></li>
            </ul></li>
            <li id="logout"><a href="http://localhost/Animated%20Login%20Page/login/test.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
        <h2>Quản lý Đơn thanh toán</h2>
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
                                <a href="#">📦 Xác nhận giao hàng</a>
                                <a href="#payment">💳 Thanh toán</a>
                                <a href="#refund">💰 Hoàn tiền</a>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1002</td>
                    <td>Trần Thị B</td>
                    <td>750.000₫</td>
                    <td><span class="status inactive">Yêu cầu hoàn tiền</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a>
                                <a href="#payment">💳 Thanh toán</a>
                                <a href="#refund">💰 Hoàn tiền</a>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status inactive">Yêu cầu hoàn tiền</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a>
                                <a href="#payment">💳 Thanh toán</a>
                                <a href="#refund">💰 Hoàn tiền</a>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>1001</td>
                    <td>Nguyễn Văn A</td>
                    <td>1.500.000₫</td>
                    <td><span class="status inactive">Yêu cầu hoàn tiền</span></td>
                    <td>
                        <div class="action-btn">
                            <button>Chỉnh sửa</button>
                            <div class="dropdown-menu">
                                <a href="#">📦 Xác nhận giao hàng</a>
                                <a href="#payment">💳 Thanh toán</a>
                                <a href="#refund">💰 Hoàn tiền</a>
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
                                <a href="#">📦 Xác nhận giao hàng</a>
                                <a href="#payment">💳 Thanh toán</a>
                                <a href="#refund">💰 Hoàn tiền</a>
                                <a href="#">🚫 Hủy đơn</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div id="payment" class="payment-section">
            <h3>Thanh toán đơn hàng</h3>
            <label for="payment-method">Phương thức thanh toán:</label>
            <select id="payment-method">
                <option value="credit">Thẻ tín dụng</option>
                <option value="bank">Chuyển khoản ngân hàng</option>
                <option value="cash">Tiền mặt</option>
            </select>
            <button>Tiến hành thanh toán</button>
        </div>
        <div id="refund" class="refund-section">
            <h3>Hoàn tiền đơn hàng</h3>
            <label for="refund-reason">Lý do hoàn tiền:</label>
            <input type="text" id="refund-reason" placeholder="Nhập lý do hoàn tiền">
            <button>Thực hiện hoàn tiền</button>
        </div>
    </div>
</body>
</html>