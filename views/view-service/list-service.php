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

  <h1>Quản lý dịch vụ</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Mã Dịch vụ</th>
        <th>Tên dịch vụ</th>
        <th>Giá dịch vụ</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($allservice as $service): ?>
        <tr>
          <td><?php echo $service['id_services']; ?></td>
          <td><?php echo $service['services_code']; ?></td>
          <td><?php echo $service['services_name']; ?></td>
          <td><?php echo $service['price_services']; ?></td>
          <td>
          <button class="btn-edit" data-id="<?php echo $service['id_services']; ?>">Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<script>
  $(document).ready(function() {
  $('.btn-edit').on('click', function() {
    var serviceId = $(this).data('id');
    window.location.href = 'edit-service.php?id_services=' + serviceId;
  });
});


</script>
</body>
</html>
