<?php session_start();
//koneksi
$koneksi = new mysqli("localhost","root","","perpustakaan");
 ?>
 <?php 
// mendapatakan id_produk dari url
 $id_buku = $_GET["id"];

 // query ambil data
 $ambil = $koneksi->query("SELECT * FROM perpustakaan WHERE id_buku='$id_buku'");
 $detail = $ambil->fetch_assoc();

  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Detail Buku</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
 <?php include 'menu.php'; ?>

<section class="kontent">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<img src="foto_buku/<?php echo $detail["foto_buku"]; ?>" alt="" class="img-responsive">
			</div>
			<div class="col-md-6">
				<h2><?php echo $detail["nama_buku"] ?></h2>
				<h4>Rp. <?php echo number_format($detail["harga_buku"]); ?></h4>
				<h4>/<?php echo $detail["pengarang"]; ?></h4>
				<h4>Stok : <?php echo $detail['stok_buku']; ?></h4>
				<form method="post">
					<div class="form-group">
						<div class="input-group">
							<input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_buku'] ?>">
							<div class="input-group-btn">
								<button class="btn btn-primary" name="pinjam">Pinjam</button>
							</div>
						</div>
					</div>
				</form>
				<?php 
				// jika ada tombol beli
				if (isset($_POST["pinjam"])) 
				{
					// mendapatkan jumlah yang diinputkan
					$jumlah = $_POST["jumlah"];
					// masukan ke keranjang belanja
					$_SESSION["keranjang"][$id_buku] = $jumlah;

					echo "<div class='alert alert-info'>Buku Telah Masuk ke Keranjang</div>";
 					echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
				}
				 ?>
			</div>
		</div>
	</div>
</section>
 </body>
 </html>