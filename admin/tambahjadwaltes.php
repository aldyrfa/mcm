<style type="text/css">
	@media (min-width: 768px){
		.col-sm-1 {
		    width: 4.333333%;
		}
	}
</style>
<h2>Tambah Jadwal</h2>

<form method="post" enctype="multipart/form-data">

	<div class="form-group col-md-8">
		<label>Lowongan</label>
		<?php $ambil=$koneksi->query("SELECT * FROM lowongan"); ?>
		
		<select name="lowongan" class="form-control" style="width: 30% !important;">
 			<option value="">--Pilih Lowongan--</option>
			<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 			<option value='<?php echo $pecah["id_lowongan"]; ?>'> <?php echo $pecah["nama_divisi"]; ?> </option>
 			<?php } ?>
 		</select>
	</div>


	<div class="form-group col-md-8">
		<label>Tanggal mulai</label>
		<input type="date" name="tanggal_mulai">
	</div>

	<div class="form-group col-md-8">
		<label>Tanggal akhir</label>
		<input type="date" name="tanggal_akhir">
	</div>


	<div class="form-group col-md-8">
		<button class="btn btn-primary" name="save">Simpan</button>
	</div>
</form>

<?php 

if (isset($_POST['save'])) {

	$koneksi->query("INSERT INTO jadwal (tanggal_mulai,tanggal_akhir,id_lowongan) VALUES('$_POST[tanggal_mulai]','$_POST[tanggal_akhir]','$_POST[lowongan]')");

	echo "<div class='alert alert-info'>Data Jadwal tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=jadwal'>";
}

 ?>



