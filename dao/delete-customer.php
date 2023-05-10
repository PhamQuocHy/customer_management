<?php
require_once 'pdo.php';

// Kiểm tra yêu cầu POST và tồn tại danh sách customerIds 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['customerIds'])) {
  $customerIds = $_POST['customerIds'];
  
  // Nếu danh sách customerIds khác rỗng, thực hiện xóa các khách hàng tương ứng
  if (!empty($customerIds)) {
    $customerIds = implode(',', $customerIds);
    $stmt = $pdo->prepare('DELETE FROM customer WHERE id IN (' . $customerIds . ')');
    $stmt->execute();
    
    // Trả về phản hồi với kết quả thành công
    echo json_encode(array('result' => 'success'));
  } else {
    // Trả về phản hồi với kết quả thất bại ("customerIds" rỗng)
    echo json_encode(array('result' => 'failed'));
  }
} else {
  // Trả về phản hồi với kết quả thất bại ("customerIds" không tồn tại)
  echo json_encode(array('result' => 'failed'));
}
?>
