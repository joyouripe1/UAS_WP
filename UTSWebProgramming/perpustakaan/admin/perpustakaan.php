<h2>Data Produk</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Judul Buku</th>
			<th>Harga Buku</th>
			<th>Pengarang</th>
			<th>Stok Buku</th>
			<th>Foto Buku</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM perpustakaan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_buku']; ?></td>
			<td><?php echo $pecah['harga_buku']; ?></td>
			<td><?php echo $pecah['pengarang']; ?></td>
			<td><?php echo $pecah['stok_buku']; ?></td>
			<td>
				<img src="../foto_buku/<?php echo $pecah['foto_buku']; ?>" width="100">
			</td>
			<td>
				<a href="index.php?halaman=hapusbuku&id=<?php echo $pecah['id_buku']; ?>" class="btn-danger btn">hapus</a>
				<a href="index.php?halaman=ubahbuku&id=<?php echo $pecah['id_buku']; ?>" class="btn btn-warning">ubah</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahbuku" class="btn btn-primary">Tambah Buku</a>