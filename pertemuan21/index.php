<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

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
    <style>
        .loader {
            width: 20px;
            position: absolute;
            top: 200;
            left: 400px;
            z-index: -2;
            display: none;
        }

        @media print {
            .logout, .tambah, .form-cari, .aksi {
                display: none;
            }
        }
    </style>
</head>
<body>
    <a href="logout.php" class="logout">Logout</a> | <a href="cetak.php" target="_blank">Cetak</a>

    <h1 class="judul">Daftar Pemain Bola</h1>

    <a href="tambah.php" class="tambah">Tambah data Pemain Bola</a>
    <br><br>

    <form action="" method="post" class="form-cari">
        <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off" id="keyword">
        <button type="submit" name="cari" id="tombol-cari">Cari</button>

        <img src="img/loader.gif" alt="" class="loader">
    </form>

    <br>
    
    <div id="container">
        <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="aksi">Aksi</th>
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
                    <td class="aksi">
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
    </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>