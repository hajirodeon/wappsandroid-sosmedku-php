<?php
sleep(1);

session_start();


require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/cek/user.php");


//nilai
$filenyax = "$sumber/status_i_status_loadmore.php";







//jika simpan
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'simpan'))
	{
	//ambil nilai
	$estatusku = cegah($_GET['e_statusku']);
	$estatusku1 = $_SESSION['estatusku'];
	$statuskd = $x;
	
	$statuskd2 = "$statuskd-$tahun$bulan$tanggal$jam$menit$detik";
			
	



	//gak empty
	if (!empty($estatusku))
		{
		//cek
		if ($estatusku1 != $estatusku)
			{
			//simpan ke publik
			mysql_query("INSERT INTO m_publik_user_status(kd, kd_user, status, postdate) VALUES ".
							"('$statuskd', '$kd6_session', '$estatusku', '$today')");
			}
			
		
		$_SESSION['estatusku'] = $estatusku;
		}	


	//tampilkan status....
	//$tablenya = "user_status$kd6_session";
	$tablenya = "m_publik_user_status";
	$qku = mysql_query("SELECT * FROM $tablenya ".
							"WHERE kd_user = '$kd6_session' ".
							"ORDER BY postdate DESC");
	$rku = mysql_fetch_assoc($qku);
	$tku = mysql_num_rows($qku);
	
	$ku_kd = nosql($rku['kd']);
	$ku_userkd = nosql($rku['kd_user']);
	$ku_postdate = $rku['postdate'];
	$ku_status = balikin($rku['status']);


	$ku_now = "$tahun-$bulan-$tanggal $jam:$menit:$detik";
	$selisihnya = selisihwaktu($ku_now,$ku2_postdate);	


	//detail user
	$qyuk = mysql_query("SELECT * FROM m_publik_user ".
							"WHERE kd = '$ku_userkd'");
	$ryuk = mysql_fetch_assoc($qyuk);
	$yuk_nama = balikin($ryuk['nama']);
	$yuk_usernya = balikin($ryuk['usernamex']);

	?>
	

	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){

		$("#ikutkomen<?php echo $ku_kd;?>").load("<?php echo $filenyax;?>?aksi=ikutkomen&kdnya=<?php echo $ku_kd;?>");			
				
	});
	
	</script>


	
	<?php
		//jika ada user
	if (!empty($yuk_nama))
		{
		$usernya_dt = "[<b>$yuk_nama</b> @$yuk_usernya]";
		}
	
	
	//wrap kan
	$ku_status = pecahkalimat($ku_status);
	
	
	echo '<div class="post" id="post_'.$ku_kd.'">
	
	<form name="formx'.$ku_kd.'" id="formx'.$ku_kd.'">
	<div class="panel panel-default">
    <div class="panel-heading panel-heading-custom">
	<table border="0" cellspading="3" cellspacing="3">
	<tr>
	<td>		
	'.$usernya_dt.'
	<h3>'.$ku_status.'</h3>
	<font size="1"><i>'.$selisihnya.'</i></font></a> 

	<div id="ikutkomen'.$ku_kd.'"></div>
	</td>
	</tr>
	</table>
	</div>';

		
	exit();
	}









