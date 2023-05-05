<?php
if (isset($_POST['submitBtn'])) {
  $id_great = $_POST['id_great'];
  $great_code = $_POST['great_code'];
  $great_name = $_POST['great_name'];
  $great_content = $_POST['great_content'];

  require_once './dao/pdo.php';
  $stmt = $pdo->prepare('UPDATE great SET id_great=:id_great, great_code=:great_code, great_name=:great_name, great_content=:great_content WHERE id_great=:id_great');
  $stmt->execute(
    array(
      ':id_great' => $id_great,
      ':great_code' => $great_code,
      ':great_name' => $great_name,
      ':great_content' => $great_content
    )
  );
  if ($stmt->rowCount() > 0) {
    echo '<script>alert("Cập nhật thông tin thành công!"); window.history.back();</script>';
  } else {
    echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
  }

}

$id_great = $_GET['idGreat'];
require_once './dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM great WHERE id_great=:id_great');
$stmt->execute(array(':id_great' => $id_great));
$greats = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!--  -->

<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Cập nhật gói ưu đãi</h4>
          <div class="form-wrapper">
            <form method="POST" action="" id="formEditCs">
              <div class="form-flex--wrapper">
                <div class="from-mn-warpper mb-20">
                  <div class="input-group">
                    <label class="label-input" for="great_code">Mã ưu đãi:</label>
                    <input required class="ctrl-input " type="text" id="great_code" name="great_code"
                      value="<?php echo htmlspecialchars($greats['great_code']); ?>">
                    <input required class="ctrl-input" hidden type="text" id="id" name="id_great"
                      value="<?php echo $greats['id_great'] ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input" for="great_name">Tên ưu đãi:</label>
                    <input required class="ctrl-input " type="text" id="great_name" name="great_name"
                      value="<?php echo htmlspecialchars($greats['great_name']); ?>">
                  </div>
                  <div class="input-group">
                    <label class="label-input label-top" for="great_content">Nội dung:</label>
                    <textarea required class="ctrl-input" type="text" id="great_content" name="great_content" cols="10"
                      rows="10"><?php echo htmlspecialchars($greats['great_content']); ?></textarea>
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

<!--  -->
<!-- <h1>Chỉnh sửa thông tin khách hàng</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="id_great" value="<?php echo $id_great; ?>">
    <div>
      <label for="great_code">Mã dịch vụ:</label>
      <input type="text" name="great_code" value="<?php echo htmlspecialchars($greats['great_code']); ?>" required>
    </div>
    <div>
      <label for="great_name">Tên Dịch vụ:</label>
      <input type="text" name="great_name" value="<?php echo htmlspecialchars($greats['great_name']); ?>" required>
    </div>
    <div>
      <label for="customer_name">Giá dịch vụ:</label>
      <input type="text" name="great_content" value="<?php echo htmlspecialchars($greats['great_content']); ?>"
        required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</body>


</html> -->