<?php 
require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM pemain_bola WHERE
            nama LIKE '%$keyword%' OR
            klub LIKE '%$keyword%' OR
            kebangsaan LIKE '%$keyword%'
        ";

$pemainBola = query($query);
?>

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