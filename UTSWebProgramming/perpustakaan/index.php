<?php session_start();
//koneksi
$koneksi = new mysqli("localhost","root","","perpustakaan");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Perpustakaan</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>



<?php include 'menu.php'; ?>


<!-- konten -->
<section class="konten">
	<div class="container">
		<h1>Produk Terbaru</h1>

		<div class="row">

			<?php $ambil = $koneksi->query("SELECT * FROM perpustakaan"); ?>
			<?php while($perproduk = $ambil->fetch_assoc()){ ?>
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="foto_buku/<?php echo $perproduk['foto_buku']; ?>">
					<div class="caption">
						<h3><?php echo $perproduk['nama_buku']; ?></h3>
						<h5>Rp. <?php echo number_format($perproduk['harga_buku']); ?></h5>
						<a href="pinjam.php?id=<?php echo $perproduk['id_buku']; ?>" class="btn btn-primary">Pinjam</a>
						<a href="detail.php?id=<?php echo $perproduk["id_buku"]; ?>" class="btn btn-default">Detail</a>
					</div>
				</div>
			</div>
			<?php } ?>



		</div>
	</div>
</section>
</body>
</html>