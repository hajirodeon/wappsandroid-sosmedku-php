<?
session_start();

require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
	



?>



<script language='javascript'>
//membuat document jquery
$(document).ready(function(){

	$("#btnKRM").on('click', function(){
		$('#loading').show();

		$("#formx2").submit(function(){
			$.ajax({
				url: "<?php echo $sumber;?>/i_reg.php?aksi=simpan",
				type:$(this).attr("method"),
				data:$(this).serialize(),
				success:function(data){					
					$("#iloginresult").html(data);
					setTimeout('$("#loading").hide()',5000);
					}
				});
			return false;
		});
	
	
	});	






});

</script>




<?php



//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika simpan
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'simpan'))
	{
	sleep(1);


	//ambil nilai
	$e_nama = cegah($_GET['e_nama']);
	$e_user = seo_webnya($_GET['e_user']);
	$e_pass = md5(cegah($_GET['e_pass']));

	
	//empty
	if ((empty($e_nama)) OR (empty($e_user)) OR (empty($e_pass)))
		{
		echo '<h3>ERROR</h3>';	
		} 
	else
		{
		//cek
		$qcc = mysql_query("SELECT * FROM m_publik_user ".
								"WHERE usernamex = '$e_user'");
		$tcc = mysql_num_rows($qcc);
	
		//jika null
		if (empty($tcc))
			{
			echo '<h3>
			AKUN BARU BERHASIL DIBUAT. SILAHKAN LOGIN...!!
			</h3>';

			//entri publik
			mysql_query("INSERT INTO m_publik_user(kd, usernamex, passwordx, nama, postdate) VALUES ".
							"('$x', '$e_user', '$e_pass', '$e_nama', '$today')");
																	
			exit();
			}
		else
			{
			echo "USERNAME SUDAH DIGUNAKAN. SILAHKAN GANTI LAINNYA...!!";
			
			exit();
			}

		}	

	
	exit();
	}



//jika form
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'form'))
	{
	echo '<form name="formx2" id="formx2">

	<p>
	<h1>BIKIN AKUN BARU</h1>
	</p>
	
	
	<p>
	Nama :
	<br>
	<input name="e_nama" id="e_nama" type="text" size="15">
	</p>

	
	<p>
	Username :
	<br>
	<input name="e_user" id="e_user" type="text" size="15">
	</p>
	
	<p>
	Password :
	<br>
	<input name="e_pass" id="e_pass" type="password" size="15">
	</p>
	
	<p>
	<input name="btnKRM" id="btnKRM" type="submit" value="LANJUTKAN >>">
	</p>

	</form>';
	
	exit();
	}


exit();
?>