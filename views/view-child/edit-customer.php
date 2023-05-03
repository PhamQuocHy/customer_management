<?php
if(isset($_POST['submit'])){
  $id = $_POST['id'];
  $id_customer = $_POST['id_customer'];
  $company_name = $_POST['company_name'];
  $customer_name = $_POST['customer_name'];
  $phone = $_POST['phone'];
  $id_service = $_POST['id_service'];
  $customer_login = $_POST['customer_login'];
  $admin_login = $_POST['admin_login'];
  $customer_mail = $_POST['customer_mail'];
  $customer_link = $_POST['customer_link'];
  $status = $_POST['status'];
  $id_great = $_POST['id_great'];
  $date_start = $_POST['date_start'];
  $date_end = $_POST['date_end'];

  require_once '../../dao/pdo.php';
  $stmt = $pdo->prepare('UPDATE customer SET id_customer=:id_customer, company_name=:company_name, customer_name=:customer_name, phone=:phone, id_service=:id_service, customer_login=:customer_login, admin_login=:admin_login, customer_mail=:customer_mail, customer_link=:customer_link, status=:status, id_great=:id_great, date_start=:date_start, date_end=:date_end WHERE id=:id');
  $stmt->execute(array(
     ':id_customer' => $id_customer,
     ':company_name' => $company_name,
     ':customer_name' => $customer_name,
     ':phone' => $phone,
     ':id_service' => $id_service,
     ':customer_login' => $customer_login,
     ':admin_login' => $admin_login,
     ':customer_mail' => $customer_mail,
     ':customer_link' => $customer_link,
     ':status' => $status,
     ':id_great' => $id_great,
     ':date_start' => $date_start,
     ':date_end' => $date_end,
     ':id' => $id
  ));
if($stmt->rowCount() > 0){
  echo '<script>alert("Cập nhật thông tin thành công!"); window.location.href = "list-customer.php";</script>';
} else {
  echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
}

}

$id = $_GET['id'];
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM customer WHERE id=:id');
$stmt->execute(array(':id' => $id));
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chỉnh sửa thông tin khách hàng</title>
</head>
<body>
  <h1>Chỉnh sửa thông tin khách hàng</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div>
      <label for="id_customer">Mã khách hàng:</label>
      <input type="text" name="id_customer" value="<?php echo htmlspecialchars($customer['id_customer']); ?>" required>
    </div>
    <div>
      <label for="company_name">Tên công ty:</label>
      <input type="text" name="company_name" value="<?php echo htmlspecialchars($customer['company_name']); ?>" required>
    </div>
    <div>
      <label for="customer_name">Tên khách hàng:</label>
      <input type="text" name="customer_name" value="<?php echo htmlspecialchars($customer['customer_name']); ?>" required>
    </div>
    <div>
      <label for="phone">Số điện thoại:</label>
      <input type="tel" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>" required>
    </div>
    <div>
      <label for="id_service">ID dịch vụ:</label>
      <input type="text" name="id_service" value="<?php echo htmlspecialchars($customer['id_service']); ?>" required>
    </div>
    <div>
      <label for="customer_login">Đăng nhập khách hàng:</label>
      <input type="text" name="customer_login" value="<?php echo htmlspecialchars($customer['customer_login']); ?>" required>
    </div>
    <div>
      <label for="admin_login">Đăng nhập quản trị:</label>
      <input type="text" name="admin_login" value="<?php echo htmlspecialchars($customer['admin_login']); ?>" required>
    </div>
    <div>
      <label for="customer_mail">Email:</label>
      <input type="email" name="customer_mail" value="<?php echo htmlspecialchars($customer['customer_mail']); ?>" required>
    </div>
    <div>
      <label for="customer_link">Liên kết:</label>
      <input type="text" name="customer_link" value="<?php echo htmlspecialchars($customer['customer_link']); ?>" required>
    </div>
    <div>
      <label for="status">Trạng thái:</label>
      <input type="text" name="status" value="<?php echo htmlspecialchars($customer['status']); ?>" required>
    </div>
    <div>
      <label for="id_great">ID lớn nhất:</label>
      <input type="text" name="id_great" value="<?php echo htmlspecialchars($customer['id_great']); ?>" required>
    </div>
    <div>
      <label for="date_start">Ngày bắt đầu:</label>
      <input type="date" name="date_start" value="<?php echo htmlspecialchars($customer['date_start']); ?>" required>
    </div>
    <div>
      <label for="date_end">Ngày kết thúc:</label>
      <input type="date" name="date_end" value="<?php echo htmlspecialchars($customer['date_end']); ?>" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</body>


</html>