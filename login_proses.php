<?php
  session_start();
  $email = $_POST["email"];
  $sandi = $_POST["katasandi"];

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
?>

<!--
<script type="text/javascript">
alert($simpan);
</script>
-->

<?php

		$query = "Select email, katasandi, namacust from customer where email = '$email' AND katasandi = '$sandi'";
		$fak = mysqli_query($id_mysql, $query);
		if (mysqli_num_rows($fak) == 0)
		{	
			?>
            <script type="text/javascript">
			alert("Proses Login Gagal !");
			window.location='login.php';
			</script>
            <?php
		}
		else
		{
			$_SESSION["sesi_user"] = $email;
			$_SESSION["sesi_pass"] = $sandi;
			
			$data = mysqli_fetch_row($fak);
			$_SESSION["sesi_nama"] = $data[2];
			
			?>
			<script type="text/javascript">
            alert("Proses Login berhasil !");
            window.location='home.php';
            </script>
            <?php
		}
?>