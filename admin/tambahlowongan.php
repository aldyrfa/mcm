<h2>Tambah Lowongan</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Kode Lowongan</label>
		<input type="text" name="kode_lowongan" value="<?=kode_lowongan()?>" readonly class="form-control">
	</div>
	<div class="form-group">
		<label>Nama Divisi</label>
		<input type="text" name="nama_divisi" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Mulai</label>
		<input type="date" name="tanggal_mulai" class="form-control">
	</div>
	<div class="form-group">
		<label>Tanggal Selesai</label>
		<input type="date" name="tanggal_selesai" class="form-control">
	</div>
	<div class="form-group">
		<label>Persyaratan</label>
		<textarea class="form-control" name="persyaratan" rows="10"></textarea>
	</div>
	
	<button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 

if (isset($_POST['save'])) {	
	$koneksi->query("INSERT INTO lowongan (kode_lowongan,nama_divisi,tanggal_mulai,tanggal_selesai,persyaratan) VALUES('$_POST[kode_lowongan]','$_POST[nama_divisi]','$_POST[tanggal_mulai]','$_POST[tanggal_selesai]','$_POST[persyaratan]')");

	echo "<div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=lowongan'>";
}

 ?>



