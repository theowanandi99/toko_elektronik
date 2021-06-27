<?php
    session_start();
	include "koneksi_db/otentik.php";

	$sesi_user = $_SESSION["sesi_useradmin"];
	$sesi_pass = $_SESSION["sesi_passadmin"];
		
	if (! otentikasi($sesi_user, $sesi_pass))
	{
		?>
		<script type="text/javascript">
		window.location='index.php';
		</script>
		<?php
	}

	$nonota = $_POST["nonota"];
 	$periode = $_POST["periode"];
	$judulpromosi = $_POST["judulpromosi"];
	$rincian = $_POST["rincian"];
	
    $target_dir = "images/promosi/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
  
    if ($target_file == $target_dir) $target_file = "";	

	$query = "Select nonota From promosi where nonota = '$nonota'";
	$hasil = mysqli_query($id_mysql, $query);
		
	if ($data = mysqli_fetch_row($hasil))
	{
		//Data sebelumnya sudah ada
		?>
		<script type="text/javascript">
		alert("Nomor Nota telah terdaftar sebelumnya !");
		window.location='promosi_input.php';
		</script>
		<?php		
	}
	else
	{
		//Belum ada data sebelumnya
		$query = "Insert Into promosi values('$nonota', '$periode', '$judulpromosi', '$rincian', '" . basename($_FILES["gambar"]["name"]) . "')";
		$hasil = mysqli_query($id_mysql, $query);
		?>
		<script type="text/javascript">
		alert("Data promosi tersimpan !");
		window.location='promosi.php';
		</script>
        <?php
	}
?>