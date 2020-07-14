<h2>Data Peminjam</h2>
<br>
<div id="tabelnya">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Peminjam</th>
				<th>Alamat Peminjam</th>
				<th>Telepon Peminjam</th>
				<th>aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil=$koneksi->query("SELECT * FROM peminjam"); ?>
			<?php while($pecah = $ambil->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_peminjam']; ?></td>
				<td><?php echo $pecah['alamat_peminjam']; ?></td>
				<td><?php echo $pecah['telepon_peminjam']; ?></td>
				<td>
					<a href="index.php?halaman=hapuspeminjam&id=<?php echo $pecah['id_peminjam']; ?>" class="btn-danger btn">hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>