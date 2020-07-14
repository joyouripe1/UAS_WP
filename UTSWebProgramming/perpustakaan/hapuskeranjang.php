<?php 
session_start();
$id_buku = $_GET[id];
unset($_SESSION["keranjang"][$id_buku]);

echo "<div class='alert alert-info'>Produk Dihapus Dari Keranjang</div>";
echo "<meta http-equiv='refresh' content='1;url=keranjang.php'>";
 ?>