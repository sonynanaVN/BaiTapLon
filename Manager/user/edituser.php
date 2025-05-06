<?php
require_once("ketnoi.php");
if ($conn->connect_error) {
    die("Lỗi kết nối: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $stmt = $conn->prepare("UPDATE accounts SET name=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $password, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Đã cập nhật thành công!'); window.location.href='http://localhost/Animated%20Login%20Page/Manager/user/Users.php';</script>";
        } else {
            echo "Lỗi: " . $stmt->error;
        }
    }

    $user = $conn->query("SELECT * FROM accounts WHERE id = $id")->fetch_assoc();
} else {
    header("Location: http://localhost/Animated%20Login%20Page/Manager/user/Users.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa người dùng</title>
</head>
<body>
    <h2>✏️ Chỉnh sửa người dùng</h2>
    <form method="POST">
        <label>Tên:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br><br>

        <label>Mật khẩu:</label><br>
        <input type="text" name="password" value="<?= htmlspecialchars($user['password']) ?>" required><br><br>

        <button type="submit">Lưu thay đổi</button>
        <a href="http://localhost/Animated%20Login%20Page/Manager/user/Users.php">Hủy</a>
    </form>
</body>
</html>
