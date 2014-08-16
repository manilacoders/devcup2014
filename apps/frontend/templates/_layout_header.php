<nav class="navbar navbar-default navbar-static-top" role="navigation">
	<a class="navbar-brand" href="#">Guró</a>
	<ul class="nav navbar-nav pull-right">
		<li class="active">
			<a href="#">Home</a>
		</li>
		<li>
			<a href="#" data-toggle="modal" data-target="#login">Register/Log In</a>
		</li>
		<li>
			<a href="#">About</a>
		</li>
		<li>
			<a href="#">FAQ</a>
		</li>
	</ul>
</nav>

<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Log In / Register</h4>
      </div>
      <div class="modal-body">
      	<div class="col-md-6">
      		<div class="well">
	      		<form action="" method="POST" class="form-horizontal" role="form">
	      				<div class="form-group">
	      					<legend>Log In</legend>
	      				</div>
	      			
	      				<div class="form-group">
    				      <label for="inputEmail" class="col-lg-4 control-label"><span class="req">*</span> Email</label>
    				      <div class="col-lg-8">
    				        <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
    				      </div>
    				    </div>

    				    <div class="form-group">
    				      <label for="inputPWord" class="col-lg-4 control-label"><span class="req">*</span> Password</label>
    				      <div class="col-lg-8">
    				        <input type="password" class="form-control" id="inputPWord" placeholder="Password" name="password">
    				      </div>
    				    </div>
	      		
	      				<div class="form-group">
	      					<div class="col-sm-10 col-sm-offset-6">
	      						<button type="submit" class="btn btn-primary">Log In</button>
	      					</div>
	      				</div>
	      		</form>
      		</div>
      	</div>
      	<div class="col-md-6">
      		<div class="well">
	      		<form action="" method="POST" class="form-horizontal" role="form">
	      				<div class="form-group">
	      					<legend>Register</legend>
	      				</div>
	      			
	      				<div class="form-group">
    				      <label for="inputEmail" class="col-lg-4 control-label"><span class="req">*</span> Email</label>
    				      <div class="col-lg-8">
    				        <input type="text" class="form-control" id="inputEmail" placeholder="Email" name="email">
    				      </div>
    				    </div>

    				    <div class="form-group">
    				      <label for="inputFName" class="col-lg-4 control-label"><span class="req">*</span> First Name</label>
    				      <div class="col-lg-8">
    				        <input type="text" class="form-control" id="inputFName" placeholder="First Name" name="first_name">
    				      </div>
    				    </div>
	      				
	      				<div class="form-group">
    				      <label for="inputMName" class="col-lg-4 control-label">Middle Name</label>
    				      <div class="col-lg-8">
    				        <input type="text" class="form-control" id="inputMName" placeholder="Middle Name" name="middle_name">
    				      </div>
    				    </div>
	      				
	      				<div class="form-group">
    				      <label for="inputLName" class="col-lg-4 control-label"><span class="req">*</span> Last Name</label>
    				      <div class="col-lg-8">
    				        <input type="text" class="form-control" id="inputLName" placeholder="Last Name" name="last_name">
    				      </div>
    				    </div>
	      		
	      				<div class="form-group">
	      					<div class="col-sm-10 col-sm-offset-6">
	      						<button type="submit" class="btn btn-primary">Register</button>
	      					</div>
	      				</div>
	      		</form>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
      	<div class="pull-left">
	        <span class="req">*</span> Required
      	</div>
      </div>
    </div>
  </div>
</div>