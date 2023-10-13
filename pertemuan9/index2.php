<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel pemain_bola / query data pemain_bola
$result = mysqli_query($conn, "SELECT * FROM pemain_bola");

// ambil data pemain bola dari objek result
// mysqli_fetch_row()       // mengembalikkan array numerik
// mysqli_fetch_assoc()     // mengembalikkan array associative    
// mysqli_fetch_array()     // mengembalikkan array numerik dan associative
// mysqli_fetch_object()

// while($bola = mysqli_fetch_assoc($result)) {
//     var_dump($bola);
// }
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
        <?php while($row = mysqli_fetch_assoc($result)) : ?>
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
        <?php endwhile ?>
    </table>
</body>
</html>