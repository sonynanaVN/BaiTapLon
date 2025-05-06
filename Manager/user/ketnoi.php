<?php
	$server = "localhost";
	$username = "root";
	$password = "";
	$db = "shop";
	$conn = mysqli_connect($server, $username, $password, $db) or die("Kết nối CSDL không thành công");
	mysqli_set_charset($conn, "utf8");
?>