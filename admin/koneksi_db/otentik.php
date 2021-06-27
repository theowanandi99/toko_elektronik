<?php
  include "umum.php";

  function otentikasi($pemakai, $password)
  {
    global $NAMA_SERVER, $NAMA_USER, $PASSWORD, $DATABASE, $id_mysql;

    $id_mysql = mysqli_connect($NAMA_SERVER, $NAMA_USER, $PASSWORD);
    if (! $id_mysql)
	{
       return FALSE;
	   }

    if (! mysqli_select_db($id_mysql, $DATABASE))
	{
       return FALSE;
	}

	$query = "SELECT katasandi FROM administrator WHERE username = '$pemakai'";
	$hasil = mysqli_query($id_mysql, $query);
	$baris = mysqli_num_rows($hasil);

    if ($baris == 0)
	{
       return FALSE;
	}

    $kode_rahasia = $password;
    $baris = mysqli_fetch_row($hasil);

	if ($baris[0] == $kode_rahasia)
	{
      return TRUE;
	}
    else
	{
      return FALSE;
	}
  }
?>