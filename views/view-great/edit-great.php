<?php
if(isset($_POST['submit'])){
  $id_great = $_POST['id_great'];
  $great_code = $_POST['great_code'];
  $great_name = $_POST['great_name'];
  $great_content = $_POST['great_content'];  
  
  require_once '../../dao/pdo.php';
  $stmt = $pdo->prepare('UPDATE great SET id_great=:id_great, great_code=:great_code, great_name=:great_name, great_content=:great_content WHERE id_great=:id_great');
  $stmt->execute(array(
     ':id_great' => $id_great,
     ':great_code' => $great_code,
     ':great_name' => $great_name,
     ':great_content' => $great_content
  ));
if($stmt->rowCount() > 0){
  echo '<script>alert("Cập nhật thông tin thành công!"); window.location.href = "list-great.php";</script>';
} else {
  echo '<script>alert("Cập nhật thông tin thất bại!"); window.history.back();</script>';
}

}

$id_great = $_GET['id_great'];
require_once '../../dao/pdo.php';
$stmt = $pdo->prepare('SELECT * FROM great WHERE id_great=:id_great');
$stmt->execute(array(':id_great' => $id_great));
$greats = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chỉnh sửa thông tin khách hàng</title>
</head>
<body>
  <h1>Chỉnh sửa thông tin khách hàng</h1>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
      <input type="text" name="great_content" value="<?php echo htmlspecialchars($greats['great_content']); ?>" required>
    </div>
    <div>
      <button type="submit" name="submit">Submit</button>
    </div>
  </form>
</body>


</html>