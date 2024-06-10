<?php
session_start();

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Quản lý quỹ</title>
    <link rel="stylesheet" href="style_db.css">
</head>
<body>
    <div class="header">
        <h1>Quản lý quỹ - Dashboard</h1>
        <p>Chào, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    </div>
    <div class="nav">
        <a href="#">Trang chủ</a>
        <a href="#">Giao dịch</a>
        <a href="#">Báo cáo</a>
        <a href="#">Cài đặt</a>
    </div>
    <div class="container">
        <div class="summary-card">
            <h2>Số dư tài khoản</h2>
            <p>10,000,000 VND</p>
        </div>
        <div class="summary-card">
            <h2>Số lượng giao dịch</h2>
            <p>25 giao dịch</p>
        </div>
        <div class="summary-card">
            <h2>Báo cáo gần đây</h2>
            <p>Xem chi tiết các báo cáo gần đây.</p>
        </div>
        <div class="logout">
            <a href="logout.html">Đăng xuất</a>
        </div>
    </div>
</body>
</html>
