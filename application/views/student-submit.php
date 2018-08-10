<?php include("stud-head.php"); ?>
<div class="container-fluid">
	<div class="row" style="padding-top: 10px;">
		<div class="col-md-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Published Coursework</h4>
				</div>
				<div class="panel-body" id="cw_panel">
					<ul class="list-group">
						<?php
if(isset($cw)){
	if(!empty($cw)){
	foreach($cw as $r){
		echo "<li class='list-group-item'>".$r->work_title."<span class='pull-right'><a href='".$r->work_document."'><span class='fa fa-download'></span>Download</a>&nbsp;&nbsp;&nbsp;".$r->work_deadline."</span></li>";
	}
	}else{
		echo "<div class='row alert alert-warning'>No Coursework published yet.</div>";
	}

}
						?>
					</ul>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Published Assignments</h4>
				</div>
				<div class="panel-body" id="ass_panel">
					<?php
if(isset($ass)){
	if(!empty($ass)){
		foreach($ass as $r){
		echo "<li class='list-group-item'>".$r->assignment_title."<span class='pull-right'><a href='".$r->assignment_document."'><span class='fa fa-download'></span>Download</a>&nbsp;&nbsp;&nbsp;".$r->assignment_deadline."</span></li>";
	}
	}else{
		echo "<div class='row alert alert-warning'>No Assignments published yet.</div>";
	}

}
						?>
				</div>
			</div>
		</div>
		 <div class="col-md-7">
		 	<div class="panel panel-default">
		 		<div class="panel-heading">
		 			<h4 class="panel-title">Coursework Submission</h4>
		 		</div>
		 		<div class="panel-body" id="big_layout">
		 	<form action=<?php echo $assets['base_url'].'online/cw_submit_s/'.$id.'/'.$uname; ?> method="POST" class='form-horizontal' enctype='multipart/form-data'>
		 		<div class="form-group">
		 			<label class="col-md-4">Coursework</label>
		 			<div class="col-md-7">
		 				<select name="work_ID" class="form-control">
		 			<option selected disabled>--choose coursework--</option>
		 				<?php
if(isset($cw)){
	if(!empty($cw)){
		$lec_ID=0;
		foreach($cw as $r){
			echo "<option value='".$r->work_ID."'>".$r->work_title."</option>";
			$lec_ID=$r->lec_ID;
		}
		echo "<input type='hidden' value='".$lec_ID."' name='lec_ID' />";
	}else{
			echo "<input type='hidden' value='0' name='lec_ID' />";
			echo "<option>Empty no coursework's published</option>";
	}
}
		 				?>
		 				</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-md-4"><span class='fa fa-upload'></span>&nbsp;&nbsp;&nbsp;Upload Document</label>
		 			<div class="col-md-7">
		 				<input type="file" name="doc" class="form-control">
		 			</div>
		 		</div>

		 		<div class="form-group">
		 			<label class="col-md-4">&nbsp;</label>
		 			<div class="col-md-7">
		 				<input type="submit" value="Upload Coursework" class='btn btn-success'>
		 			</div>
		 		</div>

		 	</form>
		 	<hr />
		 	<form action=<?php echo $assets['base_url'].'online/ass_submit/'.$id.'/'.$uname; ?> method="POST" class='form-horizontal' enctype='multipart/form-data'>
		 		<div class="form-group">
		 			<label class="col-md-4">Assignment</label>
		 			<div class="col-md-7">
		 				<select name="work_ID" class="form-control">
		 			<option selected disabled>--choose assignment--</option>
		 			<?php
if(isset($ass)){
	if(!empty($ass)){
		$lec_ID_ass=0;
		foreach($ass as $r){
			echo "<option value='".$r->assignment_ID."'>".$r->assignment_title."</option>";
			$lec_ID_ass=$r->lec_ID;
		}
		echo "<input type='hidden' value='".$lec_ID_ass."' name='lec_ID_ass' />";
	}else{
		echo "<option>Empty no coursework's published</option>";
	}
}
		 				?>
		 				</select>
		 			</div>
		 		</div>
		 		<div class="form-group">
		 			<label class="col-md-4"><span class='fa fa-upload'></span>&nbsp;&nbsp;&nbsp;Upload Document</label>
		 			<div class="col-md-7">
		 				<input type="file" name="doc" class="form-control">
		 			</div>
		 		</div>
		 		<input type="hidden" name="lec_ID">
		 		<div class="form-group">
		 			<label class="col-md-4">&nbsp;</label>
		 			<div class="col-md-7">
		 				<input type="submit" value="Upload Assignment" class='btn btn-success'>
		 			</div>
		 		</div>
		 	</form>
		 		</div>
		 	</div>
		 </div>
	</div>
</div>
<?php include("footer.php"); ?>
