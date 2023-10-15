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
?>