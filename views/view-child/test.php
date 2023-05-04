<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Quản lý khách hàng</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <?php
    require_once '../../dao/pdo.php';
    $stmt = $pdo->prepare('SELECT * FROM customer');
    $stmt->execute();
    $customers = $stmt->fetchAll();
    ?>
    <div class="container">

        <h1>Quản lý khách hàng</h1>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Mã Khách hàng</th>
                    <th>Tên công ty</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
                    <th>ID dịch vụ</th>
                    <th>Đăng nhập khách hàng</th>
                    <th>Đăng nhập quản trị</th>
                    <th>Email</th>
                    <th>Liên kết</th>
                    <th>Trạng thái</th>
                    <th>ID lớn nhất</th>
                    <th>Ngày bắt đầu</th>
                    <th>Ngày kết thúc</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td>
                            <?php echo $customer['id']; ?>
                        </td>
                        <td>
                            <?php echo $customer['id_customer']; ?>
                        </td>
                        <td>
                            <?php echo $customer['company_name']; ?>
                        </td>
                        <td>
                            <?php echo $customer['customer_name']; ?>
                        </td>
                        <td>
                            <?php echo $customer['phone']; ?>
                        </td>
                        <td>
                            <?php echo $customer['id_service']; ?>
                        </td>
                        <td>
                            <?php echo $customer['customer_login']; ?>
                        </td>
                        <td>
                            <?php echo $customer['admin_login']; ?>
                        </td>
                        <td>
                            <?php echo $customer['customer_mail']; ?>
                        </td>
                        <td>
                            <?php echo $customer['customer_link']; ?>
                        </td>
                        <td>
                            <?php echo $customer['status']; ?>
                        </td>
                        <td>
                            <?php echo $customer['id_great']; ?>
                        </td>
                        <td>
                            <?php echo $customer['date_start']; ?>
                        </td>
                        <td>
                            <?php echo $customer['date_end']; ?>
                        </td>
                        <td>
                            <button class="btn-edit" data-id="<?php echo $customer['id']; ?>">Sửa</button>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <script>
        $(document).ready(function () {
            $('.btn-edit').on('click', function () {
                var customerId = $(this).data('id');
                window.location.href = 'edit-customer.php?id=' + customerId;
            });
        });

    </script>
</body>

<?php
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
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

    require_once '../../dao/pdo.php';
    $stmt = $pdo->prepare('UPDATE customer SET id_customer=:id_customer, company_name=:company_name, customer_name=:customer_name, phone=:phone, id_service=:id_service, customer_login=:customer_login, admin_login=:admin_login, customer_mail=:customer_mail, customer_link=:customer_link, status=:status, id_great=:id_great, date_start=:date_start, date_end=:date_end WHERE id=:id');
    $stmt->execute(
        array(
            ':id_customer' => $id_customer,
            ':company_name' => $company_name,
            ':customer_name' => $customer_name,
            ':phone' => $phone,
            ':id_service' => $id_service,
            ':customer_login' => $customer_login,
            ':admin_login' => $admin_login,
            ':customer_mail' => $customer_mail,
            ':customer_link' => $customer_link,
            ':status' => $status,
            ':id_great' => $id_great,
            ':date_start' => $date_start,
            ':date_end' => $date_end,
            ':id' => $id
        )
    );
    if ($stmt->rowCount() > 0) {
        echo '<script>alert("Cập nhật thông tin thành công!"); window.location.href = "list-customer.php";</script>';
    } else {
        echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
    }

}

$id = $_GET['id'];
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM customer WHERE id=:id');
$stmt->execute(array(':id' => $id));
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
?>

</html>