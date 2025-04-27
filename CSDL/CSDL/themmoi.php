<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm mới thể loại</title>
</head>
<body>
<?php
	/*kiểm tra người dùng đã nhấn nút Thêm mới chưa*/
	if(isset($_POST["btnThem"]))
	{
		/*lấy dữ liệu trên form -> thêm vào bảng theloai*/
		$ten = $_POST['txtTen'];
		$thutu = $_POST["txtThutu"];
		$anhien = $_POST["sltAn"];
		/*B1: kết nối CSDL*/
		require_once("Ketnoi.php");
		/*B2: viết câu lệnh sql chèn dữ liệu vào bảng thể loại*/
		$sql = "insert into theloai(tenn, thutu, anhien)
							values('$ten', $thutu, $anhien)";
		/*B3: thực thi câu lệnh -> trả về biến $kq*/
		$kq = mysqli_query($conn, $sql);
		/*$kq trong câu lệnh sql insert/update/delete trả về giá trị true/false*/
		/*thêm mới thành công*/
		if($kq)
		{
			/*đóng kết nối*/
			mysqli_close($conn);
			/*quay về trang danhsach.php để hiện thiij ra*/
			header("location:danhsach.php");
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
				<td>Tên thể loại</td>
				<td>
					<input type="text" required name="txtTen">
				</td>
			</tr>
			<tr>
				<td>Thứ tự</td>
				<td>
					<input type="number" name="txtThutu" required>
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