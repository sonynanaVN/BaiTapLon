
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="manager.css">
    <link rel="stylesheet" href="Kho.css">
    <title>Admin Page</title>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2>Quản lý</h2>
        <ul>
            <li><a href="http://localhost/Animated%20Login%20Page/Manager/manager.php"><i class="fas fa-home"></i> Doanh thu</a></li>
            <li>
                <a href=""><i class="fas fa-user-cog"></i> Trình quản lý </a>
                <ul class="submenu">
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/user/Users.php">📂 Quản lý tài khoản</a></li>
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/Tr%c3%acnhqu%e1%ba%a3nl%c3%bds%e1%ba%a3nph%e1%ba%a9m.php">📋 Trình thêm sản phẩm</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fas fa-file-invoice"></i> Đơn thanh toán</a>
                <ul class="submenu">
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/Qu%e1%ba%a3nl%c3%bd%c4%91%c6%a1nh%c3%a0ng.php">🛒 Quản lý đơn hàng</a></li>
                    <li><a href="http://localhost/Animated%20Login%20Page/Manager/thanhto%c3%a1nho%c3%a0nti%e1%bb%81n.php">💳 Thanh toán & Hoàn tiền </a></li>
                </ul></li>
            <li><a href="#"><i class="fas fa-box"></i> Kho hàng</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Kho.php">📊 Tồn kho & Nhập xuất hàng</a></li>
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Qu%e1%ba%a3nl%c3%bdnh%c3%a0cungc%e1%ba%a5p.php">🚚 Quản lý nhà cung cấp</a></li>
            </ul></li>
            <li><a href="#"><i class="fas fa-users"></i> Người dùng</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/messenger/H%e1%bb%97tr%e1%bb%a3kh%c3%a1chh%c3%a0ng.php">💬 Hỗ trợ khách hàng</a></li>
            </ul></li>
            <li><a href="#"><i class="fas fa-cogs"></i> Cài đặt</a><ul class="submenu">
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/setting.php">⚙️ Cài đặt chung</a></li>
                <li><a href="http://localhost/Animated%20Login%20Page/Manager/Ch%c3%adnhs%c3%a1chv%c3%a0b%e1%ba%a3om%e1%ba%adt.php">🔒Chính sách bảo mật & Quyền riêng tư</a></li>
            </ul></li>
            <li id="logout"><a href="http://localhost/Animated%20Login%20Page/login/test.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Nội dung chính -->
    <div class="main-content">
        <div class="header">
            <div class="search">
                <input type="text" class="search-bar" placeholder="Tìm kiếm...">
            </div>
            <div class="bingbong">
                <div class="notification-icon">🔔</div>
                <div class="notifications">
                    <p>🛒 Khách hàng A vừa mua 2 sản phẩm</p>
                    <p>🛍️ Khách hàng B đã hoàn thành đơn hàng</p>
                    <p>💳 Khách hàng C vừa thanh toán đơn hàng</p>
                    <p>📦 Khách hàng D đã nhận hàng</p>
                    <p>🔄 Khách hàng E yêu cầu đổi hàng</p>
                    <p>📢 Khách hàng F để lại đánh giá 5 sao</p>
                    <p>🎉 Khách hàng G đăng ký thành viên VIP</p>
                </div>
            </div>
            <div class="avatar">
                <img src="/login/OIP.jpg" alt="Avatar">
                <div class="dropdown">
                    <p>Thông tin tài khoản</p>
                    <p>Ghi chú</p>
                </div>
            </div>
            <div class="logo">
                <img src="/main/Logo_DutchLady_1.png" alt="Logo">
            </div>
        </div>
