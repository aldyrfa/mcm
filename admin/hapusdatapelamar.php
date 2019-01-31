<?php 

$ambil = $koneksi->query("SELECT * FROM biodata_user WHERE id_pelamar='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$cv = $pecah['cv'];
$ijazah = $pecah['ijazah'];
$sertifikat_keahlian = $pecah['sertifikat_keahlian'];
$fotocopy_ktp = $pecah['fotocopy_ktp'];
$npwp = $pecah['npwp'];

$lampiran  = array(	'cv' => $cv,
				   	'ijazah' => $ijazah,
					'sertifikat_keahlian' => $sertifikat_keahlian,
					'fotocopy_ktp' => $fotocopy_ktp,
					'npwp' => $npwp,
				);

$root = $_SERVER['DOCUMENT_ROOT'].'/mcm/';

foreach ($lampiran as $key => $value):
	$path = $root.'uploads/'.$pecah['id_user'].'/'.$key.'/'.$value;
	debux($path);
	if (file_exists($path)){
		unlink($path);
	}
endforeach;

$koneksi->query("DELETE FROM biodata_user WHERE id_pelamar='$_GET[id]'");

echo "<script> alert('Pelamar berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=datapelamar';</script>";


 ?>

