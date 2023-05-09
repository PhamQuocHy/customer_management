<?php
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM allservice');
$stmt->execute();
$allservice = $stmt->fetchAll();
?>


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
                  <th>STT</th>
                  <th>Mã dịch vụ</th>
                  <th>Tên dịch vụ</th>
                  <th>Giá dịch vụ</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($allservice as $key => $service): ?>
                  <tr>
                    <td>
                      <?php echo ++$key ?>
                    </td>
                    <td>
                      <?php echo $service['services_code']; ?>
                    </td>
                    <td>
                      <?php echo $service['services_name']; ?>
                    </td>
                    <td>
                      <?php echo number_format($service['price_services']) ?> đ
                    </td>
                    <td>
                      <button class="btn btn-primary btn-delete"
                        data-id="<?php echo $service['id_services'] ?>">Xóa</button>
                      <a href="?action=editService&idService=<?php echo $service['id_services'] ?>&cate=service"
                        class="btn btn-primary btn-edit">Sửa</a>
                    </td>
                    <td>
                      <a href="?action=viewGreat&idGreat=<?php echo $service['id_services'] ?>&cate=great"
                        class="btn btn-primary">
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
    console.log(customerId);
    if (confirm('Bạn có chắc chắn muốn xóa khách hàng này?')) {
      var row = $(this).closest('tr');
      $.ajax({
        url: './dao/delete-service.php',
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