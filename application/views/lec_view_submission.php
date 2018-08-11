<?php include("lec-head.php"); ?>
<div class="container-fluid">

	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Coursework Submissions</h3>
			</div>
			<div class="panel-body">
				<div class="row">
				<div class="col-md-5">
				<div class="panel panel-info">
					<div class="panel-heading"><h4 class="panel-title">Deadlines for Coursework submissions</h4></div>
					<div class="panel-body" id="cw_panel">
						<ul class="list-group">
						<?php
if(isset($coursework)){
	if(!empty($coursework)){
		foreach($coursework as $r){
			echo "<li class='list-group-item'>".$r->work_title."<span class='pull-right'>".$r->work_deadline."</span></li>";
		}
	}
}
						?>
						</ul>
					</div>
				</div>
				<!-- deadline for assignment-->

				<div class="panel panel-info">
					<div class="panel-heading"><h4 class="panel-title">Deadlines for Assignment submissions</h4></div>
					<div class="panel-body" id="ass_panel">
						<ul class="list-group">
						<?php
if(isset($assignment)){
	if(!empty($assignment)){
		foreach($assignment as $r){

			echo "<li class='list-group-item'>".$r->assignment_title."<span class='pull-right'>".$r->assignment_deadline."</span></li>";
		}
	}
}
						?>
						</ul>
					</div>
				</div>

				</div>
				<div class="col-md-7">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">Student Submissions [Coursework]</h4>
						</div>
						<div class="panel-body" id="big_layout">
					<?php
 if(isset($cw_sub)){

 	if(!empty($cw_sub)){
 		$i=0;
 		echo "<ul class='list-group'>";
		foreach($cw_sub as $r){


echo "<li class='list-group-item'>".$r->stud_names." submitted on ".$r->dtime_submit."<span class='pull-right'><button type='button' data-toggle='modal' data-target='#myModal_".$i."' onClick='$('#myModal').modal()' >View Work</button>&nbsp;&nbsp;&nbsp;<button type='button' data-toggle='modal' data-target='#myModal_m_".$i."' onClick='$('#myModal_m_".$i."').modal()' >Add Score</button></span></li>";


		?>
<!-- start view modal-->
<div id="myModal_<?php echo $i; ?>" class="modal fade" role="dialog" style="width:85%; overflow:auto;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="overflow:auto;">
      <div class="modal-header" style="overflow:auto;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center>  <h4 class="modal-title">Coursework Submission </h4><p /></center>
        <h4 class="text-warning"><?php echo $r->stud_names.' <span class="pull-right">Student N0. '.$r->student_No."</span>"; ?></h4>
      </div>

      <div class="modal-body" style="width:85%; overflow:auto;">
      	<form class="form-horizontal">
      		<div class="form-group">
  				<label class="col-md-6">Courseunit</label>
  				<div class="col-md-6">
  					<?php echo strtoupper($r->unit_title); ?>
  				</div>
  			</div>

      		<div class="form-group">
			      <label class="col-md-6">Coursework Title</label>
			      <div class="col-md-6">
			      	<?php echo $r->work_title; ?>
			      </div>
  			</div>

  			<div class="form-group">
  				<label class="col-md-6">Coursework Document</label>
			      <div class="col-md-6">
			      	<a href=<?php echo $r->subcw_doc; ?>><?php echo str_replace('http://localhost/FinalYearProject/assets/documents/coursework/','',$r->subcw_doc); ?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-download"></span></a>
			      </div>
  			</div>

  			<div class="form-group">
  				<label class="col-md-6">Date Submitted</label>
  				  <div class="col-md-6">
  				  	<?php echo $r->dtime_submit; ?>
  				  </div>
  			</div>
      </div>
  		</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>
</div>
<!-- end modal-->
<!-- start marks modal-->
<div id="myModal_m_<?php echo $i; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center><h4 class="modal-title">Give Score on Coursework</h4><p /></center>
        <h4 class="text-warning"><?php echo $r->stud_names.' <span class="pull-right">Student N0. '.$r->student_No."</span>"; ?></h4>
      </div>

      	<div class="modal-body">
      		<form action=<?php echo $assets['base_url']."online/post_score/".$id."/".$uname; ?> method="POST">
      			<div class="form-group">
      	<input type="number" name="mark_cw" id="in_r" placeholder="Type Score of Coursework" class="form-control" required>
      		</div>
      		<div class="form-group">
      		<input type="submit" value="Post Score" class="btn btn-success ">
      		</div>
   <input type="hidden" name="student_No" value=<?php echo $r->student_No; ?>>
   <input type="hidden" name="work_ID" value=<?php echo $r->work_ID; ?>>
      		</form>
  		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>
</div>
<!-- end modal-->

	<?php	$i++; }
		echo "</ul>";
	}else{
		echo "<div class='row  alert alert-warning'>No Coursework submissions so far...</div>";
 	}
 }
					?>

						</div>
					</div>
				</div>
			</div>

	</div>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Assignment Submissions</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-5">
				<div class="panel panel-info">
					<div class="panel-heading"><h4 class="panel-title">Deadlines for Coursework submissions</h4></div>
					<div class="panel-body" style="height: 145px;overflow: auto;">
						<ul class="list-group">
						<?php
