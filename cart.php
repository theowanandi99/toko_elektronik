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
	$query = "Select * from cart_detail where kodebarang = '$kode'";
	$hasil = mysqli_query($id_mysql, $query);
	$jlh = mysqli_num_rows($hasil);
	
	if ($jlh > 0)
	{
		?>
		<script type="text/javascript">
		alert("Barang telah ditambahkan ke cart sebelumnya !");
		window.location='barang_login.php';
		</script>
		<?php
	}
	else
	{
		$query = "Select * from barang where kodebarang = '$kode'";
		$hasil = mysqli_query($id_mysql, $query);
		if ($data = mysqli_fetch_row($hasil))
		{
			$query = "Insert Into cart_detail values('$sesi_user', '$data[0]', 1)";
			$hasil = mysqli_query($id_mysql, $query);
			?>
			<script type="text/javascript">
			window.location='pemesanan.php';
			</script>
	<?php
		}
	}
?>