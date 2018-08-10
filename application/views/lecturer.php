<?php include("lec-head.php"); ?>
<div class="row">
	<div class="col-md-4"  style="border: 1px solid gray;" onclick="cw();">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Coursework</h4>
    <small class="card-text">Publish New Coursework</small>
    <p />
    <center><h2><span class="glyphicon glyphicon-plus"></span></h2></center>
  </div>
</div>
	</div>

	<div class="col-md-4" style="border: 1px solid gray;" onclick="ass();">
		<div class="card">
  <div class="card-body">
    <h4 class="card-title">Assignment</h4>
    <small class="card-text">Publish New Assignment</small>
    <p />
    <center><h2><span class="glyphicon glyphicon-plus"></span></h2></center>
  </div>
</div>
	</div>
	<div class="col-md-4" style="border: 1px solid gray;" onclick="notes();">

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
	<div class="col-md-10" id="coursework" style="display: none;">
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h4 class="panel-title" style="text-transform: uppercase;font-weight: bold;">Publish New CourseWork</h4></center>
			</div>
			<div class="panel-body">
<form action=<?php echo $assets['base_url']."online/regCoursework/".$id."/".$uname.""; ?> method="POST" class="form-horizontal" enctype='multipart/form-data'>
					<div class="form-group">
					<label class="col-md-3">Coursework Title</label>
					<div class="col-md-6">
					<input type="text" name="title" class="form-control" placeholder="Type the Coursework Title">
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
					<input type="file" name="doc" class="form-control" >
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-3">Coursework Deadline</label>
					<div class="col-md-6">
					<input type="date" name="deadline" class="form-control">
					<input type="hidden" name="lec_ID" value=<?php echo $id; ?> >
					</div>
					</div>
					<div class="form-group">
					<label class="col-md-3">&nbsp;</label>
					<div class="col-md-6">
					<input type="submit" value="Publish coursework" class="form-control btn btn-success">
					</div>
					</div>
					</form>		
			</div>
		</div>
		

	</div>
	<div class="col-md-10" id="assignment" style="display: none;">
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h4 class="panel-title" style="text-transform: uppercase;font-weight: bold;">Publish Assignment</h4></center>
			</div>
			<div class="panel-body">
<form action=<?php echo $assets['base_url']."online/regAssignment/".$id."/".$uname.""; ?> method="POST" class="form-horizontal" enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-md-3">Assignment Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Type Assignment Title ">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3">Course unit</label>
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
		<label class="col-md-3">Document</label>
		<div class="col-md-6">
			<input type="file" name="doc" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3">Deadline</label>
		<div class="col-md-6">
			<input type="date" name="deadline" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3">&nbsp;</label>
		<div class="col-md-6">
			<input type="submit" class="form-control btn btn-success" value="Publish Assignment">
		</div>
	</div>
</form>
	</div>
</div>
</div>
<div class="col-md-10" id="notes" style="display: none;">
		<div class="panel panel-default">
			<div class="panel-heading">
				<center><h4 class="panel-title" style="text-transform: uppercase;font-weight: bold;">Publish Handouts</h4></center>
			</div>
			<div class="panel-body">
<form action=<?php echo $assets['base_url']."online/regHandout/".$id."/".$uname.""; ?> method="POST" class="form-horizontal" enctype='multipart/form-data'>
	<div class="form-group">
		<label class="col-md-3">Handout Title</label>
		<div class="col-md-6">
			<input type="text" name="title" class="form-control" placeholder="Type Handout Title">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3">Course unit</label>
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
		<label class="col-md-3">Document</label>
		<div class="col-md-6">
			<input type="file" name="doc" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label class="col-md-3">&nbsp;</label>
		<div class="col-md-6">
			<input type="submit" class="form-control btn btn-success" value="Publish Handout">
		</div>
	</div>
</form>
	</div>
</div>
</div>
</div>
<div class="row" style="padding-top: 20px;padding-left: 40px;padding-right: 40px;" id="activity" >
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Published Courseworks</h3>
		</div>
		<div class="panel-body" style="height: 200px;overflow: auto;">
			<ul class="list-group">
				<?php 
