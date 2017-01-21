        <h1>Login</h1>


        <div class="panel panel-default">

       	<form method="post" action="/login">

       	<?php echo @$_GET['loginError']; ?>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">Username</span>
		  <input type="text" required name="username" class="form-control" maxlength="50" placeholder="" aria-describedby="basic-addon1">
		</div>
		<br>
		<div class="input-group">
		  <span class="input-group-addon" id="basic-addon1">Password</span>
		  <input type="password" required name="password" class="form-control" maxlength="50" placeholder="" aria-describedby="basic-addon1">
		</div>

		<br>

		  <button type="submit" class="btn btn-default">Login</button>
	
		

		</form>

		</div>

