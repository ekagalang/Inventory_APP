<?php
require 'inc/config.php';
$rows = $pdo->query('SELECT * FROM tb_inventory')->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Daftar Inventory</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container">
    <h1>Daftar Inventory</h1>
    <a href="add.php" class="btn btn-add">Tambah Barang</a>
    <table>
      <tr>
        <th>ID</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
      <?php foreach ($rows as $r): ?>
        <tr>
          <td><?= $r['id_barang'] ?></td>
          <td><?= htmlspecialchars($r['kode_barang']) ?></td>
          <td><?= htmlspecialchars($r['nama_barang']) ?></td>
          <td><?= $r['jumlah_barang'] ?></td>
          <td><?= htmlspecialchars($r['satuan_barang']) ?></td>
          <td><?= number_format($r['harga_beli'], 2) ?></td>
          <td><?= $r['status_barang'] ? 'Available' : 'Not-Available' ?></td>
          <td>
            <a href="edit.php?id=<?= $r['id_barang'] ?>" class="btn btn-edit">Edit</a>
            <a href="delete.php?id=<?= $r['id_barang'] ?>" class="btn btn-delete">Hapus</a>
            <a href="use_item.php?id=<?= $r['id_barang'] ?>" class="btn btn-use">Pakai</a>
            <a href="restock.php?id=<?= $r['id_barang'] ?>" class="btn btn-restock">Tambah Stok</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <script src="assets/js/script.js"></script>
</body>

</html>