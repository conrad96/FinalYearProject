<?php include("header.php"); ?>

	<div class="login" style="padding-left: 25%;padding-top: 15%;">
<div class="col-lg-6" >
	<?php if(isset($msg)){ 
echo '<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
    '.$msg.'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div>';
	}  ?>
	
                <div class="card">
          <div class="card-header">Login Form</div>

          <div class="card-body card-block">
            <form action='<?php echo $assets['base_url'].'online/login'; ?>' method="post" >
<div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Student Number</div>
  <input type="text" id="username3" name="studentNo" class="form-control" placeholder="Type Your Students Number">
  <div class="input-group-addon"><i class="fa fa-user"></i></div>
</div>
</div>
<div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Email</div>
  <input type="email" id="email3" name="email" class="form-control">
  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
</div>
</div>
<div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Password</div>
  <input type="password" id="password3" name="password" class="form-control">
  <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
</div>
</div>
<div class="form-actions form-group">
<button type="submit" class="btn btn-primary btn-sm btn-lg">Login</button>
</div>
            </form>
          </div>
                    </div>
                  </div>
       </div>
