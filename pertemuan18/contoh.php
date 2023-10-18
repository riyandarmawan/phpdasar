<?php 
	require 'functions.php';
	session_start();
	if (!isset($_SESSION["login"])) {
		header('Location:login.php');
		exit;
	}
	if (isset($_GET["cari"])) {
		$jumlahDataPerHalaman=2;
		$cari=$_GET["cari"];
		$jumlahData=count(data("SELECT * FROM data WHERE nama LIKE '%$cari%' OR no LIKE '%$cari%' OR alamat LIKE '%$cari%'"));
		$jumlahHalaman=ceil($jumlahData/$jumlahDataPerHalaman);
		$halamanAktif=(isset($_GET["halaman"])) ? $_GET["halaman"] : 1; 
		$awalData=$jumlahDataPerHalaman*$halamanAktif-$jumlahDataPerHalaman;
		$isi=cari("SELECT * FROM data WHERE nama LIKE '%$cari%' OR no LIKE '%$cari%' OR alamat LIKE '%$cari%'LIMIT $awalData,$jumlahDataPerHalaman");
	}
	else{
		$jumlahDataPerHalaman=2;
		$jumlahData=count(cari("SELECT * FROM data"));
		$jumlahHalaman=ceil($jumlahData/$jumlahDataPerHalaman);
		$halamanAktif=(isset($_GET["halaman"])) ? $_GET["halaman"] : 1; 
		$awalData=$jumlahDataPerHalaman*$halamanAktif-$jumlahDataPerHalaman;
		$isi=cari("SELECT * FROM data ORDER BY id ASC LIMIT $awalData,$jumlahDataPerHalaman");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Admin</title>
	<style type="text/css">
		a{
			text-decoration: none;
		}
	</style>
</head>
<body>
	<h1>Daftar Pemesanan Makanan Warung</h1>
	<a href="tambah.php">Tambah Data Pesanan</a>
	<form action="" method="get">
		<input type="text" name="cari" placeholder="masukkan data yang ingin dicari.." size="40" autocomplete="off" autofocus>
		<button type="submit">Cari</button>	
	</form>
	<?php if ($halamanAktif>1): ?>
		<a href="?halaman=<?= (isset($_GET["cari"])) ? ($halamanAktif-1).'&'.'cari='.$_GET["cari"] : ($halamanAktif-1); ?>">&laquo;</a>
	<?php endif; ?>

	<?php for ($i=1; $i <=$jumlahHalaman ; $i++) : ?>
		<?php if ($i==$halamanAktif): ?>
			<a href="?halaman=<?= (isset($_GET["cari"])) ? $i.'&'.'cari='.$_GET["cari"] : $i; ?>" style="font-weight: bold; color: red;"><?= $i; ?></a>	
		<?php else : ?>
			<a href="?halaman=<?= (isset($_GET["cari"])) ? $i.'&'.'cari='.$_GET["cari"] : $i;  ?>"><?= $i; ?></a>
		<?php endif; ?>
	<?php endfor; ?>

	<?php if ($halamanAktif<$jumlahHalaman): ?>
		<a href="?halaman=<?= (isset($_GET["cari"])) ? ($halamanAktif+1).'&'.'cari='.$_GET["cari"] : ($halamanAktif+1); ?>">&raquo;</a>
	<?php endif; ?>
	<table border="1" cellpadding="10" cellspacing="0">
		<thead>
			<tr>
				<th>ID Pelanggan</th>
				<th>Nama Pelanggan</th>
				<th>No Tlp</th>
				<th>Detail Makanan</th>
				<th>Jumlah</th>
				<th>Alamat</th>
				<th>Gambar Makanan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1+$awalData; ?>
			<?php foreach ($isi as $tampilkan): ?>
				<tr>
					<td>
						<?= $i; ?>
					</td>
					<td>
						<?= $tampilkan["nama"]; ?>
					</td>
					<td>
						<?= $tampilkan["no"]; ?>
					</td>
					<td>
						<?= $tampilkan["detail"]; ?>
					</td>
					<td>
						<?= $tampilkan["jumlah"]; ?>
					</td>
					<td>
						<?= $tampilkan["alamat"]; ?>
					</td>
					<td>
						<img src="gambar/<?= $tampilkan["gambar"]; ?>" width="50">
					</td>
					<td>
						<a href="ubah.php?id=<?= $tampilkan["id"]; ?>">ubah</a> | <a href="hapus.php?id=<?= $tampilkan["id"]; ?>" onclick="return confirm('anda yakin ingin menghapus data ini ?');">hapus</a> 
					</td>
				</tr>
				<?php $i++; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
	<a href="logout.php">Logout</a>
</body>
</html>