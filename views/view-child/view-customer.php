<?php
require_once './dao/pdo.php';
$id = $_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM customer WHERE id = ?');
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
                    <h6 class="card-title">Thông tin AMEWEB</h6>
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="id_customer">ID Host:</label>
                    <span class="ctrl-input ctrl-input__span" type="text" id="id">
                      <?php echo $customer['id'] ?>
                    </span>
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="id_customer">User Host:</label>
                    <span class="ctrl-input ctrl-input__span" type="text" id="id">
                      <?php echo $customer['id'] ?>
                    </span>
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="id_customer">Password Host:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="id_customer" name="id_customer">
                      <?php echo $customer['id_customer']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="admin_login">Tài khoản Admin:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="admin_login" name="admin_login">
                      <?php echo $customer['admin_login']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="password_admin">Mật khẩu Admin:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="password_admin" name="password_admin">
                      <?php echo $customer['password_admin']; ?>
                    </span>
                  </div>
                </div>

                <div class="col-6 from-mn-warpper mb-20">
                  <div>
                    <h6 class="card-title">Thông tin khách hàng</h6>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_customer">Mã khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="id_customer" name="id_customer">
                      <?php echo $customer['id_customer']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="company_name">Tên công ty:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="company_name" name="company_name">
                      <?php echo $customer['company_name']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_name">Tên khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="customer_name" name="customer_name">
                      <?php echo $customer['customer_name']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="phone">Số điện thoại:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="phone" name="phone">
                      <?php echo $customer['phone']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_service">Mã dịch dụ:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="id_service" name="id_service">
                      <?php echo $customer['id_service']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_login">Tài khoản khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="customer_login" name="customer_login">
                      <?php echo $customer['customer_login']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="password_user">Mật khẩu khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span" type="text" id="password_user" name="password_user">
                      <?php echo $customer['password_user']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_mail">Email khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span " type="email" id="customer_mail" name="customer_mail">
                      <?php echo $customer['customer_mail']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_link">Liên kêt khách hàng:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="customer_link" name="customer_link">
                      <?php echo $customer['customer_link']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="status">Trạng thái:</label>
                    <!-- <input required class="ctrl-input ctrl-input__span " type="text" id="status" name="status"
                      value="<?php echo $customer['status']; ?>"> -->

                    <span class="ctrl-input ctrl-input__span" type="text" id="customer_link" name="customer_link">
                      <?php echo $status = $customer['status'] == 1 ? 'Hoạt động' : 'Nghừng kích hoạt' ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_great">Mã khuyến mãi:</label>
                    <span class="ctrl-input ctrl-input__span " type="text" id="id_great" name="id_great">
                      <?php echo $customer['id_great']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_start">Ngày bắt đầu:</label>
                    <span class="ctrl-input ctrl-input__span " type="date" id="date_start" name="date_start">
                      <?php echo $customer['date_start']; ?>
                    </span>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_end">Ngày kết thúc:</label>
                    <span class="ctrl-input ctrl-input__span " type="date" id="date_end" name="date_end">
                      <?php echo $customer['date_end'] ?>
                    </span>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container">


  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Mã Khách hàng</th>
        <th>Tên công ty</th>
        <th>Tên khách hàng</th>
        <th>Số điện thoại</th>
        <th>ID dịch vụ</th>
        <th>Đăng nhập khách hàng</th>
        <th>Đăng nhập quản trị</th>
        <th>Email</th>
        <th>Liên kết</th>
        <th>Trạng thái</th>
        <th>ID lớn nhất</th>
        <th>Ngày bắt đầu</th>
        <th>Ngày kết thúc</th>
        <th></th>
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
            <input type="text" class="edit-input" name="company_name" value="<?php echo $customer['company_name']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="customer_name" value="<?php echo $customer['customer_name']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="phone" value="<?php echo $customer['phone']; ?>">
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
            <input type="text" class="edit-input" name="customer_mail" value="<?php echo $customer['customer_mail']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="customer_link" value="<?php echo $customer['customer_link']; ?>">
          </td>
          <td>
            <?php echo $customer['status']; ?>
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
            <button class="btn-delete" data-id="<?php echo $customer['id']; ?>">Xóa</button>
            <button class="btn-edit" data-id="<?php echo $customer['id']; ?>">Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div> -->

<script>
  $(function () {

    $('#formEditCs').submit(function (event) {
      event.preventDefault();
      var customerId = $('#id', $(this).closest('div')).val();
      var formData = {
        'company_name': $('#company_name', $(this).closest('div')).val(),
        'customer_name': $('#customer_name', $(this).closest('div')).val(),
        'phone': $('#phone', $(this).closest('div')).val(),
        'customer_mail': $('#customer_mail', $(this).closest('div')).val(),
        'admin_login': $('#admin_login', $(this).closest('div')).val(),
        'password_admin': $('#password_admin', $(this).closest('div')).val(),
        'customer_link': $('#customer_link', $(this).closest('div')).val(),
        'id_customer': $('#id_customer', $(this).closest('div')).val(),
        'id_service': $('#id_service', $(this).closest('div')).val(),
        'customer_login': $('#customer_login', $(this).closest('div')).val(),
        'password_user': $('#password_user', $(this).closest('div')).val(),
        'status': $('#status', $(this).closest('div')).val(),
        'id_great': $('#id_great', $(this).closest('div')).val(),
        'date_start': $('#date_start', $(this).closest('div')).val(),
        'date_end': $('#date_end', $(this).closest('div')).val(),
      };
      $.ajax({
        type: 'PUT',
        url: './dao/edit-customer.php?id=' + customerId,
        data: JSON.stringify(formData),
        success: function (result) {
          alert('Chỉnh sửa thành công!');
        },
        error: function (err) {
          alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
          console.log('error', err);
        }
      });
    });
  });
</script>