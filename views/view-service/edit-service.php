<?php
if (isset($_POST['submitBtn'])) {
  $id_services = $_POST['id_services'];
  $services_code = $_POST['services_code'];
  $services_name = $_POST['services_name'];
  $price_services = $_POST['price_services'];

  require_once './dao/pdo.php';
  $stmt = $pdo->prepare('UPDATE allservice SET id_services=:id_services, services_code=:services_code, services_name=:services_name, price_services=:price_services WHERE id_services=:id_services');
  $stmt->execute(
    array(
      ':id_services' => $id_services,
      ':services_code' => $services_code,
      ':services_name' => $services_name,
      ':price_services' => $price_services
    )
  );
  if ($stmt->rowCount() > 0) {
    echo '<script>alert("Cập nhật thông tin thành công!"); window.location.href = "?action=listService&cate=service";</script>';
  } else {
    echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
  }
}

$id_services = $_GET['idService'];
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM allservice WHERE id_services=:id_services');
$stmt->execute(array(':id_services' => $id_services));
$allservice = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật gói ưu đãi</h4>
          <div class="form-wrapper">

            <form method="POST" action="">
              <div class="form-flex--wrapper">
                <div class="from-mn-warpper mb-20">
                  <div class="input-group">
                    <label class="label-input" for="services_code">Mã dịch vụ:</label>
                    <input required class="ctrl-input " type="text" id="services_code" name="services_code"
                      value="<?php echo htmlspecialchars($allservice['services_code']); ?>">
                    <input type="hidden" name="id_services" value="<?php echo $id_services; ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="services_name">Tên dịch vụ:</label>
                    <input required class="ctrl-input " type="text" id="services_name" name="services_name"
                      value="<?php echo htmlspecialchars($allservice['services_name']); ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input label-top" for="price_services">Giá dịch vụ:</label>
                    <textarea required class="ctrl-input" type="text" id="price_services" name="price_services"
                      cols="10" rows="10"><?php echo htmlspecialchars($allservice['price_services']); ?></textarea>
                  </div>

                  <div class="input-group justify-content-end mt-30">
                    <button class="btn btn-form" name="submitBtn">Cập nhật gói ưu đãi</button>
                  </div>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>