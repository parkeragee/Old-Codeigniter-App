<? if ($message !== '') { ?>
<div class="container">
	<div class="alert alert-error"><? echo $message; ?></div>
</div>
<? } ?>
<div class="container login">
<hr>
<h1>Sign In</h1>
<hr>
<form action="/beta/dashboard/login/" method="post" id="loginform" autocomplete="on">
	<label>Email</label>
	<input type="text" id="username" name="username" value="">
	<label for="password">Password</label>
	<input type="password" name="password" id="password">
	<hr>
	<button class="btn btn-success">Login</button>
</form>
</div>