<?php 

$ambil = $koneksi->query("SELECT * FROM lowongan WHERE id_lowongan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM lowongan WHERE id_lowongan='$_GET[id]'");

echo "<script> alert('Info Lowongan berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=lowongan';</script>";


 ?>

