<?php
require 'inc/config.php';
$stmt = $pdo->prepare("INSERT INTO tb_inventory (kode_barang,nama_barang,jumlah_barang,satuan_barang,harga_beli,status_barang) VALUES (?,?,?,?,?,?)");
$stmt->execute([
    $_POST['kode_barang'],
    $_POST['nama_barang'],
    (int)$_POST['jumlah_barang'],
    $_POST['satuan_barang'],
    (float)$_POST['harga_beli'],
    (bool)$_POST['status_barang'],
]);
header('Location: index.php');
exit;
