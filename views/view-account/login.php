<?php
session_start();
require_once '../../dao/pdo.php';

// Kiểm tra xem người dùng đã nhập thông tin đăng nhập hay chưa
if (isset($_POST['login'])) {
    $user_login = $_POST['user_login'];
    $password = $_POST['password'];
    

    // Kiểm tra thông tin đăng nhập có đúng không
    // Lấy thông tin người dùng từ CSDL dựa trên tên đăng nhập
    $stmt = $pdo->prepare('SELECT * FROM user WHERE user_login = :user_login');
    $stmt->execute(array(':user_login' => $user_login));
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['password']) {
            // Lưu thông tin người dùng vào session và chuyển hướng đến trang chính
            $_SESSION['user_login'] = $user_login;
            $_SESSION['position'] = $user['position'];
            $_SESSION['user_name'] = $user['user_name'];
            // print_r($user['user_name']);
            header("Location: /ameweb_be/index.php?action=dashboard");
            // header("Location: /index.php?action=dashboard");

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
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="full">
        <div class="img-div">
            <img class="img" src="../../images/logo.png" alt="">
        </div>
        <div class="login-form">
            <form action="login.php" method="post">
                <div>
                    <label for="user_login">Tên đăng nhập:</label>
                    <input type="text" id="user_login" name="user_login" required>
                </div>
                <div>
                    <label for="password">Mật khẩu:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div>
                    <input type="submit" name="login" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
</body>

</html>