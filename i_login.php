<?
sleep(1);

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
				url: "<?php echo $sumber;?>/i_login.php?aksi=simpan",
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
	$euser = cegah($_GET['usernamex']);
	$epass = md5(cegah($_GET['passwordx']));

	
	//empty
	if ((empty($euser)) OR (empty($epass)))
		{
		echo '<h3>ERROR</h3>';	
		} 
	else
		{
		//cek
		$qku = mysql_query("SELECT * FROM m_publik_user ".
								"WHERE usernamex = '$euser' ".
								"AND passwordx = '$epass'");
		$rku = mysql_fetch_assoc($qku);
		$tku = mysql_num_rows($qku);
		
		//jika null
		if (empty($tku))
			{
			echo '<h1>
			ERROR... COBA LAGI...
			</h1>';
			}
		else
			{
			//lanjut
			$ku_kd = nosql($rku['kd']);
			$ku_nama = balikin($rku['nama']);
			
			//bikin sesi
			$_SESSION['kd6_session'] = $ku_kd;
			$_SESSION['username6_session'] = $euser;
			$_SESSION['pass6_session'] = $epass;
			$_SESSION['user_session'] = $ku_nama;
			$_SESSION['hajirobe_session'] = $hajirobe;
			
			?>
			
			
			
			<script language='javascript'>
			//membuat document jquery
			$(document).ready(function(){
					window.location.href = "status.html"; 
			
			});
			
			</script>
			
			<?php
			
	
			}
				
								
		}	

	
	exit();
	}



//jika form
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'form'))
	{
	echo '<form name="formx2" id="formx2">

	<p>
	<img src="'.$sumber.'/template/img/support.png" width="24" height="24" border="0">
	<h1>Login USER</h1>
	</p>
	
	
	<p>
	Username :
	<br>
	<input name="usernamex" id="usernamex" type="text" size="15">
	</p>
	
	
	
	<p>
	Password :
	<br>
	<input name="passwordx" id="passwordx" type="password" size="15">
	
	</p>
	
	
	<p>
	<input name="btnKRM" id="btnKRM" type="submit" value="SUBMIT >>">
	</p>

	</form>';
	
	exit();
	}
	
	
exit();
?>