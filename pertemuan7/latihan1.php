<?php 
// Variable scoop / lingkup variabel
// $x = 10;

// function tampilx() {
    // variabel yang berada diluar function tidak bisa digunakan didalam funcion, kecuali...
    // jika ingin mengambil variabel yang berada diluar function bisa menggunakan keyword global terus menggunakan nama variabelnya
    // global $x;
    // dengan begitu sekarang kita bisa menggunakan variabel yang berada di luar function
//     echo $x;
// }

// tampilx();

// SUPERGLOBALS
// didalam PHP terdapat variavel yang disebut superglobals, 
// variabel ini sudah dimiliki oleh PHP dan dapat diakses dimanapun
// variabel superglobals ini tipenya adalah array associative

// var_dump($_SERVER);
// echo $_SERVER["SERVER_SOFTWARE"];

// $_GET
// metode $_GET merupakan sebuah metode pengiriman data menggunakan url
// $_GET["nama"] = "Riyan Darmawan";
// var_dump($_GET);

$pemainBola = [
    [
        "nama" => "Lionel Messi",
        "klub" => "Inter Miami",
        "tinggi" => "170 cm",
        "kebangsaan" => "Argentina",
        "umur" => "36 tahun",
        "gambar" => "messi.jpg",
    ],
    [
        "nama" => "Cristiano Ronaldo",
        "klub" => "Al Nassr",
        "tinggi" => "187 cm",
        "kebangsaan" => "Portugal",
        "umur" => "38 tahun",
        "gambar" => "ronaldo.jpg",
    ],
    [
        "nama" => "Neymar",
        "klub" => "Al Hilal",
        "tinggi" => "175 cm",
        "kebangsaan" => "Brazil",
        "umur" => "31 tahun",
        "gambar" => "neymar.jpg",
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Daftar Pemain Bola</h1>

    <ul>
    <?php foreach($pemainBola as $bola) : ?>
        <li>
            <a href="latihan2.php?nama=<?= $bola["nama"] ?>
            &klub=<?= $bola["klub"] ?>&tinggi=<?= $bola["tinggi"] ?>&kebangsaan=<?= $bola["kebangsaan"] ?>&umur=<?= $bola["umur"] ?>&gambar=<?= $bola["gambar"] ?>"><?= $bola["nama"] ?></a>
        </li>
    <?php endforeach; ?>
    </ul>
</body>
</html>