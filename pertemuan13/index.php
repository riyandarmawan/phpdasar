<?php 
require 'functions.php';
$pemainBola = query("SELECT * FROM pemain_bola");

// tombol cari ditekan
if(isset($_POST["cari"])) {
    $pemainBola = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    <h1>Daftar Pemain Bola</h1>

    <a href="tambah.php">Tambah data Pemain Bola</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>

    <br>

    <table border="1" cellpading="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Klub</th>
            <th>Tinggi</th>
            <th>Kebangsaan</th>
            <th>Umur</th>
        </tr>
        
        <?php $i = 1; ?>
        <?php foreach($pemainBola as $row) : ?>
            <tr>
                <td><?= $i;; ?></td>
                <td>
                    <a href="ubah.php?id=<?= $row["id"]; ?>">Ubah</a> |
                    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"]; ?>" alt=""></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["klub"]; ?></td>
                <td><?= $row["tinggi"]; ?> cm</td>
                <td><?= $row["kebangsaan"]; ?></td>
                <td><?= $row["umur"]; ?> Tahun</td>
            </tr>
        <?php $i++; ?>
        <?php endforeach ?>
    </table>
</body>
</html>