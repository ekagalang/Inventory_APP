<?php require 'inc/config.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
  <div class="container">
    <h1>Tambah Barang</h1>
    <form action="insert.php" method="post">
      <label>Kode Barang</label><input type="text" name="kode_barang" maxlength="20" required>
      <label>Nama Barang</label><input type="text" name="nama_barang" maxlength="50" required>
      <label>Jumlah</label><input type="number" name="jumlah_barang" min="0" required>
      <label>Satuan</label><select name="satuan_barang" required>
        <option value="pcs">pcs</option>
        <option value="kg">kg</option>
        <option value="liter">liter</option>
        <option value="meter">meter</option>
      </select>
      <label>Harga Beli</label><input type="number" name="harga_beli" step="0.01" required>
      <label>Status</label><br><label><input type="radio" name="status_barang" value="1" checked> Available</label> <label><input type="radio" name="status_barang" value="0"> Not-Available</label>
      <button type="submit" class="btn btn-add">Simpan</button>
      <a href="index.php" style="margin-left:10px;"><button type="button">Kembali</button></a>
    </form>
  </div>
</body>

</html>