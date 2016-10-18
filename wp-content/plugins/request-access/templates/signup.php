<?php if ($errors): ?>
	<div class="alert alert-error">
		<?php foreach ($errors as $error): ?>
			<?php echo $error ?><br />
		<?php endforeach ?>
	</div>
<?php endif ?>

<form action="" method="post">

	<input type="hidden" name="request-access-form" value="1" />

	<input id="first_name" type="text" name="first_name" value="<?php echo @$_POST['first_name'] ?>" placeholder="<?php _e('First Name', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="last_name" type="text" name="last_name" value="<?php echo @$_POST['last_name'] ?>" placeholder="<?php _e('Last Name', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="company" type="text" name="company" value="<?php echo @$_POST['company'] ?>" placeholder="<?php _e('Company', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="title" type="text" name="title" value="<?php echo @$_POST['title'] ?>" placeholder="<?php _e('Title', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="poc" type="text" name="poc" value="<?php echo @$_POST['poc'] ?>" placeholder="<?php _e('Knewton Point of Contact', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="email" type="text" name="email" value="<?php echo @$_POST['email'] ?>" placeholder="<?php _e('Your Email Address', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="email" type="text" name="github" value="<?php echo @$_POST['github'] ?>" placeholder="<?php _e('Your Github Username', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="password1" type="password" name="password1" value="<?php echo @$_POST['password1'] ?>" placeholder="<?php _e('Password', RequestAccess::$text_domain) ?>" />
	<br />
	<input id="password2" type="password" name="password2" value="<?php echo @$_POST['password2'] ?>" placeholder="<?php _e('Confirm Password', RequestAccess::$text_domain) ?>" />
	<br />
	<br />
	<button type="submit" name="submit" class="btn btn-primary">Request Access</button>
</form>