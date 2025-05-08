<?php
session_start();
$id = $_GET["id"];
require_once("ketnoi.php");
$sql = "select * from accounts where id = $id";
$kq = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($kq);
if (isset($_POST["btnCapnhat"])) {
    $ten = $_POST["name"];
    $email = $_POST["email"];

    $password = $_POST["password"];
    require_once("ketnoi.php");

    $sql = "UPDATE accounts SET name = '$ten', email = '$email', password = '$password' WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        mysqli_close($conn);
 
        header("Location: Users.php");
        exit();
    } else {

        echo "Cập nhật không thành công: " . mysqli_error($conn);
        mysqli_close($conn);
    }
}

?>
<style>
    h2{
        text-align: center;
    }
    form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color:#32F9F9;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

label {
    font-size: 16px;
    margin-bottom: 5px;
    display: block;
}

input[type="text"], input[type="email"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button, a {
    display: inline-block;
    padding: 10px 15px;
    margin: 5px 0;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}
#btn:hover{
    background-color:green
}



</style>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa người dùng</title>
    <link rel="stylesheet" href="../manager.css">
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
    <h2>✏️ Chỉnh sửa người dùng</h2>
    <form method="POST">
        <label>Tên:</label><br>
        <input type="text" required name="name" value="<?php echo $row['name']; ?>">

        <label>Email:</label><br>
        <input type="text" name="email" required value="<?php echo $row['email']; ?>">

        <label>Mật khẩu:</label><br>
        <input type="text" name="password" required value="<?php echo $row['password']; ?>">

        <td>
			<input type="submit" value="Cập nhật" name="btnCapnhat">
		</td>
        <a id="btn" href="http://localhost/Animated%20Login%20Page/Manager/user/Users.php">Hủy</a>
    </form>
</body>
</html>
