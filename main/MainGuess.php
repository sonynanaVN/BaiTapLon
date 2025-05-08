<?php
session_start();
require_once("ketnoi.php");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM products ORDER BY id DESC";
$resultProducts = $conn->query($sql);
$tenNguoiDung = "Khách";

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $sql = "SELECT name FROM accounts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $tenNguoiDung = $row['name'];
    }
}

// Khởi tạo giỏ hàng nếu chưa tồn tại
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm sản phẩm vào giỏ hàng
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    $_SESSION['cart'][] = [
        'name' => $productName,
        'price' => $productPrice
    ];

    header('Location: main.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="MainGuess.css">
    <title>DutchLady</title>
</head>
<body>
    <div class="container">
<header>
            <h1><img src="img/logo.png" alt="Logo"></h1>
            <nav>
                <a href="#">Trang Chủ</a>
                <a href="#">Sản phẩm</a>
                <a href="https://www.dutchlady.com.vn/tieu-chuan-ha-lan">Thông tin</a>
                <a href="https://www.dutchlady.com.vn/tin-tuc-doanh-nghiep">Tin tức</a>
                <a href="https://www.dutchlady.com.vn/index.php/contact">Liên hệ</a>
            </nav>
<div class="user-actions">
    <div class="guess" onmouseover="showGuessDetail()" onmouseout="hideGuessDetail()">
        <span><img src="img/logo.png">Xin chào, <?php echo ($tenNguoiDung); ?></span>
        <div class="guess-detail" id="guessDetail">
            <a href="http://localhost/Animated%20Login%20Page/login/test.php">Đăng xuất</a>
        </div>
    </div>
</div>
<div class="cart" onmouseover="showCartDetail()" onmouseout="hideCartDetail()">
                <span><img src="img/GioHang.png" alt="Giỏ hàng">Giỏ hàng</span>
                <div class="cart-detail" id="cartDetail">
                    <p>Chưa có sản phẩm nào</p>
                    <p>Tổng: 0đ</p>
                    <button onclick="window.location.href='giohang.php'">Thanh toán</button>
                </div>
            </div>
        </div>
    </header>

    <poster>
        <img src="BannerMain.jpg" alt="Poster" style="width: 100%; height: auto;">
    </poster>
    <div class="slide">
        <img src="img/Pic1.jpg" alt="Pic 1">
    </div>
    <div class="slide">
        <img src="img/Pic2.jpg" alt="Pic 2">
    </div>
    <div class="slide">
        <img src="img/Pic3.png" alt="Pic 3">
    </div>

<main>
            <h2>NHỮNG SẢN PHẨM BÁN CHẠY NHẤT CỦA CHÚNG TÔI</h2>
            <div class="filter-buttons">
                <button onclick="filterProducts('all')">Tất cả</button>
                <button onclick="filterProducts('sua-hop')">Sữa Hộp</button>
                <button onclick="filterProducts('sua-bich')">Sữa Bịch</button>
                <button onclick="filterProducts('sua-dac')">Sữa Đặc</button>
                <button onclick="filterProducts('sua-chua')">Sữa Chua</button>
                <button onclick="filterProducts('sua-bot')">Sữa Bột</button>
            </div>
    
        <div class="products">
            <div class="product sua-hop">
                <img src="img/SuaTuoiDutchLady.png" alt="Sữa tươi">
                <h3>Sữa tươi Dutch Lady</h3>
                <p>15.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa tươi Dutch Lady'); ?>&price=15000&image=img/SuaTuoiDutchLady.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa tươi Dutch Lady', 15000, 'img/SuaTuoiDutchLady.png')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLady.png" alt="Sữa cao khỏe">
                <h3>Sữa bịch Dutch Lady</h3>
                <p>15.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch Dutch Lady'); ?>&price=15000&image=img/SuaBichDutchLady.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch Dutch Lady', 15000, 'img/SuaBichDutchLady.png')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLady180ml.png" alt="Kem đặc">
                <h3>Sữa bịch Dutch Lady 180ml</h3>
                <p>18.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch Dutch Lady 180ml'); ?>&price=18000&image=img/SuaBichDutchLady180ml.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch Dutch Lady 180ml', 18000, 'img/SuaBichDutchLady180ml.png')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLadyCaoKhoe.png" alt="Sữa dinh dưỡng">
                <h3>Sữa bịch Dutch Lady Cao Khoẻ</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch Dutch Lady Cao Khoẻ'); ?>&price=20000&image=img/SuaBichDutchLadyCaoKhoe.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch Dutch Lady Cao Khoẻ', 20000, 'img/SuaBichDutchLadyCaoKhoe.png')">Đặt món</button>
            </div>
            <div class="product sua-bot">
                <img src="img/SuaBotNguCocDutchLady.png" alt="Sữa bột dinh dưỡng ngũ cốc Dutch Lady">
                <h3>Sữa bột dinh dưỡng ngũ cốc Dutch Lady</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bột dinh dưỡng ngũ cốc Dutch Lady'); ?>&price=20000&image=img/SuaBotNguCocDutchLady.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa bột dinh dưỡng ngũ cốc Dutch Lady', 20000, 'img/SuaBotNguCocDutchLady.png')">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/SuaTuoiDutchLadyCaoKhoe.png" alt="Sữa tươi Dutch Lady Cao Khoẻ">
                <h3>Sữa tươi Dutch Lady Cao Khoẻ</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa tươi Dutch Lady Cao Khoẻ'); ?>&price=20000&image=img/SuaTuoiDutchLadyCaoKhoe.png'">Chi tiết</button>
                <button onclick="addToCart('Sữa tươi Dutch Lady Cao Khoẻ', 20000, 'img/SuaTuoiDutchLadyCaoKhoe.png')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/SuaDacDutchLady.jpg" alt="Sữa đặc Dutch Lady">
                <h3>Sữa đặc Dutch Lady</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc Dutch Lady'); ?>&price=20000&image=img/SuaDacDutchLady.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc Dutch Lady', 20000, 'img/SuaDacDutchLady.jpg')">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaHop_1.jpg" alt="Sữa lúa mạch Bfast">
                <h3>Sữa lúa mạch Bfast</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa lúa mạch Bfast'); ?>&price=20000&image=img/suaHop_1.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa lúa mạch Bfast', 20000, 'img/suaHop_1.jpg')">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaHatVinaMilk.jpg" alt="Sữa hạt VinaMilk">
                <h3>Sữa hạt VinaMilk</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa hạt VinaMilk'); ?>&price=20000&image=img/suaHatVinaMilk.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa hạt VinaMilk', 20000, 'img/suaHatVinaMilk.jpg')">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/nguCoc.jpg" alt="Sữa ngũ cốc">
                <h3>Sữa ngũ cốc</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa ngũ cốc'); ?>&price=20000&image=img/nguCoc.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa ngũ cốc', 20000, 'img/nguCoc.jpg')">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaTuoiItDuong.jpg" alt="Sữa tươi ít đường">
                <h3>Sữa tươi ít đường</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa tươi ít đường'); ?>&price=20000&image=img/suaTuoiItDuong.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa tươi ít đường', 20000, 'img/suaTuoiItDuong.jpg')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBichSocola.jpg" alt="Sữa bịch vị Socola">
                <h3>Sữa bịch vị Socola</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch vị Socola'); ?>&price=20000&image=img/suaBichSocola.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch vị Socola', 20000, 'img/suaBichSocola.jpg')">Đặt món</button>
            </div>
            <div class="product sua-bot">
                <img src="img/nguCocSoymilk.jpg" alt="Ngũ cốc Soymilk">
                <h3>Ngũ cốc Soymilk</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Ngũ cốc Soymilk'); ?>&price=20000&image=img/nguCocSoymilk.jpg'">Chi tiết</button>
                <button onclick="addToCart('Ngũ cốc Soymilk', 20000, 'img/nguCocSoymilk.jpg')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBich1.jpg" alt="Sữa bịch Star">
                <h3>Sữa bịch Star</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch Star'); ?>&price=20000&image=img/suaBich1.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch Star', 20000, 'img/suaBich1.jpg')">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBichSoco.jpg" alt="Sữa bịch Socola">
                <h3>Sữa bịch Socola</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa bịch Socola'); ?>&price=20000&image=img/suaBichSoco.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa bịch Socola', 20000, 'img/suaBichSoco.jpg')">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaTH.jpg" alt="Sữa chua TH">
                <h3>Sữa chua TH</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa chua TH'); ?>&price=20000&image=img/suaChuaTH.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa chua TH', 20000, 'img/suaChuaTH.jpg')">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaTHTrueMilk.jpg" alt="Sữa chua TH True Milk">
                <h3>Sữa chua TH True Milk</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa chua TH True Milk'); ?>&price=20000&image=img/suaChuaTHTrueMilk.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa chua TH True Milk', 20000, 'img/suaChuaTHTrueMilk.jpg')">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaVietQuat.jpg" alt="Sữa chua Việt Quất">
                <h3>Sữa chua vị việt quất</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa chua vị việt quất'); ?>&price=20000&image=img/suaChuaVietQuat.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa chua vị việt quất', 20000, 'img/suaChuaVietQuat.jpg')">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaMonte.jpg" alt="Sữa chua Monte">
                <h3>Sữa chua Monte</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa chua Monte'); ?>&price=20000&image=img/suaChuaMonte.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa chua Monte', 20000, 'img/suaChuaMonte.jpg')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDac.jpg" alt="Sữa đặc">
                <h3>Sữa đặc</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc'); ?>&price=20000&image=img/suaDac.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc', 20000, 'img/suaDac.jpg')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacStar.jpg" alt="Sữa đặc Star">
                <h3>Sữa đặc Star</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc Star'); ?>&price=20000&image=img/suaDacStar.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc Star', 20000, 'img/suaDacStar.jpg')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacHH.jpg" alt="Sữa đặc hoàn hảo">
                <h3>Sữa đặc hoàn hảo</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc hoàn hảo'); ?>&price=20000&image=img/suaDacHH.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc hoàn hảo', 20000, 'img/suaDacHH.jpg')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacLamosa.jpg" alt="Sữa đặc Lamosa">
                <h3>Sữa đặc Lamosa</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc Lamosa'); ?>&price=20000&image=img/suaDacLamosa.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc Lamosa', 20000, 'img/suaDacLamosa.jpg')">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacHH.jpg" alt="Sữa đặc hoàn hảo">
                <h3>Sữa đặc hoàn hảo</h3>
                <p>20.000đ</p>
                <button onclick="window.location.href='chitietsanpham.php?name=<?php echo urlencode('Sữa đặc hoàn hảo'); ?>&price=20000&image=img/suaDacHH.jpg'">Chi tiết</button>
                <button onclick="addToCart('Sữa đặc hoàn hảo', 20000, 'img/suaDacHH.jpg')">Đặt món</button>
            </div>
        </div>
