<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "chat_db";

// Nhận dữ liệu POST
$message = $_POST['message'] ?? '';

// Kết nối MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

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
