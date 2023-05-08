<?php
require_once './dao/pdo.php';

$searchKeyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

// Thực hiện truy vấn với điều kiện tìm kiếm nếu có từ khóa
$sql = 'SELECT * FROM customer';
if (!empty($searchKeyword)) {
  $sql .= " WHERE id_customer LIKE '%$searchKeyword%' OR company_name LIKE '%$searchKeyword%'";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll();
?>



<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách khách hàng</h4>
          <form method="GET" action="" class="search-wrapper">
            <div class="form-group">
              <label for="search-keyword">Tìm kiếm</label>
              <input type="text" class="form-control search-input" id="search-keyword" name="search_keyword"
                placeholder="Nhập tên công ty hoặc ID khách hàng" value="<?php echo $searchKeyword ?>">

              <!-- Thêm sự kiện JS để gửi request mới khi người dùng nhập hoặc xoá ký tự -->
              <script>
                var typingTimer;
                var doneTypingInterval = 500; // Sau 500ms sẽ gửi request
                var searchKeywordInput = $('#search-keyword');

                searchKeywordInput.on('keyup', function () {
                  clearTimeout(typingTimer);
                  typingTimer = setTimeout(doneTyping, doneTypingInterval);
                });

                searchKeywordInput.on('keydown', function () {
                  clearTimeout(typingTimer);
                });

                function doneTyping() {
                  var searchKeyword = searchKeywordInput.val();
                  var url = window.location.href.split('?')[0];
                  var queryString = 'search_keyword=' + searchKeyword;
                  window.location.href = url + '?' + queryString;
                  searchKeywordInput.focus();
                }
              </script>
            </div>
            <button type="submit" class="btn btn-primary search-btn">Tìm kiếm</button>
          </form>
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
                      <a href="?action=viewUser&id=<?php echo $customer['id'] ?>" class="btn btn-primary">
                        <i style="margin: 0;" class="mdi mdi-eye-outline position-icon"></i>
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