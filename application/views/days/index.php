<div class="container">
<div class="row">
<div class="jumbotron">
	<?php if (isset($current_day)): ?>
   		<h1 class="text-center"><a href="/examen_final/days/show/<?= $current_day['id'] ?>"> <?php echo $current_day['date'];?> </a></h1>
   		<?php if ($current_day['deadline']): ?>
   		<div class="warning">
   			<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <strong>Deadline</strong>
   		</div>
   		<?php endif?>
   		<?php if ($rol==1): ?>
   			<?php if ($current_day['deadline']): ?>
   		  		<a class="btn btn-danger" href="/examen_final/days/end_day">End Day.</a>
   		  	<?php else:?>
   		  		<a class="btn btn-warning" href="/examen_final/days/deadline">Deadline.</a>
   		  	<?php endif?>
   		<?php endif?>
	<?php else: ?>
		Current work day not set.<br>
		<?php if ($rol==1): ?>
			<a class="btn btn-success" href="/examen_final/days/begin_day">Begin Day.</a>
		<?php endif?>
	<?php endif ?>
		<h2>Past Days</h2>
		<?php foreach ($finished_days as $day): ?>
		  <li class="list-group-item">
		  	<a href="/examen_final/days/show/<?= $day["id"] ?>"><?= $day["date"] ?></a><br>
		  </li> 
		  <?php endforeach; ?>
</div>
</div>
</div>
