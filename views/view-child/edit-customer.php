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
          <td>
            <input type="text" class="edit-input" name="company_name" value="<?php echo $customer['company_name']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="customer_name" value="<?php echo $customer['customer_name']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="phone" value="<?php echo $customer['phone']; ?>">
          </td>
          <td><?php echo $customer['id_service']; ?></td>
          <td><?php echo $customer['customer_login']; ?></td>
          <td><?php echo $customer['admin_login']; ?></td>
          <td>
            <input type="text" class="edit-input" name="customer_mail" value="<?php echo $customer['customer_mail']; ?>">
          </td>
          <td>
            <input type="text" class="edit-input" name="customer_link" value="<?php echo $customer['customer_link']; ?>">
          </td>
          <td><?php echo $customer['status']; ?></td>
          <td><?php echo $customer['id_great']; ?></td>
          <td><?php echo $customer['date_start']; ?></td>
          <td><?php echo $customer['date_end']; ?></td>
          <td>
            <button class="btn-delete" data-id="<?php echo $customer['id']; ?>">Xóa</button>
            <button class="btn-edit" data-id="<?php echo $customer['id']; ?>">Sửa</button>
          </td>

        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>

<script>
$(function() {
  $('.btn-edit').click(function() {
    var customerId = $(this).data('id');
    var formData = {
      'company_name': $('td:nth-child(3) input.edit-input', $(this).closest('tr')).val(),
      'customer_name': $('td:nth-child(4) input.edit-input', $(this).closest('tr')).val(),
      'phone': $('td:nth-child(5) input.edit-input', $(this).closest('tr')).val(),
      'customer_mail': $('td:nth-child(9) input.edit-input', $(this).closest('tr')).val(),
      'customer_link': $('td:nth-child(10) input.edit-input', $(this).closest('tr')).val()
    };
    $.ajax({
      type: 'PUT',
      url: '../../dao/edit-customer.php' + customerId,
      data: formData,
      success: function(result) {
        alert('Chỉnh sửa thành công!');
      },
      error: function() {
        alert('Đã xảy ra lỗi, vui lòng thử lại sau.');
      }
    });
  });
});
</script>
