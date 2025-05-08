<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm mới thể loại</title>
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
<?php
	/*kiểm tra người dùng đã nhấn nút Thêm mới chưa*/
	if(isset($_POST["btnThem"]))
	{
		/*lấy dữ liệu trên form -> thêm vào bảng theloai*/
		$ten = $_POST['txtTen'];
		$diachi = $_POST["txtDiaChi"];
		$anhien = $_POST["sltAn"];
		/*B1: kết nối CSDL*/
		require_once("ketnoi.php");
		/*B2: viết câu lệnh sql chèn dữ liệu vào bảng thể loại*/
		$sql = "insert into nhacungcap(ten, diachi, anhien)
							values('$ten', '$diachi', $anhien)";
		/*B3: thực thi câu lệnh -> trả về biến $kq*/
		$kq = mysqli_query($conn, $sql);
		/*$kq trong câu lệnh sql insert/update/delete trả về giá trị true/false*/
		/*thêm mới thành công*/
		if($kq)
		{
			/*đóng kết nối*/
			mysqli_close($conn);
			/*quay về trang danhsach.php để hiện thiij ra*/
			header("location:danhsachNCC.php");
		}
		else
		{
			echo "Thêm mới dữ liệu không thành công " . mysqli_error($conn);
		}
	}
?>
	<form method="post">
		<table>
			<tr>
				<td>Tên nhà cung cấp</td>
				<td>
					<input type="text" required name="txtTen">
				</td>
			</tr>
			<tr>
				<td>Địa chỉ</td>
				<td>
					<input type="text" name="txtDiaChi" required>
				</td>
			</tr>
			<tr>
				<td>Ẩn hiện</td>
				<td>
					<select name="sltAn">
						<option value="0">Ẩn</option>
						<option value="1">Hiện</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Thêm" name="btnThem">
				</td>
				<td>
					<input type="reset" value="Hủy" name="btnHuy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>