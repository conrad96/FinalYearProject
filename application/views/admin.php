<?php include("header.php"); ?>
<?php include("admin-nav.php"); ?>
<div class="container-fluid">
	<?php if(isset($msg)) echo $msg; ?>
<div class="row" style="padding-top: 45px;padding-left: 50px">
	<div class="col-md-3" style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Faculty' onclick="facultyFunc();" >
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">FACULTY</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[0]; ?></h2></span>
	</div>

	<div class="col-md-2"  style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Department' onclick="deptFunc();">
		<h3 style="text-shadow: 1px 2px 3px  gray;text-align: center;">DEPARTMENT</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[2]; ?></h2></span>
	</div>
	<div class="col-md-3"  style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Course' onclick="courseFunc();">
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">COURSES</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[1]; ?></h2></span>
	</div>
</div>
<div class="row" style="padding-top: 45px;padding-left: 50px">
	<div class="col-md-3" style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Lecturer' >
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">LECTURERS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[3]; ?></h2></span>
	</div>

	<div class="col-md-2"  style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Student'>
		<h3 style="text-shadow: 1px 2px 3px  gray;text-align: center;">STUDENTS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[4]; ?></h2></span>
	</div>
	<div class="col-md-3"  style="width: 400px;height: 120px;border:1px gray solid;" title='Click Here To Register A Administrtor'>
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">ADMINISTRATORS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[5]; ?></h2></span>
	</div>
</div>
<div class="row" style="padding-top: 45px;padding-left: 50px">
	<div class="col-md-3" style="width: 400px;height: 120px;border:1px gray solid;" title='<?php echo $counters[6]; ?> CourseUnits Registered' onclick="courseunitFunc();">
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">COURSE UNITS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[6]; ?></h2></span>
	</div>

	<div class="col-md-2"  style="width: 400px;height: 120px;border:1px gray solid;" title='<?php echo $counters[7]; ?> Courseworks Registered'>
		<h3 style="text-shadow: 1px 2px 3px  gray;text-align: center;">COURSE WORKS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[7]; ?></h2></span>
	</div>
	<div class="col-md-3"  style="width: 400px;height: 120px;border:1px gray solid;" title='<?php echo $counters[8]; ?> Assignments Registered'>
		<h3 style="text-shadow: 1px 2px 3px gray;text-align: center;">ASSIGNMENTS</h3>
<span style="text-align: center;padding-top: 10px;text-shadow: 1px 3px 4px gray;color:red;"><h2><?php echo $counters[8]; ?></h2></span>
	</div>
</div>
<div id="faculty" style="padding-top: 45px;padding-left: 300px;display: none;" >
	<div class="panel panel-default col-md-9">
		<div class="panel-heading">
			<center><h4 style="text-transform: uppercase;">Register Faculty</h4></center>
		</div>
		<div class="panel-body">
			<form action=<?php echo $assets['base_url'].'online/registerFaculty/'.$id.'/'.$uname; ?> method="POST" class="form-horizontal">
			<div class="form-group">
				<label class="col-md-3">Faculty Title:</label>
				<div class="col-md-7">
					<input type="text" name="fac_name" class="form-control"  placeholder="Type The Faculty Name Here">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3">&nbsp;</label>
				<div class="col-md-7">
					<input type="submit"  class="form-control btn-success" value="Add Faculty">
				</div>
			</div>
		</form>
		</div>
	</div>
</div><!-- div faculty-->

<div id="dept" style="padding-top: 45px;padding-left: 300px;display: none;">
	<div class="panel panel-default col-md-9">
		<div class="panel-heading">
			<center><h4 style="text-transform: uppercase;">Register Department</h4></center>
		</div>
		<div class="panel-body">
			<form action=<?php echo $assets['base_url'].'online/registerDepartment/'.$id.'/'.$uname; ?> method="POST" class="form-horizontal">
			<div class="form-group" >
				<label class="col-md-3">Department Title:</label>
				<div class="col-md-7">
					<input type="text" name="dept_name" class="form-control"  placeholder="Type The Department Name Here">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3">Faculty:</label>
				<div class="col-md-7">
