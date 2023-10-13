<?php 
// $mahasiswa = [
//     ["Riyan Darmawan", "1234567890", "riyandarmawan@gmail.com", "Rekayasa Perangkat Lunak"],
//     ["Yusuf Maelana", "1234567890", "yusufmaelana@gmail.com", "Rekayasa Perangkat Lunak"],
//     ["Ujang Supratman", "1234567890", "ujangsupratman@gmail.com", "Rekayasa Perangkat Lunak"],
// ];

// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya adalah yang kita buat sendiri

// tugas associative array
// cari kasus sendiri
// minimal 5 item dan harus ada gambar

$mahasiswa = [
    [
        "nama" => "Ucup Suherman",
        "nrp" => "1234567890",
        "email" => "ucupsuherman@gmail.com",
        "jurusan" => "Rekayasa Perangkat Lunak",
        "gambar" => "ucup.jpeg",
    ],
    [
        "nama" => "Yusuf Maelana",
        "nrp" => "1234567890",
        "email" => "yusufmaelana@gmail.com",
        "jurusan" => "Rekayasa Perangkat Lunak",
        "gambar" => "yusuf.jpeg",
    ],
    [
        "nama" => "Ujang Supratman",
        "nrp" => "1234567890",
        "email" => "ujangsupratman@gmail.com",
        "jurusan" => "Rekayasa Perangkat Lunak",
        "gambar" => "ujang.jpeg",
    ],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach($mahasiswa as $mhs) : ?>
        <ul>
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>" alt="">
            </li>
            <li>Nama : <?= $mhs["nama"]; ?></li>
            <li>NRP : <?= $mhs["nrp"]; ?></li>
            <li>Jurusan : <?= $mhs["jurusan"]; ?></li>
            <li>Email : <?= $mhs["email"]; ?></li>
        </ul>
    <?php endforeach; ?>
</body>
</html>