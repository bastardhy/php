<h2>Form Login</h2>
<form method="post" action="">
	<div>
		<label>Email</label><input type="text" name="email" value="<?=@$_POST['email']?>"/>
	</div>
	<div>
		<label>Password</label><input type="password" name"password"/>
	</div>
	<input type="submit" value="Log In"/>
</form>