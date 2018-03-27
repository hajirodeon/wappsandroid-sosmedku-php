<?php
///cek session //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$hajirobe_session = nosql($_SESSION['hajirobe_session']);
$kd6_session = nosql($_SESSION['kd6_session']);
$user_session = balikin($_SESSION['user_session']);
$username6_session = balikin($_SESSION['username6_session']);

//query
$qbw = mysql_query("SELECT * FROM m_publik_user ".
					"WHERE kd = '$kd6_session'");
$rbw = mysql_fetch_assoc($qbw);
$tbw = mysql_num_rows($qbw);

//cek
if (empty($tbw))
	{
	//redirect
	$pesan = "ANDA BELUM LOGIN. SILAHKAN LOGIN DAHULU...!!!";
	pekem($pesan, $sumber);
	exit();
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
?>