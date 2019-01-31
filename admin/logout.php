<?php
  session_start();
	unset($_SESSION['pelanggan']);
echo "<script>alert('Anda Sudah Logout');</script>";
echo "<script>location='login.php';</script>";
?>