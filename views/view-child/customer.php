<?php 
require_once '../../dao/customer.php';
require_once '../../dao/pdo.php';

?>

<div class="container">
<h1>Add Customer</h1>
<form method="POST" action="customer.php">
  
  <label for="id_customer">ID Customer:</label>
  <input type="text" id="id_customer" name="id_customer"><br><br>

  <label for="company_name">Company Name:</label>
  <input type="text" id="company_name" name="company_name"><br><br>

  <label for="customer_name">Customer Name:</label>
  <input type="text" id="customer_name" name="customer_name"><br><br>

  <label for="phone">Phone:</label>
  <input type="text" id="phone" name="phone"><br><br>

  <label for="id_service">ID Service:</label>
  <input type="text" id="id_service" name="id_service"><br><br>

  <label for="customer_login">Customer Login:</label>
  <input type="text" id="customer_login" name="customer_login"><br><br>

  <label for="admin_login">Admin Login:</label>
  <input type="text" id="admin_login" name="admin_login"><br><br>

  <label for="customer_mail">Customer Mail:</label>
  <input type="email" id="customer_mail" name="customer_mail"><br><br>

  <label for="customer_link">Customer Link:</label>
  <input type="text" id="customer_link" name="customer_link"><br><br>

  <label for="status">Status:</label>
  <input type="text" id="status" name="status"><br><br>

  <label for="id_great">ID Great:</label>
  <input type="text" id="id_great" name="id_great"><br><br>

  <label for="date_start">Date Start:</label>
  <input type="date" id="date_start" name="date_start"><br><br>

  <label for="date_end">Date End:</label>
  <input type="date" id="date_end" name="date_end"><br><br>

  <input type="submit" value="Add Customer">
</form>
</div>