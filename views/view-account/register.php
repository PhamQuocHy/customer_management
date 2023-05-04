<?php
require_once '../../dao/pdo.php';

// Khởi tạo biến hasError
$hasError = false;

if (isset($_POST['register'])) {
    $user_name = $_POST['user_name'];
    $user_login = $_POST['user_login'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    // Kiểm tra xem tên đăng nhập đã tồn tại chưa
    $stmt = $pdo->prepare('SELECT * FROM user WHERE user_login = :user_login');
    $stmt->execute(array(':user_login' => $user_login));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        // Nếu tên đăng nhập đã tồn tại, cập nhật biến hasError và hiển thị thông báo lỗi
        $hasError = true;
        echo '<p style="color: red;">Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.</p>';
    } else {
        // Nếu tên đăng nhập chưa tồn tại, tiến hành lưu thông tin người dùng vào CSDL
        $stmt = $pdo->prepare('INSERT INTO user (user_name, user_login, password, position) VALUES (:user_name, :user_login, :password, :position)');
        $stmt->execute(array(
            ':user_name' => $user_name,
            ':user_login' => $user_login,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':position' => $position
        ));
        // Nếu truy vấn lưu dữ liệu không thành công, cập nhật biến hasError
        if ($stmt->rowCount() === 0) {
            $hasError = true;
        }
    }
}

if ($hasError) {
    echo '<p style="color: red;">Đăng kí không thành công. Vui lòng thử lại sau.</p>';
} elseif (isset($_POST['register'])) {
    echo '<p style="color: green;">Đăng kí thành công.</p>';
    header('Location: login.php'); // Chuyển hướng sang trang đăng nhập
    exit(); // Dừng phần xử lý hiện tại
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Đăng kí</title>
</head>
<body>
	<h2>Đăng kí</h2>
	<form action="register.php" method="post">
		<div>
			<label for="user_name">User name:</label>
			<input type="text" id="user_name" name="user_name" required>
		</div>
		<div>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
		</div>
		<div>
			<label for="user_login">User login:</label>
			<input type="text" id="user_login" name="user_login" required>
		</div>
		<div>
			<label for="position">Position:</label>
			<input type="text" id="position" name="position" required>
		</div>
		
		<div>
			<input type="submit" name="register" value="Đăng kí">
		</div>
	</form>
</body>
</html>
