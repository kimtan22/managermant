<?php
session_start();
session_destroy(); // Xóa tất cả session
header('Location: login.html'); // Quay về trang đăng nhập
exit();
?>
