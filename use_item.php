<?php
require 'inc/config.php';
$id = (int)$_GET['id'];
$item = $pdo->prepare('SELECT * FROM tb_inventory WHERE id_barang = ?');
$item->execute([$id]);
$r = $item->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Pakai Barang</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container">
    <h1>Pakai Barang: <?= htmlspecialchars($r['nama_barang']) ?></h1>
    <form action="process_use.php" method="post">
      <input type="hidden" name="id_barang" value="<?= $r['id_barang'] ?>">
      <p>Stok Saat Ini: <?= $r['jumlah_barang'] ?> <?= $r['satuan_barang'] ?></p>
      <label>Jumlah Dipakai</label><input type="number" name="jumlah_pakai" min="1" max="<?= $r['jumlah_barang'] ?>" required>
      <button type="submit" class="btn btn-use">Submit</button>
    </form>
  </div>
</body>

</html>