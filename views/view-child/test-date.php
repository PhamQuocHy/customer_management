<?php
require_once '../../dao/pdo.php';
require_once '../../dao/customer.php';


// Lặp lại từng khách hàng để kiểm tra ngày hết hạn
foreach ($customers as $customer) {
    $expiration_date = $customer['date_end'];

    // Kiểm tra ngày hết hạn nếu khách hàng vẫn còn hiệu lực
    if ($expiration_date != null) {
        // Ngày hết hạn
        $expiry_date = date_create_from_format('Y-m-d', $expiration_date);

        // Ngày hiện tại
        $current_date = new DateTime();

        // Tính số ngày còn lại cho đến ngày hết hạn
        $days_left = $expiry_date->diff($current_date)->days;

        // Kiểm tra nếu số ngày còn lại nhỏ hơn hoặc bằng 14 hoặc bằng $days_left
        if ($days_left <= 14 || $current_date == $expiry_date) {
            // Kiểm tra nếu phần tử trong mảng $customer đã được định nghĩa
            if (isset($customer['company_name']) && isset($customer['id_customer'])) {
                // Chuẩn bị nội dung tin nhắn
                $message = "Khách hàng {$customer['company_name']} còn $days_left ngày để gia hạn đến hết ngày {$expiry_date->format('d/m/Y')}";

                // Thay đổi Token và Chat ID của bạn tại đây
                $token = '6291808784:AAEaHQA8XJUwxiSYB76B-Qv9ix4P4PO87lI';
                $chat_id = '5567563439';
                // $chat_id = '-938243339';

                // Gửi tin nhắn đến chat trong Telegram
                $url = "https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$message";
                file_get_contents($url);
            } else {
                // Hiển thị thông tin lỗi
                echo "<p>Thông tin khách hàng không hợp lệ!</p>";
            }
        }
    }
}
?>
