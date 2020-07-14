<?php 

$ambil = $koneksi->query("SELECT * FROM perpustakaan WHERE id_buku='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotobuku = $pecah['foto_buku'];
if (file_exists("../foto_buku/$fotobuku")) 
{
	unlink("../foto_buku/$foto_buku");
}


$koneksi->query("DELETE FROM perpustakaan WHERE id_buku='$_GET[id]'");
echo "<div class='alert alert-info'>Data Buku Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=perpustakaan'>";

 ?>