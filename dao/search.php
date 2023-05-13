<?php
require_once 'pdo.php';

$searchKeyword = isset($_GET['search_keyword']) ? $_GET['search_keyword'] : '';

// Thực hiện truy vấn với điều kiện tìm kiếm nếu có từ khóa
$sql = 'SELECT * FROM customer';
if (!empty($searchKeyword)) {
  $sql .= " WHERE id_customer LIKE '%$searchKeyword%' OR company_name LIKE '%$searchKeyword%'";
}

$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($customers);
?>