<select name="fac" class="form-control" >
	<option selected disabled>--Choose Faculty--</option>
			<?php
			if(isset($fac)){
			foreach($fac as $r){
			echo "<option value='".$r->fac_ID."'>".$r->fac_name."</option>";
			}
			}
			?>
</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-3">&nbsp;</label>
				<div class="col-md-7"><hr />
					<input type="submit"  class="form-control btn-success" value="Add Department">
				</div>
			</div>
		</form>
		</div>
	</div>
</div><!-- div Department-->
<div id="course" style="padding-top: 45px;padding-left: 300px;display: none;">
	<div class="panel panel-default col-md-9">
		<div class="panel-heading">
			<center><h4 style="text-transform: uppercase;">Register Course</h4></center>
		</div>
		<div class="panel-body">
		<form action=<?php echo $assets['base_url'].'online/registerCourse/'.$id.'/'.$uname; ?> method="POST" class="form-horizontal">
			<div class="form-group" >

				<label class="col-md-3">Course Title:</label>
				<div class="col-md-7">
					<input type="text" name="course_name" class="form-control"  placeholder="Type The Course Title Here">
				</div>
			</div>
			<div class="form-group" >
				<label class="col-md-3">Course Code:</label>
				<div class="col-md-7">
					<input type="text" name="code" class="form-control"  placeholder="Type The Course Code e.g ITD or ITE ">
				</div>
			</div>
			<div class="form-group" >
				<label class="col-md-3">Course Years:</label>
				<div class="col-md-7">
					<input type="number" name="years" class="form-control"  placeholder="Type The Course Years e.g 4yrs or 3yrs ">
				</div>
			</div>
			<div class="form-group">

				<label class="col-md-3">Department:</label>
				<div class="col-md-7">
<select name="department" class="form-control" >
	<option selected disabled>--Choose Department--</option>
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
				<div class="col-md-7"><hr />
					<input type="submit"  class="form-control btn-success" value="Add Course">
				</div>
			</div>
		</form>
		</div>
	</div>
</div><!-- div Department-->
<div id="unit" style="padding-top: 45px;padding-left: 300px;display: block;">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title"><span class="glyphicon glyphicon-plus"></span>ADD  COURSE UNIT</h4>
		</div>
		<div class="panel-body">
<form action=<?php echo $assets['base_url']."online/addCourseunit/".$id."/".$uname; ?> method='POST' class="form-horizontal">
				<div class="form-group">
					<label class="col-md-3">Courseunit Title:</label>
					<div class="col-md-6">
						<input type="text" name="title" class="form-control" placeholder="Type Course unit Title Here">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Course</label>
					<div class="col-md-6">
						<select class="form-control" name="course" required>
							<option selected disabled>--Choose Course--</option>
							<?php
							foreach($courses as $r){
								echo "<option value='".$r->course_ID."'>".$r->course_title."</option>";
							}
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Lecturer:</label>
					<div class="col-md-6">
			<input list="lecturer" placeholder="Search Lecturer" name="lecturer" class="form-control">
						<datalist list="lecturer" id="lecturer">
							<?php
foreach($lecturers as $r){
	echo "<option value='".$r->lec_ID."'>".$r->lec_names."</option>";
}
							?>
						</datalist>
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Course Unit Code:</label>
					<div class="col-md-6">
<input type="text" name="unit_code" placeholder="e.g IT311">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Course Current Year:</label>
					<div class="col-md-6">
<input type="number" name="unit_year"  placeholder="Type the year this courseunit is taught in e.g 3 for 3rd year" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<label class="col-md-3">Semester:</label>
					<div class="col-md-6">
<input type="number" name="semester" placeholder="Type the Semester the courseunit is taught e.g 2 for semester 2" class="form-control">
					</div>
				</div>
				<div class="form-group">
				<label class="col-md-3">&nbsp;</label>
				<div class="col-md-7"><hr />
					<input type="submit"  class="form-control btn-success" value="Add Courseunit">
				</div>
			</div>
			</form>
		</div>
	</div>
</div><!-- div courseunit-->
</div>
<?php include("footer.php"); ?>
