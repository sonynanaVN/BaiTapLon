<?php
// session_start();

// $host = "localhost";
// $user = "root";
// $pass = ""; // mật khẩu MySQL nếu có
// $db   = "users";

// $conn = new mysqli($host, $user, $pass, $db);
require_once("ketnoi.php");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$msg = "";

// Xử lý đăng ký
if (isset($_POST['register'])) {
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $repassword = $_POST['repassword'];
    $terms      = isset($_POST['terms']);

    if ($password !== $repassword) {
        $msg = "Mật khẩu không khớp!";
    } elseif (!$terms) {
        $msg = "Bạn phải đồng ý với điều khoản của chúng tôi :U ";
    } else {
        $check = "SELECT id FROM accounts WHERE email = '$email'";
        $result = $conn->query($check);

        if ($result->num_rows > 0) {
            $msg = "Email đã tồn tại!";
        } else {
            $sql = "INSERT INTO accounts (name, email, password) VALUES ('$name', '$email', '$password')";
            if ($conn->query($sql) === TRUE) {
                
                $_SESSION['new_user'] = [
                    'name' => $name,
                    'email' => $email
                ];
                header("Location:http://localhost/Animated%20Login%20Page/login/test.php"); 
                $msg = "Đăng ký thành công!Vui lòng đăng nhập để tiếp tục";
                exit();
            } else {
                $msg = "Lỗi: " . $conn->error;
            }
        }
    }
}

// Xử lý đăng nhập
// Đăng nhập người dùng thường
if (isset($_POST['login_user'])) {
    $email    = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Khởi tạo biến đếm nếu chưa có
    if (!isset($_SESSION['login_fail_count'])) {
        $_SESSION['login_fail_count'] = 0;
    }

    $sql = "SELECT * FROM accounts WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $_SESSION['user'] = $result->fetch_assoc();
        $_SESSION['login_fail_count'] = 0;
        header("Location: http://localhost/Animated%20Login%20Page/main/Main.php");
        exit();
    } else {
        $_SESSION['login_fail_count']++;

        if ($_SESSION['login_fail_count'] >= 5) {
            header("Location: http://localhost/Animated%20Login%20Page/Error%20Page/");
            exit();
        } else {
            $msg = "Sai email hoặc mật khẩu!";
        }
    }
}


// Đăng nhập admin cố định
if (isset($_POST['login_admin'])) {
    $admin_email = "admin@gmail.com";
    $admin_pass  = "admin123";

    $_SESSION['admin'] = true;
    header("Location: http://localhost/Animated%20Login%20Page/Manager/manager.php");
    exit();
}
if (isset($_POST['terms'])) {
    header("Location: login/terms.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng nhập & Đăng ký</title>
    <link rel="stylesheet" href="style1.css"> 
    <script>
        function toggleForm() {
            document.querySelector('.container').classList.toggle('active');
        }
    </script>
</head>
<body>
    <div class="container" id="container">
        <!-- Đăng ký -->
        <div class="form-container sign-up">
            <form method="post">
                <h2>Đăng ký</h2>
                <input type="text" name="name" placeholder="Tên" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mật khẩu" required>
                <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>
                <div class="checkbox-container">
                    <input type="checkbox" name="terms" id="terms">
                    <label for="terms">Tôi đồng ý với <?php echo '<a href="http://localhost/Animated%20Login%20Page/login/terms.php" target="_blank" rel="noopener">điều khoản sử dụng</a>'; ?>
</label>
                </div>
                <button name="register">Đăng ký</button>
            </form>
        </div>

        <!-- Đăng nhập -->
<!-- Đăng nhập -->
    <div class="form-container sign-in">
        <form method="post">
            <h2>Đăng nhập</h2>
            <input type="email" name="login_email" placeholder="Email" required>
            <input type="password" name="login_password" placeholder="Mật khẩu" required>

            <div class="login-buttons">
                <button name="login_user">Người dùng</button>
                <button type="submit" name="login_admin">Đăng nhập admin</button>
            </div>
        </form>
    </div>


        <!-- Toggle -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-paner toggle-left">
                    <h2>Chào mừng trở lại!</h2>
                    <p>Đăng nhập để truy cập</p>
                    <button class="hidden" onclick="toggleForm()">Đăng nhập</button>
                </div>
                <div class="toggle-paner toggle-right">
                    <h2>Xin chào bạn mới!</h2>
                    <p>Đăng ký để bắt đầu hành trình</p>
                    <button class="hidden" onclick="toggleForm()">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($msg)): ?>
        <script>alert("<?php echo $msg; ?>");</script>
    <?php endif; ?>
</body>
<script src="script.js"></script>
</html>
