<?php
require ("koneksi.php");
$query = "SELECT * FROM toko";
$eksekusi = mysqli_query($konek, $query);
$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
	$response["kode"] = 1;
	$response["pesan"] = "Data tersedia";
	$response["data"] = array();


	while ($ambil = mysqli_fetch_object($eksekusi)) {
		$f["id"] = $ambil->id;
		$f["nama"] = $ambil->nama;
		$f["alamat"] = $ambil->alamat;
		$f["telepon"] = $ambil->telepon;

		array_push($response["data"], $f);
		
	}

}else{
	$response["kode"] = 0;
	$response["pesan"] = "Data Tidak tersedia";
}

echo json_encode($response);
mysqli_close($konek);

?>