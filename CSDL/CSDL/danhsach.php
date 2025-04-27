<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danh sách thể loại</title>
</head>
<body>
<?php
	/*B1: kết nối CSDL*/
	require_once("ketnoi.php");
	/*B2: viết câu lệnh sql dùng để lấy dữ liệu trong table theloai*/
	$sql = "select * from theloai";
	$kq = mysqli_query($conn, $sql);
	/*$kq trả về trong câu lệnh select sẽ là 1 bảng*/
	//$row = mysqli_fetch_assoc($kq);
?>
	<table border="1">
		<!-- hàng tiêu đề -->
		<tr>
			<td>Tên thể loại</td>
			<td>Thứ tự</td>
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
							
							echo $row["thutu"];
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