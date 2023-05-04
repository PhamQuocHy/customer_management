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
                    <input required class="ctrl-input " type="text" id="id_customer" name="id_customer"
                      value="<?php echo $customer['id_customer']; ?>">
                    <input required class="ctrl-input" hidden type="text" id="id" value="<?php echo $customer['id'] ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="id_customer">User Host:</label>
                    <input required class="ctrl-input " type="text" id="id_customer" name="id_customer"
                      value="<?php echo $customer['id_customer']; ?>">
                    <input required class="ctrl-input" hidden type="text" id="id" value="<?php echo $customer['id'] ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="id_customer">Password Host:</label>
                    <input required class="ctrl-input " type="text" id="id_customer" name="id_customer"
                      value="<?php echo $customer['id_customer']; ?>">
                    <input required class="ctrl-input" hidden type="text" id="id" value="<?php echo $customer['id'] ?>">
                  </div>
                </div>

                <div class="col-6 from-mn-warpper mb-20">
                  <div>
                    <h6 class="card-title">Thông tin khách hàng</h6>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_customer">Mã khách hàng:</label>
                    <input required class="ctrl-input " type="text" id="id_customer" name="id_customer"
                      value="<?php echo $customer['id_customer']; ?>">
                    <input required class="ctrl-input" hidden type="text" id="id" value="<?php echo $customer['id'] ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="company_name">Tên công ty:</label>
                    <input required class="ctrl-input " type="text" id="company_name" name="company_name"
                      value="<?php echo $customer['company_name']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_name">Tên khách hàng:</label>
                    <input required class="ctrl-input " type="text" id="customer_name" name="customer_name"
                      value="<?php echo $customer['customer_name']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="phone">Số điện thoại:</label>
                    <input required class="ctrl-input " type="text" id="phone" name="phone"
                      value="<?php echo $customer['phone']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_service">Mã dịch dụ:</label>
                    <input required class="ctrl-input " type="text" id="id_service" name="id_service"
                      value="<?php echo $customer['id_service']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_login">Tài khoản khách hàng:</label>
                    <input required class="ctrl-input " type="text" id="customer_login" name="customer_login"
                      value="<?php echo $customer['customer_login']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="password_user">Mật khẩu khách hàng:</label>
                    <input required class="ctrl-input " type="text" id="password_user" name="password_user"
                      value="<?php echo $customer['password_user']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="admin_login">Tài khoản Admin:</label>
                    <input required class="ctrl-input " type="text" id="admin_login" name="admin_login"
                      value="<?php echo $customer['admin_login']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="password_admin">Mật khẩu Admin:</label>
                    <input required class="ctrl-input " type="text" id="password_admin" name="password_admin"
                      value="<?php echo $customer['password_admin']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_mail">Email khách hàng:</label>
                    <input required class="ctrl-input " type="email" id="customer_mail" name="customer_mail"
                      value="<?php echo $customer['customer_mail']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_link">Liên kêt khách hàng:</label>
                    <input required class="ctrl-input " type="text" id="customer_link" name="customer_link"
                      value="<?php echo $customer['customer_link']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="status">Trạng thái:</label>
                    <!-- <input required class="ctrl-input " type="text" id="status" name="status"
                      value="<?php echo $customer['status']; ?>"> -->

                    <select required class="ctrl-input " type="text" id="status" name="status">
                      <option value="1" <?php if ($customer['status'] == 1)
                        echo 'selected' ?>>Đang kích hoạt</option>
                        <option value="2" <?php if ($customer['status'] == 2)
                        echo 'selected' ?>>Nghừng kích hoạt</option>
                      </select>
                    </div>

                    <div class="input-group">
                      <label class="label-input" for="id_great">Mã khuyến mãi:</label>
                      <input required class="ctrl-input " type="text" id="id_great" name="id_great"
                        value="<?php echo $customer['id_great']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_start">Ngày bắt đầu:</label>
                    <input required class="ctrl-input " type="date" id="date_start" name="date_start"
                      value="<?php echo $customer['date_start']; ?>">
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_end">Ngày kết thúc:</label>
                    <input required class="ctrl-input " type="date" id="date_end" name="date_end"
                      value="<?php echo $customer['date_end']; ?>">
                  </div>
                </div>
              </div>


              <div class="input-group justify-content-center">
                <input class="btn btn-form" type="submit" value="Thêm Khách Hàng">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- <div class="container">

  <h1>Quản lý khách hàng</h1>

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