<?php
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");



echo '<h1>
BUAT DATABASE
</h1>
<hr>';




//membuat database
$dbhost = $xhostname;
$dbuser = $xusername;
$dbpass = $xpassword;
$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $koneksi )
{
  die('Gagal Koneksi: ' . mysql_error());
}
echo 'Koneksi Berhasil';
$sql = 'CREATE Database '.$xdatabase.'';
$buatdb = mysql_query( $sql, $koneksi );
if(! $buatdb )
{
  die('Pembuatan database, gagal: ' . mysql_error());
}
echo "Database berhasil dibuat\n";
mysql_close($koneksi);



?>