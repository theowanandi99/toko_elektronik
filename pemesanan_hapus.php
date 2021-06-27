<?php
    session_start();
	include "koneksi_db/otentik.php";

	$sesi_user = $_SESSION["sesi_user"];
	$sesi_pass = $_SESSION["sesi_pass"];
	$sesi_nama = $_SESSION["sesi_nama"];
		
	if (! otentikasi($sesi_user, $sesi_pass))
	{
		?>
		<script type="text/javascript">
		window.location='index.php';
		</script>
		<?php
	}
	
	$kode = $_GET["id"];
	
	$query = "Delete from cart_detail where email = '$sesi_user' and kodebarang = '$kode'";
	$hasil = mysqli_query($id_mysql, $query);

		?>
		<script type="text/javascript">
		window.location='pemesanan.php';
		</script>
