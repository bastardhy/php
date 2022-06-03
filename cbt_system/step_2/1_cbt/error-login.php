<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Animated Form Switching with jQuery</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Expand, contract, animate forms with jQuery wihtout leaving the page" />
        <meta name="keywords" content="expand, form, css3, jquery, animate, width, height, adapt, unobtrusive javascript"/>
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon"/>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<script src="js/cufon-yui.js" type="text/javascript"></script>
		<script src="js/ChunkFive_400.font.js" type="text/javascript"></script>
		<script type="text/javascript">
			Cufon.replace('h1',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h2',{ textShadow: '1px 1px #fff'});
			Cufon.replace('h3',{ textShadow: '1px 1px #000'});
			Cufon.replace('.back');
		</script>
    </head>
    <body>
		<div class="wrapper">
			
			<div class="content">
				<div id="form_wrapper" class="form_wrapper">
		   
<?php
// Warning Error To Login Admin Page
$error_login = "Maaf, Username & Password Salah! Atau ID Anda Sedang Di Blokir Oleh Admin.";

// View Error Message To Browser
echo "<img src=\"images/kali.png\" width=\"30\" height=\"31\" align=\"absmiddle\" class=\"img_lock\"/> 
$error_login
<br /><center><a href=\"index.php\" class=\"clickhere\">ULANGI LAGI</a></center>";
?>
					</form>
                    
					</div>
				<div class="clear"></div>
			</div>
			</div>
		
    </body>
</html>