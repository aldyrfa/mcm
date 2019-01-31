<?php
// koneksi db
session_start();
include 'koneksi.php';
require_once __DIR__ . '/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

ob_start();

?>
<style>
/*------------------------------*\
Grid System
\*------------------------------*/

.row, 
.column {
  box-sizing: border-box;
}

.row:before,
.row:after {
  content: " ";
  display: table;
}

.row:after {
  clear: both;
}

.column {
  position: relative;
  float: left;
  display: block;
}

.column + .column {
  margin-left: 1.6%;
}

.column-1 {
  width: 6.86666666667%;
}

.column-2 {
  width: 15.3333333333%;
}

.column-3 {
  width: 23.8%;
}

.column-4 {
  width: 32.2666666667%;
}

.column-5 {
  width: 40.7333333333%;
}

.column-6 {
  width: 49.2%;
}

.column-7 {
  width: 57.6666666667%;
}

.column-8 {
  width: 66.1333333333%;
}

.column-9 {
  width: 74.6%;
}

.column-10 {
  width: 83.0666666667%;
}

.column-11 {
  width: 91.5333333333%;
}

.column-12 {
  width: 100%;
  margin-left: 0;
}

@media only screen and (max-width: 550px) {
  .column-1, 
  .column-2, 
  .column-3, 
  .column-4, 
  .column-5, 
  .column-6, 
  .column-7, 
  .column-8, 
  .column-9, 
  .column-10, 
  .column-11, 
  .column-12 {
    float: none;
    width: auto;
  }

  .column + .column {
    margin-left: 0;
  }
}

table { 
  width: 100%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #eee; 

  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  border: 1px solid #ccc; 
  text-align: left; 
}
</style>

<body style="background-color: white">

<div class="row" style="padding-bottom: 2">
<div class="column column-4" align="left"><img src="gambar/1.png" width="100px"></div>
<div class="column column-8" >
<div align="right" style="padding-bottom: 0px; padding-top: 0px;" onresize="20" ><strong>PT.Maratama Cipta Mandiri</strong><br/>JL. Cingised No 48B, <br> Cisaranten Endah, Arcamanik, Kota Bandung, Jawa Barat <br/>Contact Us : (022)8724662 </div>

</div>
</div>
<hr/>
<div class="row" style="padding-bottom: 2">
<div class="column column-8" align="right"><h3 align="right"> Bukti Hasil Ujian dan Interview</h3></div>


  <?php   $id_user = $_SESSION["user"]["id_user"]; ?>
        
        <?php $ambil = $koneksi->query("SELECT *,
                        IF(status_pelamar=1, 'DITERIMA', 
                        IF(status_pelamar=2, 'DITOLAK', 
                        'MENUNGGU HASIL')) AS status 
                        FROM biodata_user
                        LEFT JOIN lowongan ON biodata_user.id_lowongan=lowongan.id_lowongan
                        JOIN interview ON biodata_user.id_lowongan=interview.id_lowongan
                        WHERE id_user='$id_user'"); ?>

        <?php while($pecah = $ambil->fetch_assoc()) { ?>

  </div>
 

  <div class="row">
    <div class="column column-4" align="left">
      <table>

        <tr>
          <td width="120">Nama  pelamar</td>
          <td width="10px">:</td>
          <td ><?php echo $pecah["nama"]?></td>
        </tr>

      </table>
    </div>
  </div>

  <br/>

  <table>
    <tr>
      <th width="150px" align="center">Nama</th>
      <th width="150px" align="center">No_Telp</th>
       <th width="150px" align="center">Email</th>
      <th width="150px" align="center">Universitas</th>
      <th width="150px" align="center">Nama Divisi</th>
      <th width="150px" align="center">Status Berkas</th>
      <th width="150px" align="center">Jadwal Interview</th>
      <th width="150px" align="center">Hasil Interview</th>
    </tr>
    
    <tr>
      <td width="150px" align="center"><?php echo $pecah["nama"]?></td>
      <td width="150px" align="center"><?php echo $pecah["no_telp"]?></td>
      <td width="150px" align="center"><?php echo $pecah["email"]?></td>
      <td width="150px" align="center"><?php echo $pecah["nama_perguruan_tinggi"]?></td>
      <td width="150px" align="center"><?php echo $pecah["nama_divisi"]?></td>
      <td width="150px" align="center"><?php echo $pecah["status"]?></td>
      <td width="150px" align="center"><?php echo $pecah["jadwal_interview"]?></td>
      <td width="150px" align="center"><?php echo $pecah["status"]?></td>
    </tr>
     
  </table>

  
<br/>
  <div class="row" style="padding-bottom: 2">
   <div class="column column-5" align="center">
    <table>
   
    </table>
   
   </div>
  </div>
 
  <hr/>
           <?php  } ?>

</body>
 
 
   

<?php

$data = ob_get_contents(); //Proses untuk mengambil hasil dari OB..
ob_end_clean();



$mpdf->WriteHTML($data);
$mpdf->Output();


?>








