<div class="container">
<div class="row text-center">
<div class="jumbotron">
	<h1 class="text-center"><?php echo $day['date'];?></h1>
	<?php if ($day['deadline']): ?>
		<div class="warning">
			<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <strong>Deadline</strong>
		</div>
	<?php endif?>
	<h1>Tasks of the day:</h1>
	<div class="progress">
	  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$total_percentage?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$total_percentage?>%">
	    <span class="sr-only"><?=$total_percentage?>% Complete</span>
	  </div>
	</div>
	<?php foreach ($tasks as $task): ?>
		<hr class="divider">
		<h2><?= $task["name"] ?></h2>
		<h3><?= $users[$task['id']] ?></h3>
		<?php if (isset($time_spent_in)):?>
				<span class="glyphicon glyphicon-time"></span><?=$time_spent_in[$task['id']]['hour']?>:<?=$time_spent_in[$task['id']]['minutes']?>:<?=$time_spent_in[$task['id']]['seconds']?><br>
		<?php endif?>
		<div class="progress">
		  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $task['percentage']?>"
		  aria-valuemin="0" aria-valuemax="100" style="width:<?= $task['percentage']?>%">
		    <span class="sr-only"><?= $task['percentage']?>% Complete</span>
		  </div>
		</div>
		<h3>SubTasks</h3>
		<?php foreach ($sub_tasks[$task['id']] as $sub_task): ?>
			<?= $sub_task["name"] ?> 
			<?php if ($sub_task["finished"]==0): ?>
				<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>
			<?php else: ?>
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php endif ?>
			<br>
	    <?php endforeach; ?>
	    <h3>Notes</h3>
		<?php foreach ($notes[$task['id']] as $note): ?>
			<?= $note["note"] ?> <br>
	    <?php endforeach; ?>
	<?php endforeach; ?>
</li>
</div>
</div>
</div>
