<?php
	/*B1: kết nối CSDL*/
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "users";
	$conn = mysqli_connect($server, $username, $password, $db) or die("Kết nối CSDL không thành công");
	/*thiết lập mã tiếng Việt*/
	mysqli_set_charset($conn, "utf8");
?>