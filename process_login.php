<?php
session_start();

// Nhận dữ liệu từ form
$username = $_POST['username'];
$password = $_POST['password'];

// Đọc file users.txt
$users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$isAuthenticated = false;

// Kiểm tra thông tin đăng nhập
foreach ($users as $user) {
    list($storedUsername, $storedPassword) = explode(':', $user);
    if ($username === $storedUsername && $password === $storedPassword) {
        $isAuthenticated = true;
        break;
    }
}

if ($isAuthenticated) {
    $_SESSION['loggedin'] = true;
    header('Location: index.html'); // Chuyển tới index.html
    exit();
} else {
  header('Location: login.html'); // Quay lại trang đăng nhập
  exit();
}
?>
