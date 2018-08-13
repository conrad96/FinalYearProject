<?php include("head-body-admin.php"); ?>
<div class="container-fluid">
	<?php  if(isset($msg)) echo $msg; ?>
	<div class="col-md-9" style="padding-left: 150px;">
	<form action='<?php echo $assets['base_url']."online/regLec/$id/$uname"; ?>' method="POST" enctype="multipart/form-data" class="form-horizontal" style="padding-top: 40px;">
		<span ></span>
		<div class="form-group">
			<label class="col-md-3">Upload Photo</label>
			<div class="col-md-6">
				<input type="file" name="photo" class="form-control" accept="image/*" id="uploadImage" onchange="PreviewImage();">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Full Names:</label>
			<div class="col-md-6">
				<input type="text" name="names" class="form-control" >
			</div>
		</div>
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
			<label class="col-md-3">Biography:</label>
			<div class="col-md-6">
				<textarea name='bio' style="width: 300px;height: 90px;" class="form-control"></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">Department:</label>
			<div class="col-md-6">
				<select name="department" class="form-control">
					<option disabled selected>--Choose Department--</option>
						<?php
						if(isset($depts)){
						foreach($depts as $r){
						echo "<option value='".$r->dept_ID."'>".$r->dept_name."</option>";
						}
						}else{
						echo "<option disabled> No Departments Registered</option>";
						}
						?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3">&nbsp;</label>
			<div class="col-md-5">
				<input type="submit" class="form-control btn btn-success" value="Register" >
			</div>
		</div>
	</form>
</div>
<div class="col-md-3" style="padding-top: 45px;padding-right: 70px;">
	<div class="card">
<img src="#" style="width:350px;height: 210px;" id="uploadPreview" class="img-responsive img-thumbnail" alt='' onerror="this.src='<?php echo $assets['image']."default.png"; ?>' ">
  <div class="card-body">
    <h4 class="card-title">Lecturer Registration</h4>
    <p class="card-text">Fill in All the Lecturers' Required Fields</p>
  </div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
