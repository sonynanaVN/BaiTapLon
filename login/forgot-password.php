<?php
require_once("ketnoi.php"); // Kết nối DB

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    
    $stmt = $conn->prepare("SELECT id FROM accounts WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>
            alert('Đã gửi liên kết đặt lại mật khẩu tới $email');
            window.location.href='test.php';
        </script>";
    } else {

        echo "<script>
            alert('Email không tồn tại trong hệ thống.');
        </script>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
    body {
        background-color: #c9d6ff;
        background-image: url(BannerMilk.jpg);
        background-size: cover; 
        background-position: center; 
        background-repeat: no-repeat; 
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 100vh;
    }
    form{
        background-color: rgba(255, 255, 255, 0.8);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 300px;
    }
</style>
<body>
    <div class="container">
        <div class="form-container">
            <form id="forgotPasswordForm" method="POST" action="">
                <h1>Forgot Password</h1>
                <p>Enter your email address and we will send you a reset link.</p>
                <input type="email" name="email" id="email" placeholder="Enter your email" required>
                <button type="submit">Send Reset Link</button>
                <a href="test.php">Back to Login</a>
            </form>
        </div>
    </div>
</body>
</html>
