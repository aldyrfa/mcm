<?php 

session_start();
include 'koneksi.php';

$my_val = $_POST['my_val'];

switch ($my_val) {
	case 'soal':
		insert_jabawan($_POST);
	break;

	case 'register_user':
		register_user($_POST,$_FILES);
	break;

	case 'kode_soal':
		generate_kode_soal($_POST);
	break;

	case 'jadwal_interview':
		jadwal_interview($_POST);
	break;

	case 'ubah_status_interview':
		ubah_status_interview($_POST);
	break;		
	
	default:
		# do nothing
	break;
}


function insert_jabawan($data)
{
	
	$conn 	 = koneksi();
	$soal 	 = isset($_POST['soal']) ? $_POST['soal'] : null;
	$jawaban = isset($_POST['jawaban']) ? $_POST['jawaban'] : null;
	$jawab 	 = isset($_POST['jawab']) ? $_POST['jawab'] : null;
	$id_user = isset($_POST['id_user']) ? $_POST['id_user'] : null;
	
	$id_pelamar = isset($_POST['id_pelamar']) ? $_POST['id_pelamar'] : null;
	$id_lowongan = isset($_POST['id_lowongan']) ? $_POST['id_lowongan'] : null;

	#insert tbl soal
	foreach ($jawaban as $key => $value):

		$value = (isset($value)) ? $value : null;
		$jawab[$key] = (isset($jawab[$key])) ? $jawab[$key] : null;

		$skor = (substr($value,0,1) == strtolower(substr($jawab[$key],0,1))) ? "1" : "0";

		$sql = "INSERT INTO jawaban (id_soal, jawab, jawaban,skor,id_user)
			VALUES ( '$soal[$key]','$jawab[$key]','$value','$skor','$id_user')";
		mysqli_query($conn, $sql);

	endforeach;

	#insert table interview
	$sql_interview = "INSERT INTO interview (id_pelamar, id_lowongan, jadwal_interview,status)
					  VALUES ( '$id_pelamar','$id_lowongan','','')";
	mysqli_query($conn, $sql_interview);					  


	mysqli_close($conn);

	echo json_encode(array("status" => "1"));		

}


function register_user($data,$file)
{
	$conn = koneksi();

	#declaration
	$datenow 					= date("YmdHis");
	$id_pelamar 				= "";
	$id_user    				= $_SESSION['user']['id_user'];
	$id_lowongan 				= $data['id_lowongan'];
	$nama 						= $data['nama'];
	$tanggal_lahir				= $data['tanggal_lahir'];
	$no_telp 					= $data['no_telp'];
	$alamat 					= $data['alamat'];
	$jenis_kelamin 				= $data['jenis_kelamin'];
	$status  					= $data['status'];
	$no_ktp 					= $data['no_ktp'];
	$email 						= $data['email'];
	$pendidikan 				= $data['pendidikan'];
	$perguruan_tinggi 			= $data['perguruan_tinggi'];
	$nama_perguruan_tinggi 		= $data['nama_perguruan_tinggi'];
	$ipk 						= $data['ipk'];
	$id_skype 					= $data['id_skype'];
	$pengalaman_kerja 			= $data['pengalaman_kerja'];
	$deskripsi_singkat 			= $data['deskripsi_singkat'];
	$cv 						= $datenow.'_'.$file['cv']['name'];
	$ijazah 					= $datenow.'_'.$file['ijazah']['name'];
	$sertifikat_keahlian 		= $datenow.'_'.$file['sertifikat_keahlian']['name'];
	$fotocopy_ktp 				= $datenow.'_'.$file['fotocopy_ktp']['name'];
	$npwp 						= $datenow.'_'.$file['npwp']['name'];
	$status_pelamar 			= 0;
    $file_asal = array(
	    'cv' 				  	=> basename($_FILES['cv']['name']),
	    'ijazah' 			  	=>basename($_FILES['ijazah']['name']),
	    'sertifikat_keahlian' 	=>basename($_FILES['sertifikat_keahlian']['name']),
	    'fotocopy_ktp' 			=>basename($_FILES['fotocopy_ktp']['name']),
	    'npwp' 					=>basename($_FILES['npwp']['name']),
    );

    #create dir
    $user_id 	= $_SESSION['user']['id_user'];
    $target_dir = "uploads/".$user_id;
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
        foreach ($file_asal as $key => $value) {
            mkdir($target_dir.'/'.$key, 0777, true);
        }
    }

    #do upload
    foreach ($file_asal as $key => $value) {
        if(!move_uploaded_file($_FILES[$key]["tmp_name"],$target_dir.'/'.$key.'/'.$datenow.'_'.$value)){
            die("error during uploading");
        }
    }

    #do insert biodata_user
	$sql="INSERT INTO biodata_user VALUES('$id_pelamar','$id_user','$id_lowongan','$nama','$tanggal_lahir','$no_telp','$alamat','$jenis_kelamin',
										  'status','$no_ktp','$email','$pendidikan','$perguruan_tinggi','$nama_perguruan_tinggi','$ipk','$id_skype',
										  '$pengalaman_kerja','$deskripsi_singkat','$cv','$ijazah','$sertifikat_keahlian','$fotocopy_ktp','$npwp',
										  '$status_pelamar')";
	mysqli_query($conn, $sql);
	
	#count affected rows after insert
	$result = mysqli_affected_rows($conn);
	
	#close connecton
	mysqli_close($conn);

	#return status to view
	echo ($result > 0) ? json_encode(array("status" => "1")) : json_encode(array("status" => "0"));

}

function generate_kode_soal($data)
{
	$conn = koneksi();

	#kode lowongan
	$query =  $conn->query("SELECT kode_lowongan FROM lowongan WHERE id_lowongan = '$data[id_divisi]' ");
	$data = $query->fetch_assoc();
	$kode_lowongan = substr($data['kode_lowongan'],4,6);

	#kode soal
	$ambil_kode=$conn->query("SELECT MAX(SUBSTR(kode_soal,8,9)) AS maxKode FROM soal;");
	$data=$ambil_kode->fetch_assoc();
	$noUrut = $data['maxKode'];
	$noUrut+=1;
	
	#hasil
	$kode_soal = 'SL-'.$kode_lowongan.'-00'.$noUrut;

	echo $kode_soal;
}

function jadwal_interview($data)
{

	$conn = koneksi();

	#update table interview
	$sql_update = "UPDATE interview SET jadwal_interview = '$data[jadwal_interview]',
									status = '1'
									WHERE id_interview = '$data[id]'";
	mysqli_query($conn, $sql_update);

	$result = mysqli_affected_rows($conn);

	#kirim email ke user
	//proses


	#return status to view
	echo ($result > 0) ? json_encode(array("status" => "1")) : json_encode(array("status" => "0"));
}

function ubah_status_interview($data)
{

	$conn = koneksi();

	#update table interview
	$sql_update = "UPDATE interview SET status = '$data[status]'
									WHERE id_interview = '$data[id]'";
									
	mysqli_query($conn, $sql_update);

	echo json_encode(array("status" => "1"));
}

 ?>