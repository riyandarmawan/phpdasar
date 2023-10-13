<?php 
$mahasiswa = [
    ["Riyan", "1928439291", "Rekayasa Perangkat Lunak", "riyan@gmail.com"],
    ["Asep", "1273517152", "Rekayasa Perangkat Lunak", "asep@gmail.com"],
    ["Putu", "1425415273", "Rekayasa Perangkat Lunak", "putu@gmail.com"],
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
        <li>Nama : <?php echo $mhs[0]; ?></li>
        <li>NRP : <?php echo $mhs[1]; ?></li>
        <li>Jurusan : <?php echo $mhs[2]; ?></li>
        <li>Email : <?php echo $mhs[3]; ?></li>
    </ul>
    <?php endforeach; ?>
</body>
</html>