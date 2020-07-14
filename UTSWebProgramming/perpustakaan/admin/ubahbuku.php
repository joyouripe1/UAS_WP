<h2>Ubah Buku</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM perpustakaan WHERE id_buku='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Nama Buku</label>
 		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_buku']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Harga Buku</label>
 		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_buku']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Pengarang</label>
 		<input type="text" name="pengarang" class="form-control" value="<?php echo $pecah['pengarang']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Stok Buku</label>
 		<input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok_buku']; ?>">
 	</div>
 	<div class="form-group">
 		<img src="../foto_buku/<?php echo $pecah['foto_buku'] ?>" width="200">
 	</div>
 	<div class="form-group">
 		<label>Ganti Foto</label>
 		<input type="file" name="foto" class="form-control">
 	</div>
 	<button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php 
 if (isset($_POST['ubah'])) 
{
  	$namafoto=$_FILES['foto']['name'];
  	$lokasifoto = $_FILES['foto']['tmp_name'];
  	//jika foto dirubah
  	if (!empty($lokasifoto)) 
  	{
  		move_uploaded_file($lokasifoto, "../foto_buku/$namafoto");

  		$koneksi->query("UPDATE perpustakaan SET nama_buku='$_POST[nama]',harga_buku='$_POST[harga]',pengarang='$_POST[pengarang]',stok_buku='$_POST[stok]',foto_buku='$namafoto' WHERE id_buku='$_GET[id]'");
  	}
  	else
  	{
  		$koneksi->query("UPDATE perpustakaan SET nama_buku='$_POST[nama]',harga_buku='$_POST[harga]',pengarang='$_POST[pengarang]',stok_buku='$_POST[stok]' WHERE id_buku='$_GET[id]'");
  	}
	echo "<div class='alert alert-info'>Data Buku Telah Berhasil Dirubah</div>";
 	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=perpustakaan'>";
  }
   ?>