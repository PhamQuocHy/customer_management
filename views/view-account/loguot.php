<?php
session_start();
// Xóa toàn bộ session
session_destroy();
// Chuyển hướng người dùng đến trang đăng nhập
header('Location: login.php');
exit;
?>
