<?php
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM user');
$stmt->execute();
$greats = $stmt->fetchAll();
?>
<!--  -->

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách gói ưu đãi</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Tên Nhân Viên</th>
                  <th>User Login</th>
                  <th>Password</th>
                  <th>Chức vụ</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($greats as $great): ?>
                  <tr>
                    <td>
                      <?php echo $great['id_user']; ?>
                    </td>
                    <td>
                      <?php echo $great['user_name']; ?>
                    </td>
                    <td>
                      <?php echo $great['user_login']; ?>
                    </td>
                    <td>
                      <?php echo $great['password']; ?>
                    </td>
                    <td>
                      <?php 
                      if ($great['position'] == '1') {
                        echo 'Giám Đốc';
                    } else {
                        echo 'Nhân Viên';
                    }
                      ?>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-delete" data-id="<?php echo $great['id_user']; ?>">Xóa</button>
                    </td>

                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $('.btn-delete').click(function () {
    var greatId = $(this).data('id');
    if (confirm('Bạn có chắc chắn muốn xóa nhân viên này hàng này?')) {
      var row = $(this).closest('tr');
      $.ajax({
        url: './dao/delete-user.php',
        method: 'POST',
        data: { id: greatId },
        success: function (response) {
          alert('Xóa nhân viên thành công!');
          row.remove();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          alert('Xóa gói ưu đãi thất bại!');
        }
      });
    }
  });
</script>