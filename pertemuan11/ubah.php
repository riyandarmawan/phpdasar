<?php 
require "functions.php";

// ambil data di URL
$id = $_GET["id"];

// query data pemain bola berdasarkan id
$bola = query("SELECT * FROM pemain_bola WHERE id = $id")[0];

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {

    // cek apakah data berhasil diubah atau tidak
    if(ubah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil diubah!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal diubah!');
            document.location.href = 'index.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah data Pemain Bola</title>
</head>
<body>
    <h1>Ubah data Pemain Bola</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $bola["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $bola["nama"]; ?>">
            </li>
            <li>
                <label for="klub">Klub : </label>
                <input type="text" name="klub" id="klub" required value="<?= $bola["klub"]; ?>">
            </li>
            <li>
                <label for="tinggi">Tinggi : </label>
                <input type="text" name="tinggi" id="tinggi" required value="<?= $bola["tinggi"]; ?>">
            </li>
            <li>
                <label for="kebangsaan">Kebangsaan : </label>
                <input type="text" name="kebangsaan" id="kebangsaan" required value="<?= $bola["kebangsaan"]; ?>">
            </li>
            <li>
                <label for="umur">Umur : </label>
                <input type="text" name="umur" id="umur" required value="<?= $bola["umur"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $bola["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>