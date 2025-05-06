<?php
session_start();
require_once("ketnoi.php");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Initialize the cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle adding items to the cart
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];

    // Add the product to the cart
    $_SESSION['cart'][] = [
        'name' => $productName,
        'price' => $productPrice
    ];

    // Redirect to avoid form resubmission
    header('Location: main.php');
    exit();
}
?>
<?php

if (isset($_SESSION['user'])) {
    $userEmail = $_SESSION['user']['email'];
    echo '
    <div class="login">
        <span>' . htmlspecialchars($userEmail) . '</span>
        <div class="login-detail" id="loginDetail">
            <button onclick="window.location.href=\'account_page.html\'">Tài khoản</button>
        </div>
    </div>';
} else {
    echo '
    <div class="login" onclick="window.location.href=\'login\test.php\'">
        <span>Đăng nhập/ Đăng ký</span>
        <div class="login-detail" id="loginDetail">
            <button onclick="window.location.href=\'login\test.php\'">Tài khoản</button>
        </div>
    </div>';
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Main1.css">
    <title>DutchLady</title>
</head>
<body>
    <div class="container">
    <header>
        <h1><img src="img/logo.png" alt="Logo"></h1>
        <nav>
            <a href="">Trang Chủ</a>
            <a href="">Sản phẩm</a>
            <a href="https://www.dutchlady.com.vn/tieu-chuan-ha-lan">Thông tin</a>
            <a href="https://www.dutchlady.com.vn/tin-tuc-doanh-nghiep">Tin tức</a>
            <a href="https://www.dutchlady.com.vn/index.php/contact">Liên hệ</a>
        </nav>
        <div class="user-actions">
        <div class="login" onclick="window.location.href='../login/test.php'">
    <span>Đăng nhập/ Đăng ký</span>
    <div class="login-detail" id="loginDetail">
        <button onclick="window.location.href='account_page.html'">Tài khoản</button>
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
        <img src="img/DucthLady_1.jpg" alt="Poster">
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
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLady.png" alt="Sữa cao khỏe">
                <h3>Sữa bịch Dutch Lady</h3>
                <p>15.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLady180ml.png" alt="Kem đặc">
                <h3>Sữa bịch Dutch Lady 180ml</h3>
                <p>18.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/SuaBichDutchLadyCaoKhoe.png" alt="Sữa dinh dưỡng">
                <h3>Sữa bịch Dutch Lady Cao Khoẻ</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bot">
                <img src="img/SuaBotNguCocDutchLady.png" alt="Sữa dinh dưỡng">
                <h3>Sữa bột dinh dưỡng ngũ cốc Dutch Lady</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/SuaTuoiDutchLadyCaoKhoe.png" alt="Sữa dinh dưỡng">
                <h3>Sữa tươi Dutch Lady Cao Khoẻ</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/SuaDacDutchLady.jpg" alt="Sữa dinh dưỡng">
                <h3>Sữa đặc Dutch Lady</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaHop_1.jpg" alt="Sữa lúa mạch Bfast">
                <h3>Sữa lúa mạch Bfast</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaHatVinaMilk.jpg" alt="Sữa hạt VinaMilk">
                <h3>Sữa hạt VinaMilk</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/nguCoc.jpg" alt="Sữa ngũ cốc">
                <h3>Sữa ngũ cốc</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-hop">
                <img src="img/suaTuoiItDuong.jpg" alt="Sữa tươi ít đường">
                <h3>Sữa tươi ít đường</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBichSocola.jpg" alt="Sữa bịch vị Socola">
                <h3>Sữa bịch vị Socola</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bot">
                <img src="img/nguCocSoymilk.jpg" alt="Ngũ cốc Soymilk">
                <h3>Ngũ cốc Soymilk</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBich1.jpg" alt="Sữa bịch Star">
                <h3>Sữa bịch Star</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-bich">
                <img src="img/suaBichSoco.jpg" alt="Sữa bịch Socola">
                <h3>Sữa bịch Socola</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaTH.jpg" alt="Sữa chua TH">
                <h3>Sữa chua TH</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaTHTrueMilk.jpg" alt="Sữa chua TH True Milk">
                <h3>Sữa chua TH True Milk</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaVietQuat.jpg" alt="Sữa chua Việt Quất">
                <h3>Sữa chua vị việt quất</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-chua">
                <img src="img/suaChuaMonte.jpg" alt="Sữa chua Monte">
                <h3>Sữa chua Monte</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDac.jpg" alt="Sữa đặc">
                <h3>Sữa đặc</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacStar.jpg" alt="Sữa đặc Star">
                <h3>Sữa đặc Star</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacHH.jpg" alt="Sữa đặc hoàn hảo">
                <h3>Sữa đặc hoàn hảo</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
            <div class="product sua-dac">
                <img src="img/suaDacLamosa.jpg" alt="Sữa đặc Lamosa">
                <h3>Sữa đặc Lamosa</h3>
                <p>20.000đ</p>
                <button onclick="addToCart()">Đặt món</button>
            </div>
        </div>
        <div class="products"></div>
        <?php
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="product-list">';
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<img src='{$row['image']}' alt='Sản phẩm'><br>";
        echo "<strong>{$row['name']}</strong><br>";
        echo "" . number_format($row['price'], 0, ',', '.') . " đ<br>";
        echo "<button>Đặt món</button>";
        echo "</div>";
    }
    echo '</div>';
} else {
    echo 'Không có sản phẩm nào.';
}
?>

        <div class="section-container">
            <div class="section">
                <span>PHÁT TRIỂN BỀN VỮNG</span>
                <ul>
                    <li><a href>Một Việt Nam Vươn Cao Vượt Trỗi</a></li>
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
        <input type="text" name="message" placeholder="Tính năng chưa khả dụng,vui lòng đăng nhập" required style="margin-left:10px;width:250px;" readonly>
        <button type="submit" style="width:30px;">Gửi</button>
    </form>
    </div>
    <script src="Main.js"></script>
</div>
</body>
</html>