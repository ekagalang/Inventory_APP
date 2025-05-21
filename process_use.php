<?php
require 'inc/config.php';
$id = (int)$_POST['id_barang'];
$pakai = (int)$_POST['jumlah_pakai'];
// Ambil stok sekarang
$stmt = $pdo->prepare('SELECT jumlah_barang FROM tb_inventory WHERE id_barang = ?');
$stmt->execute([$id]);
$stok = $stmt->fetchColumn();
if ($pakai > $stok) {
    die('Jumlah pakai melebihi stok.');
}
$stok_baru = $stok - $pakai;
$status = $stok_baru > 0 ? 1 : 0;
// Update
$upd = $pdo->prepare('UPDATE tb_inventory SET jumlah_barang = ?, status_barang = ? WHERE id_barang = ?');
$upd->execute([$stok_baru, $status, $id]);
header('Location: index.php');
exit;
