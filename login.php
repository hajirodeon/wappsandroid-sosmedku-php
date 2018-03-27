<?php
//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");


nocache;

//nilai
$filenya = "login.php";
$filenya_ke = $sumber;
$judul = "LOGIN USER";
$judulku = $judul;



?>


<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="content-type" content="text/x-component">
    <title>LOGIN USER</title>


    <!-- General meta details -->
    <meta name="keywords" content="<?php echo $keywords;?>" />
    <meta name="description" content="<?php echo $description;?>" />
    <meta name="author" content="<?php echo $author;?>" />
    <meta name="robot" content="index,follow" />


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





<script>
$(document).ready(function(){


$(document).ajaxStart(function() 
	{
	$('#loading').show();
	}).ajaxStop(function() 
	{
	$('#loading').hide();
	});






$("#ilogin").load("i_login.php?aksi=form");



})
</script>









</head>



<body>




<table width="100% border="0">
<tr bgcolor="grey">
<td height="100" align="center">

<h1 align="center">SOSMEDKU</h1>
</td>
</tr>
</table>




<table width="100% border="0">
<tr valign="top" bgcolor="yellow">
<td height="500">


<div id="loading" style="display:none">
<img src="template/img/progress-bar.gif" width="100" height="16">
</div>



<table width="100%" border="0" cellpadding="5" cellspacing="5">
<tr>
<td valign="top">


<div id="iloginresult"></div>
<div id="ilogin">
<img src="template/img/progress-bar.gif" width="100" height="16">
</div>

	
</td>
</tr>
</table>

<hr>

[<a href="reg.php">BIKIN AKUN</a>]

</td>
</tr>
</table>








<p align="center">
2018. Belajar WAPPSANDROID
</p>
<hr>







</body>
</html>




<?php
//diskonek
xclose($koneksi);
exit();
?>