<!-- java -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // === PHẦN 1: Chỉnh sửa giá và số lượng ===
        function attachEventToCollection(collection) {
            let priceElement = collection.querySelector(".cost p:first-child");
            let quantityElement = collection.querySelector(".cost p:last-child");
            let buttons = collection.querySelectorAll(".drop-down a");
    
            // Sửa giá
            priceElement.addEventListener("click", function () {
                let newPrice = prompt("Nhập giá mới:", this.textContent.replace(" vnd", ""));
                if (newPrice !== null && !isNaN(newPrice)) {
                    this.textContent = parseInt(newPrice).toLocaleString() + " vnd";
                }
            });
    
            // Sửa số lượng
            buttons.forEach((btn, index) => {
                btn.addEventListener("click", function (event) {
                    event.preventDefault();
                    let currentQuantity = parseInt(quantityElement.textContent.replace("Còn lại:", "").replace(" thùng", ""));
                    if (index === 0) {
                        currentQuantity++;
                    } else if (index === 1 && currentQuantity > 0) {
                        currentQuantity--;
                    }
                    quantityElement.textContent = "Còn lại:" + currentQuantity + " thùng";
                });
            });
        }
    
        document.querySelectorAll(".collections").forEach(attachEventToCollection);
    
        // === PHẦN 2: Thêm sản phẩm ===
        const addItemBtn = document.getElementById("addItemBtn");
        const modal = document.getElementById("addItemModal");
        const closeBtn = document.querySelector(".modal .close");
        const saveBtn = document.getElementById("saveItem");
        const inputImage = document.getElementById("itemImage");
        const preview = document.getElementById("imagePreview");
        const categorySelect = document.getElementById("itemCategory"); // dropdown loại sản phẩm
    
        // Hiển thị ảnh khi chọn
        inputImage.addEventListener("change", (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    preview.src = e.target.result;
                    preview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    
        addItemBtn.addEventListener("click", () => modal.style.display = "block");
        closeBtn.addEventListener("click", () => modal.style.display = "none");
    
        window.addEventListener("click", (e) => {
            if (e.target == modal) modal.style.display = "none";
        });
    
        saveBtn.addEventListener("click", function () {
            const name = document.getElementById("itemName").value;
            const price = document.getElementById("itemPrice").value;
            const quantity = document.getElementById("itemQuantity").value;
            const file = inputImage.files[0];
            const category = categorySelect.value;
    
            if (!name || !price || !quantity || !file || !category) {
                alert("Vui lòng điền đầy đủ thông tin.");
                return;
            }
    
            const reader = new FileReader();
            reader.onload = function (e) {
                const imageDataURL = e.target.result;
    
                const newItem = document.createElement("div");
                newItem.classList.add("collections");
                newItem.innerHTML = `
                    <img src="${imageDataURL}" alt="">
                    <button>Chức năng</button>
                    <div class="drop-down">
                        <a href="#">+</a>
                        <a href="#">-</a>
                        <a href="#">Đánh dấu có vấn đề</a>
                    </div>
                    <div class="cost">
                        <p>${parseInt(price).toLocaleString()} vnd</p>
                        <p>Còn lại:${quantity} thùng</p>
                    </div>
                `;
    
                // Tìm đúng gian hàng và thêm sản phẩm vào
                const container = document.querySelector(`.${category}`);
                if (container) {
                    container.appendChild(newItem);
                    attachEventToCollection(newItem); // Gắn sự kiện cho sản phẩm mới
                    modal.style.display = "none";
                } else {
                    alert("Không tìm thấy gian hàng phù hợp.");
                }
            };
    
            reader.readAsDataURL(file);
        });
    });
    </script>
    
    

        
<!-- Thanh content -->
<h1>Kho hàng tồn dư</h1>
 <h2>Gian hàng sữa thùng</h2>
 <div class="milk-store store-sua-thung">   
    <!-- Hàng 1 sữa -->
    <div class="collections">
        <img src="picture/Pic1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Pic2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Pic3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Pic4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>

<h2>Gian hàng sữa bịch</h2>
<div class="milk-store store-sua-bich">   
    <div class="collections">
        <img src="picture/suabich1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suabich2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suabich3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suabich4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>

<h2>Gian hàng phô mai</h2>
<div class="milk-store store-pho-mai">   
    <div class="collections">
        <img src="picture/phomai1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Phomai2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Phomai3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/Phomai4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>

<h2>Gian hàng sữa đặc</h2>
<div class="milk-store store-sua-dac">   
    <div class="collections">
        <img src="picture/suadac1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suadac2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suadac3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suadac4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>

<h2>Gian hàng sữa chua</h2>
<div class="milk-store store-sua-chua">   
    <div class="collections">
        <img src="picture/suachua1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suachua2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suachua3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/suachua4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>

<h2>Gian hàng đặc biệt:</h2>
<div class="milk-store store-dac-biet">   
    <div class="collections">
        <img src="picture/matna1.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/matna2.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/matna3.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
    <div class="collections">
        <img src="picture/matna4.jpg" alt="">
        <button>Chức năng</button>
        <div class="drop-down">
            <a href="#">+</a>
            <a href="#">-</a>
            <a href="#">Đánh dấu có vấn đề</a>
        </div>
        <div class="cost">
            <p>112.000 vnd</p>
            <p>Còn lại:16 thùng</p>
        </div>
    </div>
</div>
<!-- Nút thêm hàng -->
<button id="addItemBtn" class="add-item-button">+</button>

<!-- Form nhập hàng mới -->
<div id="addItemModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <h2>Thêm sản phẩm mới vào kho</h2>
    <label>Tên sản phẩm:</label>
    <input type="text" id="itemName" placeholder="Nhập tên sản phẩm">

    <label>Giá (vnd):</label>
    <input type="number" id="itemPrice" placeholder="Ví dụ: 112000">

    <label>Số lượng (thùng):</label>
    <input type="number" id="itemQuantity" placeholder="Ví dụ: 16">
    <label for="itemCategory">Loại sản phẩm:</label>
    <select id="itemCategory">
    <option value="store-sua-thung">Sữa thùng</option>
    <option value="store-sua-bich">Sữa bịch</option>
    <option value="store-pho-mai">Phô mai</option>
    <option value="store-sua-dac">Sữa đặc</option>
    <option value="store-sua-chua">Sữa chua</option>
    <option value="store-dac-biet">Sữa đặc biệt</option>
    </select>
    <br>
    <label>Đường dẫn ảnh:</label>
    <label for="itemImage">Chọn ảnh</label>
    <input type="file" id="itemImage" accept="image/*">
    <img id="imagePreview" style="display: none; max-width: 100px; margin-top: 10px;" />

    <br>
    <img id="preview">
    <button id="saveItem">Lưu sản phẩm</button>
  </div>
</div>

</body>
</html>
