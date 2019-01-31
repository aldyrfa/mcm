<style type="text/css">
	@media (min-width: 768px){
		.col-sm-1 {
		    width: 4.333333%;
		}
	}
</style>
<h2>Edit Soal</h2>

<?php 
$ambil = $koneksi->query("SELECT * FROM soal WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

 ?>

 <form method="post" enctype="multipart/form-data">
 	
 	<div class="form-group col-md-8">
 		<label>Soal</label>
 		<textarea name="nama_soal" class="form-control" rows="10" value="<?=$pecah['nama_soal']?>" style="width: 50% !important;"><?=$pecah['nama_soal']?></textarea>
 	</div>

 	<div class="form-group col-md-8">
		<label class="col-sm-1">A</label>
		<input type="text" name="a" class="form-control" value="<?=$pecah['a']?>" style="width: 30% !important;">
	</div>
	<div class="form-group col-md-8">
		<label class="col-sm-1">B</label>
		<input type="text" name="b" class="form-control" value="<?=$pecah['b']?>" style="width: 30% !important;">
	</div>
	<div class="form-group col-md-8">
		<label class="col-sm-1">C</label>
		<input type="text" name="c" class="form-control" value="<?=$pecah['c']?>" style="width: 30% !important;">
	</div>
	<div class="form-group col-md-8">
		<label class="col-sm-1">D</label>
		<input type="text" name="d" class="form-control" value="<?=$pecah['d']?>" style="width: 30% !important;">
	</div>
	<div class="form-group col-md-8">
		<label class="col-sm-1">e</label>
		<input type="text" name="e" class="form-control" value="<?=$pecah['e']?>" style="width: 30% !important;">
	</div>

 	<div class="form-group col-md-8">
 		<label> Jawaban </label>

 		<select name="jawaban" class="form-control" style="width: 30% !important;">
 			<option value="">--Pilih Jabawan--</option>
 			<option value="a" <?=($pecah['jawaban']=='a') ? 'selected' :'';?>> A </option>
 			<option value="b" <?=($pecah['jawaban']=='b') ? 'selected' :'';?>> B </option>
 			<option value="c" <?=($pecah['jawaban']=='c') ? 'selected' :'';?>> C </option>
 			<option value="d" <?=($pecah['jawaban']=='d') ? 'selected' :'';?>> D </option>
 			<option value="e" <?=($pecah['jawaban']=='e') ? 'selected' :'';?>> E </option>
 		</select>
 	</div>
 	

 	<div class="form-group col-md-8">
 		<button class="btn btn-primary" name="ubah">Update</button>
 	</div>
 </form>

 <?php 

if (isset($_POST['ubah'])) {
	//jika foto dirubah
		$koneksi->query("UPDATE soal SET nama_soal='$_POST[nama_soal]',
										a='$_POST[a]',
										b='$_POST[b]',
										c='$_POST[c]',
										d='$_POST[d]',
										e='$_POST[e]', 
										jawaban='$_POST[jawaban]' 
										WHERE id='$_GET[id]'");

	echo "<script> alert('Soal berhasil diubah'); </script>";
	echo "<script> location='index.php?halaman=soaltes';</script>";
}

  ?>