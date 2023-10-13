<?php 
require 'functions.php';
$pemainBola = query("SELECT * FROM pemain_bola");
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
                    <a href="">Ubah</a> |
                    <a href="">Hapus</a>
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