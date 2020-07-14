<?php 
session_start();
$koneksi = new mysqli("localhost","root","","perpustakaan");
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Login Peminjam</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="admin/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="admin/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="admin/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
	<!-- <link rel="stylesheet" href="admin/assets/css/bootstrap.css"> -->
</head>
<body>

<!-- navbar -->
<?php include 'menu.php'; ?>

<div class="container">
	<div class="row text-center ">
        <div class="col-md-12">
            <br /><br />
            <h2>Login</h2>
            <br />
        </div>
    </div>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Masukan username dan password anda </strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" method="post">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" name="user" />
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name="password" />
                                        </div>
                                     
                                     <button class="btn btn-primary" name="login">Login</button>
                                    <hr />
                                    Belum Terdaftar ? <a href="daftar.php" >klik disini </a> 
                                    </form>
                                    <?php 
									// jika tombol simpan ditekan
									if (isset($_POST["login"])) 
									{
										$user = $_POST["user"];
										$password = $_POST["password"];
										// lakukan query ngecek akun di tabel pelanggan di database
										$ambil = $koneksi->query("SELECT * FROM peminjam WHERE username_peminjam='$user' AND password_peminjam='$password'");
										// ngitung akun yang terambil
										$akunyangcocok = $ambil->num_rows;

										// jika 1 akun yang cocok, maka diloginkan
										if ($akunyangcocok==1) 
										{
											// anda sukses login
											// mendapatkan akun dalam bentuk array
											$akun = $ambil->fetch_assoc();
											// simpan di session pelanggan
											$_SESSION["peminjam"] = $akun;
                                            echo "<div class='alert alert-info'>Anda Sukses Login</div>";
 	                                        echo "<meta http-equiv='refresh' content='1;url=index.php'>";
										}
										else
										{
											// anda gagal login
                                            echo "<div class='alert alert-info'>Anda Gagal Login, Periksa Akun Anda</div>";
 	                                        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
										}
									}
 									?>
		
	</div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="admin/assets/js/jquery-1.10.2.js"></script> -->
      <!-- BOOTSTRAP SCRIPTS -->
    <!-- <script src="admin/assets/js/bootstrap.min.js"></script> -->
    <!-- METISMENU SCRIPTS -->
    <!-- <script src="admin/assets/js/jquery.metisMenu.js"></script> -->
      <!-- CUSTOM SCRIPTS -->
    <!-- <script src="admin/assets/js/custom.js"></script> -->
</body>
</html>