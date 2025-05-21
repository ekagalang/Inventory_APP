<?php
require 'inc/config.php';
$id = (int)$_POST['id_barang'];
$tambah = (int)$_POST['jumlah_tambah'];
// Ambil stok
$stmt = $pdo->prepare('SELECT jumlah_barang FROM tb_inventory WHERE id_barang = ?');
$stmt->execute([$id]);
$stok = $stmt->fetchColumn();
$stok_baru = $stok + $tambah;
$status = 1; // kembalikan Available
// Update
$upd = $pdo->prepare('UPDATE tb_inventory SET jumlah_barang = ?, status_barang = ? WHERE id_barang = ?');
$upd->execute([$stok_baru, $status, $id]);
header('Location: index.php');
exit;
