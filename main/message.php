<?php
require_once("ketnoi.php");

// Nhận dữ liệu POST
$message = $_POST['message'] ?? '';


// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lưu tin nhắn nếu không rỗng
if (!empty(trim($message))) {
    $stmt = $conn->prepare("INSERT INTO messages (content) VALUES (?)");
    $stmt->bind_param("s", $message);
    $stmt->execute();
    echo "Tin nhắn đã được lưu!";
    $stmt->close();
} else {
    echo "Tin nhắn rỗng!";
}

$conn->close();
?>
