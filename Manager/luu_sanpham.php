<?php
$conn = new mysqli("localhost", "root", "", "product");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $name = $_POST['itemName'];
    $price = $_POST['itemPrice'];
    $quantity = $_POST['itemQuantity'];
    $category = $_POST['itemCategory'];

    if (isset($_FILES['itemImage']) && $_FILES['itemImage']['error'] === 0) {
        $imageName = time() . '_' . basename($_FILES['itemImage']['name']);
        $targetDir = "uploads/";
        $targetPath = $targetDir . $imageName;

        if (move_uploaded_file($_FILES['itemImage']['tmp_name'], $targetPath)) {
            $sql = "INSERT INTO sanpham (ten, gia, so_luong, loai, hinhanh)
                    VALUES ('$name', '$price', '$quantity', '$category', '$targetPath')";
            $conn->query($sql);
        }
    }
}
header("Location: Kho.php");
exit();
?>
