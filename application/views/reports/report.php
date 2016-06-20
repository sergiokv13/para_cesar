<div class="container text-center">
	<div class="row">
		<h2>User: <?=$user['name']?> <?=$user['lastname']?></h2>
		<h3>Day: <?=$day['date']?></h3>
		<?php if($day['finished']==1):?>
		<h3>Dia Finalizado</h3>
		<?php else:?>
		<h3>Dia Corriendo</h3>
		<?php endif?>
		<hr class="divider">
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<h3>Progress in day</h3>
			<div class="progress">
			  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percentage?>%">
			    <span class="sr-only"><?=$percentage?>% Complete</span>
			  </div>
			</div>
		</div>
	</div>
			<?php foreach ($tasks as $task): ?>
				<hr class="divider">
				<div class="row">
				<div class="col-lg-4">
					<h3><?= $task["name"] ?></h3>
					<?php if (isset($time_spent_in)):?>
					<span class="glyphicon glyphicon-time"></span><?=$time_spent_in[$task['id']]['hour']?>:<?=$time_spent_in[$task['id']]['minutes']?>:<?=$time_spent_in[$task['id']]['seconds']?><br><br>
					<?php endif?>
					<div class="progress">
					  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $task['percentage']?>"
					  aria-valuemin="0" aria-valuemax="100" style="width:<?= $task['percentage']?>%">
					    <span class="sr-only"><?= $task['percentage']?>% Complete</span>
					  </div>
					</div>
				</div>
				<div class="col-lg-4">
				<h3>Notes</h3>
					<?php foreach ($notes[$task['id']] as $note): ?>
						<?= $note["note"] ?><br>
				    <?php endforeach; ?>
				</div>
				<div class="col-lg-4">
					<h3>SubTasks</h3>
					<?php foreach ($sub_tasks[$task['id']] as $sub_task): ?>
						<?= $sub_task["name"] ?> <br>
					<?php endforeach; ?>
				</div>
			</div>
			<?php endforeach; ?>
		
	</div>
</div>