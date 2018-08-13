<?php include("header.php"); ?>
<?php include("admin-nav.php"); ?>
<div class="container-fluid">
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">REGISTERED LECTURERS</h3>
</div>
<div class="panel-body" style="height: 500px;overflow:auto;">
<?php
if(isset($lecs)){
  if(!empty($lecs)){
    foreach($lecs as $r){
      echo "
<div class='col-md-3'>
<img src='".$r->lec_photo."' class='img-thumbnail img-responsive' alt='".$r->lec_names."'/><p />
<ul class='list-group'>
<li class='list-group-item'>Names:<span class='pull-right'>".$r->lec_names."</span></li>
<li class='list-group-item'>Username:<span class='pull-right'>".$r->lec_uname."</span></li>
<li class='list-group-item'>Email:<span class='pull-right'>".$r->lec_email."</span></li>
<li class='list-group-item'>Department:<span class='pull-right'>".$r->dept_name."</span></li>
<li class='list-group-item'>Biography:<span class='pull-right'>".$r->lec_bio."</span></li>
</ul>
</div>
      ";
    }
  }else{
    echo "<div class='row alert alert-warning'><center>No Lecturers Registered yet...</center></div>";
  }
}
?>
</div>
</div>
<hr />
<div class="panel panel-default">
<div class="panel-heading">
<h3 class="panel-title">REGISTERED STUDENTS</h3>
</div>
<div class="panel-body" style="height: 500px;overflow:auto;">
  <?php
  if(isset($studs)){
    if(!empty($studs)){
  foreach($studs as $r){
    echo "
<div class='col-md-3'>
<img src='".$r->stud_photo."' class='img-thumbnail img-responsive' alt='".$r->stud_names."'/><p />
<ul class='list-group'>
<li class='list-group-item'>Names:<span class='pull-right'>".$r->stud_names."</span></li>
<li class='list-group-item'>Student Number:<span class='pull-right'>".$r->student_No."</span></li>
<li class='list-group-item'>Email:<span class='pull-right'>".$r->stud_email."</span></li>
<li class='list-group-item'>Course:<span class=''><h4 style='font-size:15px;'>".($r->course_title)."</h4></span></li>
</ul>
</div>
    ";
  }
    }else{
      echo "<div class='row alert alert-warning'><center>No Students Registered yet...</center></div>";
    }
  }
  ?>
</div>
</div>
</div>
<?php include("footer.php"); ?>
