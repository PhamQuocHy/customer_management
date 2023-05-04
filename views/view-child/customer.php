<?php
require_once './dao/customer.php';
require_once './dao/pdo.php';

?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Thêm khách hàng mới</h4>
          <div class="form-wrapper">
            <form method="POST" action="">
              <div class="row">
                <div class="col-6 from-mn-warpper mb-20">
                  <div class="input-group">
                    <label class="label-input" for="id_customer">Mã khách hàng:</label>
                    <input class="ctrl-input" type="text" id="id_customer" name="id_customer"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="company_name">Tên công ty:</label>
                    <input class="ctrl-input" type="text" id="company_name" name="company_name"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_name">Tên khách hàng:</label>
                    <input class="ctrl-input" type="text" id="customer_name" name="customer_name"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="phone">Số điện thoại:</label>
                    <input class="ctrl-input" type="text" id="phone" name="phone"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_service">Mã dịch dụ:</label>
                    <input class="ctrl-input" type="text" id="id_service" name="id_service"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_login">Tài khoản khách hàng:</label>
                    <input class="ctrl-input" type="text" id="customer_login" name="customer_login"><br><br>
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="password_user">Mật khẩu khách hàng:</label>
                    <input class="ctrl-input" type="text" id="password_user" name="password_user"><br><br>
                  </div>
                </div>

                <div class="col-6 from-mn-warpper mb-20">
                  <div class="input-group">
                    <label class="label-input" for="admin_login">Tài khoản Admin:</label>
                    <input class="ctrl-input" type="text" id="admin_login" name="admin_login"><br><br>
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="password_admin">Mật khẩu admin:</label>
                    <input class="ctrl-input" type="text" id="password_admin" name="password_admin"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_mail">Email khách hàng:</label>
                    <input class="ctrl-input" type="email" id="customer_mail" name="customer_mail"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="customer_link">Liên kêt khách hàng:</label>
                    <input class="ctrl-input" type="text" id="customer_link" name="customer_link"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="status">Trạng thái:</label>
                    <!-- <input required class="ctrl-input " type="text" id="status" name="status"
                      value="<?php echo $customer['status']; ?>"> -->

                    <select required class="ctrl-input " type="text" id="status" name="status">
                      <option value="1">Kích hoạt</option>
                      <option value="2">Nghừng kích hoạt</option>
                    </select>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="id_great">Mã khuyến mãi:</label>
                    <input class="ctrl-input" type="text" id="id_great" name="id_great"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_start">Ngày bắt đầu:</label>
                    <input class="ctrl-input" type="date" id="date_start" name="date_start"><br><br>
                  </div>

                  <div class="input-group">
                    <label class="label-input" for="date_end">Ngày kết thúc:</label>
                    <input class="ctrl-input" type="date" id="date_end" name="date_end"><br><br>
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