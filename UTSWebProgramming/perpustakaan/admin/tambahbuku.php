<h2>Tambah Buku</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Buku</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga Buku</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Pengarang</label>
		<input type="text" class="form-control" name="pengarang">
	</div>
	<div class="form-group">
		<label>Stok Buku</label>
		<input type="number" class="form-control" name="stok">
	</div>
	<div class="form-group">
		<label>Foto Buku</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
if (isset($_POST['save'])) 
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_buku/".$nama);
	$koneksi->query("INSERT INTO perpustakaan (nama_buku,harga_buku,pengarang,stok_buku,foto_buku) VALUES ('$_POST[nama]','$_POST[harga]','$_POST[pengarang]','$_POST[stok]','$nama')");

	echo "<div class='alert alert-info'>Data Buku Tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=perpustakaan'>";
}
 ?>