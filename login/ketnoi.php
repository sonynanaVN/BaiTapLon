<?php
$host = "localhost";
$username = "root";
$password = ""; // hoặc mật khẩu MySQL của bạn
$db = "users";

$conn = mysqli_connect($host, $username, $password, $db) or die("Kết nối CSDL không thành công");
/*thiết lập mã tiếng Việt*/
mysqli_set_charset($conn, "utf8");
?>
