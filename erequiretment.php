<?php 

session_start();

include 'koneksi.php';


//jika tidak session pelanggan (belum login)
if (!isset($_SESSION["user"])) {
	 echo "<script>alert('Silahkan login terlebih dahulu');</script>";
        echo "<script>location='login.php';</script>";
}

$id_user = $_SESSION['user']['id_user'];
$cek_duplikasi=$koneksi->query("SELECT * FROM biodata_user WHERE id_user = '$id_user'");

if($cek_duplikasi->num_rows != 0){
    echo "<script> alert('Anda Sudah Pernah Mengisi Biodata'); window.location.replace('pengumuman.php')</script>";
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


<!-- konten -->

<section id="home" class="home">


<div class="container">
     <?php $id_lowongan = $_GET['id']; ?>
    <?php $ambil = $koneksi->query("SELECT * FROM lowongan WHERE id_lowongan='$id_lowongan'"); ?>
        <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <h2>Divisi : <?php echo $pecah['nama_divisi']; ?></h2>
   
      
            <h3>BIODATA USER </h3>
            
            <?php } ?>
<form method="post" id="form_register" enctype="multipart/form-data">
<input type="hidden" name="my_val" value="register_user">
<input type="hidden" name="id_lowongan" value="<?=$id_lowongan?>">
    <div class="form-group">
    <label>Nama :</label>
    <input type="text" name="nama" id="nama" class="form-control" >
    </div>
    
    
    <div class="form-group">
    <label>Tanggal lahir :</label>
    <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" >   
    </div>
    
    
    <div class="form-group">
    <label>No Telpon :</label>
    <input type="text" maxlength="12" name="no_telp" id="no_telp" class="form-control" >   
    </div>
    
    
    <div class="form-group">
    <label>Alamat :</label>
    <textarea name="alamat" id="alamat" rows="5" cols="60" class="form-control"  ></textarea> 
    </div>

    <div class="form-group">
    <label>Jenis Kelamin :</label>
    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" >Laki-laki
    <input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan" >Perempuan    
    </div>
    
    
    <div class="form-group">
    <label>Status :</label>
    <input type="radio" name="status" id="status" value="Lajang" >Lajang
    <input type="radio" name="status" id="status" value="Menikah" >Menikah   
    </div>
    
    
    <div class="form-group">
    <label>No KTP :</label>
    <input type="text" maxlength="16" name="no_ktp" id="no_ktp" class="form-control">    
    </div>
    
    
    <div class="form-group">
    <label>Email :</label>
    <input type="text" name="email" id="email" class="form-control">   
    </div>
    
    
    <div class="form-group">
    <label>Pendidikan :</label>
    <select name="pendidikan" id="pendidikan" class="form-control">
            <option value="D3">D3</option>
            <option value="S1">S1</option>
            <option value="S2">S2</option>
         </select>
         
          <input type="text" placeholder="Program Studi" name="pendidkan" id="pendidikan" class="form-control"> 
    </div>
    
    <div class="form-group">
    <label> Perguruan Tinggi </label>
        <input type="radio" name="perguruan_tinggi" id="perguruan_tinggi" value="ptn">PTN
        <input type="radio" name="perguruan_tinggi" id="perguruan_tinggi" value="pts" >PTS
    (Terakreditasi)
    </div>


    <div class="form-group">
    <label> Nama Perguruan Tinggi </label>
    <input type="text" name="nama_perguruan_tinggi" id="nama_perguruan_tinggi" class="form-control">   
    </div>
    
    
    <div class="form-group">
    <label> IPK </label>
    <input type="text" maxlength="4" name="ipk" id="ipk" value="0,00" class="form-control" >
    </div>
    
    <div class="form-group">
    <label> ID-Skype </label>
    <input type="text" name="id_skype" id="id_skype">
    </div>

    <div class="form-group">
    <label>Pengalaman Kerja (Tahun) </label>
    <input type="number" name="pengalaman_kerja" id="pengalaman_kerja" class="form-control">       
    </div>
    
    <div class="form-group">
    <label>Deskripsi Singkat</label>
    <textarea name="deskripsi_singkat" id="deskripsi_singkat" rows="5" cols="60" class="form-control"></textarea>  
    </div>
    

    <div class="form-group">
    <label>CV</label>
    <input type="file" id="cv" name="cv">
    <p class="text-danger">*File upload mohon dalam bentuk (Doc/Pdf), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Ijazah</label>
    <input type="file" id="ijazah" name="ijazah">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Sertifikat Keahlian</label>
    <input type="file" id="sertifikat_keahlian" name="sertifikat_keahlian">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>

    <div class="form-group">
    <label>Foto Copy Ktp</label>
    <input type="file" id="fotocopy_ktp" name="fotocopy_ktp">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 2 Mb</p>
    </div>

    <div class="form-group">
    <label>NPWP</label>
    <input type="file" id="npwp" name="npwp">
    <p class="text-danger">*File upload mohon dalam bentuk (Pdf/Jpg), maksimal file 3 Mb</p>
    </div>
    <div class="form-group">
        <button name="simpan" type="button" onclick="confirm()" class="btn btn-primary">Simpan</button>
    </div>
