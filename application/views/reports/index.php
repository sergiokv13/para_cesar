<div class="container">
<div class="row">
<div class="jumbotron">
	<h2>Reports on Past Days</h2>
	<?php foreach ($finished_days as $day): ?>
	  <li class="list-group-item">
	  	<a href="/examen_final/reports/profile/<?= $day["id"] ?>"><?= $day["date"] ?></a><br>
	  </li> 
	  <?php endforeach; ?>
</div>
</div>
</div>
