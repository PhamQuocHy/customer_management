<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Quản lý khách hàng</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM allservice');
$stmt->execute();
$allservice = $stmt->fetchAll();
?>
<div class="container">

  <h1>Quản lý khách hàng</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Mã dịch vụ</th>
        <th>Tên dịch vụ</th>
        <th>Giá dịch vụ</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($allservice as $services): ?>
        <tr>
          <td><?php echo $services['id_services']; ?></td>
          <td><?php echo $services['services_code']; ?></td>
          <td><?php echo $services['services_name']; ?></td>
          <td><?php echo $services['price_services']; ?></td>
          <td>
            <button class="btn-delete" data-id="<?php echo $services['id_services']; ?>">Xóa</button>
            <button>Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<script>
$('.btn-delete').click(function() {
  var customerId = $(this).data('id_services');
  if (confirm('Bạn có chắc chắn muốn xóa khách hàng này?')) {
    var row = $(this).closest('tr');
    $.ajax({
      url: '../../dao/delete-service.php',
      method: 'POST',
      data: { id: customerId },
      success: function(response) {
        alert('Xóa khách hàng thành công!');
        row.remove();
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
        alert('Xóa khách hàng thất bại!');
      }
    });
  }
});
</script>

</body>
</html>
