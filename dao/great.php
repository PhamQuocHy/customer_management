<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

// Lấy danh sách khách hàng
$stmt = $pdo->prepare('SELECT * FROM great');
$stmt->execute();
$greats = $stmt->fetchAll();

//thêm mới 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
  
    $great_code = $_POST['great_code'];
    $great_name = $_POST['great_name'];
    $great_content = $_POST['great_content'];  
    // Thêm khách hàng mới vào cơ sở dữ liệu
    try {
      $stmt = $pdo->prepare('INSERT INTO great (great_code,great_name, great_content) VALUES (?, ?, ?)');
      $stmt->execute([$great_code,$great_name, $great_content]);
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      die();
    }
  
    // Hiển thị thông báo và load lại trang
    echo '<script>alert("Thêm ưu đãi thành công!"); window.location.href = window.location.href;</script>';
  } 

?>
