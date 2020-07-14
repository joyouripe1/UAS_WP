<?php 
$koneksi = new mysqli("localhost","root","","perpustakaan");
 ?>
 <?php 
$keyword = $_GET["keyword"];

$semuadata=array();
$ambil = $koneksi->query("SELECT * FROM perpustakaan WHERE nama_buku LIKE '%$keyword%'");
while($pecah = $ambil->fetch_assoc()) 
{
	$semuadata[]=$pecah;
}

// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
  ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Pencarian</title>
 	<link rel="stylesheet" href="admin/assets/css/bootstrap.css">
 </head>
 <body>
 <?php include 'menu.php'; ?>
 <div class="container">
 	<h3>Hasil Pencarian <?php echo $keyword ?></h3>
 	<?php if (empty($semuadata)): ?>
 		<div class="alert alert-danger">Pencarian <strong><?php echo $keyword ?></strong> Tidak Ditemukan</div>
 	<?php endif ?>
 	<div class="row">
 		<?php foreach ($semuadata as $key => $value): ?>
 		<div class="col-md-3">
 			<div class="thumbnail">
 				<img src="foto_buku/<?php echo $value["foto_buku"] ?>" class="img-responsive">
 				<div class="caption">
 					<h3><?php echo $value["nama_buku"] ?></h3>
 					<h5>Rp. <?php echo number_format($value['harga_buku']) ?></h5>
 					<a href="pinjam.php?id=<?php echo $value["id_buku"]; ?>" class="btn btn-primary">Pinjam</a>
 					<a href="detail.php?id=<?php echo $value["id_buku"]; ?>" class="btn btn-default">Detail</a>
 				</div>
 			</div>
 		</div>
 		<?php endforeach ?>
 	</div>
 </div>
 </body>
 </html>