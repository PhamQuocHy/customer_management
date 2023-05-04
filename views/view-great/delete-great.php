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
      <?php foreach ($greats as $great): ?>
        <tr>
        <td><?php echo $great['id_great']; ?></td>
          <td><?php echo $great['great_code']; ?></td>
          <td><?php echo $great['great_name']; ?></td>
          <td><?php echo $great['great_content']; ?></td>
          <td>
            <button class="btn-delete" data-id="<?php echo $great['id_great']; ?>">Xóa</button>
            <button>Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<script>
$('.btn-delete').click(function() {
  var customerId = $(this).data('id');
  if (confirm('Bạn có chắc chắn muốn xóa khách hàng này?')) {
    var row = $(this).closest('tr');
    $.ajax({
      url: '../../dao/delete-great.php',
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