</form>
</div>

<script type="text/javascript">
    function validate()
    {
        var nama                    = $('#nama').val();
        var tanggal_lahir           = $('#tanggal_lahir').val();
        var no_telp                 = $('#no_telp').val();
        var alamat                  = $('#alamat').val();
        var jenis_kelamin           = $('#jenis_kelamin').val();
        var status                  = $('#status').val();
        var no_ktp                  = $('#no_ktp').val();
        var email                   = $('#email').val();
        var pendidikan              = $('#pendidikan').val();
        var perguruan_tinggi        = $('#perguruan_tinggi').val();
        var nama_perguruan_tinggi   = $('#nama_perguruan_tinggi').val();
        var ipk                     = $('#ipk').val();
        var id_skype                = $('#id_skype').val();
        var pengalaman_kerja        = $('#pengalaman_kerja').val();
        var deskripsi_singkat       = $('#deskripsi_singkat').val();
        var cv                      = $('#cv').val();
        var ijazah                  = $('#ijazah').val();
        var sertifikat_keahlian     = $('#sertifikat_keahlian').val();
        var fotocopy_ktp            = $('#fotocopy_ktp').val();
        var npwp                    = $('#npwp').val();
        var pesan                   = "";

        if(nama==""){
            pesan+= "Nama Belum Di Isi\n";
        }
        if(tanggal_lahir==""){
            pesan+= "Tanggal Lahir Belum Di Isi\n";
        }
        if(no_telp==""){
            pesan+= "No Telp Belum Di Isi\n";
        }
        if(alamat==""){
            pesan+= "Alamat Belum Di Isi\n";
        }
        if(jenis_kelamin==""){
            pesan+= "Jenis Kelamin Belum Di Isi\n";
        }
        if(status==""){
            pesan+= "Status Belum Di Isi\n";
        }
        if(no_ktp==""){
            pesan+= "No KPT Belum Di Isi\n";
        }
        if(email==""){
            pesan+= "Email Belum Di Isi\n";
        }
        if(pendidikan==""){
            pesan+= "Pendidikan Belum Di Isi\n";
        }
        if(perguruan_tinggi==""){
            pesan+= "Program Studi Belum Di Isi\n";
        }
        if(nama_perguruan_tinggi==""){
            pesan+= "Nama Program Studi Belum Di Isi\n";
        }
        if(ipk==""){
            pesan+= "IPK Belum Di Isi\n";
        }
        if(id_skype==""){
            pesan+= "ID Skype Belum Di Isi\n";
        }
        if(pengalaman_kerja==""){
            pesan+= "Pengalaman Kerja Belum Di Isi\n";
        }
        if(deskripsi_singkat==""){
             pesan+= "Deskripsi Singkat Belum Di Isi\n";
        }
        if(cv==""){
             pesan+= "CV Belum Di Upload\n";
        }
        if(ijazah==""){
             pesan+= "Ijazah Belum Di Upload\n";
        }
        if(sertifikat_keahlian==""){
            pesan+= "Sertifikat Keahlian Belum Di Upload\n";
        }
        if(fotocopy_ktp==""){
            pesan+= "Foto Copy KTP Belum Di Upload\n";
        }
        if(npwp==""){
            pesan+= "NPWP Belum Di Upload\n";
        }


       if(pesan!=""){
            swal(pesan, {
                icon: "error",
            });
            return false;
       }

    }


    function confirm()
    {
        swal({
          title: "Pesan",
          text: "Apakah Anda Yakin Ingin Simpan Data Ini ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((success) => {
          if (success) {
                save();
          } else {
                swal("Data Anda Batal Di Simpan", {
                    icon: "error",
                });
          }
        });
    }


    function save()
    {
      validate();  
      var form = $("#form_register");
      var formData = new FormData(form[0]);

      $.ajax({
        url : "<?php echo 'proses.php' ?>",
        type: "POST",
        data: formData,
        dataType: "JSON",
        processData: false,
        contentType: false,
        cache: false,
        success: function(data)
        {
          if(data.status=="1"){
                swal("Terimakasih, Dokument Anda Sudah Diteruskan Ke Admin", {
                    icon: "success",
                });
                window.location.replace('index.php');
            }else{
                swal("Simpan Gagal Silahkan Lengkapi Data Terlebih Dahulu", {
                    icon: "error",
                });     
            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
            swal("Error adding / update data", {
                icon: "error",
            });
         }
      });
    }
</script>


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