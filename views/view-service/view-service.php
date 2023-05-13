<?php
require_once './dao/pdo.php';
$id = $_GET['idService'];
// echo $id;
$stmt = $pdo->prepare('SELECT * FROM allservice WHERE id_services  = ?');
$stmt->execute([$id]);
$service = $stmt->fetch();
?>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Chi tiết dịch vụ
                        <?php echo htmlspecialchars($service['services_name']); ?>
                    </h4>
                    <div class="form-wrapper">
                        <div class="form-flex--wrapper">
                            <div class="from-mn-warpper mb-20">
                                <div class="input-group">
                                    <label class="label-input" for="services_code">Mã dịch vụ:</label>
                                    <span class="ctrl-input ctrl-input__span " type="text" id="services_code"
                                        name="services_code">
                                        <?php echo htmlspecialchars($service['services_code']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input" for="services_name">Tên dịch vụ:</label>
                                    <span class="ctrl-input ctrl-input__span " type="text" id="services_name"
                                        name="services_name">
                                        <?php echo htmlspecialchars($service['services_name']); ?>
                                    </span>
                                </div>
                                <div class="input-group">
                                    <label class="label-input label-top" for="price_services">Giá dịch vụ:</label>
                                    <span required class="ctrl-input ctrl-input__span" type="text"
                                        id="price_services"><?php echo number_format($service['price_services']) ?>
                                        đ</span>
                                </div>

                                <div class="input-group justify-content-end mt-30">
                                    <a href="?action=listService&cate=service" class="btn btn-form"
                                        name="submitBtn">Quay
                                        lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>