<div class="container">
<div class="row">
<div class="jumbotron">
	<h1 class="text-center">Users</h1>
	<ul class="list-group" style="margin:10px;">
	  <?php foreach ($users as $user): ?>
	  <li class="list-group-item">
	  	<a href="users/profile/<?php echo $user['id']?>"><?php echo $user['username']?> </a> -
	  	<?php echo $user['name']?>
	  	<?php echo $user['lastname']?>-
	  	<?php if($user['active']):?>
	  		<a href="/examen_final/users/disable_account/<?=$user['id']?>">disable</a>
	  	<?php else:?>
	  		<a href="/examen_final/users/activate_account/<?=$user['id']?>">enable</a>
	  	<?php endif?>
	  </li> 
	  <?php endforeach; ?>
	</ul>
</div>
</div>
</div>