</main>
<div class="products">
        <?php
    if ($resultProducts->num_rows > 0) {
        while ($row = $resultProducts->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<img src='{$row['image']}' alt='Sản phẩm'><br>";
            echo "<strong>{$row['name']}</strong><br>";
            echo "" . number_format($row['price'], 0, ',', '.') . " đ<br>";
            echo "<button style=margin-right:5px; >Chi tiết</button>";
            echo "<button>Đặt món</button>";
            echo "</div>";
        }
    } else {
        echo 'Không có sản phẩm nào.';
    }
    $conn->close();
    ?>
     </div>
<footer>
            <div class="section-container">
                <div class="section">
                    <span>PHÁT TRIỂN BỀN VỮNG</span>
                    <ul>
                        <li><a href="#">Một Việt Nam Vươn Cao Vượt Trỗi</a></li>
                        <li><a href="https://dutchlady.com.vn/nuoi-duong-tu-thien-nhien">Nuôi Dưỡng Từ Thiên Nhiên</a></li>
                        <li><a href="https://dutchlady.com.vn/giai-thuong-va-ghi-nhan">Giải Thưởng Và Ghi Nhận</a></li>
                    </ul>
                    </div>
                <div class="section">
                    <span>SẢN PHẨM</span>
                <ul>
                    <li><a href="#!">Sữa Nước Cô Gái Hà Lan</a></li>
	                <li><a href="#!">Sữa Chua Dutch Lady</a></li>
	                <li><a href="#!">Sữa Đặc Có Đường Dutch Lady (Cghl)</a></li>
	                <li><a href="#!">Sữa chua uống Fristi</a></li>
	                <li><a href="#!">Sản phẩm dinh dưỡng công thức Dutch Lady</a></li>
                </ul>
            </div>
            <div class="section">
                <span>GỐC TRUYỀN THÔNG</span>
                <ul>
                    <li><a href="https://dutchlady.com.vn/tin-tuc-doanh-nghiep">Tin tức doanh nghiệp</a></li>
	                <li><a href="https://dutchlady.com.vn/tin-tuc">Tin tức khuyến mãi</a></li>
                </ul>
            </div>
            <div class="section">
                <span>TÌM CHÚNG TÔI</span>
                <a href="https://www.facebook.com/dutchladyvn">Facebook</a>
                <a href="https://www.youtube.com/user/SuaCoGaiHaLanCong">Youtube</i></a>
            </div>
            <div class="footer-bottom">
                <div class="footer-copyright text-center">
                    <ul class="list-inline footer-policy" style="margin-bottom:5px;">
                        <li class="list-inline-item right-border-footer">
                            <a href="https://www.dutchlady.com.vn/sites/default/files/2023-08/24Jul23_FC_Privacy_Statement_VI.pdf" target="_blank" rel="noopener noreferrer">Chính sách bảo mật</a>
                        </li>
                        <li class="list-inline-item right-border-footer">
                            <a href="">Điều khoản sử dụng</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="footer-copyright text-center">
                    Bài tập lớn - Nhóm Tuấn Anh, Hậu, Hào.
                </div>
            </div>
        </div>
    </main>

    <div class="circle" id="chatCircle">
        <span class="circle-text">Dutch Lady, Xin chào.</span>
        <img src="img/AI.jpg" class="circle-image">
    </div>
    
    <div class="chat-box" id="chatBox">
        <div class="chat-header">
            <span>Chat Box</span>
            <button id="closeChat" style="width:30px;">X</button>
        </div>
        <div class="chat-content" style="height: 100px;">
            <p>Chào bạn! Bạn cần giúp gì?</p>
        </div>
        <form action="message.php" method="POST">
        <input type="text" name="message" placeholder="Nhập tin nhắn..." required style="margin-left:10px;">
        <button type="submit" style="width:30px;">Gửi</button>
    </form>
    </div>

    <script src="Main.js"></script>
</div>
</body>
</html>