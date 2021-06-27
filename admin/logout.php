<?php
	session_start();
	if(! $_SESSION['sesi_user'])
	{
		echo "<script type=\"text/javascript\">
				window.location=\"login.php\";
			</script>";
		exit();
	}
	unset($_SESSION["sesi_user"]);
	unset($_SESSION["sesi_pass"]);
	session_destroy();

	echo "<script type='text/javascript'>window.location=\"index.php\";</script>";

?>