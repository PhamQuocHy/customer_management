<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

// Lấy danh sách khách hàng
$stmt = $pdo->prepare('SELECT * FROM allservice');
$stmt->execute();
$customers = $stmt->fetchAll();

//thêm mới 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
  
    $services_code = $_POST['services_code'];
    $services_name = $_POST['services_name'];
    $price_services = $_POST['price_services'];  
    // Thêm khách hàng mới vào cơ sở dữ liệu
    try {
      $stmt = $pdo->prepare('INSERT INTO allservice (services_code,services_name, price_services) VALUES (?, ?, ?)');
      $stmt->execute([$services_code,$services_name, $price_services]);
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      die();
    }
  
    // Hiển thị thông báo và load lại trang
    echo '<script>alert("Thêm dịch vụ thành công!"); window.location.href = window.location.href;</script>';
  } 

?>
