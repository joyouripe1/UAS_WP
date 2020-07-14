<?php 
session_start();
// koneksi ke database
$koneksi = new mysqli("localhost","root","","perpustakaan");
if (!isset($_SESSION["peminjam"]) OR empty($_SESSION["peminjam"])) 
{
	echo "<script>alert('Silahkan Login');</script>";
	echo "<script>location='login.php';</script>";
}
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Riwayat Peminjaman</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
 
<?php include 'menu.php'; ?>
<section class="riwayat">
	<div class="container">
		<h3>Riwayat Pinjam <?php echo $_SESSION["peminjam"]["nama_peminjam"] ?></h3>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Id Peminjam</th>
					<th>Tanggal</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$nomor=1;
				// mendapatkan id_pelanggan yang login dari session
				$id_peminjam = $_SESSION["peminjam"]["id_peminjam"];
				$ambil = $koneksi->query("SELECT * FROM proses WHERE id_peminjam='$id_peminjam'");
				while($pecah = $ambil->fetch_assoc()){
				 ?>
				<tr>
					<td><?php echo $nomor ?></td>
					<td><?php echo $pecah["id_peminjaman"]; ?></td>
					<td><?php echo $pecah["tanggal_pinjam"] ?></td>
					<td><?php echo $pecah["jumlah"] ?></td>
					<td>
						<a href="nota.php?id=<?php echo $pecah["id_peminjaman"] ?>" class="btn btn-info">Nota</a>
					</td>
				</tr>
				<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>
</section>

 </body>
 </html>