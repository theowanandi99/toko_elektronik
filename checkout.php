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


		//Generate auto number baru
		$query = "Select max(right(nofaktur,6)) from pemesanan";
		$hasil = mysqli_query($id_mysql, $query);
		if ($data = mysqli_fetch_row($hasil))
			$no = $data[0] + 1;
		else
			$no = 1;		
		
		$format = explode('-', date("Y-m-d"));
		$no = "FJ." . $format[0] . $format[1] . "-" . str_repeat("0",6 - strlen($no)) . $no;
		$tanggal = date("Y-m-d");

		$query = "Insert Into pemesanan values('$no', '$tanggal', '$sesi_user', 0)";
		$hasil = mysqli_query($id_mysql, $query);			


		$query = "Select cd.*, p.hargajual from cart_detail cd inner join barang p on cd.kodebarang = p.kodebarang where email = '$sesi_user'";
		$hasil = mysqli_query($id_mysql, $query);
		while ($data = mysqli_fetch_row($hasil))
		{
			$query_ = "Insert Into pemesanan_detail values('$no', '$data[1]', $data[2], $data[3])";
			$hasil_ = mysqli_query($id_mysql, $query_);			
		}		

		?>
		<script type="text/javascript">
		alert("Pemesanan telah dikirim !");
		window.location='home.php';
		</script>
		<?php		
		$query = "Delete from cart_detail where email = '$sesi_user'";
		$hasil = mysqli_query($id_mysql, $query);
?>
