<?
session_start();

require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/cek/user.php");
require("inc/class/simple_html_dom.php");
	


$filenyax = "$sumber/status_i_status_loadmore.php";




//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//jika awal
if ((isset($_GET['aksi']) && $_GET['aksi'] == 'awalnya'))
	{

	$rowperpage = 3;
	
	
	// counting total number of posts
	$allcount_query = mysql_query("SELECT * FROM m_publik_user_status");
	$allcount_fetch = mysql_fetch_assoc($allcount_query);
	$allcount = mysql_num_rows($allcount_query);
	
	// select first 3 posts
	$query = mysql_query("select * from m_publik_user_status ".
								"order by postdate DESC limit 0,$rowperpage ");
	$row = mysql_fetch_assoc($query);
	
	
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
			
			
			//detail user
		$qyuk = mysql_query("SELECT * FROM m_publik_user ".
								"WHERE kd = '$ku_userkd'");
		$ryuk = mysql_fetch_assoc($qyuk);
		$yuk_nama = balikin($ryuk['nama']);
		$yuk_usernya = balikin($ryuk['usernamex']);


			//jika ada user
		if (!empty($yuk_nama))
			{
			$usernya_dt = "[<b>$yuk_nama</b> @$yuk_usernya]";
			}
		  
		
		?>
		
		
	
		<script language='javascript'>
		//membuat document jquery
		$(document).ready(function(){
	
	
	
	
	
		$("#idaftarkom<?php echo $ku_kd;?>").load("<?php echo $filenyax;?>?aksi=daftarkom&kdnya=<?php echo $ku_kd;?>");
		$("#iformkom<?php echo $ku_kd;?>").load("<?php echo $filenyax;?>?aksi=formkom&kdnya=<?php echo $ku_kd;?>");			



		    $(window).scroll(function(){
		        
		        var position = $(window).scrollTop();
		        var bottom = $(document).height() - $(window).height();
		
		        if( position == bottom ){
		
		            var row = Number($('#row').val());
		            var allcount = Number($('#all').val());
		            var rowperpage = 3;
		            row = row + rowperpage;
		
		            if(row <= allcount){
		                $('#row').val(row);
		                $.ajax({
		                    url: '<?php echo $filenyax;?>?aksi=loadmore',
		                    type: 'post',
		                    data: {row:row},
		                    success: function(response){
		                        $(".post:last").after(response).show().fadeIn("slow");
		                    }
		                });
		            }
		        
		        
		       	$('#loading').show();
				setTimeout('$("#loading").hide()',1000);
		        }
		
		    });


				
		});
		
		</script>
	
		
		<?php		
		//jika ada user
		if (!empty($yuk_nama))
			{
			$usernya_dt = "[<b>$yuk_nama</b> @$yuk_usernya]";
			}





		$ku_status = pecahkalimat($ku_status);
				
				
				
					
	    echo '<div class="post" id="post_'.$id.'">
	
		<form name="formx'.$ku_kd.'" id="formx'.$ku_kd.'">
		<div class="panel panel-default">
	    <div class="panel-heading panel-heading-custom">
		<table border="0" cellspading="3" cellspacing="3">
		<tr>
		<td>
		'.$usernya_dt.'	
		<h3>'.$ku_status.'</h3><font size="1"><i>'.$selisihnya.'</i></font> ';
		
			
	
		 
		echo '<div id="idaftarkom'.$ku_kd.'"></div>
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
	?>
	
	<input type="hidden" id="row" value="0">
	<input type="hidden" id="all" value="<?php echo $allcount; ?>">
	
	
	
	<?php
	}










exit();
?>