//jika simpan komentar...
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'simpan2'))
	{
	//ambil nilai
	$ekdnya = cegah($_GET['kdnya']);
	$enil1 = "e_kom$ekdnya";
	$enilnya = cegah($_GET[$enil1]);

	$komentarku = $_SESSION['komentarku'];

	$komenkd = $x;
	
	$statuskd2 = "$ekdnya-komentar-$tahun$bulan$tanggal$jam$menit$detik-$kd6_session";



		
	//gak empty
	if (!empty($enilnya))
		{
		//cek
		if ($komentarku != $enilnya)
			{
			//simpan ke database
			mysql_query("INSERT INTO m_publik_user_status_msg(kd, kd_user_status, dari, msg, postdate) VALUES ".
							"('$komenkd', '$ekdnya', '$kd6_session', '$enilnya', '$today')");


	
			//bikin session
			$_SESSION['komentarku'] = $enilnya;
			
	
			//echo "$enilnya [$komentarku].";
			
			
			echo '<table border="0" cellspading="3" cellspacing="3">
			<tr>
			<td width="50"></td>
			<td>';
			
			//daftar komentar...
			$tablenya = "m_publik_user_status_msg";
			$qku2 = mysql_query("SELECT * FROM $tablenya ".
									"WHERE kd_user_status = '$ekdnya' ".
									"ORDER BY postdate DESC");
			$rku2 = mysql_fetch_assoc($qku2);
			$tku2 = mysql_num_rows($qku2);			
			$ku2_kd = nosql($rku2['kd']);
			$ku2_dari = nosql($rku2['dari']);
			$ku2_komentar = balikin($rku2['msg']);
			$ku2_postdate = $rku2['postdate'];
					
			$ku_now = "$tahun-$bulan-$tanggal $jam:$menit:$detik";
					
			$selisihnya = selisihwaktu($ku_now,$ku2_postdate);
					
			//detail user
			$qyuk = mysql_query("SELECT * FROM m_publik_user ".
									"WHERE kd = '$ku2_dari'");
			$ryuk = mysql_fetch_assoc($qyuk);
			$yuk_nama = balikin($ryuk['nama']);
			$yuk_usernya = balikin($ryuk['usernamex']);
	
			$ku2_komentar = pecahkalimat($ku2_komentar);
	
	
			
			echo '<div class="panel panel-default">
		    <div class="panel-body panel-body-custom">
			<p>
			[<b>'.$yuk_nama.'</b> @'.$yuk_usernya.']. 
			<br>
			'.$ku2_komentar.'
			<br>
			<font size="1"><i>'.$selisihnya.'</i></font>
			</p>
			
			</div>
			</div>

			
			</div>';

			
			
			}	
		}	

	
	exit();
	}







//jika form
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'form'))
	{
	?>
	

	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){
	
	
		$("#btnKRM").on('click', function(){
			$('#loadingku').show();
	
			$("#formx2").submit(function(){
				$.ajax({
					url: "<?php echo $filenyax;?>?aksi=simpan",
					type:$(this).attr("method"),
					data:$(this).serialize(),
					success:function(data){			
					    
					    $("#idaftar").prepend(data);
						$("#itulis").load("<?php echo $filenyax;?>?aksi=form");

				
						setTimeout('$("#loadingku").hide()',1000);
						}
					});
				return false;
			});
		
		
		});	
	
	
	
	
	
	
	});
	
	</script>
	
	



    <!-- Bootstrap core JavaScript -->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="template/vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="template/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="template/js/creative.min.js"></script>



    <!-- Bootstrap core CSS -->
    <link href="template/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="template/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Plugin CSS -->
    <link href="template/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="template/css/creative.min.css" rel="stylesheet">



    
    
	<?php
	echo '<form name="formx2" id="formx2" enctype="multipart/form-data">

	<div class="panel panel-default">
    <div class="panel-heading panel-heading-custom">

    
    <div class="panel panel-default">
    <div class="panel-body panel-body-custom">

	<p>
	<textarea name="e_statusku" id="e_statusku" rows="5" cols="60" placeholder="Status Kamu ya..."></textarea>
	</p>
	
	
	<div id="loadingku" style="display:none">
	sebentar...
	</div>
		
	</div>
	
	</div>
	
	<p>
	<input name="btnKRM" id="btnKRM" type="submit" class="btn btn-info" value="STATUS AH...!">
	</p>

	</div>

	
	</div>
	</form>';

	exit();
	}





