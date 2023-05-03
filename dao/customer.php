<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

// Lấy danh sách khách hàng
$stmt = $pdo->prepare('SELECT * FROM customer');
$stmt->execute();
$customers = $stmt->fetchAll();

//thêm mới 
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form
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
  
    // Thêm khách hàng mới vào cơ sở dữ liệu
    try {
      $stmt = $pdo->prepare('INSERT INTO customer (id_customer, company_name, customer_name, phone, id_service, customer_login, admin_login, customer_mail, customer_link, status, id_great, date_start, date_end) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
      $stmt->execute([$id_customer, $company_name, $customer_name, $phone, $id_service, $customer_login, $admin_login, $customer_mail, $customer_link, $status, $id_great, $date_start, $date_end]);
    } catch(PDOException $e) {
      echo 'Error: ' . $e->getMessage();
      die();
    }
  
    // Hiển thị thông báo và load lại trang
    echo '<script>alert("Thêm khách hàng thành công!"); window.location.href = window.location.href;</script>';
  } 

?>
