<?php
require 'inc/config.php';
$id = (int)$_GET['id'];
$stmt = $pdo->prepare('DELETE FROM tb_inventory WHERE id_barang = ?');
$stmt->execute([
    $id
]);
header('Location: index.php');
exit;
