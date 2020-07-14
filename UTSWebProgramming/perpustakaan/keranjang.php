<?php 
session_start(); 
$koneksi = new mysqli("localhost","root","","perpustakaan");

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])) 
{
	echo "<div class='alert alert-info'>Keranjang Kosong, Silahkan Meminjam Buku Terlebih Dahulu</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Keranjang Belanja</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>

<!-- navbar -->
<?php include 'menu.php'; ?>


<section class="konten">
	<div class="container">
		<h1>Keranjang Belanja</h1>
		<hr>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Buku</th>
					<th>Harga Buku</th>
					<th>Jumlah</th>
					<th>Subtotal</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php foreach ($_SESSION["keranjang"] as $id_buku => $jumlah): ?>
				<!-- menampilkan produk yang sedang diperulangkan berdasarkan id_produk -->
				<?php 
				$ambil = $koneksi->query("SELECT * FROM perpustakaan WHERE id_buku='$id_buku'");
				$pecah = $ambil->fetch_assoc();
				$subharga = $pecah["harga_buku"]*$jumlah;
				 ?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $pecah["nama_buku"]; ?></td>
					<td>Rp. <?php echo number_format($pecah["harga_buku"]); ?></td>
					<td><?php echo $jumlah; ?></td>
					<td>Rp. <?php echo number_format($subharga); ?></td>
					<td>
						<a href="hapuskeranjang.php?id=<?php echo $id_buku ?>" class="btn btn-danger" btn-xs>Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php endforeach ?>
			</tbody>
		</table>

		<a href="index.php" class="btn btn-default">Lanjutkan Memilih</a>
		<a href="checkout.php" class="btn btn-primary">Checkout</a>
	</div>
</section>
 </body>
 </html>