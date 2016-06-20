<div class="container text-center">
<div class="row">
<div class="jumbotron">
<h1>Update Password</h1>
<div class="row">
	<div class="col-lg-3"></div>
	<div class="col-lg-6 errors">
		<?php echo validation_errors(); ?>
	</div>
</div>
<form style="margin:10px;" method="POST" action="/examen_final/users/update">
 <fieldset class="form-group">
	  <label for="lastPassword">Previus Password</label>
	  <input type="password" class="form-control" name="LastPasswordTextBox" id="LastPasswordTextBox" maxlength="50" placeholder="Previus Password."/><br>
  </fieldset>
  <fieldset class="form-group">
	  <label for="Password">New Password</label>
	  <input type="password" class="form-control" name="NewPasswordTextBox" id="NewPasswordTextBox" maxlength="50" placeholder="New Password." />
 </fieldset>
  <input class="btn btn-primary" type="submit" name="createNewUser" value="Save Changes" /><br>
</form>
</div>
</div>
</div>