<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>..:: Computer Based Test ::.. </title>
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
		   
                    <form id="form" action="cek_login.php" method="post" class="login active">               
						<h3>Login</h3>
						<div>
							<label>Username:</label>
							<input type="text" id="username"  class="large" value="" name="username" required="required" placeholder="Username" />                      
						</div>
						<div>
							<label>Password: </label>
							<input type="password" id="password" class="large" value="" name="password" required="required" placeholder="Password" />							
						</div>
						<div class="bottom">
						
							<input type="submit" value="Login"></input>
							<a href="#" rel="register" class="linkform"></a>
							
						</div>
					</form>
                    
					</div>
				<div class="clear"></div>
			</div>
			</div>
		
    </body>
</html>