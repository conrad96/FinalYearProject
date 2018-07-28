<?php include("header.php"); ?>
<?php include("admin-nav.php"); ?>
<div class="container-fluid">
	<?php  if(isset($msg)) echo $msg; ?>
	<div class="col-md-9" style="padding-left: 150px;">
	<form action='<?php echo $assets['base_url']."online/regAdmin/$id/$uname"; ?>' method="POST" class="form-horizontal" style="padding-top: 40px;">
		<div class="form-group">
			<label class="col-md-3">Username:</label>
			<div class="col-md-6">
				<input type="text" name="username" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Email:</label>
			<div class="col-md-6">
				<input type="email" name="email" class="form-control" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Password:</label>
			<div class="col-md-6">
				<input type="password" name="password" class="form-control" id="pwd1">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Confirm Password:</label>
			<div class="col-md-6">
				<input type="password" name="cpassword" class="form-control" id="pwd2">
				<i id="checkpwd"></i>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-3">&nbsp;</label>
			<div class="col-md-6">
<input type="submit" value="Register Admin" class="btn btn-success form-control">
			</div>
		</div>
	</form>
	</div>
</div>
<?php include("footer.php"); ?>