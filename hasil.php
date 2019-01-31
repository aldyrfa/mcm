<?php 

session_start();
include 'koneksi.php';

if(empty($_SESSION['user']['id_user'])){
    echo "<script> alert('Silahkan Login Terlebih Dahulu'); window.location.replace('login.php') </script>";
}

//cek apakah user sudah pernah mengerjakan soal / belum
$conn = mysqli_connect("localhost", "root", "", "mcm");
$id_user = $_SESSION['user']['id_user'];
$result = $conn->query("SELECT * FROM jawaban WHERE id_user = '$id_user'");

if($result->num_rows == 0):
    echo "<script> alert('Anda Belum Pernah Melakukan Ujian Silakan Ujian Terlebih Dahulu'); window.location.replace('soal.php')</script>";
endif;


function hasil_soal($id_user)
{
  $conn = mysqli_connect("localhost", "root", "", "mcm");
  
  $result1 = $conn->query("SELECT * FROM jawaban WHERE id_user = '$id_user'");
  $result2 = $conn->query("SELECT * FROM jawaban WHERE skor = '1' AND id_user = '$id_user'");
  $result3 = $conn->query("SELECT * FROM user WHERE id_user = '$id_user'")->fetch_all();
  $result4 = $conn->query("SELECT * FROM jawaban WHERE skor = '0' AND id_user = '$id_user'");


  $data['jumlah_soal']    = $result1->num_rows;
  $data['jawaban_benar']  = $result2->num_rows;
  $data['jawaban_salah']  = $result4->num_rows;
  $data['nilai_anda']     = $result2->num_rows;
  $data['nama']           = $result3[0][2];


  return $data;

}


 ?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>PT. MARATAMA CIPTA MANDIRI</title>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- Custom Fonts -->
        <link rel="stylesheet" href="custom-font/fonts.css" />
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css" />
        <!-- Bootsnav -->
        <link rel="stylesheet" href="css/bootsnav.css">
        <!-- Fancybox -->
        <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" /> 
        <!-- Custom stylesheet -->
        <link rel="stylesheet" href="css/custom.css" />
        <!--[if lt IE 9]>
                <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

      <?php include 'navbar.php'; ?>

      <style type="text/css">
          .head-top{
            padding-top: 50px !important;
            padding-bottom: 50px;
          }
          .ans{
            padding-left: 50px !important;
          }
          .numb{
            text-decoration: underline;
          }
          hr{
            border-top: 1px solid #555 !important;
          }
          .gray{
            background-color: gray !important;
            border: white;
          }
      </style>

<div class="container head-top">

  <h3>Berikut Hasil Nilai Skor Anda</h3>

  <?php
      $id_user = $_SESSION['user']['id_user'];

      $hasil = hasil_soal($id_user);
  ?>

  <table class="table table-bordered table-striped" width="50%">
    <tr>
      <td style="width: 200px;" class="gray">Nama Calon Karyawan</td>
      <td><?=$hasil['nama']?></td>
    </tr>

    <tr>
      <td class="gray">Jumlah Soal</td>
      <td><?=$hasil['jumlah_soal']?></td>
    </tr>

     <tr>
      <td class="gray">Jawaban Benar</td>
      <td><?=$hasil['jawaban_benar']?></td>
    </tr>     
    <tr>
      <td class="gray">Jawaban Salah</td>
      <td><?=$hasil['jawaban_salah']?></td>
    </tr>

     <tr>
      <td class="gray">Nilai Anda</td>
      <td><?=$hasil['nilai_anda']?></td>
    </tr>
  </table>

</div>

<?php if ($hasil['jawaban_salah'] > $hasil['jawaban_benar']): ?>
  <div class="row">
 <div class="col-md-7">
  <div class="alert alert-info" style="margin-left: 200px !important;">
   <p>
    Note : <br>
    <strong>Maaf anda belum lolos pada tahap seleksi kali ini, kami mengucapkan terima kasih dan semoga sukses</strong>
   </p>
  </div>
 </div>
</div>


<?php else: ?>

<div class="row">
 <div class="col-md-7">
  <div class="alert alert-info" style="margin-left: 200px !important;">
   <p>
    Note : <br>
    <strong>Selamat Anda Akan mengikuti Interview Silahkan Tunggu Info Dari Kami Untuk Proses Selanjutnya</strong><br>
    <strong>Untuk Pengumuman Interview Bisa Di Lilhat Di <a href="pengumuman.php"><u>Aplikasi Ini</u></a></strong><br>
   </p>
  </div>
 </div>
</div>

<?php endif ?>
</section>

<?php include 'footer.php'; ?>

        <!-- JavaScript -->
        <script src="js/jquery-1.12.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <!-- Bootsnav js -->
        <script src="js/bootsnav.js"></script>

        <!-- JS Implementing Plugins -->
        <script src="js/isotope.js"></script>
        <script src="js/isotope-active.js"></script>
        <script src="js/jquery.fancybox.js?v=2.1.5"></script>

        <script src="js/jquery.scrollUp.min.js"></script>

        <script src="js/main.js"></script>
    </body> 
</html> 