<?php
session_start();
require_once '../../dao/pdo.php';

// Kiểm tra xem người dùng đã nhập thông tin đăng nhập hay chưa
if (isset($_POST['login'])) {
    $user_login = $_POST['user_login'];
    $password = $_POST['password'];

    // Kiểm tra thông tin đăng nhập có đúng không
    $stmt = $pdo->prepare('SELECT * FROM user WHERE user_login = :user_login');
    $stmt->execute(array(':user_login' => $user_login));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Lưu thông tin người dùng vào session và chuyển hướng đến trang chính
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit();
    } else {
        // Thông báo lỗi đăng nhập không thành công
        echo '<p style="color: red;">Tên đăng nhập hoặc mật khẩu không đúng.</p>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="login.php" method="post">
        <div>
            <label for="user_login">User login:</label>
            <input type="text" id="user_login" name="user_login" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <input type="submit" name="login" value="Đăng nhập">
        </div>
    </form>
</body>
</html>