<div class="page">
	<h1>Edit the profile of - <?php echo $data['login']; ?></h1>

	<form action="/edit/<?php echo $data['login']; ?>" method="post" id="form">
		<input type="hidden" name="login" value="<?php echo $data['login']; ?>">
		<input type="password" name="password" placeholder="Password" maxlength="32"><br>
		<input type="password" name="repassword" placeholder="Repeat password" maxlength="32"><br>
		<input type="text" name="name" placeholder="Name" maxlength="32" value="<?php echo $data['name']; ?>"><br>
		<input type="text" name="lastname" placeholder="Last name" maxlength="32" value="<?php echo $data['lastname']; ?>"><br>
		<select name="gender">
		    <option value="1">Male</option>
		    <option value="2">Female</option>
		</select><br>
			Birthday:<br>
			<input type="date" name="bday" value="<?php echo $data['bday']; ?>">
	       <br>
		<button class="button" type="submit">Update</button>
	</form>
