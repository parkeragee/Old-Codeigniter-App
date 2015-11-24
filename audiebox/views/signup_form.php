<? if (validation_errors()) { ?>
<div class="container">
	<div class="alert alert-error"><? echo validation_errors(); ?></div>
</div>
<? } ?>
<div class="container">
<h1>Register an Account</h1>
<hr/>
<div class="row-fluid show-grid">
<div class="span4">
<form action="/beta/sign-up/" method="post" id="signupform" autocomplete="off">
	<h2 style="font-size:16px">Account Information</h2>
	<label>Email</label>
	<input type="text" id="username" name="username" value="<?php echo $formdata->username; ?>">
	<label for="password">Password</label>
	<input type="password" name="password" id="password" class="password_test">
	<label for="password_confirm">Confirm Password</label>
	<input type="password" name="password_confirm" id="password_confirm" onchange="passwordMatch()">
	<label>First Name</label>
	<input type="text" name="first_name" value="<?php echo $formdata->first_name; ?>">
	<label>Last Name</label>
	<input type="text" name="last_name" value="<?php echo $formdata->last_name; ?>">
</div><!-- end span4 -->
	<button class="btn">Register</button>
</div><!-- end span4 -->
</form>
</div><!-- end row-fluid show-grid -->
</div>