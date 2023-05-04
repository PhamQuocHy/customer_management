<?php
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM customer');
$stmt->execute();
$customers = $stmt->fetchAll();
?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách khách hàng</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Mã Khách hàng</th>
                  <th>Tên công ty</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>ID dịch vụ</th>
                  <th>Đăng nhập khách hàng</th>
                  <th>Mật khẩu khách hàng</th>
                  <th>Đăng nhập quản trị</th>
                  <th>Mật khẩu quản trị</th>
                  <th>Email</th>
                  <th>Liên kết</th>
                  <th>Trạng thái</th>
                  <th>ID lớn nhất</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customers as $customer): ?>
                  <tr>
                    <td>
                      <?php echo $customer['id']; ?>
                    </td>
                    <td>
                      <?php echo $customer['id_customer']; ?>
                    </td>
                    <td>
                      <?php echo $customer['company_name']; ?>
                    </td>
                    <td>
                      <?php echo $customer['customer_name']; ?>
                    </td>
                    <td>
                      <?php echo $customer['phone']; ?>
                    </td>
                    <td>
                      <?php echo $customer['id_service']; ?>
                    </td>
                    <td>
                      <?php echo $customer['customer_login']; ?>
                    </td>
                    <td>
                      <?php echo $customer['password_user']; ?>
                    </td>
                    <td>
                      <?php echo $customer['admin_login']; ?>
                    </td>
                    <td>
                      <?php echo $customer['password_admin']; ?>
                    </td>
                    <td>
                      <?php echo $customer['customer_mail']; ?>
                    </td>
                    <td>
                      <?php echo $customer['customer_link']; ?>
                    </td>
                    <td>
                      <?php echo $status = $customer['status'] == 1 ? 'Kích hoạt' : 'Nghừng kích hoạt' ?>
                    </td>
                    <td>
                      <?php echo $customer['id_great']; ?>
                    </td>
                    <td>
                      <?php echo $customer['date_start']; ?>
                    </td>
                    <td>
                      <?php echo $customer['date_end']; ?>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-delete" data-id="<?php echo $customer['id']; ?>">Xóa</button>
                      <a href="?action=editUser&id=<?php echo $customer['id'] ?>" class="btn btn-primary btn-edit">Sửa</a>
                    </td>
                    <td>
                      <a href="?action=view&id=<?php echo $customer['id'] ?>" class="btn">
                        <i class="mdi mdi-eye-outline btn btn-primary"></i>
                      </a>
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
    var customerId = $(this).data('id');
    if (confirm('Bạn có chắc chắn muốn xóa khách hàng này?')) {
      var row = $(this).closest('tr');
      $.ajax({
        url: './dao/delete-customer.php',
        method: 'POST',
        data: { id: customerId },
        success: function (response) {
          alert('Xóa khách hàng thành công!');
          row.remove();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log(textStatus, errorThrown);
          alert('Xóa khách hàng thất bại!');
        }
      });
    }
  });
</script>