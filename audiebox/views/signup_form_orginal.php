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
<div class="span4">
	<h2 style="font-size:16px">Church Information</h2>
	<label>Church Name</label>
	<input type="text" name="location_name" value="<?php echo $formdata->location_name; ?>">
	<label>Denomination</label>
	<input type="text" name="denomination" value="<?php echo $formdata->denomination; ?>">
	<label>Address</label>
	<input type="text" name="address" value="<?php echo $formdata->address; ?>">
	<label>City</label>
	<input type="text" name="city" value="<?php echo $formdata->city; ?>">
	<label>State</label>
	<? echo state_dropdown('state'); ?>
	<label>Zip</label>
	<input type="text" name="zip" maxlength="5" value="<?php echo $formdata->zip; ?>">
	<label>Church Phone Number</label>
	<input type="text" name="location_phone" value="<?php echo $formdata->location_phone; ?>">
</div><!-- end span4 -->
<div class="span4">
<!-- 
	<h2 style="font-size:16px">Preferred Area Code</h2>
	<input type="text" name="area_code" value="" class="input-mini" maxlength="3">
 -->
	<hr>
	<button class="btn">Register</button>
</div><!-- end span4 -->
</form>
</div><!-- end row-fluid show-grid -->
</div>