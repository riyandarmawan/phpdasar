<?php 
// Array
// variabel yang dapat memiliki banyak nilai
// elemen pada array boleh memiliki tipe data yang berbeda
// nilai atau value yang terdapat dalam array disebut element
// tanda ini "=>" disebut parameter
// pasangan kata antara key dan value
// key-nya adalah index, yang pasti dimulai dari 0

// membuat array
// cara lama
$hari =array("Senin", "Selasa", "Rabu");

// cara baru
$bulan = ["Januari", "Februari", "Maret"];

$arr1 = [123, "tulisan", false];

// Menampilkan array
// tidak bisa menggunakan echo
// var_dump() / print_r()
// var_dump($hari);
// echo "<br>";
// print_r($bulan);
// echo "<br>";

// Menampilkan 1 elemen pada array
// jika hanya 1 elemen yang ingin ditampilkan bisa menggunakan echo
// echo $arr1[0];
// echo "<br>";
// echo $bulan[1];

// menambahkan 1 elemen pada array
var_dump($hari);
$hari[] = "Kamis";
$hari[] = "Jum'at";
echo "<br>";
var_dump($hari);


?>