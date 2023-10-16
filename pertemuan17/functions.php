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

    // upload gambar
    $gambar = upload();
    if(!$gambar) {
        return false;
    }
    
    $query = "INSERT INTO pemain_bola
                VALUES
                ('', '$nama', '$klub', '$tinggi', '$kebangsaan', '$umur', '$gambar')
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tdak ada gambar yang di upload
    if($error === 4) {
        echo "<script>
                alert('pilih gambar terlebih dahulu!');
            </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $extensiGambarValid = ['jpg', 'jpeg', 'png'];
    $extensiGambar = explode('.', $namaFile);
    $extensiGambar = strtolower(end($extensiGambar));
    if(!in_array($extensiGambar, $extensiGambarValid)) {
        echo "<script>
                alert('yang anda upload bukan gambar!');
            </script>";
    }

    // cek jika tapi ukurannya terlalu besar
    if($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran anda terlalu besar!');
            </script>";
    }

    // lolos pengecekan gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pemain_bola WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function hapusGambar($query) {
    global $conn;
    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM siswa WHERE id = '$query'"));
    unlink('img/' . $file["gambar"]);
    $hapus = "DELETE FROM pemain_bola WHERE id='$query'";
    mysqli_query($conn, $hapus);
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
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak 
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }
    
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

function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user    WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
        </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);
}
?>