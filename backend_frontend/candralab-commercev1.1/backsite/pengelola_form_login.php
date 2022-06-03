<html>
	<head>
		<script language="JavaScript" src="script/validator.js"
		type="text/javascript" xml:space="preserve"></script>
	</head>
	<body>
		<h1> Form Login </h1>
		<form id="form1" name="form1" method="post" action="login_check_login.php">
			<td>
			<table  align="center" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
				<tr>
					<td >username*</td>
				
					<td >
					<input name="username" type="text" id="username"  />
					</td>
				</tr>
				<tr>
					<td>password*</td>
				
					<td>
					<input name="password" type="password" id="password"  />
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right">
					<input type="submit" name="Submit" value="Submit" />
					<input type="reset" name="" value="Reset" />
					</td>
				</tr>
				<tr>
					<td colspan='2'>
					<div id="form1_errorloc" style="color:red">
						<?php
						if (isset($_GET['status'])) {
							echo "The username or password you entered is 		incorrect";
						}
						?>
					</div></td>
				</tr>
			</table></td>
		</form>
		<script language="JavaScript" type="text/javascript"
		xml:space="preserve">
//<![CDATA[
//You should create the validator only after the definition of the HTML form
var frmvalidator  = new Validator("form1");
frmvalidator.EnableOnPageErrorDisplaySingleBox();
frmvalidator.EnableMsgsTogether();

frmvalidator.addValidation("username","req","Username masih kosong ");

frmvalidator.addValidation("password","req","Password masih kosong ");

//]]>
		</script>
