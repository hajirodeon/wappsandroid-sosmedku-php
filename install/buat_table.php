<?php
require("../inc/config.php");
require("../inc/fungsi.php");
require("../inc/koneksi.php");



echo '<h1>
Buat Table 
</h1>
<hr>';






//membuat table database
$dbhost = $xhostname;
$dbuser = $xusername;
$dbpass = $xpassword;

$koneksi = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $koneksi )
{
  die('Gagal Koneksi: ' . mysql_error());
}


echo 'Koneksi Berhasil';


mysql_select_db($xdatabase);










//buat table
$sql = 'CREATE TABLE m_publik_user ('.
  'kd varchar(50) NOT NULL, '.
  'usernamex varchar(100) DEFAULT NULL, '.
  'passwordx varchar(50) DEFAULT NULL, '.
  'nama varchar(100) DEFAULT NULL, '.
  'postdate datetime DEFAULT NULL '.
  ') ENGINE=MyISAM DEFAULT CHARSET=latin1;';


$buattabel = mysql_query( $sql, $koneksi );
if(! $buattabel )
	{
  	die('Gagal Membuat Tabel: ' . mysql_error());
	}


















//buat table
$sql = 'CREATE TABLE m_publik_user_status ('.
  'kd varchar(50) NOT NULL, '.
  'kd_user varchar(50) NOT NULL, '.
  'status varchar(255) DEFAULT NULL, '.
  'postdate datetime DEFAULT NULL '.
  ') ENGINE=MyISAM DEFAULT CHARSET=latin1;';


$buattabel = mysql_query( $sql, $koneksi );
if(! $buattabel )
	{
  	die('Gagal Membuat Tabel: ' . mysql_error());
	}













//buat table
$sql = 'CREATE TABLE m_publik_user_status_msg ('.
  'kd varchar(50) NOT NULL, '.
  'kd_user_status varchar(50) DEFAULT NULL, '.
  'dari varchar(50) DEFAULT NULL, '.
  'msg varchar(255) DEFAULT NULL, '.
  'postdate datetime DEFAULT NULL, '.
  'dibaca enum(\'true\',\'false\') NOT NULL DEFAULT \'false\' '.
  ') ENGINE=MyISAM DEFAULT CHARSET=latin1;';

$buattabel = mysql_query( $sql, $koneksi );
if(! $buattabel )
	{
  	die('Gagal Membuat Tabel: ' . mysql_error());
	}











echo "Tabel sukses dibuat\n";











mysql_close($koneksi);
?>