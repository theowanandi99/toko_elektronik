    <header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.html"><img src="images/logo.png" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                        <div class="menu-area">
                            <div class="limit-box">
                                <nav class="main-menu">
                                    <ul class="menu-area-main">
                                        <li <?php print ($menu_id == 0 ? "class='active'" : ""); ?>> <a href="index.php">Beranda</a> </li>
                                        <li <?php print ($menu_id == 1 ? "class='active'" : ""); ?>> <a href="barang.php">Daftar Barang</a> </li>
                                        <li <?php print ($menu_id == 2 ? "class='active'" : ""); ?>><a href="registrasi.php">Registrasi</a></li>
                                        <li <?php print ($menu_id == 3 ? "class='active'" : ""); ?>><a href="login.php">Login</a></li>
                                        <li class="last">
                                            <a href="cari.php"><img src="images/search_icon.png" alt="icon" /></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-6">
                        <div class="location_icon_bottum">
                            <ul>
                                <li><img src="icon/email.png" />User: Belum Login</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>