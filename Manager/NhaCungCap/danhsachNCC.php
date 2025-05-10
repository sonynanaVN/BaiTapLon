<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danh sách thể loại</title>
	<link rel="stylesheet" href="../manager.css">
</head>
<style>
	body {
    font-family: Arial, sans-serif;
    background-image: url('background.jpg'); /* Đặt tên ảnh nền của bạn */
    background-size: cover;
    background-attachment: fixed;
}

table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #f2f2f2;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: center;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    color: #45a049;
    text-decoration: underline;
}
</style>
<body>
<div class="sidebar">
        <h2>Quản lý</h2>
        <ul>
            <li><a href="../manager.php"><i class="home"></i> Doanh thu</a></li>
            <li>
                <a href=""><i class="user"></i> Trình quản lý </a>
                <ul class="submenu">
                    <li><a href="../user/Users.php">📂 Quản lý tài khoản</a></li>
                    <li><a href="../Trìnhquảnlýsảnphẩm.php">📋 Trình thêm sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="bill"></i> Đơn thanh toán</a>
                <ul class="submenu">
                    <li><a href="../Quảnlýđơnhàng.php">🛒 Quản lý đơn hàng</a></li>
                    <li><a href="../thanhtoánhoàntiền.php">💳 Thanh toán & Hoàn tiền </a></li>
                </ul></li>
            <li><a href="#"><i class="store"></i> Kho hàng</a><ul class="submenu">
                <li><a href="../Kho.php">📊 Tồn kho & Nhập xuất hàng</a></li>
                <li><a href="NhaCungCap/danhsachNCC.php">🚚 Quản lý nhà cung cấp</a></li>
            </ul></li>
            <li><a href="#"><i class="Support user"></i> Hỗ trợ người dùng</a><ul class="submenu">
                <li><a href="../messenger/Hỗtrợkháchhàng.php">💬 Hỗ trợ khách hàng</a></li>
            </ul></li>
            <li><a href="#"><i class="config"></i> Cài đặt</a><ul class="submenu">
                <li><a href="../setting.php">⚙️ Cài đặt chung</a></li>
                <li><a href="../Chínhsáchvàbảomật.php">🔒Chính sách bảo mật & Quyền riêng tư</a></li>
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
<?php
	/*B1: kết nối CSDL*/
	require_once("ketnoi.php");
	/*B2: viết câu lệnh sql dùng để lấy dữ liệu trong table theloai*/
	$sql = "select * from nhacungcap ";
	$kq = mysqli_query($conn, $sql);
	/*$kq trả về trong câu lệnh select sẽ là 1 bảng*/
	//$row = mysqli_fetch_assoc($kq);
?>
	<table border="1">
		<!-- hàng tiêu đề -->
		<tr>
			<td>Tên nhà cung cấp</td>
			<td>Địa chỉ</td>
			<td>Ẩn hiện</td>
			<td colspan="2"><a href="themmoi.php">Thêm</a></td>
		</tr>
		<!-- Các hàng nội dung -->
		<?php
			while($row = mysqli_fetch_assoc($kq))
			{
		?>
				<tr>
					<td>
						<?php
							//echo $row["id"];
							echo $row["ten"];
						?>
					</td>
					<td>
						<?php
							
							echo $row["diachi"];
						?>
					</td>
					<td>
						<?php
							if($row["anhien"] == 1)
								echo "Hiện";
							else
								echo "Ẩn";
						?>
					</td>
					<td><a href="capnhat.php?khoa=<?php echo $row['id']; ?>">Cập nhật</a> </td>
					<td><a href="xoa.php?khoa=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa hay không?')">Xóa</a> </td>
				</tr>
		<?php
			}
			/*B4: đóng kết nối CSDL*/
			mysqli_close($conn);
		?>
		
	</table>
</body>
</html>