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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Jaya Elektronik</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="images/fevicon.png" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- owl stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
</head>
<!-- body -->

<body class="main-layout">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- end loader -->
    <!-- header -->
	<?php
		$menu_id = 1;
		include_once("web_element/header_login.php");
    ?>
    <!-- end header -->
    <div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Keranjang Belanja</h2>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- contact -->
    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <table class="table table-striped table-hover">
                      <thead>
                        <th>No Faktur</th>
                        <th>Tanggal</th>
                        <th>Total Pemesanan</th>
                        <th>Struk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </thead>


                    <form class="main_form" method="post" action="pemesanan_simpan.php">
                        <div class="row">
                        <?php
						$query = "Select c.*, b.hargajual, b.namabarang, b.merek from cart_detail c inner join barang b on c.kodebarang = b.kodebarang where email = '$sesi_user'";
						$hasil = mysqli_query($id_mysql, $query);
						
						$subtotal = 0;
						$total = 0;
                        while ($data = mysqli_fetch_row($hasil))
                        {
							$subtotal = $data[2] * $data[3];
							$total += $subtotal;
                            echo "              
                            <tr>
                                <td>$data[4] ($data[5])</td>						
                                <td><input type='number' size='4' value='$data[2]' min='0' step='1' name='qty[]'>
									<input type='hidden' value='$data[1]' name='kode[]'>
								</td>						
                                <td>Rp. " . number_format($data[3], 0, ",", ".") . "</td>						
                                <td>Rp. " . number_format($subtotal, 0, ",", ".") . "</td>						
                                <td><a href='pemesanan_hapus.php?id=$data[0]' type='submit' class='btn btn-primary'>Hapus</a></td>
                            </tr>";
                        }	

                            echo "              
                            <tr>
                                <td></td>						
                                <td></td>						
                                <td>Total</td>						
                                <td>Rp. " . number_format($total, 0, ",", ".") . "</td>						
                                <td></td>
                            </tr>";

                            echo "              
                            <tr>
                                <td></td>						
                                <td></td>						
                                <td>Ongkos Kirim</td>						
                                <td>Gratis</td>						
                                <td></td>
                            </tr>";

                            echo "              
                            <tr>
                                <td></td>						
                                <td></td>						
                                <td>Grand Total</td>						
                                <td>Rp. " . number_format($total, 0, ",", ".") . "</td>						
                                <td></td>
                            </tr>";

						?>


                    </table>          
                            
                            
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                <input value="Update Cart" type="submit" name="tombol" class="btn btn-primary my-2">
                                <input value="Batal" type="submit" name="tombol" class="btn btn-warning my-2">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact -->


    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>