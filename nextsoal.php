
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

if($result->num_rows > 0):
    echo "<script> alert('Anda Sudah Pernah Mengerjakan Soal'); window.location.replace('hasil.php')</script>";
endif;

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
        <script type="text/javascript">
        function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
                timer = duration;
                   autoSubmit();
                   clearInterval(interVal)
        }
    }, 1000);
}

    function autoSubmit(){
        simpan();
    }
window.onload = function () {
//this is where you can modifies the time amount.
    var thirtyminutes = 60 * 30,
    
        display = document.querySelector('#time');
    a = startTimer(thirtyminutes, display);
};
</script>

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
      </style>



<div class="container head-top">
    <div>Waktu Anda Tersisa <span id="time">30:00</span> minutes!</div>
    <form name="form" id="form_soal" method="post">

<?php
    $result = $conn->query("SELECT * FROM soal")->fetch_all();

    $id_user = $_SESSION['user']['id_user'];
    //debux($result);
    $no=1;
    foreach ($result as $key):

        //debux($key);

?>

<section class="section">
    <p class="numb"><strong>No <?=$no?></strong></p>
    <p class="section-description"><?=$key[1]?> </p>
    <input type="hidden" name="soal[<?=$key[0]?>]" value="<?=$key[0]?>">
    <input type="hidden" name="jawaban[<?=$key[0]?>]" value="<?=$key[7]?>">
    <input type="hidden" name="my_val" value="soal">
    <input type="hidden" name="id_user" value="<?=$id_user?>">
    <div class="form-group ans">
        <label><input type="radio" name="jawab[<?=$key[0]?>]" value="a"> A. <?=$key[2]?></label>
    </div>
    <div class="form-group ans">
        <label><input type="radio" name="jawab[<?=$key[0]?>]" value="b"> B. <?=$key[3]?></label>
    </div>
    <div class="form-group ans">
        <label><input type="radio" name="jawab[<?=$key[0]?>]" value="c"> C. <?=$key[4]?></label>
    </div>
    <div class="form-group ans">
        <label><input type="radio" name="jawab[<?=$key[0]?>]" value="d"> D. <?=$key[5]?></label>
    </div>
    <div class="form-group ans">
        <label><input type="radio" name="jawab[<?=$key[0]?>]" value="e"> E. <?=$key[6]?></label>
    </div>
    <html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
a {
  text-decoration: none;
  display: inline-block;
  padding: 8px 16px;
}

a:hover {
  background-color: #ddd;
  color: black;
}

.previous {
  background-color: #f1f1f1;
  color: black;
}

.next {
  background-color: #4CAF50;
  color: white;
}

.round {
  border-radius: 50%;
}
</style>
</head>
<body>
<a href="previous.php" class="previous">&laquo; Previous</a>
<a href="nextsoal.php" class="next"> Next &raquo;</a>

<a href="previous.php" class="previous round">&#8249;</a>
<a href="nextsoal.php" class="next round">&#8250;</a>
  
</body>
</html> 

<hr>
</section>

<?php $no+=1; endforeach; ?>
</form>
<div class="form-group">
    <button type="button" name="save" class="btn btn-primary" onclick="simpan()">Simpan</button>
</div>

</div>

</section>


        

        
        
<script type="text/javascript">
    function simpan()
    {

      var form = $("#form_soal");
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
                alert("Input Berhasil Silahkan Cek Nilai Anda");
                window.location.replace('hasil.php');
            }else{
                alert("Input Gagal Silahkan Coba Lagi");     
            }
         },
         error: function (jqXHR, textStatus, errorThrown)
         {
          alert('Error adding / update data');
         }
      });
    }
</script>
      

        
       
        

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