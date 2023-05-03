<?php 
require_once '../../dao/service.php';
require_once '../../dao/pdo.php';

?>

<div class="container">
<h1>Add Service</h1>
<form method="POST" action="service.php">
<label for="services_code">Service Code:</label>
  <input type="text" id="services_code" name="services_code"><br><br>

  <label for="services_name">Service Name:</label>
  <input type="text" id="services_name" name="services_name"><br><br>

  <label for="price_services">Service Price:</label>
  <input type="text" id="price_services" name="price_services"><br><br>

  <input type="submit" value="Add Service">
</form>
</div>