<div class="page">
	<h1>Users list <button id="buttonAdd" class="button">Create New User</button></h1>

	<form action="/users" method="post" id="form" style="display: none;">
		<input type="text" name="login" placeholder="Login" maxlength="32"><br>
		<input type="password" name="password" placeholder="Password" maxlength="32"><br>
		<input type="password" name="repassword" placeholder="Repeat password" maxlength="32"><br>
		<input type="text" name="name" placeholder="Name" maxlength="32"><br>
		<input type="text" name="lastname" placeholder="Last name" maxlength="32"><br>
		<select name="gender">
		    <option value="1">Male</option>
		    <option value="2">Female</option>
		</select><br>
			Birthday:<br>
			<input type="date" name="bday">
	       <br>
		<button class="button" type="submit">Add</button>
	</form>


	<div class="table">
		<div class="table__header">
			<div class="table__cell" style="width: 50px;"><a href="/users?s=id">id</a><i class="fas fa-caret-down"></i></div>
			<div class="table__cell"><a href="/users?s=login">login</a></div>
			<div class="table__cell"><a href="/users?s=password">password</a></div>
			<div class="table__cell"><a href="/users?s=name">name</a></div>
			<div class="table__cell"><a href="/users?s=lastname">last name</a></div>
			<div class="table__cell"><a href="/users?s=bday">birth day</a></div>
			<div class="table__cell" style="width: 50px;"></div>
			<div class="table__cell" style="width: 60px;"></div>
		</div><!-- /table__header -->


		<?php foreach ($data['rows'] as $mas => $line) { ?>

			<div id="row<?php echo $line['id']; ?>" class="table__row">
				<div class="table__cell"><?php echo $line['id']; ?></div>
				<div class="table__cell">
					<i class="far fa-address-card"></i>
					<a href="/profile/<?php echo $line['login']; ?>" class="login">
						<?php echo $line['login']; ?>
					</a>
				</div>
				<div class="table__cell"><?php echo $line['password']; ?></div>
				<div class="table__cell"><?php echo $line['name']; ?></div>
				<div class="table__cell"><?php echo $line['lastname']; ?></div>
				<div class="table__cell"><?php echo $line['bday']; ?></div>
				<div class="table__cell"><a href="/edit/<?php echo $line['login']; ?>" class="details"><i class="far fa-edit"></i> Edit</a></div>
				<div class="table__cell">
					<a onclick="showModal(`<?php echo $line['id']; ?>`,`<?php echo $line['name'].' '.$line['lastname']; ?>`);" class="details">
						<i class="far fa-trash-alt"></i> Delete
					</a>
				</div><!-- /table__cell -->
			</div><!-- /table__row -->

		<?php } ?>

	</div><!-- /table -->
<style>

</style>

<div class="pagination">
	<?php
		$pages = $data['pages'];
		if(isset($_GET['p'])) {
			$currentPage = $_GET['p'];
		} else {
			$currentPage = 1;
		}
		

		for ($i=1; $i <= $pages ; $i++) {

			if (isset($_GET['s'])) {
				$sort = '&s='.$_GET['s'];
			} else {
				$sort = '';
			}

			if ($i == $currentPage) {
				$active = ' class="active"';
			} else {
				$active = '';
			}
			echo '<a'.$active.' href="/users?p='.$i.$sort.'">'.$i.'</a>';
		}
?>

</div>

</div><!-- /page -->

<script type="text/javascript">
	$('#buttonAdd').click(
		function(){
			$('#form').toggle('fast');
		});
</script>