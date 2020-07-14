<?php 

$ambil = $koneksi->query("SELECT * FROM peminjam WHERE id_peminjam='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM peminjam WHERE id_peminjam='$_GET[id]'");
echo "<div class='alert alert-info'>Data Peminjam Terhapus</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=peminjam'>";

 ?>