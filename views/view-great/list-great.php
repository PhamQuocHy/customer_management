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
$stmt = $pdo->prepare('SELECT * FROM great');
$stmt->execute();
$greats = $stmt->fetchAll();
?>
<div class="container">

  <h1>Quản lý dịch vụ</h1>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Mã ưu đãi</th>
        <th>Tên ưu đãi</th>
        <th>Giá ghi chú</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($greats as $great): ?>
        <tr>
          <td><?php echo $great['id_great']; ?></td>
          <td><?php echo $great['great_code']; ?></td>
          <td><?php echo $great['great_name']; ?></td>
          <td><?php echo $great['great_content']; ?></td>
          <td>
          <button class="btn-edit" data-id="<?php echo $great['id_great']; ?>">Sửa</button>
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
    window.location.href = 'edit-great.php?id_great=' + serviceId;
  });
});


</script>
</body>
</html>
