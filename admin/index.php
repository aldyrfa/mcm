<?php
session_start();
include '../koneksi.php';


if (!isset($_SESSION['admin']))
{
    echo "<script>alert('Anda Harus Login Terlebih Dahulu')</script>";
    echo "<script>location='login.php';</script>";
   
    exit();
}


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Maratama Cipta Mandiri : Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Website Admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li> <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Home</a></li>
                     <li> <a href="index.php?halaman=lowongan"><i class="fa fa-dashboard fa-3x"></i> Info Lowongan Pekerjaan</a></li>
                    <li> <a href="index.php?halaman=user"><i class="fa fa-dashboard fa-3x"></i>User</a></li>
                    <li> <a href="index.php?halaman=datapelamar"><i class="fa fa-dashboard fa-3x"></i>Data Pelamar</a></li>
                    <li> <a href="index.php?halaman=berkaspelamarlulus"><i class="fa fa-dashboard fa-3x"></i> Berkas Pelamar Lulus</a></li>
                    <li> <a href="index.php?halaman=soaltes"><i class="fa fa-dashboard fa-3x"></i>Soal Tes </a></li>
                    <li> <a href="index.php?halaman=jadwal"><i class="fa fa-dashboard fa-3x"></i>Jadwal Tes </a></li>
                    <li> <a href="index.php?halaman=hasiltes"><i class="fa fa-dashboard fa-3x"></i>Hasil Tes </a></li>
                    <li> <a href="index.php?halaman=jadwalinterview"><i class="fa fa-dashboard fa-3x"></i>Jadwal Interview </a></li>
                    <li> <a href="index.php?halaman=hasilinterview"><i class="fa fa-dashboard fa-3x"></i>Hasil Interview </a></li>
                    
                     <li>
        
                    </li>
                    	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
            <?php
                if (isset($_GET['halaman']))
                {
                    if ($_GET['halaman']=="user")
                    {
                        include 'user.php';
                    }
    
                    else if ($_GET['halaman']=="datapelamar") 
                    {
                        include 'datapelamar.php';
                    }
                else if ($_GET['halaman']=="detail") 
                    {
                        include 'detail.php';
                    }
                else if ($_GET['halaman']=="hapusdatapelamar") 
                    {
                        include 'hapusdatapelamar.php';
                    }
                else if ($_GET['halaman']=="hapusdatauser") 
                    {
                        include 'hapusdatauser.php';
                    }
                 else if ($_GET['halaman']=="lowongan") 
                    {
                        include 'lowongan.php';
                    }
                else if ($_GET['halaman']=="tambahlowongan") 
                    {
                        include 'tambahlowongan.php';
                    } 
                 else if ($_GET['halaman']=="hapuslowongan") 
                    {
                        include 'hapuslowongan.php';
                    } 
                  else if ($_GET['halaman']=="berkaspelamarlulus") 
                    {
                        include 'berkaspelamarlulus.php';
                    }
                 else if ($_GET['halaman']=="editlowongan") 
                    {
                        include 'editlowongan.php';
                    }                         
                 else if ($_GET['halaman']=="soaltes") 
                    {
                        include 'soaltes.php';
                    } 
                 else if ($_GET['halaman']=="editsoal") 
                    {
                        include 'editsoal.php';
                    }    
                    else if ($_GET['halaman']=="hapussoal") 
                    {
                        include 'hapussoal.php';
                    }
                else if ($_GET['halaman']=="tambahsoal") 
                    {
                        include 'tambahsoal.php';
                    }
                else if ($_GET['halaman']=="jadwal") 
                    {
                        include 'jadwal.php';
                    }
                else if ($_GET['halaman']=="editjadwal") 
                    {
                        include 'editjadwal.php';
                    }
                else if ($_GET['halaman']=="detail_berkaslulus") 
                    {
                        include 'detail_berkaslulus.php';
                    }    
                else if ($_GET['halaman']=="tambahjadwaltes") 
                    {
                        include 'tambahjadwaltes.php';
                    }
                else if ($_GET['halaman']=="hasiltes") 
                    {
                        include 'hasiltes.php';
                    }            
                else if ($_GET['halaman']=="jadwalinterview") 
                    {
                        include 'jadwalinterview.php';
                    }    
                else if ($_GET['halaman']=="hasilinterview") 
                    {
                        include 'hasilinterview.php';
                    }    
    

                }
                else
                {
                    include 'home.php';
                }
            ?>        
            </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
