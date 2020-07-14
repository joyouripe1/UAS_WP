<?php 
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])) 
{
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST['tgls'];
	$ambil = $koneksi->query("SELECT * FROM proses LEFT JOIN peminjam ON proses.id_peminjam=peminjam.id_peminjam WHERE tanggal_pinjam BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc()) 
	{
		$semuadata[]=$pecah;
	}
}
 ?>

<h2>Laporan Peminjaman Dari <?php echo $tgl_mulai ?> Hingga <?php echo $tgl_selesai ?></h2>
<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>	
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Peminjam</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_bayar'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_peminjam"] ?></td>
			<td><?php echo $value["tanggal_pinjam"] ?></td>
			<td><?php echo number_format($value["total_bayar"]) ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>