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
	
	$tombol = $_POST["tombol"];
	$kode = array();
	$qty = array();
	$kode = $_POST["kode"];
	$qty = $_POST["qty"];
	
	if ($tombol == "Update Cart")
	{
		$query = "Delete from cart_detail where email = '$sesi_user'";
		$hasil = mysqli_query($id_mysql, $query);
	
		for ($i = 0; $i < count($kode); $i++)
		{
			$query = "Insert Into cart_detail values('$sesi_user', '$kode[$i]', $qty[$i])";
			$hasil = mysqli_query($id_mysql, $query);			
		}		

		?>
		<script type="text/javascript">
		window.location='pemesanan.php';
		</script>
		<?php		
	}
	else
	{
		$query = "Delete from cart_detail where email = '$sesi_user'";
		$hasil = mysqli_query($id_mysql, $query);
		?>
		<script type="text/javascript">
		alert("Cart telah dikosongkan !");
		window.location='pemesanan.php';
		</script>
		<?php		
	}
?>