<?php $koneksi = new mysqli("localhost","root","","perpustakaan"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Nota Peminjaman</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>
<?php include 'menu.php'; ?>
<section class="konten">
	<div class="container">
		<h2>Detail Peminjaman</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM proses JOIN peminjam ON proses.id_peminjam=peminjam.id_peminjam WHERE proses.id_peminjaman='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h3>Peminjaman</h3>
		<strong>No. Pembelian: <?php echo $detail['id_peminjaman'] ?></strong><br>
		Tanggal : <?php echo $detail['tanggal_pinjam']; ?> <br>
		Total : <?php echo $detail['total_bayar']; ?>
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>
		<strong><?php echo $detail['nama_peminjam']; ?></strong> <br>
		<p>
			<?php echo $detail['alamat_peminjam']; ?> <br>
			<?php echo $detail['telepon_peminjam']; ?>
		</p>
	</div>
	<div class="col-md-4">
		<h3>Biaya</h3>
		<strong><?php echo $detail['lama_pinjam'] ?></strong><br>
		Biaya : Rp. <?php echo number_format($detail['tarif']); ?> <br>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Buku</th>
			<th>Harga Buku</th>
			<th>Pengarang</th>
			<th>Jumlah Dipinjam</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM proses JOIN perpustakaan ON proses.id_buku=perpustakaan.id_buku WHERE proses.id_peminjaman='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_buku']; ?></td>
			<td><?php echo $pecah['harga_buku']; ?></td>
			<td><?php echo $pecah['pengarang']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
		</tr>
		<?php } ?>
		<?php $nomor++; ?>
	</tbody>
</table>

<div class="row">
	<div class="col-md-7">
		<div class="alert alert-info">
			<p>
				Silahkan Melakukan Pembayaran Sebesar Rp. <?php echo number_format($detail['total_bayar']); ?> ke <br>
				<strong>BANK BRI 240-001199-4387 AN. Maulana</strong>
			</p>
		</div>
	</div>
</div>
	</div>
</section>
</body>
</html>