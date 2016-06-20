<div class="container text-center">
<div class="row">
<div class="jumbotron">
  <h1>New User</h1>
  <div class="row">
  <div class="col-lg-3"></div>
  <div class="col-lg-6 errors">
    <?php echo validation_errors(); ?>
  </div>
</div>
  <form style="margin:10px;" method="POST" action="/examen_final/users/create">
    <fieldset class="form-group">
      <label for="username">Username</label>
      <input type="text"  class="form-control" name="usernameTextBox" id="usernameTextBox" maxlength="50" placeholder="Username."/><br>
    </fieldset>
    <fieldset class="form-group">
       <label for="name">Name</label>
      <input type="text" class="form-control" name="nameTextBox" id="nameTextBox" maxlength="50" placeholder="Name."/><br>
    </fieldset>
    <fieldset class="form-group">
      <label for="lastname">Lastname</label>
      <input type="text" class="form-control" name="lastnameTextBox" id="lastnameTextBox" maxlength="50" placeholder="Lastname."/><br>
    </fieldset>
    <fieldset class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" name="passwordTextBox" id="passwordTextBox" maxlength="50" placeholder="Password."/><br>
    </fieldset>
    <fieldset class="form-group">
      <label for="role">Role</label>
      <select class="form-control" name="rolSelectTag">
    	  <option value="2">Consultor</option>
    	  <option value="1">Administrador</option>
      </select><br><br>
    </fieldset>
    <input class="btn btn-success" type="submit" name="createNewUser" value="Crear Usuario" /><br>
  </form>
</div>
</div>
</div>