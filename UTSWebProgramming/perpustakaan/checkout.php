<?php 
session_start();
$koneksi = new mysqli("localhost","root","","perpustakaan");


// jika tidak ada session pelanggan, maka dilarikan ke login.php
if (!isset($_SESSION["peminjam"])) 
{
	echo "<div class='alert alert-info'>Silahkan Login</div>";
 	echo "<meta http-equiv='refresh' content='1;url=login.php'>";
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
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
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1; ?>
				<?php $totalbelanja=0; ?>
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
				</tr>
				<?php $nomor++; ?>
				<?php $totalbelanja+=$subharga; ?>
				<?php endforeach ?>
			</tbody>
			<tfoot>
				<tr>
					<th colspan="4">Total Belanja</th>
					<th>Rp. <?php echo number_format($totalbelanja) ?></th>
				</tr>
			</tfoot>
		</table>

		<form method="post">
			
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["peminjam"]['nama_peminjam'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="text" readonly value="<?php echo $_SESSION["peminjam"]['telepon_peminjam'] ?>" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<select class="form-control" name="id_waktu">
						<option value="">Pilih Lama Pinjam</option>
						<?php 
						$ambil = $koneksi->query("SELECT * FROM waktu");
						while($perongkir = $ambil->fetch_assoc()){
						 ?>
						 <option value="<?php echo $perongkir["id_waktu"] ?>">
						 	<?php echo $perongkir['lama_pinjam'] ?> -
						 	Rp. <?php echo number_format($perongkir['tarif']) ?>
						 </option>
						<?php } ?>
					</select>
				</div>
			</div>
			<button class="btn btn-primary" name="checkout">Checkout</button>
		</form>

		<?php 
		if (isset($_POST["checkout"])) 
		{
			$id_peminjam = $_SESSION["peminjam"]["id_peminjam"];
			$id_waktu = $_POST["id_waktu"];
			$tanggal_pinjam = date("Y-m-d");

			$ambil = $koneksi->query("SELECT * FROM waktu WHERE id_waktu='$id_waktu'");
			$arrayongkir = $ambil->fetch_assoc();
			$lama_pinjam = $arrayongkir['lama_pinjam'];
			$tarif = $arrayongkir['tarif'];

			$total_bayar = $totalbelanja + $tarif;

			$koneksi->query("INSERT INTO proses (id_peminjaman,id_peminjam,id_waktu,id_buku,jumlah,total_bayar,tanggal_pinjam,lama_pinjam,tarif) VALUES ('$id_peminjaman','$id_peminjam','$id_waktu','$id_buku','$jumlah','$total_bayar','$tanggal_pinjam','$lama_pinjam','$tarif')");
			// $koneksi->query("INSERT INTO proses (id_peminjam,id_waktu,tanggal_pinjam,jumlah) VALUES ('$id_peminjam','$id_waktu','$tanggal_pinjam,'$jumlah')");

			// mendapatkan id_pembelian yang baru saja
			$id_peminjaman_barusan = $koneksi->insert_id;

			foreach ($_SESSION["keranjang"] as $id_buku => $jumlah) 
			{
				// mendapatkan data produk berdasarkan id_produk
				$ambil = $koneksi->query("SELECT * FROM perpustakaan WHERE id_buku='$id_buku'");
				$perproduk = $ambil->fetch_assoc();

				$nama = $perproduk['nama_buku'];

				$koneksi->query("INSERT INTO proses (id_peminjaman,id_peminjam,id_waktu,id_buku,jumlah,total_bayar,tanggal_pinjam) 
				VALUES ('$id_peminjaman_barusan','$id_peminjam','$id_waktu','$id_buku','$jumlah','$total_bayar','$tanggal_pinjam')");
			}

			// update stok
			$koneksi->query("UPDATE perpustakaan SET stok_buku=stok_buku -$jumlah WHERE id_buku='$id_buku'");

			// mengkosongkan keranjang belanja
			unset($_SESSION["keranjang"]);

			// tampilan dialihkan ke halaman nota, nota dari pembelian yang barusan
			echo "<div class='alert alert-info'>Peminjaman Sukses</div>";
 			echo "<meta http-equiv='refresh' content='1;url=nota.php?id=$id_peminjaman_barusan'>";
		}
		 ?>
	</div>
</section>


</body>
</html>