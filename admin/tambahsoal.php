<style type="text/css">
	@media (min-width: 768px){
		.col-sm-1 {
		    width: 4.333333%;
		}
	}
</style>

<?php

/*$ambil_kode=$koneksi->query("SELECT max(kode_soal) as maxKode FROM soal");
$data=$ambil_kode->fetch_assoc();
$kodeBarang = $data['maxKode'];

$noUrut = (int) substr($kodeBarang, 3, 3);

$noUrut++;

$char = "SL";
$newID = $char . sprintf("%03s", $noUrut);*/

?>

<script type="text/javascript">
	
function generate_kode_soal(id_divisi) {
	
	$.ajax({
        url : "<?php echo '../proses.php' ?>",
        type: "POST",
        data: {"id_divisi":id_divisi,"my_val":"kode_soal"},
        success: function(data)
        {
        	console.log(data);
        	$('#kode_soal').val(data);
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            alert("Error adding / update data");
         }
      });


}

</script>

<h2>Tambah Soal</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group col-md-8">
		<label>Lowongan</label>
		<?php $ambil=$koneksi->query("SELECT * FROM lowongan"); ?>
		
		<select name="lowongan" class="form-control" style="width: 30% !important;" onchange="generate_kode_soal(this.value)">
 			<option value="">--Pilih Lowongan--</option>
			<?php while ($pecah=$ambil->fetch_assoc()) { ?>
 			<option value='<?php echo $pecah["id_lowongan"]; ?>'> <?php echo $pecah["nama_divisi"]; ?> </option>
 			<?php } ?>
 		</select>
	</div>
	<div class="form-group col-md-8">
		<label>Kode Soal</label>
		<input type="text" name="kode_soal" id="kode_soal" class="form-control" value="" readonly style="width: 30% !important;">
	</div>
	<div class="form-group col-md-8">
		<label>Soal</label>
		<textarea name="nama_soal" class="form-control" rows="10" placeholder="Isi Soal" style="width: 50% !important;"></textarea>
	</div>
	<div class="form-group col-md-8">
 		<label> Pilihan </label>
 	</div>
 		
 		<div class="form-group col-md-8">
 			<label class="col-sm-1">A</label>
 			<input type="text" name="a" class="form-control" placeholder="Isi Jabawan A" style="width: 30% !important;">
 		</div>

 		<div class="form-group col-md-8">
 			<label class="col-sm-1">B</label>
 			<input type="text" name="b" class="form-control" placeholder="Isi Jabawan B" style="width: 30% !important;">
 		</div>

 		<div class="form-group col-md-8">
 			<label class="col-sm-1">C</label>
 			<input type="text" name="c" class="form-control" placeholder="Isi Jabawan C" style="width: 30% !important;">
 		</div>

 		<div class="form-group col-md-8">
 			<label class="col-sm-1">D</label>
 			<input type="text" name="d" class="form-control" placeholder="Isi Jabawan D" style="width: 30% !important;">
 		</div>

 		<div class="form-group col-md-8">
 			<label class="col-sm-1">E</label>
 			<input type="text" name="e" class="form-control" placeholder="Isi Jabawan E" style="width: 30% !important;">
 		</div>

 	<!-- </div> -->
	<div class="form-group col-md-8">
		<label>Jawaban</label>
		<select name="jawaban" class="form-control" style="width: 30% !important;">
 			<option value="">--Pilih Jawaban--</option>
 			<option value="a"> A </option>
 			<option value="b"> B </option>
 			<option value="c"> C </option>
 			<option value="d"> D </option>
 			<option value="e"> E </option>
 		</select>
	</div>
	<div class="form-group col-md-8">
		<button class="btn btn-primary" name="save">Simpan</button>
	</div>
</form>

<?php 

if (isset($_POST['save'])) {

	$koneksi->query("INSERT INTO soal (kode_soal,nama_soal,a,b,c,d,e,jawaban,id_lowongan) VALUES('$_POST[kode_soal]','$_POST[nama_soal]','$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]','$_POST[jawaban]','$_POST[lowongan]')");

	echo "<div class='alert alert-info'>Data Soal tersimpan</div>";
	echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=soaltes'>";
}

 ?>



