<?php 
session_start();

// menghancurkan $_SESSION pelanggan
session_destroy();

echo "<div class='alert alert-info'>Anda Telah Logout</div>";
echo "<meta http-equiv='refresh' content='1;url=index.php'>";
 ?>