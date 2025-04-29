<?php
session_start();
require_once('ketnoi.php');

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $check);

    if (mysqli_num_rows($result) > 0) {
        $error = "Email đã tồn tại.";
    } else {
        $sql = "INSERT INTO accounts (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['user'] = $email;
            header("Location: main/Main.php");
            exit();
        } else {
            $error = "Lỗi đăng ký: " . mysqli_error($conn);
        }
    }
}

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM accounts WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($pass, $row['password'])) {
            $_SESSION['user'] = $email;
            header("Location: main/Main.php");
            exit();
        } else {
            $error = "Sai mật khẩu!";
        }
    } else {
        $error = "Không tìm thấy tài khoản!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modern Login Page | Sony</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Kalnia+Glaze:wght@100..700&family=Montserrat+Underline:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
  </head>
  <body>
    <?php if (isset($error)) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>
    <div class="container" id="container">
      <!-- Phần đăng ký -->
      <div class="form-container sign-up">
        <form id="registerForm" method="post">
          <input type="hidden" name="register" value="1" />
          <h1>Create Account</h1>
          <div class="social-icons">
            <a href="https://accounts.google.com/signup" target="_blank" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="https://www.facebook.com/r.php" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://github.com/signup" target="_blank" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/signup" target="_blank" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <span>or use your email for registration</span>
          <input type="text" name="name" placeholder="Name" required/>
          <input type="email" name="email" placeholder="Email" required/>
          <input type="password" name="password" placeholder="Password" required/>
          <div class="checkbox-container">
            <input type="checkbox" id="terms" required />
            <label for="terms">Tôi đã đọc và đồng ý với <a href="/Manager/Chínhsáchvàbảomật.html" target="_blank">Chính sách</a> và <a href="/Manager/Chínhsáchvàbảomật.html" target="_blank">Bảo mật</a>.</label>
          </div>
          <button type="submit">Register</button>
        </form>
      </div>

      <!-- Phần đăng nhập -->
      <div class="form-container sign-in">
        <form id="loginform" method="post">
          <input type="hidden" name="login" value="1" />
          <h1>Sign In</h1>
          <div class="social-icons">
            <a href="https://accounts.google.com/signin" target="_blank" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
            <a href="https://www.facebook.com/login/" target="_blank" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://github.com/login" target="_blank" class="icon"><i class="fa-brands fa-github"></i></a>
            <a href="https://www.linkedin.com/login" target="_blank" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
          <span>or use your email for password</span>
          <input type="email" name="username" placeholder="Email" required />
          <input type="password" name="password" placeholder="Password" required/>
          <button type="submit">Sign In</button>
        </form>
      </div>

      <div class="toggle-container">
        <div class="toggle">
          <div class="toggle-paner toggle-left">
            <h1>Hello New Friend!</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="login">Sign In</button>
          </div>
          <div class="toggle-paner toggle-right">
            <h1>Welcome back</h1>
            <p>Enter your personal details to use all of site features</p>
            <button class="hidden" id="register">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <footer>
      <p>&copy; 2025 Sony. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>
  </body>
</html>
