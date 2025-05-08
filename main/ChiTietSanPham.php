<?php
$name = $_GET['name'] ?? '';
$price = $_GET['price'] ?? '';
$image = $_GET['image'] ?? '';

$descriptions = [
    'Sữa tươi Dutch Lady' => 'Sản phẩm: Sữa Tươi Dutch Lady có đường. 
                            Dung tích: 110ml, 180ml, 965ml. 
                            ho con mạnh mẽ lớn khôn mỗi ngày. 
                            Sữa Dutch Lady mới, với công thức được cải tiến, nay thêm dinh dưỡng hơn. Sản phẩm được phát triển dựa trên khoa học, dành riêng cho trẻ em Việt Nam, với Đạm, Canxi và Vitamin D cho cơ thể khỏe mạnh, Vitamin C hỗ trợ đề kháng vững vàng.',
    'Sữa bịch Dutch Lady' => 'Sản phẩm: Sữa Bịch Dutch Lady có đường. 
                            Cho con mạnh mẽ lớn khôn mỗi ngày. 
                            Sữa Dutch Lady mới, với công thức được cải tiến, nay thêm dinh dưỡng hơn. Sản phẩm được phát triển dựa trên khoa học, dành riêng cho trẻ em Việt Nam, với Đạm, Canxi và Vitamin D cho cơ thể khỏe mạnh, Vitamin C hỗ trợ đề kháng vững vàng.',
    'Sữa bịch Dutch Lady 180ml' => 'Sản phẩm: Sữa Bịch Dutch Lady có đường. 
                                    Cho con mạnh mẽ lớn khôn mỗi ngày. 
                                    Sữa Dutch Lady mới, với công thức được cải tiến, nay thêm dinh dưỡng hơn. Sản phẩm được phát triển dựa trên khoa học, dành riêng cho trẻ em Việt Nam, với Đạm, Canxi và Vitamin D cho cơ thể khỏe mạnh, Vitamin C hỗ trợ đề kháng vững vàng.',
    'Sữa bịch Dutch Lady Cao Khoẻ' => 'Sản phẩm: Sữa Bịch Cô Gái Hà Lan Cao Khỏe Có Đường. 
                                    Cho con mạnh mẽ lớn khôn mỗi ngày. 
                                    MỚI! Dutch Lady Cao Khỏe với công thức cải tiến giúp bé cao lớn và khỏe mạnh. 
                                    Nay ngon hơn và dinh dưỡng hơn với:
                                    • 2x Canxi hỗ trợ phát triển chiều cao
                                    • 2x Vitamin D giúp tăng cường hấp thu Canxi',
    'Sữa bột dinh dưỡng ngũ cốc Dutch Lady' => 'Sản phẩm: Sữa bột dinh dưỡng ngũ cốc. 
                                                Dung tích: 25g. 
                                                Sữa bột dinh dưỡng + ngũ cốc Dutch Lady. 
                                                Đảm bảo buổi sáng đủ chất cho cả gia đình. 
                                                - Sữa BỘT dinh dưỡng ngũ cốc đảm bảo bữa sáng đủ chất cho gia đình. 
                                                + Dinh dưỡng tương đương 2 ly sữa, thêm 10 vitamin, 4 khoáng chất.
                                                + Được sản xuất theo Tiêu chuẩn Hà Lan nghiêm ngặt, chuẩn quốc tế
                                                + Được nhập khẩu 100% từ nước ngoài',
    'Sữa tươi Dutch Lady Cao Khoẻ' => 'Sản phẩm: Sữa Dutch Lady Cao Khỏe có đường. 
                                    Dung tích: 170ml, 110ml. 
                                    Cho con mạnh mẽ lớn khôn mỗi ngày
                                    MỚI! Dutch Lady Cao Khỏe với công thức cải tiến giúp bé cao lớn và khỏe mạnh.
                                    Nay ngon hơn và dinh dưỡng hơn với:
                                    • 2x Canxi hỗ trợ phát triển chiều cao
                                    • 2x Vitamin D giúp tăng cường hấp thu Canxi',     
    'Sữa đặc Dutch Lady' => 'Sản phẩm: KEM ĐẶC CÓ ĐƯỜNG DUTCH LADY. 
                            Dung tích: 380g. 
                            Kem đặc có đường Dutch Lady chứa nhiều vitamin B2, Canxi sẽ mang đến cho bạn và gia đình những món ăn thơm béo, vị hài hòa từ các món mặn đến món ngọt. Đặc biệt sản phẩm trang bị thêm nắp giật dễ dàng sử dụng.',                                          
    'Sữa lúa mạch Bfast' => 'Sữa lúa mạch BFAST là sản phẩm sữa lúa mạch bổ sung canxi, chất xơ, omega-3 giúp cho trẻ luôn dồi dào năng lượng để bứt phá trong học tập, vui chơi. Thùng 48 hộp sữa lúa mạch BFAST 180ml thùng 48 hộp tiện sử dụng lâu dài, giá cả cũng tiết kiệm hơn, hương vị thơm ngon cho bé mê tít', 
    'Sữa hạt VinaMilk' => 'Sữa hạt. 
                        Vinamilk 9 loại hạt ít đường
                        Kết hợp 9 loại hạt cho hương vị rang thơm béo bùi độc đáo, cung cấp đủ lượng ALA (Omega-3) cơ thể cần chỉ với 2 hộp mỗi ngày.',
    'Sữa ngũ cốc' => 'Sữa ngũ cốc được chế biến hoàn toàn từ các loại hạt tự nhiên, lành tính và rất tốt cho sức khoẻ. 
                    Thế nhưng, Để phát triển khỏe mạnh chúng ta cần phải ăn cân đối đạm động vật và thực vật. 
                    Đạm động vật phải chiếm 2/3 chế độ ăn. 
                    Với trẻ nhỏ, bố mẹ chỉ nên dùng sữa ngũ cốc cho trẻ trên một tuổi với mục đích bổ sung thêm dinh dưỡng.
                    Trong khi dùng sữa ngũ cốc, trẻ vẫn phải ăn đầy đủ thức ăn có nguồn gốc đạm động vật (thịt, cá, trứng).',  
    'Sữa bịch vị Socola' => 'Sữa dinh dưỡng: Vinamilk Sôcôla. 
                            Vị sữa ngon, thơm béo đậm đà. Hàm lượng dinh dưỡng và tỷ lệ vitamin được tinh chỉnh tỉ mỉ và chuẩn xác, cung cấp Vitamin A, Vitamin D3, chất xơ giúp cho mắt sáng, bụng êm, xương khỏe. Phù hợp khi cần bổ sung dưỡng chất ngoài khẩu phần ăn hằng ngày.',  
    'Ngũ cốc Soymilk' => 'Giàu Dinh Dưỡng: Ngũ cốc soymilk chứa protein từ đậu nành, chất xơ, vitamin và các khoáng chất như canxi và sắt. 
                        Tốt Cho Tim Mạch: Nhờ vào việc giúp kiểm soát cholesterol và huyết áp, ngũ cốc soymilk hỗ trợ sức khỏe tim mạch. 
                        Hỗ Trợ Giảm Cân: Ngũ cốc soymilk có thể là một phần của chế độ ăn uống lành mạnh, giúp người dùng cảm thấy no lâu hơn. 
                        Có Lợi Cho Mẹ Bầu và Sau Sinh: Các sản phẩm ngũ cốc lợi sữa cung cấp dinh dưỡng cần thiết cho mẹ trong giai đoạn mang thai và cho con bú, giúp sữa mẹ chất lượng hơn.',  
    'Sữa bịch Star' => 'Được chế biến từ nguồn sữa tươi 100% chứa nhiều dưỡng chất như vitamin A, D3, canxi,... tốt cho xương và hệ miễn dịch, sữa tươi Vinamilk là thương hiệu được tin dùng hàng đầu với chất lượng tuyệt vời. Sữa dinh dưỡng có đường Vinamilk Happy Star bịch 220ml bổ dưỡng, thơm ngon',  
    'Sữa bịch Socola' => 'Sản phẩm: Sữa Bịch Dutch Lady có đường. 
                        Cho con mạnh mẽ lớn khôn mỗi ngày. 
                        Sữa Dutch Lady mới, với công thức được cải tiến, nay thêm dinh dưỡng hơn. Sản phẩm được phát triển dựa trên khoa học, dành riêng cho trẻ em Việt Nam, với Đạm, Canxi và Vitamin D cho cơ thể khỏe mạnh, Vitamin C hỗ trợ đề kháng vững vàng.',  
    'Sữa chua TH' => 'Sữa chua TH True Yourt là dòng sữa chua sử dụng hoàn toàn sữa tươi sạch nguyên chất của trang trại TH, lên men tự nhiên, không chất bảo quản. Lốc 4 hộp sữa chua ít đường TH True Yogurt 100g mang đến hương vị thơm ngon, thanh nhẹ, cho cả nhà vui khỏe mỗi ngày. Trẻ từ 1 - 3 tuổi dùng 80g/ngày.',  
    'Sữa chua TH True Milk' => 'Sữa chua TH True Milk có nhiều loại sản phẩm khác nhau, bao gồm sữa chua nha đam và sữa chua ít đường. 
                                Sữa chua nha đam: Có hương vị thơm ngon tự nhiên, bổ sung lợi khuẩn cho cơ thể, giúp tăng sức đề kháng và hỗ trợ hệ tiêu hóa. 
                                Sữa chua ít đường: Được sản xuất bằng công nghệ tiệt trùng hiện đại, hoàn toàn không sử dụng chất bảo quản, an toàn cho sức khỏe người tiêu dùng. 
                                Sữa chua uống: Cung cấp lượng lớn lợi khuẩn, giúp bảo vệ hệ tiêu hóa và sức khỏe tổng thể. 
                                Hương vị: Các sản phẩm sữa chua của TH True Milk thường ít ngọt và có hương vị tự nhiên từ trái cây, rất ngon miệng',  
    'Sữa chua vị việt quất' => 'Sữa chua ăn: Vinamilk Việt Quất ít đường + Collagen. 
                                Sữa chua Vinamilk Việt quất vị ngon thanh nhẹ, giảm 25% lượng đường trong mỗi hũ sữa chua, tốt cho sức khỏe, bổ sung Collagen giúp da thêm căng đẹp. 
                                LƯU Ý: 

                                Trên 6 tuổi. 
                                Để đảm bảo chất lượng sản phẩm tốt nhất, các đơn hàng bao gồm kem, sữa chua ăn và sữa chua uống sẽ chỉ được giao trong bán kính 10km từ cửa hàng Vinamilk gần nhất. Đơn hàng của bạn có thể sẽ được hủy nếu không có cửa hàng Vinamilk trong vòng bán kính 10km từ địa chỉ nhận hàng. 
                                Mong Quý khách kiểm tra lại địa chỉ giao hàng hoặc liên hệ với chúng tôi qua hotline: 1900 636 979 phím 1 để được hỗ trợ thêm.',  
    'Sữa chua Monte' => 'Được sản xuất trên dây chuyền chuẩn Châu Âu, Monte là Váng sữa chuẩn Đức từ 100% sữa tươi cao nguyên vùng Bavaria. Mùi vị thơm ngon. Giàu dinh dưỡng cho bé.',  
    'Sữa đặc' => 'Sữa đặc có đường Dutch Lady Nguyên kem lon 380g đóng lon dễ bảo quản, phù hợp pha cà phê, sữa uống và nhiều món ăn khác nhau. Đường, nước, dầu thực vật, maltodextrin, bột whey, bột sữa gầy, bột bơ sữa, lactose, Vitamin A, D3 và B1,... Pha cà phê, xay sinh tố, làm sữa chua, bánh flan...',  
    'Sữa đặc Star' => 'Sữa Đặc Vinamilk Southern Star là “Thương hiệu được chọn mua nhiều nhất”, được người tiêu dùng tin tưởng và sử dụng phổ biến trong các công thức chế biến như bánh flan, sinh tố, yogurt… Đặc biệt, Ngôi Sao Phương Nam là bí quyết không thể thiếu để pha ly cà phê sữa thơm ngon, đúng điệu nhờ vào độ sánh đặc, thơm béo',  
    'Sữa đặc hoàn hảo' => 'Sữa đặc Hoàn Hảo là một sản phẩm sữa đặc có hương vị béo ngọt và độ sánh mịn tuyệt vời. Nó thường được sử dụng để pha cà phê, làm sinh tố, trà sữa, và bánh flan. Sản phẩm có thành phần chính bao gồm đường, nước, bột sữa, và dầu thực vật, cung cấp khoảng 336 kcal trên 100ml sữa. ',  
    'Sữa đặc Lamosa' => 'Sữa đặc có đường Lamosa xanh lá lon 390g vị ngọt dịu và béo thơm, lon nhỏ tiện dùng Đường, nước, sữa bột, chất ổn định,... Pha cà phê, làm sữa chua, bánh flan... Có thể sử dùng trực tiếp hoặc dùng để pha chế các món ăn, đồ uống. Để nơi khô ráo và thoáng mát.',  
];
$description = $descriptions[$name] ?? 'Sản phẩm chất lượng từ Dutch Lady, bổ sung dinh dưỡng mỗi ngày cho bạn và gia đình.';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="MainGuess.css">
    <title>Chi tiết sản phẩm</title>
    <style>
        .product-detail-container {
            display: flex;
            align-items: flex-start;
            gap: 48px;
            margin: 48px 40px 0 40px;
            background: #fafdff;
            border-radius: 10px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 32px 32px 32px 32px;
        }
        .product-detail-image img {
            max-width: 340px;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            background: #fff;
            padding: 12px;
        }
        .product-detail-info {
            max-width: 500px;
        }
        .product-detail-info h1 {
            margin-top: 0;
            font-size: 2.1rem;
            color: #0056b3;
            margin-bottom: 18px;
            width: 500px;
        }
        .product-detail-info p {
            font-size: 19px;
            color: #222;
            margin-bottom: 18px;
        }
        .product-detail-info a{
            display: inline-block;
            margin-top: 18px;
            padding: 10px 32px;
            background: linear-gradient(90deg, #007bff 60%, #00c6ff 100%);
            color: #fff !important;
            text-decoration: none;
            border-radius: 25px;
            font-size: 18px;
            font-weight: 500;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
            transition: background 0.2s, transform 0.2s;
            letter-spacing: 1px;
        }
    </style>
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
    </div>
    <div class="product-detail-container">
        <div class="product-detail-image">
            <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($name); ?>">
        </div>
        <div class="product-detail-info">
            <h1><?php echo htmlspecialchars($name); ?></h1>
            <p>Giá: <?php echo number_format($price, 0, ',', '.'); ?>đ</p>
            <p><strong>Giới thiệu:</strong> <?php echo htmlspecialchars($description); ?></p>
            <a href="MainGuess.php">Quay lại</a>
        </div>
    </div>
    </main>

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
</body>
</html>