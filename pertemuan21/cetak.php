<?php
require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$pemainBola = query("SELECT * FROM pemain_bola");

$mpdf = new \Mpdf\Mpdf();

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pemain Bola</title>
    <link rel="stylesheet" href="css/print.css">
</head>
<body>
    <h1>Daftar Pemain Bola</h1>

    <table border="1" cellpading="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Klub</th>
                <th>Tinggi</th>
                <th>Kebangsaan</th>
                <th>Umur</th>
            </tr>';

        $i = 1;
        foreach($pemainBola as $row) {
            $html .= '
            <tr>
                <td>'.$i++.'</td>
                <td><img src="img/'.$row["gambar"].'" width="100"></td>
                <td>'.$row["nama"].'</td>
                <td>'.$row["klub"].'</td>
                <td>'.$row["tinggi"].' cm</td>
                <td>'.$row["kebangsaan"].'</td>
                <td>'.$row["umur"].' Tahun</td>
            </tr>
            ';
        }
$html .= '
    </table>
</body>
</html>
';

$mpdf->WriteHTML($html);

$mpdf->Output('daftar-pemain-bola.pdf', 'I');

?>