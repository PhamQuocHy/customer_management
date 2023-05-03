<?php
require_once 'pdo.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $id = $_POST['id'];

  $stmt = $pdo->prepare('DELETE FROM great WHERE id_great = ?');
  $stmt->bindValue(1, $id, PDO::PARAM_INT);
  $stmt->execute();

  echo 'success';
} else {
  echo 'error';
}
?>