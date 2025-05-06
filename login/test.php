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
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name      = trim($_POST['name']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];
    $repassword = $_POST['repassword'];
    $terms     = isset($_POST['terms']); // checkbox

    if (!$terms) {
        $msg = "Bạn phải đồng ý với điều khoản sử dụng.";
    } elseif ($password !== $repassword) {
        $msg = "Mật khẩu nhập lại không khớp.";
    } else {
        $check = "SELECT * FROM accounts WHERE email = '$email'";
        $result = mysqli_query($conn, $check);

        if (mysqli_num_rows($result) > 0) {
            $msg = "Email đã tồn tại.";
        } else {
            $sql = "INSERT INTO accounts (name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $sql)) {
                $_SESSION['user'] = $email;
                $msg = "Đăng ký thành công!"; // ⚠️ Không chuyển hướng, hiển thị thông báo
            } else {
                $msg = "Lỗi đăng ký: " . mysqli_error($conn);
            }
        }
    }
}



// Xử lý đăng nhập
// Đăng nhập người dùng thường
session_start(); // Bắt buộc phải có

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
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row;
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['login_fail_count'] = 0;
        header("Location: http://localhost/Animated%20Login%20Page/main/MainGuess.php");
        exit();
    } else {
        $_SESSION['login_fail_count']++;

        if ($_SESSION['login_fail_count'] >= 3) {
            header("Location: http://localhost/Animated%20Login%20Page/Error%20Page/");
            exit();
        } else {
            $msg = "Sai email hoặc mật khẩu!";
        }
    }
}

if (isset($_POST['login_admin'])) {
    $admin_email = "admin@gmail.com";
    $admin_pass  = "admin1234";

    $email = $_POST['login_email'] ?? '';
    $password = $_POST['login_password'] ?? '';

    if ($email === $admin_email && $password === $admin_pass) {
        $_SESSION['admin'] = true;
        header("Location: http://localhost/Animated%20Login%20Page/Manager/manager.php");
        exit();
    } else {
        $msg = "Sai email hoặc mật khẩu admin!";
    }
}


?>
<?php if (isset($_GET['msg'])): ?>
    <div class="alert">
        <?= htmlspecialchars($_GET['msg']) ?>
    </div>
<?php endif; ?>
<!-- // khách tự do -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login_guest'])) {
        // Điều hướng tới trang chính của khách
        header("Location: guest-home.php");
        exit();
    }

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
    <?php if (!empty($msg)): ?>
    <script>alert("<?php echo $msg; ?>");</script>
<?php endif; ?>

        <!-- Đăng ký -->
        <div class="form-container sign-up">
    <form method="post" onsubmit="return validateForm()">
        <h2>Đăng ký</h2>
        <input type="text" name="name" placeholder="Tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="repassword" placeholder="Nhập lại mật khẩu" required>

        <div class="checkbox-container">
            <input type="checkbox" name="terms" id="terms">
            <label for="terms">
                Tôi đồng ý với 
                <a href="http://localhost/Animated%20Login%20Page/login/terms.php" target="_blank" rel="noopener">điều khoản sử dụng</a>
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
                <button name="login_user">Đăng nhập người dùng</button><br>
                <button type="submit" name="login_admin">Đăng nhập admin</button><br>
                
            </div>
            <div class="extra-options">
            <a href="http://localhost/Animated%20Login%20Page/login/forgot-password.php" class="link">Quên mật khẩu?</a><br>
            <a href="http://localhost/Animated%20Login%20Page/main/Main.php" class="link">Đăng nhập với tư cách khách tự do</a>
        </div>
        </form>
    </div>


        <!-- Toggle -->
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-paner toggle-left">
                    <h2>Xin chào bạn mới!</h2>
                    <p>Đăng ký để bắt đầu hành trình</p>                               
                    <button class="hidden" onclick="toggleForm()">Đăng nhập</button>
                </div>
                <div class="toggle-paner toggle-right">
                    <h2>Chào mừng trở lại!</h2>
                    <p>Đăng nhập để truy cập</p>
                    <button class="hidden" onclick="toggleForm()">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($msg)): ?>
        <script>alert("<?php echo $msg; ?>");</script>
    <?php endif; ?>
</body>
<script src="scripts.js"></script>
</html>
