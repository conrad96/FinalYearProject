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
					<h4 class="panel-title"> Results&nbsp;&nbsp;<span><span class="badge badge-default">CW</span>&nbsp;Coursework</span>&nbsp;&nbsp;&nbsp;<span><span class="badge badge-info">AS</span>&nbsp;Assignment</span></h4>
				</div>
				<div class="panel-body" id="big_layout">
					<?php
					$sum_ass=0;
					$sum_cw=0;
if(isset($res_cw_s)){
	if(!empty($res_cw_s)){
		echo "<ul>";
		foreach($res_cw_s as $r){
			echo "<li class='list-group-item'><span class='badge pull-left'>CW</span>".$r->work_title."<span class='pull-right'>".$r->rescw_mark."</span></li>";
			$sum_cw+=($r->rescw_mark);
		}
		echo "</ul>";
	}
	if(!empty($res_ass_a)){
		if(!empty($res_ass_a)){
			echo "<ul>";
			foreach($res_ass_a as $r){
				$sum_ass+=($r->resa_mark);
				echo "<li class='list-group-item'><span class='badge badge-info pull-left'>AS</span>".$r->assignment_title."<span class='pull-right'>".$r->resa_mark."</span></li>";
			}
			echo "</ul>";
		}
	}
}
					?>
					<hr />
					<center><strong>RESULTS</strong></center>
					<ul class='list-group'>
<li class='list-group-item'>Total:<span class='pull-right'><?php echo ($sum_cw+$sum_ass) ; ?></span></li>
<li class='list-group-item'>(Total/40):<span class='pull-right'><?php echo ($sum_cw+$sum_ass)/40; ?></span></li>
<li class='list-group-item'>(Total/40)*100:<span class='pull-right'><?php echo ((($sum_cw+$sum_ass)/40)*100).' %'; ?></span></li>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4 class="panel-title">Published Handouts</h4>
			</div>
			<div class="panel-body">
				<ul class="list-group">
					<?php
if(isset($hand)){
	if(!empty($hand)){
		foreach($hand as $r){
			echo "<li class='list-group-item'>".$r->handout_title."<span class='pull-right'><a href='".$r->handout_doc."'><span class='fa fa-download'></span>Download</a>&nbsp;&nbsp;&nbsp;Published on ".$r->handout_date."</span></li>";
		}
	}else{
		echo "<div class='row alert alert-warning'>No Handouts published yet.</div>";
	}
}
					?>
				</ul>
			</div>
		</div>
	</div>

</div>
<?php include("footer.php"); ?>
