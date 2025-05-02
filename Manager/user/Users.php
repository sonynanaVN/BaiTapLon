<?php
session_start();

// Kiểm tra nếu chưa đăng nhập admin thì chặn
// if (!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     exit();
// }

$conn = new mysqli("localhost", "root", "", "users");
if ($conn->connect_error) {
    die("Lỗi kết nối CSDL: " . $conn->connect_error);
}

$sql = "SELECT * FROM accounts ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý người dùng</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; padding: 40px; }
        table {
            border-collapse: collapse;
            width: 100%;
            background: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        h2 { text-align: center; margin-bottom: 20px; }
        .actions button {
            margin-right: 5px;
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .edit { background: #ffc107; color: black; }
        .delete { background: #dc3545; color: white; }
    </style>
</head>
<body>
    <h2>📋 Danh sách người dùng đã đăng ký</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Mật khẩu</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($user = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= ($user['name']) ?></td>
                    <td><?= ($user['email']) ?></td>
                    <td><?= ($user['password']) ?></td>
                    <td class="actions">
                        <a href="edituser.php?id=<?= $user['id'] ?>"><button class="edit">Chỉnh sửa</button></a>
                        <a href="deleteuser.php?id=<?= $user['id'] ?>" onclick="return confirm('Xoá người dùng này?');">
                            <button class="delete">Xoá</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Không có người dùng nào  >:U🦗🦗</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
