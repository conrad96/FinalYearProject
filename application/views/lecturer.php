<?php include("head-body-lec.php"); ?>
<!-- 
-upload coursework
-upload Assignment
-view all students in a course
-view individual coursework students

-->
<?php foreach($profile as $r){ ?>
<img src='<?php echo $r->lec_photo; ?>' class='img-responsive img-rounded' style='width:50px;height:50px; ' />
<?php } ?>
<div class="row">
	<div class="col-md-4"  style="border: 1px solid gray;">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Coursework</h4>
    <small class="card-text">Publish New Coursework</small>
    <p />
    <center><h2><span class="glyphicon glyphicon-plus"></span></h2></center>
  </div>
</div>
	</div>
	<div class="col-md-4" style="border: 1px solid gray;">
		<div class="card">
  <div class="card-body">
    <h4 class="card-title">Assignment</h4>
    <small class="card-text">Publish New Assignment</small>
    <p />
    <center><h2><span class="glyphicon glyphicon-plus"></span></h2></center>
  </div>
</div>
	</div>
	<div class="col-md-4" style="border: 1px solid gray;">

		<div class="card">
  <div class="card-body">
    <h4 class="card-title">Handouts</h4>
    <small class="card-text">Publish New Handouts</small>
    <p />
    <center><h2><span class="glyphicon glyphicon-plus"></span></h2></center>
  </div>
</div>
</div>

</div>
<div class="row" style="padding-top: 20px;padding-left: 40px;">
	<div class="col-md-10" id="coursework">
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h4 class="panel-title" style="text-transform: uppercase;font-weight: bold;">Publish New CourseWork</h4></center>
			</div>
			<div class="panel-body">
					<form action="<?php echo $assets['base_url'].'online/regCoursework/$id/$uname'; ?>" method="POST" class="form-horizontal">
					<div class="form-group">
					<label class="col-md-3">Coursework Title</label>
					<div class="col-md-6">
					<input type="text" name="title" class="form-control" placeholder="Type the CourseTitle">
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-3">Courseunit</label>
					<div class="col-md-6">
					<select class="form-control" name="unit" required="required">
						<option selected disabled>--Choose Courseunit--</option>
						<?php 
					foreach ($units as $r) {
							echo "<option value='".$r->unit_ID."'>".$r->unit_title."</option>";
						}	
						?>
					</select>
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-3">Coursework Document</label>
					<div class="col-md-6">
					<input type="file" name="document" class="form-control" required="required">
					</div>
					</div>
					</form>		
			</div>
		</div>
		

	</div>
</div>

<?php include("footer.php"); ?>