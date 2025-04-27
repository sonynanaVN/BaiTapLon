<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cập nhật thể loại</title>
</head>
<body>
<?php
	/*Giai đoạn 1: Đưa dữ liệu cũ lên form*/
	/*lấy id từ trang danhsach.php chuyển sang bằng biến có tên là khoa*/
	$id = $_GET["khoa"];
	//echo $id;
	/*lấy những thông tin liên quan đến $id ở trên*/
	/*Kết nối CSDL*/
	require_once("ketnoi.php");
	/*Viết câu lệnh sql lọc dữ liệu*/
	$sql = "select * from theloai where id = $id";
	/*Thực hiện câu $sql ở trên*/
	$kq = mysqli_query($conn, $sql);
	/*$kq là 1 table, chỉ có 1 hàng*/
	/*Lấy hàng duy nhất đó ra*/
	$row = mysqli_fetch_assoc($kq);
	/*đưa thông tin trong $row vào form bên dưới*/
	/*Giai đoạn 2: Cập nhật dữ liệu mới*/
	if(isset($_POST["btnCapnhat"]))
	{
		/*lấy dữ liệu trên form -> thêm vào bảng theloai*/
		$ten = $_POST['txtTen'];
		$thutu = $_POST["txtThutu"];
		$anhien = $_POST["sltAn"];
		/*B1: kết nối CSDL*/
		//require_once("Ketnoi.php");
		/*B2: viết câu lệnh sql chèn dữ liệu vào bảng thể loại*/
		$sql = "update theloai ten = $ten, thutu = $thutu, anhien = $anhien
								where id = $id";
		/*B3: thực thi câu lệnh -> trả về biến $kq*/
		$kq = mysqli_query($conn, $sql);
		/*$kq trong câu lệnh sql insert/update/delete trả về giá trị true/false*/
		/*cập nhật thành công*/
		if($kq)
		{
			/*đóng kết nối*/
			mysqli_close($conn);
			/*quay về trang danhsach.php để hiện thiij ra*/
			header("location:danhsach.php");
		}
		else
		{
			echo "Cập nhật dữ liệu không thành công " . mysqli_error($conn);
		}
	}
?>
	<form method="post">
		<table>
			<tr>
				<td>Tên thể loại</td>
				<td>
					<input type="text" required name="txtTen" value="<?php echo $row['ten']; ?>">
				</td>
			</tr>
			<tr>
				<td>Thứ tự</td>
				<td>
					<input type="number" name="txtThutu" required value="<?php echo $row['thutu']; ?>">
				</td>
			</tr>
			<tr>
				<td>Ẩn hiện</td>
				<td>
					<select name="sltAn">
						<option value="0"
							<?php
								if($row["anhien"] == 0)
									echo "selected";
							?>
						>Ẩn</option>
						<option value="1" 
							<?php
								if($row["anhien"] == 1)
									echo "selected";
							?>
						>Hiện</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="submit" value="Cập nhật" name="btnCapnhat">
				</td>
				<td>
					<input type="reset" value="Hủy" name="btnHuy">
				</td>
			</tr>
		</table>
	</form>
</body>
</html>