if(isset($coursework)){
	if(!empty($coursework)){
		$i=0;
		foreach($coursework as $r){
			echo "<li class='list-group-item'>".strtoupper($r->work_title)."<span class='pull-right'>
<button type='button' data-toggle='modal' data-target='#myModal_".$i."' onClick='$('#myModal').modal()' >Edit</button>
			&nbsp;&nbsp;
<a href='".$assets['base_url']."online/deletecw/".$id."/".$uname."/".$r->work_ID."'>Delete</a></span></li>";
			//start modal ?>
<div id="myModal_<?php echo $i; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Coursework </h4><p />
        <h4 class="text-warning"><?php echo $r->work_title; ?></h4>
      </div>
      <form action=<?php echo $assets['base_url']."online/edit_cw/".$id."/".$uname."/".$r->work_ID; ?> method="POST" enctype='multipart/form-data'>
      <div class="modal-body">
        	<div class="form-group">
        		<input type="text" name="edit_title" placeholder="Edit Coursework Title" id="in_r" class="form-control">
        	</div>
        	<div class="form-group">
		<label class="col-md-3">Course unit</label>
		<div class="col-md-6">
			<select class="form-control" name="edit_unit" required="required">
				<option selected disabled>--Choose Courseunit--</option>
				<?php 
			foreach ($units as $u) {
					echo "<option value='".$u->unit_ID."'>".$u->unit_title."</option>";
				}	
				?>
			</select>
		</div>
	</div>
        	<div class="form-group">
<input type="file" name="edit_doc" id="in_r">
        	</div>
        	<div class="form-group">
        		<input type="date" name="edit_deadline" id="in_r" placeholder="Deadline" class="form-control">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Edit</button>
      </div>
	  </form>
    </div>

  </div>
</div>	

	<?php //end modal 
$i++;
}
	}else{
		echo "<i style='padding-top:30px;'><span class='alert alert-danger'>No Courseworks Published</span></i>";
	}
}
				?>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Published Assignments</h3>
		</div>
		<div class="panel-body" style="height: 200px;overflow: auto;">
			<ul class="list-group">
				<?php 
if(isset($assignments)){
	$x=0;
	if(!empty($assignments)){
		foreach($assignments as $r){
			echo "<li class='list-group-item'>".strtoupper($r->assignment_title)."<span class='pull-right'><button type='button' data-toggle='modal' data-target='#myModal_a_".$x."' onClick='$('#myModal_a_".$x."').modal()' >Edit</button>
			&nbsp;&nbsp;<a href='".$assets['base_url']."online/deleteass/".$id."/".$uname."/".$r->assignment_ID."'>Delete</a></span></li>";
			//start modal
?>
<div id="myModal_a_<?php echo $x; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Assignment </h4><p />
        <h4 class="text-warning"><?php echo $r->assignment_title; ?></h4>
      </div>
<!--       edit_title
edit_unit
edit_deadline -->
      <form action=<?php echo $assets['base_url']."online/edit_ass/".$id."/".$uname."/".$r->assignment_ID; ?> method="POST" enctype='multipart/form-data'>
      <div class="modal-body">
        	<div class="form-group">
        		<input type="text" name="edit_title" placeholder="Edit Assignment Title" id="in_r">
        	</div>
        	<div class="form-group">
		<label class="col-md-3">Course unit</label>
		<div class="col-md-6">
			<select class="form-control" name="edit_unit" required="required">
				<option selected disabled>--Choose Courseunit--</option>
				<?php 
			foreach ($units as $u) {
					echo "<option value='".$u->unit_ID."'>".$u->unit_title."</option>";
				}	
				?>
			</select>
		</div>
	</div>
        	<div class="form-group">
<input type="file" name="edit_doc" id="in_r">
        	</div>
        	<div class="form-group">
        		<input type="date" name="edit_deadline" id="in_r" placeholder="Deadline">
        	</div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Edit</button>
      </div>
	  </form>
    </div>

  </div>
</div>	

<?php	//end modal
	$x++;		
		}
	}else{
		echo " <i style='padding-top:30px;'><span class='alert alert-danger'>No Assignments Published</span></i>";
	}
}
				?>
			</ul>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Published Handouts</h3>
		</div>
		<div class="panel-body" style="height: 200px;overflow: auto;">
			<ul class="list-group">
				<?php 
if(isset($handouts)){
	if(!empty($handouts)){
		$y=0;
		foreach($handouts as $r){
			echo "<li class='list-group-item'>".strtoupper($r->handout_title)."<span class='pull-right'><button type='button' data-toggle='modal' data-target='#myModal_h_".$y."' onClick='$('#myModal_h_".$y."').modal()' >Edit</button>&nbsp;&nbsp;<a href='".$assets['base_url']."online/deletehand/".$id."/".$uname."/".$r->handout_ID."'>Delete</a></span></li>";
			//start modal
?>
<div id="myModal_h_<?php echo $y; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Handout </h4><p />
        <h4 class="text-warning"><?php echo $r->handout_title; ?></h4>
      </div>

      <form action=<?php echo $assets['base_url']."online/edit_hand/".$id."/".$uname."/".$r->handout_ID; ?> method="POST" enctype='multipart/form-data'>
      <div class="modal-body">
        	<div class="form-group">
        		<input type="text" name="edit_title" placeholder="Edit Handout Title" id="in_r">
        	</div>
        	<div class="form-group">
		<label class="col-md-3">Course unit</label>
		<div class="col-md-6">
			<select class="form-control" name="edit_unit" required="required">
				<option selected disabled>--Choose Courseunit--</option>
				<?php 
			foreach ($units as $u) {
					echo "<option value='".$u->unit_ID."'>".$u->unit_title."</option>";
				}	
				?>
			</select>
		</div>
	</div>
        	<div class="form-group">
<input type="file" name="edit_doc" id="in_r">
        	</div>
        	 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" >Edit</button>
      </div>
	  </form>
    </div>

  </div>
</div>	


<?php 	//end modal
		$y++;
		}
	}else{
		echo "<i  style='padding-top:30px;'><span class='alert alert-danger'>No Handouts Published</span></i>";
	}
}
				?>
			</ul>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>