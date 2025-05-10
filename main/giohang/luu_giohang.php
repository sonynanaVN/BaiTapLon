<?php
// Kết nối CSDL
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "giohang_db";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Nhận dữ liệu từ Ajax
$data = json_decode(file_get_contents("php://input"), true);

if (!empty($data['items'])) {
    foreach ($data['items'] as $item) {
        $ten = $conn->real_escape_string($item['name']);
        $so_luong = (int) $item['quantity'];
        $don_gia = (int) $item['price'];
        $tong = $so_luong * $don_gia;

        $sql = "INSERT INTO giohang (ten_san_pham, so_luong, don_gia, tong_tien)
                VALUES ('$ten', $so_luong, $don_gia, $tong)";
        $conn->query($sql);
    }

    echo json_encode(["status" => "success", "message" => "Đã lưu giỏ hàng."]);
} else {
    echo json_encode(["status" => "error", "message" => "Không có dữ liệu."]);
}

$conn->close();
?>
