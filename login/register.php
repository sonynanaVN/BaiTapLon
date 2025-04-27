<?php
$host = 'localhost';
$dbname = 'users';
$username = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Không kết nối được Database: " . $e->getMessage();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($name && $email && $password) {
        // Kiểm tra email trùng
        $check = $conn->prepare("SELECT id FROM accounts WHERE email = ?");
        $check->execute([$email]);
        if ($check->rowCount() > 0) {
            echo "Email đã tồn tại!";
        } else {
            $stmt = $conn->prepare("INSERT INTO accounts (name, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $password]);

            echo "Đăng ký thành công,vui lòng đăng nhập lại trên cổng login";
            header("Location: main/Main.php");// Chỉ trả text để script.js đọc
        }
    } else {
        echo "Vui lòng nhập đầy đủ thông tin!";
    }
}
?>
