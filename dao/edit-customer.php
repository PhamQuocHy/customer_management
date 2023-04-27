<?php

header('Content-Type: application/json');

// Kiểm tra xem yêu cầu là PUT hay không
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  http_response_code(405); // Phương thức không hợp lệ
  echo json_encode(array('message' => 'Phương thức không hợp lệ.'));
  exit;
}

// Lấy id của khách hàng muốn cập nhật
$customerId = $_GET['id'];

// Kiểm tra xem id có hợp lệ không
if (!is_numeric($customerId)) {
  http_response_code(400); // Yêu cầu không hợp lệ
  echo json_encode(array('message' => 'Id không hợp lệ.'));
  exit;
}

// Lấy dữ liệu được truyền vào từ yêu cầu PUT
$data = json_decode(file_get_contents('php://input'), true);

// Cập nhật thông tin khách hàng trong cơ sở dữ liệu
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('UPDATE customer SET company_name = :company_name, customer_name = :customer_name, phone = :phone, customer_mail = :customer_mail, customer_link = :customer_link WHERE id = :id');
$result = $stmt->execute(array(
  ':company_name' => $data['company_name'],
  ':customer_name' => $data['customer_name'],
  ':phone' => $data['phone'],
  ':customer_mail' => $data['customer_mail'],
  ':customer_link' => $data['customer_link'],
  ':id' => $customerId
));

if (!$result) {
  http_response_code(500); // Lỗi máy chủ
  echo json_encode(array('message' => 'Đã xảy ra lỗi, vui lòng thử lại sau.'));
  exit;
}

http_response_code(200); // Ok
echo json_encode(array('message' => 'Cập nhật thông tin thành công!'));

?>