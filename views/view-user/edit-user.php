<?php
require_once './dao/pdo.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM user WHERE id_user = ?');
$stmt->execute([$id]);
$customer = $stmt->fetch();
?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thêm khách hàng mới</h4>
          <div class="form-wrapper">
            <form method="POST" action="" id="formEditCs">
              <div class="row">
              <div class="col-6 from-mn-warpper mb-20">
                                    <div>
                                        <h6 class="card-title">Thông tin AME WEB</h6>
                                    </div>
                                    <input type="hidden" id="id" name="id" value="<?php echo $customer['id_user']; ?>">
                                    <div class="input-group">
                                        <label class="label-input" for="user_name">Tên Đăng Nhập: </label>
                                        <input class="ctrl-input" type="text" id="user_name" name="user_name" value="<?php echo $customer['user_name']; ?>"><br><br>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="user_login">User Login:</label>
                                        <input class="ctrl-input" readonly type="text" id="user_login" name="user_login" value="<?php echo $customer['user_login']; ?>"><br><br>
                                    </div>
                                    <div class="input-group">
                                        <label class="label-input" for="pass_hosting">Password:</label>
                                        <input class="ctrl-input" type="text" id="password" name="password" value="<?php echo $customer['password']; ?>"><br><br>
                                    </div>

                                    <div class="input-group">
                                        <label class="label-input" for="position">Bạn là ai:</label>

                                        <select required class="ctrl-input " type="text"  id="position" name="position">
                                        <option value="1" <?php if ($customer['position'] == 1)
                                          echo 'selected' ?>>Nguyễn Phúc Trọng Nhân</option>
                                          <option value="2" <?php if ($customer['position'] == 2)
                                          echo 'selected' ?>>Nhân Viên</option>
                                        </select>
                                    </div>
                                </div>


              <div class="input-group justify-content-center">
                <input class="btn btn-form" type="submit" value="Cập Nhật">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(function () {
  $('#formEditCs').submit(function (event) {
    event.preventDefault();
    var userId = $('#id', $(this)).val();
    var formData = {
      'user_name': $('#user_name', $(this)).val(),
      'user_login': $('#user_login', $(this)).val(),
      'password': $('#password', $(this)).val(),
      'position': $('#position', $(this)).val(),
    };
    $.ajax({
      type: 'PUT',
      url: './dao/edit-user.php?id=' + userId,
      data: JSON.stringify(formData),
      contentType: 'application/json',
      success: function (result) {
        alert('Chỉnh sửa thông tin nhân sự thành công!');
        window.location.href = 'index.php?action=listCommer&cate=commer';
      },
      error: function (err) {
        alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
        console.log('error', err);
      }
    });
  });
});

</script>