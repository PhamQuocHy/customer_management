<?php

header('Content-Type: application/json');

// Kiểm tra xem yêu cầu là PUT hay không
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
  http_response_code(500); // Phương thức không hợp lệ
  echo json_encode(array('message' => 'Phương thức không hợp lệ.'));
  exit;
}

// Lấy id của người dùng muốn cập nhật
$userId = $_GET['id'];

// Kiểm tra xem id có hợp lệ không
if (!is_numeric($userId)) {
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

// Cập nhật thông tin người dùng trong cơ sở dữ liệu
require_once 'pdo.php';
$stmt = $pdo->prepare('UPDATE user SET user_name=:user_name, user_login=:user_login, password=:password, position=:position WHERE id_user=:id_user');
$result = $stmt->execute(
  array(
    ':user_name' => $data['user_name'],
    ':user_login' => $data['user_login'],
    ':password' => $data['password'],
    ':position' => $data['position'],
    ':id_user' => $userId
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