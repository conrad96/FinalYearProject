<?php include("lec-head.php"); ?>
<div class="container-fluid">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Students Offering your Courseunit</h3>
		</div>
		<div class="panel-body">
			<ul class="col-sm-6 list-group">
				<?php 
if(isset($studs)){
	if(!empty($studs)){
		$i=0;
		foreach($studs as $r){
			echo "<li class='list-group-item'>".$r->stud_names."<span class='pull-right'><button type='button' data-toggle='modal' data-target='#myModal_".$i."' onClick='$('#myModal').modal()' >View Profile</button></span></li>";
			//start modal ?>
<div id="myModal_<?php echo $i; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center>  <h4 class="modal-title">STUDENT PROFILE </h4><p /></center>
        <h4 class="text-warning"><?php echo $r->stud_names; ?></h4>
      </div>
       
      <div class="modal-body">
      	<form class="form-horizontal">
      		<div class="form-group">
        <label class="col-md-3">Student Photo</label>
        <div class="col-md-5">
        	<img src=<?php echo $r->stud_photo;?> class='img-thumbnail pull-right' style='width:250px;height:210px;' />
        </div>	 
    </div>
    	<div class="form-group">
        <label class="col-md-3">Student Number</label>	 
        <div class="col-md-5">
        	<?php echo $r->student_No; ?>
        </div>
        	</div>
        	<div class="form-group">
         <label class="col-md-3">Names</label>
         <div class="col-md-5">
        	<?php echo $r->stud_names; ?>
        </div>
         	</div>
         	<div class="form-group"> 
         <label class="col-md-3">Email</label>	 
         <div class="col-md-5">
        	<?php echo $r->stud_email; ?>
        </div>
     </div>
         	<div class="form-group">
         <label class="col-md-3">Course</label>
         <div class="col-md-9">
        	<?php echo $r->course_title; ?>
        </div>	 
     </div>
     </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
	  
    </div>

  </div>
</div>	
<style type="text/css">
	label {
		text-transform: uppercase;
	}
</style>

			<?php //end modal
	$i++;	}
	}else{
		echo "<div class='row alert alert-warning'>No Students Are Offering your Courseunits</div>";
	}
}
				?>
			</ul>
		</div>
	</div>
</div>
<?php include("footer.php"); ?>