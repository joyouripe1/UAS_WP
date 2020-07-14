<h2>Data Peminjaman</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Peminjam</th>
			<th>Jumlah Peminjaman</th>
			<th>Tanggal Peminjaman</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM proses JOIN peminjam ON proses.id_peminjam=peminjam.id_peminjam"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_peminjam']; ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td><?php echo $pecah['tanggal_pinjam']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_peminjaman']; ?>" class="btn btn-info">detail</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>