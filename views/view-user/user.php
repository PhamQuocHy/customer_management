<?php
require_once "./dao/pdo.php";

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
        ?>
        <script>
            alert("Tên đăng nhập đã tồn tại. Vui lòng chọn tên khác.");
        </script>
        <?php
    } else {
        // Nếu tên đăng nhập chưa tồn tại, tiến hành lưu thông tin người dùng vào CSDL
        $stmt = $pdo->prepare('INSERT INTO user (user_name, user_login, password, position) VALUES (:user_name, :user_login, :password, :position)');
            $stmt->execute(array(
                ':user_name' => $user_name,
                ':user_login' => $user_login,
                ':password' => $password,
                ':position' => $position
            ));

        // Nếu truy vấn lưu dữ liệu không thành công, cập nhật biến hasError
        if ($stmt->rowCount() === 0) {
            $hasError = true;
        }
    }
}

if ($hasError) {
    ?>
    <script>
        alert("Thêm nhân viên không thành công. Vui lòng thử lại sau.");
    </script>
    <?php
} elseif (isset($_POST['register'])) {
    ?>
    <script>
        alert("Thêm nhân viên thành công.");
    </script>
    <?php
}

?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Thêm khách nhân viên mới</h4>
                    <div class="form-wrapper">
                        <form method="POST" action="">
                            <div class="row">
                                <div class="col-6 from-mn-warpper mb-20">
                                    <div>
                                        <h6 class="card-title">Thông tin AME WEB</h6>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="user_name">Tên Đăng Nhập: </label>
                                        <input class="ctrl-input" type="text" id="user_name" name="user_name"><br><br>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="user_login">User Login:</label>
                                        <input class="ctrl-input" type="text" id="user_login" name="user_login"><br><br>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="pass_hosting">Password:</label>
                                        <input class="ctrl-input" type="password" id="password" name="password"><br><br>
                                    </div>

                                    <div class="input-group">
                                        <label class="label-input" for="position">Bạn là ai:</label>
                                        <select required class="ctrl-input " type="text"  id="position" name="position">
                                                <option value="1">Nguyễn Phúc Trọng Nhân</option>
                                                <option value="2" selected>Nhân Viên</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="input-group justify-content-center">
                                <input class="btn btn-form" type="submit" name="register"  value="Thêm nhân viên">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
