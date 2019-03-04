<div class="profile">
 <div class="profile__header">
 	<img class="profile__photo" src="/img/noimg.jpg" height="75"><br>
 	<div class="profile__name"><?php echo $data["name"].' '.$data["lastname"]; ?></div>
 	<div class="profile__login">@<?php echo $data["login"]; ?></div>
 </div>
 <div class="profile__info">
 	<span class="profile__label">Gender:</span> <?php echo $data["gender"].'<br>';?>
 	<span class="profile__label">Birth day:</span> <?php echo $data["bday"].'<br>';?>
 </div>
</div>