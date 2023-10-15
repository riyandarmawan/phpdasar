<?php 
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data) {
    global $conn;

    $nama = htmlspecialchars($data["nama"]);
    $klub = htmlspecialchars($data["klub"]);
    $tinggi = htmlspecialchars($data["tinggi"]);
    $kebangsaan = htmlspecialchars($data["kebangsaan"]);
    $umur = htmlspecialchars($data["umur"]);
    $gambar = htmlspecialchars($data["gambar"]);

    
    $query = "INSERT INTO pemain_bola
                VALUES
                ('', '$nama', '$klub', '$tinggi', '$kebangsaan', '$umur', '$gambar')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pemain_bola WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    global $conn;

    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $klub = htmlspecialchars($data["klub"]);
    $tinggi = htmlspecialchars($data["tinggi"]);
    $kebangsaan = htmlspecialchars($data["kebangsaan"]);
    $umur = htmlspecialchars($data["umur"]);
    $gambar = htmlspecialchars($data["gambar"]);
    
    $query = "UPDATE pemain_bola SET
                nama = '$nama',
                klub = '$klub', 
                tinggi = '$tinggi', 
                kebangsaan = '$kebangsaan', 
                umur = '$umur', 
                gambar = '$gambar'
              WHERE id = $id
            ";
    
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function cari($keyword) {
    $query = "SELECT * FROM pemain_bola WHERE
                nama LIKE '%$keyword%' OR
                klub LIKE '%$keyword%' OR
                kebangsaan LIKE '%$keyword%'
            ";
    return query($query);
}
?>