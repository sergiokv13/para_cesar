<div class="container">
<div class="row">
<div class="jumbotron">

<h1>Users in day <?= $day["date"] ?></h1>
<?php if(isset($users)):?>  
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
	  		<ol class="carousel-indicators">
				<?php foreach ($users as $key=>$user): ?>
					<?php if($key==0):?> 
						<li data-target="#myCarousel" data-slide-to="<?=$key?>" class="active" >
					<?php else:?>
						<li data-target="#myCarousel" data-slide-to="<?=$key?>">
					<?php endif?>
					</li>
				<?php endforeach; ?>
			</ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner" role="listbox">
			    <?php foreach ($users  as $key=>$user): ?>
					<div class="embed-responsive embed-responsive-16by9 item<?php if($key==0):?> active<?php endif?>">
					 	<iframe  class="embed-responsive-item" src="/examen_final/reports/report/<?=$day['id']?>/<?=$user['id']?>" frameborder="0"></iframe>
					</div>
				<?php endforeach; ?>
		    </div>

		  <!-- Left and right controls -->
		  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
		</div>
	<?php endif?>

</div>
</div>
</div>



