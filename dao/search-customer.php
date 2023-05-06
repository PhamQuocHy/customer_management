<?php
require_once 'pdo.php';

$stmt = $pdo->prepare($sql);
$stmt->execute();
$customers = $stmt->fetchAll();
?>

