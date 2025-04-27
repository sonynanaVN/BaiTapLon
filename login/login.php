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
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email && $password) {
        // Kiểm tra tài khoản có trong database không
        $stmt = $conn->prepare("SELECT * FROM accounts WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);

        if ($stmt->rowCount() > 0) {
            echo "Đăng nhập thành công";
            header("Location:index.php");//

        } else {
            echo "Email hoặc mật khẩu không đúng!";
        }
    } else {
        echo "Vui lòng nhập đầy đủ email và mật khẩu!";
    }
}
?>
