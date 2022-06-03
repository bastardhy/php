<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cara Menampilkan Record dari My SQL Mini Test Kolaborasi PHP & MY SQL</title>
  <meta http-equiv="Copyright" content="Imago Media">
  <meta name="author" content="Agus Hariyanto">
  <meta http-equiv="imagetoolbar" content="no">
  <meta name="language" content="Indonesia">
  <meta name="revisit-after" content="7">
  <meta name="webcrawlers" content="all">
  <meta name="rating" content="general">
  <meta name="spiders" content="all">
  <link rel="shortcut icon" href="image/favicon.png" type="image/x-icon" />
  <link href="css/style.css" rel="stylesheet" type="text/css">

<style type="text/css">
* { padding:0px; margin:0px; }

textarea{border:solid 1px #333;width:520px;height:30px;font-family:arial;padding:5px}
.main{margin:0 auto;width:600px; text-align:left:}
.updates
{
padding:20px 10px 20px 10px ;
border-bottom:dashed 1px #999;
background-color:#f2f2f2;
}
.button
{
padding:10px;
float:right;
background-color:#006699;
color:#fff;
font-weight:bold;
text-decoration:none;

}
.updates a
{
color:#cc0000;
font-size:12px;

}
body{ font-family:Tahoma, Geneva, sans-serif;  font-size:14px; margin:0; padding:0; background-color:#CCCCCC}
#info{ position:fixed; width:100%; height:20px;-webkit-box-shadow: 0 1px 2px #666;box-shadow: 0 1px 2px #666; top:0; padding:10px; color:#FF0; background-color:#0033FF;  font-size:14px;}
#isi{background-color:#FFFFFF;text-align:left;margin:0 auto;padding:200px;width:920px;padding-left:80px;padding-right:80px;padding-top:90px}</style>
</head>
<body>
<div id="info"><img src="image/logo.png" width="70" height="20"> &nbsp; Tutorial Imago Media - Tutorial yang lain<strong> visit @ &nbsp;
<a href="http://blog.imagomedia.co.id" style="text-transform:lowercase; color:#FF0; text-decoration:none;" target="_blank">blog.imagomedia.co.id</a></strong></div>
<div id="isi">
<h1>Cara Input Data Soal Ke Database </h1>
	<?php
 echo "<br>
 		<br>
		<br><form method=\"POST\" enctype=\"multipart/form-data\" action=\"simpan.php\">
            <table>
            <tr><td>Soal / Pertanyaan </td><td> : <input type=\"text\" style=\"width: 400px;\" name=\"pertanyaan\"></td></tr>
			
			<tr><td>Jawaban A </td><td> : <input type=\"text\" style=\"width: 400px;\" name=\"jawaban_a\"></td></tr>
			<tr><td>Jawaban B </td><td> : <input type=\"text\" style=\"width: 400px;\" name=\"jawaban_b\"></td></tr>
			<tr><td>Jawaban C </td><td> : <input type=\"text\" style=\"width: 400px;\" name=\"jawaban_c\"></td></tr>
			<tr><td>Jawaban D </td><td> : <input type=\"text\" style=\"width: 400px;\" name=\"jawaban_d\"></td></tr>
			<tr><td>Jawaban Benar </td><td> : <input type=\"text\" name=\"jawaban_benar\"></td></tr>
			
            <tr><td colspan=\"2\"><input type=\"submit\" value=\"Simpan\">
                                
            </table>
            </form>";
?>

</div>
</div>
</body>
</html>