if(isset($coursework)){
	if(!empty($coursework)){
		foreach($coursework as $r){
			echo "<li class='list-group-item'>".$r->work_title."<span class='pull-right'>".$r->work_deadline."</span></li>";
		}
	}
}
						?>
						</ul>
					</div>
				</div>
				<!-- deadline for assignment-->

				<div class="panel panel-info">
					<div class="panel-heading"><h4 class="panel-title">Deadlines for Assignment submissions</h4></div>
					<div class="panel-body" style="height: 143px;overflow: auto;">
						<ul class="list-group">
						<?php
if(isset($assignment)){
	if(!empty($assignment)){
		foreach($assignment as $r){

			echo "<li class='list-group-item'>".$r->assignment_title."<span class='pull-right'>".$r->assignment_deadline."</span></li>";
		}
	}
}
						?>
						</ul>
					</div>
				</div>

				</div>
				<div class="col-md-7">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4 class="panel-title">Student Submissions (Assignments)</h4>
						</div>
						<div class="panel-body" style="height: 350px;overflow: auto;">
					<?php
 if(isset($ass_sub)){

 	if(!empty($ass_sub)){
 		$y=0;
 		echo "<ul class='list-group'>";
		foreach($ass_sub as $r){


echo "<li class='list-group-item'>".$r->stud_names." submitted on ".$r->dtime_submit."<span class='pull-right'><button type='button' data-toggle='modal' data-target='#myModal_as_".$y."' onClick='$('#myModal_as_".$y."').modal()' >View Assignment</button>&nbsp;&nbsp;&nbsp;<button type='button' data-toggle='modal' data-target='#myModal_a_".$y."' onClick='$('#myModal_a_".$y."').modal()' >Add Score</button></span></li>";
		?>
<!-- start view modal-->
<div id="myModal_as_<?php echo $y; ?>" class="modal fade" role="dialog" style="overflow:auto;">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content" style="overflow:auto;">
      <div class="modal-header" style="overflow:auto;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center>  <h4 class="modal-title">Assignment Submission </h4><p /></center>
        <h4 class="text-warning"><?php echo $r->stud_names.' <span class="pull-right">Student N0. '.$r->student_No."</span>"; ?></h4>
      </div>

      <div class="modal-body">
      	<form class="form-horizontal">
      		<div class="form-group">
  				<label class="col-md-6">Courseunit</label>
  				<div class="col-md-6">
  					<?php echo strtoupper($r->unit_title); ?>
  				</div>
  			</div>

      		<div class="form-group">
			      <label class="col-md-6">Assignment Title</label>
			      <div class="col-md-6">
			      	<?php echo $r->assignment_title; ?>
			      </div>
  			</div>

  			<div class="form-group">
  				<label class="col-md-6">Assignment Document</label>
			      <div class="col-md-6">

			      	<a href=<?php echo $r->subass_doc; ?>><?php echo str_replace('http://localhost/FinalYearProject/assets/documents/assignments/','',$r->subass_doc); ?>&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-download"></span></a>
			      </div>
  			</div>

  			<div class="form-group">
  				<label class="col-md-6">Date Submitted</label>
  				  <div class="col-md-6">
  				  	<?php echo $r->dtime_submit; ?>
  				  </div>
  			</div>
      </div>
  		</form>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>
</div>
<!-- end modal-->
<!-- start marks modal-->
<div id="myModal_a_<?php echo $y; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center><h4 class="modal-title">Give Score on Assignment</h4><p /></center>
        <h4 class="text-warning"><?php echo $r->stud_names.' <span class="pull-right">Student N0. '.$r->student_No."</span>"; ?></h4>
      </div>

      	<div class="modal-body">
      		<form action=<?php echo $assets['base_url']."online/post_score_ass/".$id."/".$uname; ?> method="POST">
      			<div class="form-group">
      	<input type="number" name="mark_ass" id="in_r" placeholder="Type Score of Assignment" class="form-control" required>
      		</div>
      		<div class="form-group">
      		<input type="submit" value="Post Score" class="btn btn-success ">
      		</div>
   <input type="hidden" name="student_No" value=<?php echo $r->student_No; ?>>
   <input type="hidden" name="ass_ID" value=<?php echo $r->assignment_ID; ?>>
      		</form>
  		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>

    </div>

  </div>
</div>
<!-- end modal-->

	<?php	$y++; }
		echo "</ul>";
	}else{
		echo "<div class='row  alert alert-warning'>No Assignment submissions so far...</div>";
 	}
 }
					?>

						</div>
					</div>
				</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>
