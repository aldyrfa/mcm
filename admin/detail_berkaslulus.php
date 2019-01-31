
<?php 
$ambil = $koneksi->query("SELECT * FROM biodata_user WHERE id_pelamar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
 ?>



            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Biodata Pelamar</h2>   
                       
                    </div>
                
                 <!-- /. ROW  -->
                 <hr />

<div class="col-md-3">   
<h3>Data Pribadi</h3>              
 <p>
 	<strong>NAMA : <?php echo $pecah['nama']; ?></strong><br>
 	No. KTP : <?php echo $pecah['no_ktp']; ?><br>
 	No. Telepon : <?php echo $pecah['no_telp']; ?><br>
 	Tanggal Lahir : <?php echo $pecah['tanggal_lahir']; ?><br>
 	Jenis Kelamin : <?php echo $pecah['jenis_kelamin']; ?><br>
 	Status : <?php echo $pecah['status']; ?><br>
 	Alamat : <?php echo $pecah['alamat']; ?>
 	Email : <?php echo $pecah['email']; ?>

 </p>
    </div>

<div class="col-md-3">   
<h3>Data Pendidikan</h3>              
 <p>
 	Pendidikan : <?php echo $pecah['pendidikan']; ?> <br>
 	Perguruan tinggi : <?php echo $pecah['perguruan_tinggi']; ?><br>
 	Nama perguruan tinggi : <?php echo $pecah['nama_perguruan_tinggi']; ?><br>
 	IPK : <?php echo $pecah['ipk']; ?><br>
 </p>
    </div>

<div class="col-md-3">   
<h3>Data </h3>              
 <p>
 	ID Skype : <?php echo $pecah['id_skype']; ?> <br>
 	Pengalaman Kerja : <?php echo $pecah['pengalaman_kerja']; ?><br>
 	Deskripsi singkat : <textarea readonly="" rows="5" cols="60"><?php echo $pecah['deskripsi_singkat']; ?></textarea><br>
 </p>
    </div>

<div class="row">
<div class="col-sm-5">   
<h3>Data CV</h3>
<a href="../cv/<?php echo $pecah['cv']; ?>"> ../cv/<?php echo $pecah['cv']; ?> </a>

</div>   

<div class="col-sm-5">   
<h3>Data Ijazah</h3>
<img src="../ijazah/<?php echo $pecah['ijazah']; ?>" width="200">
</div>


<div class="col-sm-5">   
<h3>Data Sertifikat Keahlian</h3>
<img src="../sertifikat_keahlian/<?php echo $pecah['sertifikat_keahlian']; ?>" width="200">
</div>

<div class="col-sm-5">   
<h3>Data FotoCopy Ktp</h3>
<img src="../fotocopy_ktp/<?php echo $pecah['fotocopy_ktp']; ?>" width="200">
</div>

<div class="col-sm-5">   
<h3>Data NPWP</h3>
<img src="../npwp/<?php echo $pecah['npwp']; ?>" width="200">
</div>

</div>  

      

</div>
</div>