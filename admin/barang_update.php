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
	
	$set_gbr = false;
	if (isset($_POST["gambar"]))
	{
		$target_dir = "images/produk/";
		$target_file = $target_dir . basename($_FILES["gambar"]["name"]);
		move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file);
	  
		if ($target_file == $target_dir) $target_file = "";
		$set_gbr = true;
	}

	$query = "Update barang SET
			  namabarang = '$nama',
			  merek = '$merek',
			  hargajual = $harga,
			  satuan = '$satuan',
			  kategori = '$kategori'" .
			  ($set_gbr ? ", gbr = '" . basename($_FILES["gambar"]["name"]) . "'" : "")
			  . " where kodebarang = '$kode'";
	$hasil = mysqli_query($id_mysql, $query);
		
		?>
		<script type="text/javascript">
		alert("Data barang ter-update !");
		window.location='barang.php';
		</script>