//jika ikut komentar
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'ikutkomen'))
	{
	$ekdnya = cegah($_REQUEST['kdnya']);

	?>

	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){


		$("#idaftarkom<?php echo $ekdnya;?>").load("<?php echo $filenyax;?>?aksi=daftarkom&kdnya=<?php echo $ekdnya;?>");			
		$("#iformkom<?php echo $ekdnya;?>").load("<?php echo $filenyax;?>?aksi=formkom&kdnya=<?php echo $ekdnya;?>");
	
				
	});
	
	</script>


	<?php

	echo '<div id="idaftarkom'.$ekdnya.'"></div>
	<div id="iformkom'.$ekdnya.'"></div>';
	
	exit();
	}






//load more
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'loadmore'))
	{
	//ambil nilai...
	$row = $_POST['row'];
	$rowperpage = 3;
	
	$html = '';
	
	
	// selecting posts
	//$tablenya = "user_status$kd6_session";
	$tablenya = "m_publik_user_status";
	$query = mysql_query("SELECT * FROM $tablenya ".
							"WHERE status <> '' ".
							"ORDER BY postdate DESC limit $row,$rowperpage");
	$row = mysql_fetch_assoc($query);
	
	$html = '';
	
	
	//isi *START
	ob_start();
	
	
	do
		{
	    $id = $row['kd'];
	    $title = $row['status'];
	    $content = $row['postdate'];
	
		$ku_kd = nosql($row['kd']);
		$ku_userkd = nosql($row['kd_user']);
		$ku_postdate = $row['postdate'];
		$ku_status = balikin($row['status']);
	
		$ku_now = "$tahun-$bulan-$tanggal $jam:$menit:$detik";

		$selisihnya = selisihwaktu($ku_now,$ku_postdate);
			
			
		echo '<div id="post_'.$id.'" class="post">';
	


			//detail user
		$qyuk = mysql_query("SELECT * FROM m_publik_user ".
								"WHERE kd = '$ku_userkd'");
		$ryuk = mysql_fetch_assoc($qyuk);
		$yuk_nama = balikin($ryuk['nama']);
		$yuk_usernya = balikin($ryuk['usernamex']);
		
	 	?>
		<script language='javascript'>
		//membuat document jquery
		$(document).ready(function(){
	
	
		$("#iformkom<?php echo $id;?>").load("<?php echo $filenyax;?>?aksi=formkom&kdnya=<?php echo $id;?>");
		$("#idaftarkom<?php echo $id;?>").load("<?php echo $filenyax;?>?aksi=daftarkom&kdnya=<?php echo $id;?>");			
				
		});
		
		</script>
	
	 	 
		<?php
		//jika ada user
		if (!empty($yuk_nama))
			{
			$usernya_dt = "[<b>$yuk_nama</b> @$yuk_usernya]";
			}



		$ku_status = pecahkalimat($ku_status);
		
		  
	    // Creating HTML structure
	    echo '<form name="formx'.$ku_kd.'" id="formx'.$ku_kd.'">
		<div class="panel panel-default">
	    <div class="panel-heading panel-heading-custom">
		<table border="0" cellspading="3" cellspacing="3">
		<tr>
		<td>
		'.$usernya_dt.'
		<h3>'.$ku_status.'</h3>
		<font size="1"><i>'.$selisihnya.'</i></font>

		<br>
	
	
		<div id="idaftarkom'.$ku_kd.'"></div>
		<div id="iformkom'.$ku_kd.'"></div>
		
		</td>
		</tr>
		</table>
		
		</div>
		</div>
		</form>
		
		</div>'; 
		}
	while ($row = mysql_fetch_assoc($query));

	
	$html = ob_get_contents();
	ob_end_clean();
	
	echo $html;
	}














