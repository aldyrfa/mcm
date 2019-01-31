<?php
session_start();
include 'koneksi.php';

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Form Register</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body>
<div class="bs-example">
    <h1>Register</h1>
    <form class="form-horizontal" action="" method="post">
        <div class="form-group">
            <label class="control-label col-xs-3" >Nama:</label>
            <div class="col-xs-9">
                <input type="text" class="form-control" name="nama" placeholder="nama" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Username:</label>
            <div class="col-xs-9">
                <input type="username" class="form-control" name="username" placeholder="Masukan Username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Password:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" name="password" placeholder="Masukan Kata Sandi" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-xs-3">Confrim Password:</label>
            <div class="col-xs-9">
                <input type="password" class="form-control" name="confirm_password" placeholder="Konformasi Kata Sandi" required>
            </div>
            </div>
            <div class="form-group">
            <label class="control-label col-xs-3">Email:</label>
            <div class="col-xs-9">
                <input type="email" class="form-control" name="email" placeholder="Masukkan Email Anda" required>
            </div>
        </div>
              <div class="form-group">
            <label class="control-label col-xs-3">No Telephone:</label>
            <div class="col-xs-9">
                <input type="tex" maxlength="12" class="form-control" name="no_telp" placeholder="Masukan No Telephone" required>
            </div>
        </div>
              
            
        
        
        <br>
        <div class="form-group">
            <div class="col-xs-offset-3 col-xs-9">
                <input type="submit" class="btn btn-primary" name="daftar" value="Daftar">
                <input type="reset" class="btn btn-danger"  value="Reset">
            </div>
        </div>
    </form>
   <?php

if (isset($_POST['daftar'])){
    $nama =$_POST['nama'];
    $username=$_POST['username'];
    $password =$_POST['password']; 
    $confirm_password =$_POST['confirm_password'];
    $email =$_POST['email'];
    $no_telp =$_POST['no_telp'];

   
    
   if(empty($nama)){
    echo "Field tidak boleh kosong";
    }else {
    $koneksi->query ("INSERT INTO user VALUES ('','$nama','$username','$password','$confirm_password','$email','$no_telp')");

    if($koneksi){
        echo "<script>window.alert('DATA BERHASIL DISIMPAN, SILAHKAN LOGIN !')
        window.location='login.php'</script>";
    }else{
        echo "GAGAL";
    }
    
}
}
?>
</div>
</body>
</html> 