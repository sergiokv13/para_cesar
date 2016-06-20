<div class="container text-center">
<div class="row">
<div class="jumbotron">

<h1 class="text-center"><?php echo $day['date'];?></h1>
<h2>My Tasks</h2>
<?php if ($day['deadline']): ?>
	<div class="warning">
		<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span> <strong>Deadline</strong> Revisar su reporte antes de que finalice el dia.
	</div>
<?php endif?>
<br>
<a target="_blank" class="btn btn-primary" href="/examen_final/reports/report/<?=$day['id']?>/<?=$user_id?>">View Report</a>
<br><br>
<div class="progress">
  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?=$percentage?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percentage?>%">
    <span class="sr-only"><?=$percentage?>% Complete</span>
  </div>
</div>

 	<?php if (!$day['finished']==1): ?>
		<form style="margin:10px;" method="POST" action="/examen_final/tasks/create/<?=$day['id']?>">
		  <input type="text" name="newNameTextBox" maxlength="50" />
		  <input class="btn btn-success" type="submit" name="createNewTaskButton" value="Crear Tarea" />
		</form>
	<?php endif ?>

	<?php foreach ($tasks as $task): ?>
	<div class="row">
	<hr class="divider">
		<div class="col-lg-6">
			<h3><?= $task["name"] ?></h3>
			<?php if (isset($time_spent_in)):?>
				<span class="glyphicon glyphicon-time"></span>
				<span id="<?=$task['id']?>hour"> <?=$time_spent_in[$task['id']]['hour']?></span>
				:
				<span id="<?=$task['id']?>minute"><?=$time_spent_in[$task['id']]['minutes']?></span>
				:
				<span id="<?=$task['id']?>second"><?=$time_spent_in[$task['id']]['seconds']?></span><br>
			<?php endif?>
			<?php if($task["start"]):?>
			<div id="for_js" hidden="true"><?=$task['id']?></div>
				<a href="/examen_final/tasks/stop/<?=$task['id']?>"><span class="glyphicon glyphicon-pause" aria-hidden="true"></span></a>
			<?php else:?>
				<a href="/examen_final/tasks/start/<?=$task['id']?>"><span class="glyphicon glyphicon-play" aria-hidden="true"></a>
			<?php endif?>

			<?php if ($task["finished"]==0): ?>
				<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>
			<?php else: ?>
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
			<?php endif ?><br>
			<?php if (!$day['finished']==1): ?>
			<a class="btn btn-danger" href="/examen_final/tasks/delete/<?=$task['id']?>">Eliminar</a><br><br>
			<?php endif ?>
			<div class="progress">
			  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $task['percentage']?>"
			  aria-valuemin="0" aria-valuemax="100" style="width:<?= $task['percentage']?>%">
			    <span class="sr-only"><?= $task['percentage']?>% Complete</span>
			  </div>
			</div>
			<?php if (!$day['finished']==1): ?>
				<form style="margin:10px;" method="POST" action="/examen_final/sub_tasks/create/<?=$task['id']?>">
				  <input type="text" name="newNameTextBox" maxlength="50" />
				  <input class="btn btn-success" type="submit" name="createNewTaskButton" value="Crear Sub Tarea" />
				</form>
			<?php endif ?>
			<?php if (!$day['finished']==1): ?>
				<form style="margin:10px;" method="POST" action="/examen_final/notes/create/<?=$task['id']?>">
				  <input type="text" name="newNoteTextBox" maxlength="50" />
				  <input class="btn btn-success" type="submit" name="createNewNoteButton" value="Crear Nota" />
				</form>
			<?php endif ?>
		</div>
		<div class="col-lg-6">
			<h3>Sub Tasks</h3>
			<?php foreach ($sub_tasks[$task['id']] as $sub_task): ?>
				<?= $sub_task["name"] ?> 
				<?php if ($sub_task["finished"]==0): ?>
					<span class="glyphicon glyphicon-hourglass" aria-hidden="true"></span>
				<?php else: ?>
					<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<?php endif ?>
				<br>
			
				<?php if (!$day['finished']==1): ?>
					<?php if ($sub_task["finished"]==0): ?>
						<?php if($task["start"]):?>
						<a  class="btn btn-success" href="/examen_final/sub_tasks/finish/<?=$sub_task['id']?>">Finalizar</a>
					<?php endif ?>
					<?php endif ?>
					<a  class="btn btn-danger" href="/examen_final/sub_tasks/delete/<?=$sub_task['id']?>">Eliminar</a>
				<?php endif ?>
				<br>
		    <?php endforeach; ?>
		    <h3>Notes</h3>
			<?php foreach ($notes[$task['id']] as $note): ?>
				<?= $note["note"] ?> <a href="/examen_final/notes/delete/<?=$note['id']?>">Eliminar</a><br>
		    <?php endforeach; ?>
		</div>
	</div>


	<?php endforeach; ?>
</div>
</div>
</div>

<script type="text/javascript">
	var task_id = $("#for_js").html();
	var h = $("#"+task_id+"hour").html();
	var m = $("#"+task_id+"minute").html();
	var s = $("#"+task_id+"second").html();
	var counter = 0;
	window.setInterval(function() 
	{
    	counter++;
    	var s_i = parseInt(s)+counter;
    	var m_i = parseInt(m);
    	var h_i = parseInt(h);
    	if (s_i>=60)
    	{
    		m_i = m_i + Math.floor(s_i/60);
    		s_i = s_i%60;
    	}
    	if (m_i>=60)
    	{
    		h_i = h_i + Math.floor(m_i/60);
    		m_i = m_i%60;
    	}

	    $("#"+task_id+"second").html(s_i);
	    $("#"+task_id+"minute").html(m_i);
	    $("#"+task_id+"hour").html(h_i);
    },1000);
</script>