//jika daftar komentar...
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'daftarkom'))
	{
	//$ekdnya = cegah($_GET['kdnya']);
	$ekdnya = cegah($_REQUEST['kdnya']);


	//echo "komentar ya : $ekdnya";


	echo '<table border="0" cellspading="3" cellspacing="3">
	<tr>
	<td width="50"></td>
	<td>';
	
	//daftar komentar...
	$tablenya = "m_publik_user_status_msg";
	$qku2 = mysql_query("SELECT * FROM $tablenya ".
							"WHERE kd_user_status = '$ekdnya' ".
							"ORDER BY postdate ASC");
	$rku2 = mysql_fetch_assoc($qku2);
	$tku2 = mysql_num_rows($qku2);
	
	//jika gak null
	if (!empty($tku2))
		{
		
		do
			{
			if ($warna_set ==0)
				{
				$warna = $warna01;
				$warna_set = 1;
				}
			else
				{
				$warna = $warna02;
				$warna_set = 0;
				}
			
					
				
			$ku2_kd = nosql($rku2['kd']);
			$ku2_dari = nosql($rku2['dari']);
			$ku2_komentar = balikin($rku2['msg']);
			$ku2_postdate = $rku2['postdate'];
			
			$ku_now = "$tahun-$bulan-$tanggal $jam:$menit:$detik";
			$selisihnya = selisihwaktu($ku_now,$ku2_postdate);
				

			//detail user
			$qyuk = mysql_query("SELECT * FROM m_publik_user ".
									"WHERE kd = '$ku2_dari'");
			$ryuk = mysql_fetch_assoc($qyuk);
			$yuk_nama = balikin($ryuk['nama']);
			$yuk_usernya = balikin($ryuk['usernamex']);






			$ku2_komentar = pecahkalimat($ku2_komentar);
				
							
			echo '<style>
			.panel-body-custom {
			background:'.$warna.';}
			</style>
			
			
			<div class="panel panel-default">
		    <div class="panel-body panel-body-custom">
			<p>
			[<b>'.$yuk_nama.'</b> @'.$yuk_usernya.']. 
			<br>
			'.$ku2_komentar.'
			<br>
			
			<font size="1"><i>'.$selisihnya.'</i></font>
			</p>
			
			</div>
			</div>';
			}
		while ($rku2 = mysql_fetch_assoc($qku2));
		}						

	echo '</div>
		<br>
	
	
	</td>
	
	</tr>
	</table>	
	
	<div id="loading'.$ekdnya.'" style="display:none">
	sebentar...
	</div>';
	

				
	exit();
	}












//jika form komentar...
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'formkom'))
	{
	$ekdnya = cegah($_REQUEST['kdnya']);


	//echo "komentar ya : $ekdnya";
	
	
	?>



	<script language='javascript'>
	//membuat document jquery
	$(document).ready(function(){


		$("#btnKOM<?php echo $ekdnya;?>").on('click', function(){
			$('#loading<?php echo $ekdnya;?>').show();
	


		$("#formx<?php echo $ekdnya;?>").submit(function(){
			$.ajax({
				url: "<?php echo $filenyax;?>?aksi=simpan2&kdnya=<?php echo $ekdnya;?>",
				type:$(this).attr("method"),
				data:$(this).serialize(),
				success:function(data){
					
					$("#idaftarkom<?php echo $ekdnya;?>").append(data);
					$("#iformkom<?php echo $ekdnya;?>").load("<?php echo $filenyax;?>?aksi=formkom&kdnya=<?php echo $ekdnya;?>");
					
					setTimeout('$("#loading<?php echo $ekdnya;?>").hide()',1000);
					}
				});
			return false;
		});
	
	
	});	


		
				
	});
	
	</script>

			




	<?php	
	echo '<table border="0" cellspading="3" cellspacing="3">
	<tr>
	<td width="50"></td>
	<td>

	<div id="loading'.$ekdnya.'" style="display:none">
	sebentar..
	</div>';


	echo '<p>
	<input name="e_kom'.$ekdnya.'" id="e_kom'.$ekdnya.'" type="text" size="30" value="" />
	<br>

	<input name="btnKOM'.$ekdnya.'" id="btnKOM'.$ekdnya.'" type="submit" class="btn btn-danger" value="BALAS >>">
	</p>
		 
	<br>
	
	
	</td>
	
	</tr>
	</table>';
	

				
	exit();
	}


?>
