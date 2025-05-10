<?php
$host = "localhost";
$username = "root";
$password = ""; 
$db = "giohang_db";
$conn = mysqli_connect($host, $username, $password, $db) or die("Kết nối CSDL không thành công");
mysqli_set_charset($conn, "utf8");
?>
