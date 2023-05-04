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
$stmt = $pdo->prepare('SELECT * FROM customer');
$stmt->execute();
$customers = $stmt->fetchAll();
?>
<div class="container">

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
          <td><?php echo $customer['id']; ?></td>
          <td><?php echo $customer['id_customer']; ?></td>
          <td><?php echo $customer['company_name']; ?></td>
          <td><?php echo $customer['customer_name']; ?></td>
          <td><?php echo $customer['phone']; ?></td>
          <td><?php echo $customer['id_service']; ?></td>
          <td><?php echo $customer['customer_login']; ?></td>
          <td><?php echo $customer['admin_login']; ?></td>
          <td><?php echo $customer['customer_mail']; ?></td>
          <td><?php echo $customer['customer_link']; ?></td>
          <td><?php echo $customer['status']; ?></td>
          <td><?php echo $customer['id_great']; ?></td>
          <td><?php echo $customer['date_start']; ?></td>
          <td><?php echo $customer['date_end']; ?></td>
          <td>
          <button class="btn-edit" data-id="<?php echo $customer['id']; ?>">Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
<script>
    $(document).ready(function() {
  $('.btn-edit').on('click', function() {
    var customerId = $(this).data('id');
    window.location.href = 'edit-customer.php?id=' + customerId;
  });
});

</script>
</body>
</html>