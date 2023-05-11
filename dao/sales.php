<?php
//truy vấn ds đã nhập
//mới lên trước
require_once 'pdo.php';

// Lấy danh sách khách hàng
$stmt = $pdo->prepare('SELECT * FROM sales');
$stmt->execute();
$sales = $stmt->fetchAll();

//thêm mới 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Nhận dữ liệu từ form

    $id_customer = $_POST['id_customer'];
    $id_service = $_POST['id_service'];
    $price = $_POST['price'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    // Thêm khách hàng mới vào cơ sở dữ liệu
    try {
        $stmt = $pdo->prepare('INSERT INTO sales (id_customer,id_service, price, date_start, date_end) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$id_customer, $id_service, $price, $date_start, $date_end]);
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
        die();
    }

    // Hiển thị thông báo và load lại trang
    echo '<script>alert("Thêm doanh thu mới thành công!"); window.history.back();</script>';
}

?>