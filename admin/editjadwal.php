<h2>Edit Jadwal</h2>


<?php 
$ambil = $koneksi->query("SELECT jadwal.tanggal_mulai AS mulai_tes ,jadwal.tanggal_akhir AS selesai_tes,jadwal.id_jadwal,lowongan.nama_divisi
		FROM jadwal JOIN lowongan ON jadwal.id_lowongan=lowongan.id_lowongan WHERE id_jadwal='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>

 <form method="post" enctype="multipart/form-data">
 	<div class="form-group">
 		<label>Tanggal Mulai</label>
 		<input type="date" name="mulai_tes" class="form-control" value="<?php echo $pecah['mulai_tes']; ?>">
 	</div>
 	<div class="form-group">
 		<label> Tanggal Selesai</label>
 		<input type="date" name="selesai_tes" class="form-control" value="<?php echo $pecah['selesai_tes']; ?>">
 	</div>
 	<div class="form-group">
 		<label>Lowongan</label>
 		<input type="text" name="id_lowongan" class="form-control" value="<?php echo $pecah['nama_divisi']; ?>">
 	</div>
 	<button class="btn btn-primary" name="ubah">Edit</button>
 </form>

 <?php 

if (isset($_POST['ubah'])) {
	//jika jadwal dirubah
	
		$update = $koneksi->query("UPDATE jadwal SET tanggal_mulai='$_POST[mulai_tes]', tanggal_akhir='$_POST[selesai_tes]' WHERE id_jadwal='$_GET[id]'");
		// die($update);
	if($update){
        echo "<script> alert('Jadwal Berhasil Diubah'); </script>";
		echo "<script> location='index.php?halaman=jadwal';</script>";
    }else{
        echo "<script> alert('Jadwal Gagal Diubah'); </script>";
		echo "<script> location='index.php?halaman=jadwal';</script>";
    }

}

  ?></h2>