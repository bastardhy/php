

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<!--
 ____________________________________________________________
|                                                            |
|      CODE + Pat Heard { http://fullahead.org }             |
|      DATE + 2007.11.08                                     |
| COPYRIGHT + Creative Commons Attribution 3.0 Unported      |
|             http://creativecommons.org/licenses/by/3.0/    |
|____________________________________________________________|

-->

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>


  <title>Login toko buku </title>


  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/html.css" />
  <link rel="stylesheet" type="text/css" media="screen, tv, projection" href="../css/layout.css" />
    <script type="text/javascript" src="../js/validjs.js"></script>
  </head>

<body>

<!-- Full site width container -->
<div class="width100">

  <!-- #header: holds main image, menu and top actions bar -->
  <div id="header" class="floatLeft width100">

    <div class="floatLeft width100 rightBorder">

      <div id="title">
        <h1>Administrasi</h1>
        <p>
         Halaman Administrasi 
        </p>
      </div>

     
    </div>


    

  </div>
  <!-- end #header -->



    <!-- end right column, 25% width -->
    <!-- Left column, 75% width -->
    <div>
<!--table pengolahan data nanti disini-->
<h1> Login page</h1>
<form id="form1" name="form1" method="post" action="pengelola_check_login.php">
<table  align="center">
<tr>
<td >username</td>

<td ><input name="username" type="text" id="username"  />
	 <div id="form1_username_errorloc" style="color:red">
		</div>
</td>
</tr>
<tr>
<td>password</td>

<td><input name="password" type="text" id="password"  />  <div id="form1_password_errorloc" style="color:red">
			
		</td>


<tr>

<td colspan="3" align="right">
<input type="submit" name="Submit" value="Submit" /> 
<input type="reset" name="" value="Reset" /></td>
</tr>
<tr>
         
          <td colspan='2'>
       <!--     <div id="form1_errorloc" style="color:green">
			<?php
			if (isset($_GET['status'])) {
				echo "The username or password you entered is incorrect";
			}
		?>
         </div>-->
			
          </td>
        </tr>
</table>
</form>
<script language="JavaScript" type="text/javascript"
			xml:space="preserve">//<![CDATA[
				//You should create the validator only after the definition of the HTML form
				var frmvalidator = new Validator("form1");
			frmvalidator.EnableOnPageErrorDisplaySingleBox();
				frmvalidator.EnableMsgsTogether();
				frmvalidator.addValidation("username", "req");
				
						frmvalidator.addValidation("password", "req");
			
			
		

				//]]></script>
    </div>
    <!-- end left column, 75% width -->

  
  <!-- end #content -->



  <!-- #footer: holds submenu and copyright info -->
  <div id="footer" class="floatRight  width100">

  
    <p>
   copyright(c) 2012, Toko murah|<a href="../index.php">home</a>
    </p>

  </div>
  <!-- end #footer -->


</div>
<!-- end full site width container -->


</body>
</html
