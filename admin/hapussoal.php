<?php 

$ambil = $koneksi->query("SELECT * FROM soal WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM soal WHERE id='$_GET[id]'");

echo "<script> alert('soal berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=soaltes';</script>";


 ?>

