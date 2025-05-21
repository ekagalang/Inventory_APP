<?php
// inc/config.php
// Koneksi PDO ke SQLite
define('DB_FILE', __DIR__ . '/../db/db_inventory.sqlite');

try {
    $pdo = new PDO('sqlite:' . DB_FILE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Gagal koneksi database: " . $e->getMessage());
}

// Buat tabel jika belum ada
$pdo->exec("CREATE TABLE IF NOT EXISTS tb_inventory (
    id_barang INTEGER PRIMARY KEY AUTOINCREMENT,
    kode_barang VARCHAR(20) UNIQUE,
    nama_barang VARCHAR(50),
    jumlah_barang INTEGER,
    satuan_barang VARCHAR(20),
    harga_beli DOUBLE(20,2),
    status_barang BOOLEAN
);");

// Inisialisasi 15 data dummy jika kosong
$cek = $pdo->query("SELECT COUNT(*) FROM tb_inventory")->fetchColumn();
if ($cek == 0) {
    $dummy = [
        ['BRG001','Pensil',50,'pcs',1500,1],
        ['BRG002','Pulpen',100,'pcs',2000,1],
        ['BRG003','Buku Tulis',80,'pcs',5000,1],
        ['BRG004','Kertas A4',200,'rim',30000,1],
        ['BRG005','Stapler',10,'pcs',25000,1],
        ['BRG006','Penghapus',60,'pcs',1000,1],
        ['BRG007','Penggaris',40,'pcs',3000,1],
        ['BRG008','Tinta Printer',5,'pcs',150000,1],
        ['BRG009','Mouse',15,'pcs',50000,1],
        ['BRG010','Keyboard',12,'pcs',75000,1],
        ['BRG011','Monitor',8,'pcs',500000,1],
        ['BRG012','Flashdisk 8GB',25,'pcs',60000,1],
        ['BRG013','Flashdisk 16GB',20,'pcs',90000,1],
        ['BRG014','Kabel HDMI',18,'pcs',40000,1],
        ['BRG015','Charger Laptop',7,'pcs',120000,1],
    ];
    $ins = $pdo->prepare("INSERT INTO tb_inventory (kode_barang,nama_barang,jumlah_barang,satuan_barang,harga_beli,status_barang) VALUES (?,?,?,?,?,?)");
    foreach ($dummy as $d) {
        $ins->execute($d);
    }
}
?>