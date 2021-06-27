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

	$kode = $_POST["kode"];
 	$nama = $_POST["nama"];
	$satuan = $_POST["satuan"];
	$harga = $_POST["harga"];
	$merek = $_POST["merek"];
	$kategori = $_POST["kategori"];
	
    $target_dir = "images/produk/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
  
    if ($target_file == $target_dir) $target_file = "";	

	$query = "Select kodebarang From barang where kodebarang = '$kode'";
	$hasil = mysqli_query($id_mysql, $query);
		
	if ($data = mysqli_fetch_row($hasil))
	{
		//Data sebelumnya sudah ada
		?>
		<script type="text/javascript">
		alert("Kode barang telah terdaftar sebelumnya !");
		window.location='barang_input.php';
		</script>
		<?php		
	}
	else
	{
		//Belum ada data sebelumnya
		$query = "Insert Into barang values('$kode', '$nama', '$satuan', $harga, '" . basename($_FILES["gambar"]["name"]) . "', '$merek', '$kategori')";
		$hasil = mysqli_query($id_mysql, $query);
		?>
		<script type="text/javascript">
		alert("Data barang tersimpan !");
		window.location='barang.php';
		</script>
        <?php
	}
?>