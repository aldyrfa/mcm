
<?php 

$error = $_FILES['cv']['error'];

if ($error == 0) {

	$ukuran_file = $_FILES['cv']['size'];

	if ($ukuran_file <= 3000000) {
		$nama_file = $_FILES['cv']['name'];
		$namafix = date("YmdHis").$nama_file;

		$format = pathinfo($nama_file, PATHINFO_EXTENSION);


		if (($format == "docx") or ($format == "pdf")) {

			$file_asal = $_FILES ['cv']['tmp_name'];
			$file_tujuan = "cv/".$namafix;
			$upload = move_uploaded_file($file_asal, $file_tujuan);

			//simpan ke db biodata_user
  			  $koneksi->query("INSERT INTO biodata_user(id_user,id_lowongan,nama,tanggal_lahir,no_telp,alamat,jenis_kelamin,status,no_ktp,email,pendidikan,perguruan_tinggi,nama_perguruan_tinggi,ipk,id_skype,pengalaman_kerja,deskripsi_singkat,cv,ijazah,sertifikat_keahlian,fotocopy_ktp,npwp,status_pelamar ) VALUES ('$id_user','$id_lowongan','$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin','$status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype','$pengalaman_kerja','$deskripsi_singkat','$namacvfix','$namaijazahfix','$namasertifikatkeahlianfix','$namafotocopyktpfix','$namanpwpfix',");

    echo "<script>alert('Terimakasih, Dokument Anda Sudah Diteruskan Ke Admin');</script>";
    echo "<script>location='index.php';</script>";

			if ($upload == true) {
				echo "Upload berhasil";
			}else{
				echo "Upload gagal";
			}
		}else {
			echo "Format harus Doc atau Pdf";
		}
	}else {
		echo "ukuran file kamu ".$ukuran_file.", file tidak boleh lebih dari 3MB";
	}

}else{ // else validasi error
        echo 'Ada '.$error.' error. Gagal upload.';
    }
     

?>
