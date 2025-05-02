<?php
session_start();

$conn = new mysqli("localhost", "root", "", "chat_db");
if ($conn->connect_error) {
    die("Lỗi kết nối CSDL: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Hỗ trợ khách hàng</title>
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
    <h2>📋 Danh sách ý kiến</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nội dung</th>
                <th>Gởi vào lúc</th>
            </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while($chat_db = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $chat_db['id'] ?></td>
                    <td><?= ($chat_db['content']) ?></td>
                    <td><?= ($chat_db['created_at']) ?></td>
                    <td class="actions">
                        <a href="edituser.php?id=<?= $chat_db['id'] ?>"><button class="edit">Chỉnh sửa</button></a>
                        <a href="deleteuser.php?id=<?= $chat_db['id'] ?>" onclick="return confirm('Xoá người dùng này?');">
                            <button class="delete">Xoá</button>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="6">Không có người có phản hồi  >:U🦗🦗</td></tr>
        <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
