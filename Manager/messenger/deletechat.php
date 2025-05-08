<?php
    session_start();
	$id = $_GET["id"];
	/*kết nối CSDL*/
	require_once("ketnoi.php");
	/*viết câu lệnh sql xóa*/
	$sql = "delete from messages where id = $id";
	/*thực thi câu lệnh $sql*/
	$kq = mysqli_query($conn, $sql);
	if($kq)
	{
		/*đóng kết nối*/
		mysqli_close($conn);
		header("location:Hỗtrợkháchhàng.php");
	}
	else
	{
		echo "Xóa dữ liệu không thành công " . mysqli_error($conn);
	}
?>