<?php
require_once './dao/pdo.php';
// Thực hiện truy vấn với điều kiện tìm kiếm nếu có từ khóa
$sql = 'SELECT * FROM customer';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll();
?>
<style>
  .search-delete-container {
  display: flex;
  align-items: center;
}

.search-wrapper {
  margin-right: 10px; /* cách lề với nút xóa 10px */
}
.delete-select{
  margin-left: 846px;
  height: 36px;
  margin-top: 10px;
}

 .search-input{
    background-color: white;
    border: 1px solid lightgray;
    width: 250%;
 
    
  }
  .search-input:focus{
    background-color: white;
  }
  .label-search{
    color: black;
  }
</style>
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Danh sách khách hàng</h4>
          <div class="search-delete-container">
            <form method="GET" action="" class="search-wrapper">
              <div class="form-group">
                <label for="search-keyword" class="label-search">Tìm kiếm</label>
                <input type="text" class="form-control search-input" id="search-keyword" name="search_keyword"
                  placeholder="Nhập tên công ty hoặc ID khách hàng" value="">
              </div>
              <script>
                $(document).ready(function() {
                  $('#search-keyword').on('input', function() { // attach input event to the search box
                    let searchKeyword = $(this).val().trim();
                    
                    $.ajax({
                      url: './dao/search.php',
                      method: 'GET',
                      data: { search_keyword: searchKeyword },
                      success: function(response) {
                        console.log(response); // kiểm tra kết quả trả về
                        $('tbody').html(''); // xóa nội dung hiển thị trước đó
                        if (response && response.length > 0) {
                        // hiển thị danh sách khách hàng
                        $.each(response, function(index, customer) {
                          $('tbody').append(
                            '<tr>' +
                            '<td><input type="checkbox" class="select-customer" value="' + customer.id + '"></td>' +
                            '<td>' + customer.id_customer + '</td>' +
                            '<td>' + customer.ip_hosting + '</td>' +
                            '<td>' + customer.user_hosting + '</td>' +
                            '<td>' + customer.pass_hosting + '</td>' +
                            '<td>' + customer.company_name + '</td>' +
                            '<td>' + customer.customer_name + '</td>' +
                            '<td>' + customer.phone + '</td>' +
                            '<td>' + customer.customer_login + '</td>' +
                            '<td>' + customer.password_user + '</td>' +
                            '<td>' + customer.customer_link + '</td>' +
                            '<td>' + (customer.status == 1 ? 'Kích hoạt' : 'Nghừng kích hoạt') + '</td>' +
                            '<td>' + customer.date_start + '</td>' +
                            '<td>' + customer.date_end + '</td>' +
                            '<td>' +
                            '<button class="btn btn-primary btn-delete" data-id="' + customer.id + '">Xóa</button>' +
                            '<a href="?action=editUser&id=' + customer.id + '" class="btn btn-primary btn-edit">Sửa</a>' +
                            '</td>' +
                            '<td><a href="?action=viewUser&id=' + customer.id + '" class="btn btn-primary"><i style="margin: 0;" class="mdi mdi-eye-outline position-icon"></i></a></td>' +
                            '</tr>'
                          );
                        });
                      } else {
                        // hiển thị thông báo không tìm thấy kết quả
                        $('tbody').html('<tr><td colspan="15">Không tìm thấy kết quả phù hợp!</td></tr>');
                      }

                      },
                      error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                        alert('Tìm kiếm thất bại!');
                      }
                    });
                  });
                });
            </script>
            </form>
            <button type="button" class="btn btn-primary delete-select" id="btn-delete-selected-customer">Xóa mục đã chọn</button> <!-- Thêm nút xóa được chọn -->
          </div>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th><input type="checkbox" id="select-all"></th>
                  <th>Mã Khách hàng</th>
                  <th>IP Hosting</th>
                  <th>User Hosting</th>
                  <th>PassWord Hosting</th>
                  <th>Tên công ty</th>
                  <th>Tên khách hàng</th>
                  <th>Số điện thoại</th>
                  <th>Đăng nhập khách hàng</th>
                  <th>Mật khẩu khách hàng</th>
                  <th>Liên kết</th>
                  <th>Trạng thái</th>
                  <th>ID Ưu đãi</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($customers as $customer): ?>
                  <tr>
                    <td>
                      <input type="checkbox" class="select-customer" value="<?php echo $customer['id']; ?>">
                    </td>
                    <td>
                      <?php echo $customer['id_customer']; ?>
                    </td>
                    <td>
                      <?php echo $customer['ip_hosting']; ?>
                    </td>
                    <td>
                      <?php echo $customer['user_hosting']; ?>
                    </td>
                    <td>
                      <?php echo $customer['pass_hosting']; ?>
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
                      <?php echo $customer['customer_login']; ?>
                    </td>
                    <td>
                      <?php echo $customer['password_user']; ?>
                    </td>
                    
                    <td>
                      <?php echo $customer['customer_link']; ?>
                    </td>
                    <td>
                      <?php echo $status = $customer['status'] == 1 ? 'Kích hoạt' : 'Nghừng kích hoạt' ?>
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

  $(document).ready(function() {
        // Chọn mọi checkbox nếu checkbox header được chọn
        $('#select-all').click(function(event) {
            if (this.checked) {
                $('.select-customer').each(function() {
                    this.checked = true;
                });
            } else {
                $('.select-customer').each(function() {
                    this.checked = false;
                });
            }
        });

        // Xóa các khách hàng được chọn
        $('#btn-delete-selected-customer').click(function() {
            var customerIds = [];
            $(".select-customer:checked").each(function() {
                customerIds.push($(this).val());
            });
            if (customerIds.length > 0) {
                if (confirm('Bạn có muốn xóa các khách hàng đã chọn?')) {
                    $.ajax({
                        url: './dao/delete-customer.php',
                        type: 'post',
                        data: {customerIds: customerIds},
                        success:function(response) {
                            if (response.result === 'success') {
                                alert('Xóa các khách hàng đã chọn thành công!');
                                location.reload();
                            } else {
                                alert('Không thể xóa khách hàng đã chọn!');
                            }
                        },
                        error:function(error) {
                            alert('Có lỗi xảy ra, vui lòng thử lại sau!');
                            console.log(error);
                        }
                    });
                }
            } else {
                alert('Vui lòng chọn ít nhất một khách hàng để xóa!');
            }
        });
    });
</script>