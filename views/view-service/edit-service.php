<?php
if(isset($_POST['submit'])){
  $id_services = $_POST['id_services'];
  $services_code = $_POST['services_code'];
  $services_name = $_POST['services_name'];
  $price_services = $_POST['price_services'];
  
  require_once '../../dao/pdo.php';
  $stmt = $pdo->prepare('UPDATE allservice SET id_services=:id_services, services_code=:services_code, services_name=:services_name, price_services=:price_services WHERE id_services=:id_services');
  $stmt->execute(array(
     ':id_services' => $id_services,
     ':services_code' => $services_code,
     ':services_name' => $services_name,
     ':price_services' => $price_services
  ));
if($stmt->rowCount() > 0){
  echo '<script>alert("Cập nhật thông tin thành công!"); window.location.href = "list-service.php";</script>';
} else {
  echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
}

}

$id_services = $_GET['id_services'];
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM allservice WHERE id_services=:id_services');
$stmt->execute(array(':id_services' => $id_services));
$allservice = $stmt->fetch(PDO::FETCH_ASSOC);
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
  <input type="hidden" name="id_services" value="<?php echo $id_services; ?>">
    <div>
      <label for="id_customer">Mã dịch vụ:</label>
      <input type="text" name="services_code" value="<?php echo htmlspecialchars($allservice['services_code']); ?>" required>
    </div>
    <div>
      <label for="company_name">Tên Dịch vụ:</label>
      <input type="text" name="services_name" value="<?php echo htmlspecialchars($allservice['services_name']); ?>" required>
    </div>
    <div>
      <label for="customer_name">Giá dịch vụ:</label>
      <input type="text" name="price_services" value="<?php echo htmlspecialchars($allservice['price_services']); ?>" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</body>


</html>