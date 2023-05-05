<?php
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM great');
$stmt->execute();
$greats = $stmt->fetchAll();
?>
<!--  -->

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
                  <th>Mã ưu đãi</th>
                  <th>Tên ưu đãi</th>
                  <th>Ghi chú ưu đãi</th>
                  <th>Thao tác</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($greats as $great): ?>
                  <tr>
                    <td>
                      <?php echo $great['id_great']; ?>
                    </td>
                    <td>
                      <?php echo $great['great_code']; ?>
                    </td>
                    <td>
                      <?php echo $great['great_name']; ?>
                    </td>
                    <td>
                      <?php echo $great['great_content']; ?>
                    </td>
                    <td>
                      <button class="btn btn-primary btn-delete" data-id="<?php echo $great['id_great']; ?>">Xóa</button>
                      <a href="?action=editGreat&idGreat=<?php echo $great['id_great']; ?>&cate=great"
                        class="btn btn-primary btn-edit">Sửa</a>
                    </td>
                    <td>
                      <a href="?action=viewGreat&idGreat=<?php echo $great['id_great']; ?>&cate=great"
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
    var greatId = $(this).data('id');
    if (confirm('Bạn có chắc chắn muốn xóa ưu đãi này hàng này?')) {
      var row = $(this).closest('tr');
      $.ajax({
        url: './dao/delete-great.php',
        method: 'POST',
        data: { id: greatId },
        success: function (response) {
          alert('Xóa gói ưu đãi thành công!');
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