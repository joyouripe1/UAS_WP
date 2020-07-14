<?php 
session_start();
// mendapatkan id_produk dari url
$id_buku = $_GET['id'];


// jika sudah ada produk itu di keranjang, maka produk itu jumlahnya di +1
if (isset($_SESSION['keranjang'][$id_buku])) 
{
	$_SESSION['keranjang'][$id_buku]+=1;
}
// selain itu (belum ada di keranjang), maka produk itu dianggap dibeli 1
else
{
	$_SESSION['keranjang'][$id_buku] = 1;
}




// larikan ke halaman keranjang
echo "<div class='alert alert-info'>Data Telah Masuk ke Keranjang</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php'>";
 ?>