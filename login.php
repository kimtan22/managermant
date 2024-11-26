<?php
session_start();

// Đường dẫn đến tệp chứa thông tin người dùng
$usersFile = 'users.txt';

// Hàm kiểm tra đăng nhập
function checkLogin($username, $password) {
    global $usersFile;

    // Kiểm tra xem tệp có tồn tại không
    if (!file_exists($usersFile)) {
        return false;
    }

    // Đọc nội dung tệp
    $users = file($usersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    // Duyệt qua từng dòng trong tệp
    foreach ($users as $user) {
        list($storedUsername, $storedPassword) = explode(':', $user);
        if ($username === $storedUsername && $password === $storedPassword) {
            return true;
        }
    }
    return false;
}

// Kiểm tra xem dữ liệu form có được gửi không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (checkLogin($username, $password)) {
        // Lưu trữ thông tin đăng nhập trong session
        $_SESSION['username'] = $username;
        
        // Đăng nhập thành công, chuyển hướng đến trang quản lý quỹ
        header("Location: index.html");
        exit();
    } else {
        echo "Sai tên đăng nhập hoặc mật khẩu!";
    }
} else {
    echo "Form chưa được gửi.";
}
?>
