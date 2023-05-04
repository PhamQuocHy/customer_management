<?php

header('Content-Type: application/json');

// Kiểm tra xem yêu cầu là PUT hay không
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  http_response_code(500); // Phương thức không hợp lệ
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
if (!isset($data)) {
  http_response_code(402); //
  echo json_encode(array('data' => $data));
  exit;
}

// Cập nhật thông tin khách hàng trong cơ sở dữ liệu
require_once './pdo.php';
// $stmt = $pdo->prepare('UPDATE customer SET company_name = :company_name, customer_name = :customer_name, phone = :phone, customer_mail = :customer_mail, customer_link = :customer_link WHERE id = :id');
$stmt = $pdo->prepare('UPDATE customer SET id_customer=:id_customer, company_name=:company_name, customer_name=:customer_name, phone=:phone, id_service=:id_service, customer_login=:customer_login, password_user=:password_user, admin_login=:admin_login, password_admin=:password_admin, customer_mail=:customer_mail, customer_link=:customer_link, status=:status, id_great=:id_great, date_start=:date_start, date_end=:date_end WHERE id=:id');
$result = $stmt->execute(
  array(
    ':id_customer' => $data['id_customer'],
    ':company_name' => $data['company_name'],
    ':customer_name' => $data['customer_name'],
    ':phone' => $data['phone'],
    ':id_service' => $data['id_service'],
    ':customer_login' => $data['customer_login'],
    ':password_user' => $data['password_user'],
    ':admin_login' => $data['admin_login'],
    ':password_admin' => $data['password_admin'],
    ':customer_mail' => $data['customer_mail'],
    ':customer_link' => $data['customer_link'],
    ':status' => $data['status'],
    ':id_great' => $data['id_great'],
    ':date_start' => $data['date_start'],
    ':date_end' => $data['date_end'],
    ':id' => $customerId
  )
);

if (!$result) {
  http_response_code(500); // Lỗi máy chủ
  echo json_encode(array('message' => 'Đã xảy ra lỗi, vui lòng thử lại sau.'));
  exit;
}

http_response_code(200); // Ok
echo json_encode(array('message' => 'Cập nhật thông tin thành công!'));

?>