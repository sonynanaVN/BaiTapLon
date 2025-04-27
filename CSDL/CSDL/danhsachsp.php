<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Danh sách thể loại</title>
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		.container{
			width: 85%;
			margin: auto;
		}
		.item{
			width: 28%;
			height: 300px;
			margin: 20px 2%;
			float: left;
			border: 1px solid black;
		}
	</style>
</head>
<body>
<?php
	/*B1: kết nối CSDL*/
	require_once("ketnoi.php");
	/*B2: viết câu lệnh sql dùng để lấy dữ liệu trong table theloai*/
	$sql = "select * from theloai limit 2";
	$kq = mysqli_query($conn, $sql);
	/*$kq trả về trong câu lệnh select sẽ là 1 bảng*/
	//$row = mysqli_fetch_assoc($kq);
?>
	<div class="container">
	<?php
		while($row = mysqli_fetch_assoc($kq))
		{
	?>
			<div class="item">
				<h2>
					<?php
						echo $row["ten"];
					?>
				</h2>
				<img src="images/<?php echo $row['image']; ?>">
			</div>
	<?php
		}
	?>
	</div>
</body>
</html>