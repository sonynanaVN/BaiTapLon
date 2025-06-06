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

        h1, h2 {
            color: #2c3e50;
        }
        .container {
            margin-left: 20px;
            padding: 20px;
            border-radius: 8px;
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
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/Qu%e1%ba%a3nl%c3%bd%c4%91%c6%a1nh%c3%a0ng.php">📋 Trình thêm sản phẩm</a></li>
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
                <img src="/login/OIP.jpg" alt="Avatar">
                <div class="dropdown">
                    <p>Thông tin tài khoản</p>
                    <p>Ghi chú</p>
                </div>
            </div>
            <div class="logo">
                <img src="/main/Logo_DutchLady_1.png" alt="Logo">
            </div>
        </div>
    <!-- Nội dung chính -->
    <div class="container">
        <h1>Chính Sách Bảo Mật</h1>
        <p>Công ty cổ phần sữa Việt Nam (“Dutch Lady”) hiểu rõ tầm quan trọng và tôn trọng quyền bảo mật thông tin cá nhân của người dùng.</p>
        
        <h2>I. Mục đích thu thập thông tin</h2>
        <p>Công ty cổ phần sữa Việt Nam (“Vinamilk”)hiểu rõ tầm quan trọng và tôn trọng quyền bảo mật thông tin cá nhân (“Thông tin”) của người truy cập website Vinamilk. Với Chính sách bảo mật thông tin sẽ cung cấp nội dung tổng quan nhằm minh bạch hóa mục đích thu thập thông tin; phạm vi và phương thức thu thập thông tin; phạm vi sử sụng, đối tượng tiếp cận, thời gian lưu trữ thông tin; các liên kết và sản phẩm của bên thứ ba trên website; cam kết bảo mật thông tin; quyền lợi và trách nhiệm của người dùng; thông tin và phương thức liên hệ được nêu tại Chính sách này.</p>
        
        <h2>II. Phạm vi sử dụng thông tin</h2>
        <p>Thông tin thu thập được sử dụng để:</p>
        <ul>
            <li>Duy trì liên lạc, hỗ trợ khách hàng.</li>
            <li>Gửi thông tin khuyến mãi, tiếp thị.</li>
            <li>Phân tích thị trường và tối ưu hóa trải nghiệm người dùng.</li>
        </ul>
        
        <h2>III. Phạm vi thu thập thông tin</h2>
        <p>Chúng tôi thu thập các thông tin bao gồm:</p>
        <ul>
            <li>Họ tên</li>
            <li>Số điện thoại</li>
            <li>Email</li>
            <li>Địa chỉ</li>
        </ul>
        <p>Cho từng, mục đích thu thập cụ thể khác, tùy từng thời điểm Vinamilk có thể yêu cầu người dùng cung cấp thêm một số Thông tin nhằm đảm bảo việc sử dụng của chính người dùng hoặc đảm bảo sự liên hệ giữa Vinamilk và người dùng được thông suốt, thuận tiện.</p>
        <h2>IV. Thời gian lưu trữ thông tin</h2>
        <p>Dữ liệu cá nhân của người dung sẽ được lưu trữ cho đến khi có yêu cầu hủy bỏ từ khách hàng. Còn lại trong mọi trường hợp thông tin cá nhân thành viên sẽ được bảo mật trên máy chủ của Website vinamilk.com.vn.

        <br> * Địa chỉ của đơn vị thu thập và quản lý thông tin cá nhân
            
        <br>    CÔNG TY CỔ PHẦN SỮA VIỆT NAM (VINAMILK)
            
        <br>    Địa chỉ trụ sở: 10 Tân Trào, Phường Tân Phú, Quận 7, Tp Hồ Chí Minh
            
        <br>    Điện thoại: 08. 54.155.555 Fax: 08.54.161 226
            
        <br>    Email:dutchlady@vinamilk.com.vn</p>
        
        <h2>V. Phương tiện tiếp cận và chỉnh sửa dữ liệu</h2>
        <p>- Người dung có quyền tự kiểm tra, cập nhật, điều chỉnh thông tin cá nhân của mình bằng cách đăng nhập vào tài khoản và chỉnh sửa thông tin cá nhân hoặc yêu cầu ban quản lý website vinamilk.com.vn thực hiện việc này.

        <br> - Người dung có quyền gửi khiếu nại về việc lộ thông tin cá nhân cho bên thứ 3 đến ban quản trị website vinamilk.com.vn. Khi tiếp nhận những phản hồi này, ban quản lý website xác nhận lại thông tin, phải có trách nhiệm trả lời lý do và hướng dẫn người dùng khôi phục và bảo mật lại thông tin.</p>
        
        <h2>VI. Cam kết bảo mật thông tin khách hàng</h2>
        <p>- Thông tin cá nhân của thành viên trên vinamilk.com.vn được cam kết bảo mật tuyệt đối theo chính sách bảo vệ thông tin cá nhân của vinamilk.com.vn . Việc thu thập và sử dụng thông tin của mỗi thành viên chỉ được thực hiện khi có sự đồng ý của người dùngđó trừ những trường hợp pháp luật có quy định khác.

        <br>   - Không sử dụng, không chuyển giao, cung cấp hay tiết lộ cho bên thứ 3 nào về thông tin cá nhân của thành viên khi không có sự cho phép đồng ý từ thành viên.
            
        <br>   - Trong trường hợp máy chủ lưu trữ thông tin bị hacker tấn công dẫn đến mất mát dữ liệu cá nhân, vinamilk.com.vn sẽ có trách nhiệm thông báo vụ việc cho cơ quan chức năng điều tra xử lý kịp thời và thông báo cho thành viên được biết.
            
        <br>  - Bảo mật tuyệt đối mọi thông tin giao dịch trực tuyến của thành viên bao gồm thông tin hóa đơn chứng từ số hóa tại khu vực dữ liệu trung tâm an toàn của vinamilk.com.vn.</p>
        
        <h2>VII. Khiếu nại về thông tin cá nhân</h2>
        <p>Nếu có khiếu nại liên quan đến việc sử dụng thông tin cá nhân, khách hàng có thể liên hệ:</p>
        <p>Điện thoại: (028) 54 155 555</p>
        <p>Email: dutchlady@dutchlady.com.vn</p>
    </div>
</body>
</html>