<?php
$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Đã xoá người dùng!'); window.location.href='http://localhost/Animated%20Login%20Page/Manager/user/Users.php';</script>";
    } else {
        echo "Lỗi khi xoá: " . $stmt->error;
    }
} else {
    header("Location: http://localhost/Animated%20Login%20Page/Manager/user/Users.php");
    exit();
}
?>
