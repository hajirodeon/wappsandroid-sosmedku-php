<?php
session_start();


//ambil nilai
require("inc/config.php");
require("inc/fungsi.php");
require("inc/koneksi.php");
require("inc/cek/user.php");



nocache;

//nilai
$filenya = "status.php";
$filenyax = "status_i_status_loadmore.php";
$filenya_ke = $sumber;
$judul = "DIRIKU : $user_session";
$judulku = $judul;






//PROSES ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	
	
	




/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////















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



<style>

.post{
    width: 97%;
    min-height: 200px;
    padding: 5px;
    border: 1px solid gray;
    margin-bottom: 15px;
}

.post h1{
    letter-spacing: 1px;
    font-weight: normal;
    font-family: sans-serif;
}


.post p{
    letter-spacing: 1px;
    text-overflow: ellipsis;
    line-height: 25px;
}



.more{
    color: blue;
    text-decoration: none;
    letter-spacing: 1px;
    font-size: 16px;
}


</style>

<script src='inc/js/jquery-3.0.0.js' type='text/javascript'></script>




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


$("#iform").load("status_i_status_loadmore.php?aksi=form");
$("#iawal").load("status_i_index.php?aksi=awalnya");

});
</script>

</head>


<body>




<table width="100% border="0">
<tr bgcolor="grey">
<td height="100" align="center">

<h1 align="center">SOSMEDKU</h1>
[<a href="logout.php">LOGOUT</a>]
</td>
</tr>
</table>




<table width="100% border="0">
<tr valign="top" bgcolor="white">
<td height="500">


<div id="loading" style="display:none">
sebentar...
</div>



<table width="100%" border="0" cellpadding="5" cellspacing="5">
<tr>
<td valign="top">

<div id="iform"></div>
<div id="idaftar"></div>
<div id="iawal"></div>






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
