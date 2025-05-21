<?php
require 'inc/config.php';
$id = (int)$_GET['id'];
$stmt = $pdo->prepare('SELECT * FROM tb_inventory WHERE id_barang = ?');
$stmt->execute([$id]);
$r = $stmt->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Edit Barang</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container">
    <h1>Edit Barang</h1>
    <form action="update.php" method="post">
      <input type="hidden" name="id_barang" value="<?= $r['id_barang'] ?>">
      <label>Kode Barang</label><input type="text" name="kode_barang" value="<?= htmlspecialchars($r['kode_barang']) ?>" maxlength="20" required>
      <label>Nama Barang</label><input type="text" name="nama_barang" value="<?= htmlspecialchars($r['nama_barang']) ?>" maxlength="50" required>
      <label>Jumlah</label><input type="number" name="jumlah_barang" value="<?= $r['jumlah_barang'] ?>" min="0" required>
      <label>Satuan</label><select name="satuan_barang" required>
        <?php foreach (['pcs', 'kg', 'liter', 'meter'] as $s): ?>
          <option value="<?= $s ?>" <?= $s == $r['satuan_barang'] ? 'selected' : '' ?>><?= $s ?></option>
        <?php endforeach; ?>
      </select>
      <label>Harga Beli</label><input type="number" name="harga_beli" step="0.01" value="<?= $r['harga_beli'] ?>" required>
      <label>Status</label><br>
      <label><input type="radio" name="status_barang" value="1" <?= $r['status_barang'] ? 'checked' : '' ?>> Available</label>
      <label><input type="radio" name="status_barang" value="0" <?= !$r['status_barang'] ? 'checked' : '' ?>> Not-Available</label>
      <button type="submit" class="btn btn-edit">Update</button>
    </form>
  </div>
</body>

</html>