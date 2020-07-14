<h2>Detail Pembelian</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM proses JOIN peminjam ON proses.id_peminjam=peminjam.id_peminjam WHERE proses.id_peminjaman='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<!-- <pre><?php //print_r($detail); ?></pre> -->

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tanggal : <?php echo $detail['tanggal_pinjam']; ?> <br>
			Total : Rp. <?php echo number_format($detail['total_bayar']); ?> <br>
		</p>
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
		<h3>Pengiriman</h3>
		<strong><?php echo $detail["lama_pinjam"]; ?></strong>
		<p>
			Tarif : Rp. <?php echo number_format($detail["tarif"]); ?> <br>
		</p>
	</div>
</div>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Peminjam</th>
			<th>Harga Buku</th>
			<th>Pengarang</th>
			<th>Total Bayar</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM proses JOIN perpustakaan ON proses.id_buku=perpustakaan.id_buku WHERE proses.id_peminjaman='$_GET[id]'"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_buku']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_buku']); ?></td>
			<td><?php echo $pecah['pengarang']; ?></td>
			<td>Rp. <?php echo number_format($pecah['total_bayar']); ?></td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>