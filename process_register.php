<?php
// Nhận dữ liệu từ form
$new_username = $_POST['new_username'];
$new_password = $_POST['new_password'];
$fullname = $_POST['fullname'];
$dob = $_POST['dob'];
$faculty = $_POST['faculty'];
$student_id = $_POST['student_id'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$program = $_POST['program'];
$phone = $_POST['phone'];
//kiểm tra số điện thoại và email hợp lệ trước khi lưu
if (!preg_match('/^010-\d{4}-\d{4}$/', $phone)) {
    echo "Số điện thoại không đúng định dạng! <a href='register.html'>Quay lại</a>";
    exit();
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email không hợp lệ! <a href='register.html'>Quay lại</a>";
    exit();
}

// Kiểm tra thông tin trùng lặp
$users = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($users as $user) {
    list($storedUsername, ) = explode(':', $user);
    if ($new_username === $storedUsername) {
        echo "Tài khoản đã tồn tại! <a href='register.html'>Quay lại</a>";
        exit();
    }
}
if (file_put_contents('users.txt', "$new_username:$new_password\n", FILE_APPEND) === false) {
    echo "Lỗi: Không thể ghi vào file users.txt. Kiểm tra quyền file!";
} 
// Thêm tài khoản mới vào file
// Lưu thông tin tài khoản vào file
$new_user_data = "$new_username:$new_password:$fullname:$dob:$faculty:$student_id:$email:$gender:$program:$phone";
if (file_put_contents('users.txt', $new_user_data . PHP_EOL, FILE_APPEND) !== false) {
    echo "Tạo tài khoản thành công! <a href='login.html'>Đăng nhập</a>";
} else {
    echo "Lỗi khi lưu tài khoản. Vui lòng thử lại!";
}
?>