<?php
require_once 'dao/pdo.php';

try {
    $conn = pdo_get_connection();
    echo "Connected successfully to the database!";
    $conn = null;
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>