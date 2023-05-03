<?php 
require_once '../../dao/great.php';
require_once '../../dao/pdo.php';

?>

<div class="container">
<h1>Add Great</h1>
<form method="POST" action="great.php">
<label for="great_code">Mã Ưu đãi:</label>
  <input type="text" id="great_code" name="great_code"><br><br>

  <label for="great_name">Tên ưu đãi:</label>
  <input type="text" id="great_name" name="great_name"><br><br>

  <label for="great_content">Ghi chú:</label>
  <textarea name="great_content" id="great_content" cols="30" rows="10"></textarea><br><br>

  <input type="submit" value="Add Service">
</form>
</div>
