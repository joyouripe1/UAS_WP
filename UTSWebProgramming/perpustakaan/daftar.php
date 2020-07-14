<?php $koneksi = new mysqli("localhost","root","","perpustakaan"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

<!-- navbar -->
<?php include 'menu.php'; ?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Daftar Peminjam</h3>
				</div>
				<div class="panel-body">
					<form method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-md-3">Nama</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="nama" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Alamat</label>
							<div class="col-md-7">
								<textarea class="form-control" name="alamat" required></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Nomor Telpon</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="telepon" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Username</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="username" required>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3">Password</label>
							<div class="col-md-7">
								<input type="text" class="form-control" name="password" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-7 col-md-offset-3">
								<button class="btn btn-primary" name="daftar">Daftar</button>
							</div>
						</div>
					</form>
					<?php 
					// jika tombol daftar ditekan
					if (isset($_POST["daftar"])) 
					{
						// mengambil isian
						$nama = $_POST["nama"];
						$alamat = $_POST["alamat"];
						$telepon = $_POST["telepon"];
						$username = $_POST["username"];
						$password = $_POST["password"];

						// cek apakah username sudah digunakan
						$ambil = $koneksi->query("SELECT * FROM peminjam WHERE username_peminjam='$username'");
						$yangcocok = $ambil->num_rows;
						if ($yangcocok==1) 
						{
							echo "<div class='alert alert-info'>Pendaftaran Gagal, Username Sudah Digunakan</div>";
 							echo "<meta http-equiv='refresh' content='1;url=daftar.php'>";
						}
						else 
						{
							// query insert ke dalam tabel
							$koneksi->query("INSERT INTO peminjam (nama_peminjam,alamat_peminjam,telepon_peminjam,username_peminjam,password_peminjam) VALUES ('$nama','$alamat','$telepon','$username','$password')");

							echo "<div class='alert alert-info'>Pendaftaran Sukses, Silahkan Login</div>";
 							echo "<meta http-equiv='refresh' content='1;url=login.php'>";
						}
					}
					 ?>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>