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
    <!-- brand -->
    <div class="brand">
        <div class="container">

        </div>
        
        
        
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                <?php
					include "web_element/class_paging.php";
					$p = new Paging;
					
					$batas = 6;
					$posisi = $p->cariPosisi($batas);				
					
					$query = "Select * from barang order by kodebarang LIMIT $posisi,$batas";
					$no=$posisi+1;
					$hasil = mysqli_query($id_mysql, $query);
					$jlh_record = mysqli_num_rows($hasil);
				
					while ($data = mysqli_fetch_row($hasil))
					{
						echo "
						<div class='col-xl-4 col-lg-4 col-md-4 col-sm-6 margin'>
							<div class='brand_box'>
								<a href='cart.php?id=$data[0]'>
								<img src='admin/images/produk/$data[4]' alt='img' />
								<h3>Rp. <strong class='red'>" . number_format($data[3], 0, ",", ".") . "</strong></h3>
								<span>$data[1]</span>
								<span>$data[5]</span>
								</a>
							</div>
						</div>";
					}
					
				?>

                    <div class="col-md-12">
                        <?php
							if (isset($_GET["halaman"]))							
								$halaman = $_GET["halaman"];
							else
								$halaman = 1;
							$file = "barang.php";
							$query = "Select * from barang order by kodebarang";
							$jmldata = mysqli_num_rows(mysqli_query($id_mysql,$query));
							$jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
							$linkHalaman = $p->navHalaman($file, $halaman, $jmlhalaman, "");
							echo $linkHalaman;

						?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->


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