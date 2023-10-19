<?php 
session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require "functions.php";

$jumlahDataPerHalaman = 2;
$halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1; 
$awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

// tombol cari ditekan
if(isset($_POST["cari"])) {
    $_SESSION["keyword"] = $_POST["keyword"];
    $pemainBola = cari($_SESSION["keyword"]);
    $jumlahData = count(hitungCari($_SESSION["keyword"]));
} else {
    // pagination
    // konfigurasi
    $jumlahData = count(query("SELECT * FROM pemain_bola"));
    $halamanAktif = (isset($_GET["halaman"])) ? $_GET["halaman"] : 1;
    // halaman = 1, awalData = 0
    // halaman = 2, awalData = 2
    $pemainBola = query("SELECT * FROM pemain_bola LIMIT $awalData, $jumlahDataPerHalaman");
    if (isset($_SESSION["keyword"])) {
        $jumlahData = count(hitungCari($_SESSION["keyword"]));
        $pemainBola = cari($_SESSION["keyword"]);
    }
}

$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);

if ($halamanAktif > $jumlahHalaman) {
    header("Location: ?halaman=$jumlahHalaman");
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
    <a href="logout.php">Logout</a>

    <h1>Daftar Pemain Bola</h1>

    <a href="tambah.php">Tambah data Pemain Bola</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="50" autofocus placeholder="Masukkan keyword pencarian" autocomplete="off">
        <button type="submit" name="cari">Cari</button>
    </form>
    <br>
    <a href="hapusKeyword.php">Hapus keyword pencarian</a>
    <br>
    <br>

    <!-- navigasi -->

    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=1">awal</a>
        <a href="?halaman=<?= $halamanAktif - 1; ?>">&laquo;;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman) : ?>
            <a href="?halaman=<?= $halamanAktif + 1; ?>">&raquo;</a>
            <a href="?halaman=<?= $jumlahHalaman; ?>">akhir</a>
    <?php endif; ?>
    
    <br>
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
        
        <?php $i = 1 + $awalData; ?>
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