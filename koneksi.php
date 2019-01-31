<?php 
//$koneksi = new mysqli("localhost","root","","mcm");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mcm";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$koneksi = $conn;
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

date_default_timezone_set("Asia/Jakarta");

function dateNow(){
	return date("Y-m-d H:i:s");
}
function debux($str, $ret=FALSE)
{
	echo "<pre>";
	print_r($str);
	echo "</pre>";
	($ret==TRUE) ? die() : "";
}
function koneksi()
{
	$conn = mysqli_connect("localhost", "root", "", "mcm");
	return $conn;
}

function kode_lowongan()
{	
	$conn = koneksi();
	$query = $conn->query("SELECT MAX(kode_lowongan) AS MAX FROM lowongan");
	$data=$query->fetch_assoc();

	$kode = substr($data['MAX'],4,6);
	$kode+=1;
	$kode = 'DIV-00'.$kode;
	return $kode;
}

?>