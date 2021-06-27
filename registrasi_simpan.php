<?php
  session_start();
  $email = $_POST["email"];
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $kota = $_POST["kota"];
  $nohp = $_POST["nohp"]; 
  $katasandi = $_POST["katasandi"];

include "koneksi_db/umum.php";
$id_mysql = mysqli_connect($NAMA_SERVER, $NAMA_USER, $PASSWORD);
    if (! $id_mysql)
	{
       die ("tidak terkoneksi ke database");
	}
	
    if (! mysqli_select_db($id_mysql, $DATABASE))
	{
       die ("database tidak ditemukan");
	}

	$query = "Insert Into customer values('$email', '$nama', '$alamat', '$kota', '$nohp', '$katasandi')";
	$hasil = mysqli_query($id_mysql, $query);
		?>
		<script type="text/javascript">
		alert("Proses Registrasi berhasil !");
		window.location='login.php';
		</script>
