<?php if(isset($data) && !empty($data)) echo '<div class="error">'.$data.'</div>'; ?>

<div class="page">
	<div class="login__box">
		<form action="/login" method="post">
			<input type="text" name="login" placeholder="Login" maxlength="32">
			<input type="password" name="password" placeholder="Password" maxlength="32">
			<button class="button_green" type="submit">LOGIN</button>
		</form>
	</div><!-- /login__box -->
</div><!-- /page -->