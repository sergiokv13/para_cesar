<div class="container text-center">
<div class="row">
<div class="jumbotron">
   <h1>System</h1>
   <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 errors">
      <?php echo validation_errors(); ?>
    </div>
    </div>
   <form style="margin:10px;"method="POST" action="/examen_final/verify_login">
     <fieldset class="form-group">
       <label for="username">Username</label>
       <input type="text" class="form-control" size="20" id="username" name="username" placeholder="Username."/>
     </fieldset> 
     <fieldset class="form-group">
       <label for="password">Password</label>
       <input type="password" class="form-control" size="20" id="passowrd" name="password" placeholder="Password."/>
     </fieldset>
     <input ctype="button" class="btn btn-success" type="submit" value="login" />
   </form>
</div>
</div>
</div>