<?php
	$id = $_GET["khoa"];
	/*kết nối CSDL*/
	require_once("ketnoi.php");
	/*viết câu lệnh sql xóa*/
	$sql = "delete from theloai where id = $id";
	/*thực thi câu lệnh $sql*/
	$kq = mysqli_query($conn, $sql);
	if($kq)
	{
		/*đóng kết nối*/
		mysqli_close($conn);
		/*quay về trang danhsach.php để hiện thiij ra*/
		header("location:danhsach.php");
	}
	else
	{
		echo "Xóa dữ liệu không thành công " . mysqli_error($conn);
	}
?>