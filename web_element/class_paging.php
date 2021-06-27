<?php
class Paging
{
// Fungsi untuk mencek halaman dan posisi data
function cariPosisi($batas)
{
if(empty($_GET["halaman"])){
	$posisi=0;
	$_GET["halaman"]=1;
}
else{
	$posisi = ($_GET["halaman"]-1) * $batas;
}
return $posisi;
}

// Fungsi untuk menghitung total halaman
function jumlahHalaman($jmldata, $batas)
{
$jmlhalaman = ceil($jmldata/$batas);
return $jmlhalaman;
}

// Fungsi untuk link halaman 1,2,3 ... Next, Prev, First, Last
function navHalaman($file, $halaman_aktif, $jmlhalaman, $link1)
{
$link_halaman = "";
// Link First dan Previous
if ($halaman_aktif > 1)
{
$link_halaman .= "<li><a href='$file?halaman=1" . ($link1 != "" ? "&$link1" : "")  . "'>&laquo;</a></li>"; //" <a href=$file?halaman=1><< First</a> | ";
}

if (($halaman_aktif-1) > 0)
{
$previous = $halaman_aktif-1;
$link_halaman .= "<li><a href='$file?halaman=$previous" . ($link1 != "" ? "&$link1" : "")  . "'>&laquo;</a></li>"; //"<a href=$file?halaman=$previous>< Previous</a> | ";
}

// Link halaman 1,2,3, ...
for ($i=1; $i<=$jmlhalaman; $i++)
{
if ($i == $halaman_aktif)
{
$link_halaman .= "<li><a href='$file?halaman=$i" . ($link1 != "" ? "&$link1" : "")  . "'><b>$i</b></a></li>"; //"<b>$i</b> | ";
}
else
{
$link_halaman .= "<li><a href='$file?halaman=$i" . ($link1 != "" ? "&$link1" : "")  . "'>$i</a></li>"; //"<a href=$file?halaman=$i>$i</a> | ";
}
$link_halaman .= " ";
}


// Link Next dan Last
if ($halaman_aktif < $jmlhalaman)
{
$next=$halaman_aktif+1;
$link_halaman .= "<li><a href='$file?halaman=$next" . ($link1 != "" ? "&$link1" : "")  . "'>&raquo;</a></li>"; //" <a href=$file?halaman=$next>Next ></a> ";
}

if (($halaman_aktif != $jmlhalaman) && ($jmlhalaman != 0))
{
$link_halaman .= "<li><a href='$file?halaman=$jmlhalaman" . ($link1 != "" ? "&$link1" : "")  . "'>&raquo;</a></li>"; //" | <a href=$file?halaman=$jmlhalaman>Last >></a> ";
}
return $link_halaman;
}
}

?>