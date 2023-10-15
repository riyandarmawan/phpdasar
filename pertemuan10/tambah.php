<?php 
require "functions.php";

// cek apakah tombol submit sudah ditekan atau belum
if(isset($_POST["submit"])) {

    // cek apakah data berhasil itambahkan atau tidak
    if(tambah($_POST) > 0) {
        echo "
            <script>
                alert('data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>
        ";
    } else {
        echo "
            <script>
            alert('data gagal ditambahkan!');
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
    <title>Tambah data Pemain Bola</title>
</head>
<body>
    <h1>Tambah data Pemain Bola</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" require>
            </li>
            <li>
                <label for="klub">Klub : </label>
                <input type="text" name="klub" id="klub" require>
            </li>
            <li>
                <label for="tinggi">Tinggi : </label>
                <input type="text" name="tinggi" id="tinggi" require>
            </li>
            <li>
                <label for="kebangsaan">Kebangsaan : </label>
                <input type="text" name="kebangsaan" id="kebangsaan" require>
            </li>
            <li>
                <label for="umur">Umur : </label>
                <input type="text" name="umur" id="umur" require>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" require>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>