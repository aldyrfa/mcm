<?php


session_start();
include 'koneksi.php';


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




<!--konten -->

<div class="container">

<div class="col-md-4">
	<div class="panel panel-default">
	<div class="panel-heading" align="center">
	<h3 class="panel-tittle">Login </h3>
		
	</div>
		<div class="panel-body">
		<form method="POST">
			<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username">
			<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password">
			</div>
			<button class="btn btn-primary" name="login">Login</button> <a href="daftar.php">Daftar</a>

		</form>
			
		</div>
	</div>
</div>
	

	
</div>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcm";

// Create connection
$koneksi = new mysqli($servername, $username, $password, $dbname);


//jika ada tombol login (tombal login ditekan)
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    //lakukan query mengecek akun di tabel pelanggan database
    $ambil = $koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

    //menghitung akun yg terambil
    $akunyangcocok = $ambil->num_rows;

    //jika 1 akun yang cocok ,maka di loginkan
    if ($akunyangcocok==1) {
        //anda sukses login
        //mendapatkan akun dalam bentuk array
        $akun = $ambil->fetch_assoc();
        //simpan di session pelanggan
        $_SESSION["user"] = $akun;
        // echo "<script>alert('Anda sukses login');</script>";
        echo "<script>location='index.php';</script>";
       
       
    }
    else {
        //anda gagal login
        echo "<script>alert('Anda gagal login, silahkan periksa akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
}

 ?>






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

</body>
</html>