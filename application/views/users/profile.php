<div class="container">
<div class="jumbotron">
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-3">
		<img src="https://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar256x256-709d163bfa4a4ebdb25160d094551c33.jpg" class="img-responsive">
	</div>
	<div class="col-lg-3">
		<h1 class="text-left"><?php echo $user['username'];?> </h1>
		<strong>Nombre Completo: </strong><?php echo $user['name'];?> <?php echo $user['lastname'];?><br>
		<?php if ($user['rol']==1): ?>
			<strong>Rol: </strong>Administrador
		<?php else: ?>
			<strong>Rol: </strong>Consultor
		<?php endif ?>
	</div>
</div>
</div>
</div>
