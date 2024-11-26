<?php
session_start();

// Nhận thông tin từ form đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra file users.txt
if (!file_exists('users.txt') || filesize('users.txt') === 0) {
    echo "Lỗi: File users.txt không tồn tại hoặc trống! <a href='index.html'>Quay lại</a>";
    exit();
}

// Đọc file users.txt
$users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$isAuthenticated = false;
$fullname = '';

foreach ($users as $user) {
    list($storedUsername, $storedPassword, $storedFullname) = explode(':', $user);
    if ($username === $storedUsername && $password === $storedPassword) {
        $isAuthenticated = true;
        $fullname = $storedFullname; // Lấy tên người dùng
        break;
    }
}

if ($isAuthenticated) {
    // Đăng nhập thành công
    $_SESSION['loggedin'] = true;
    $_SESSION['fullname'] = $fullname; // Lưu tên người dùng vào session
    header('Location: main_page.html'); // Chuyển tới trang chính (HTML)
    exit();
} else {
    // Sai tài khoản hoặc mật khẩu
    echo "<div style='text-align: center; margin-top: 50px;'>
            <h3>Sai tài khoản hoặc mật khẩu!</h3>
            <a href='index.html'><button style='padding: 10px 20px; background-color: #007bff; color: white; border: none; border-radius: 5px; cursor: pointer;'>Quay lại</button></a>
          </div>";
}
?>
