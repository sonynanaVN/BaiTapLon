<?php
// Kết nối CSDL
$host = 'localhost';
$db = 'shop';
$user = 'root'; // chỉnh nếu cần
$pass = '';     // chỉnh nếu cần
$conn = new mysqli($host, $user, $pass, $db);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách sản phẩm
$sql = "SELECT * FROM products ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        .product {
            border: 1px solid #ccc;
            padding: 12px;
            margin: 10px;
            width: 220px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
        }
        .product img {
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <a href="product_form.php">+ Thêm sản phẩm</a><br><br>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='{$row['image']}' alt='Sản phẩm'><br>";
            echo "<strong>{$row['name']}</strong><br>";
            echo "Giá: " . number_format($row['price'], 0, ',', '.') . " VNĐ<br>";
            echo "Loại: {$row['category']}<br>";
            echo "</div>";
        }
    } else {
        echo "<p>Chưa có sản phẩm nào.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
