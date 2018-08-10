<?php include("lec-head.php"); ?>

<div class="container-fluid">
	<div class="area">
		<?php 
if(isset($profile)){
	if(!empty($profile)){
		foreach($profile as $r){
			?>
			<div class="col-md-6" style="padding-left: 50px;">
	 <ul class="list-group">
<li class="list-group-item "> <img src='<?php echo $r->lec_photo;?>' class='img-thumbnail' style='width:250px;height:210px;' ></li>
<li class="list-group-item">Names: <span class="pull-right"><?php echo $r->lec_names; ?></span></li>
<li class="list-group-item">Username: <span class="pull-right"><?php echo $r->lec_uname; ?></span></li>
<li class="list-group-item">Email: <span class="pull-right"><?php echo $r->lec_email; ?></span></li>
<li class="list-group-item">Biography: <span class="pull-right"><?php echo $r->lec_bio; ?></span></li>
<li class="list-group-item">Department: <span class="pull-right"><?php echo $r->dept_ID; ?></span></li>
<li class="list-group-item">Password: <span class="pull-right"><?php
 $str=strlen($r->lec_password);
 for($i=0;$i<=$str;$i++)echo '*';
 ?></span></li>
	 </ul>
<p />
<button type='button' data-toggle='modal' data-target='#myModal' onClick='$('#myModal').modal()' class='btn  btn-info'>Click Here to change Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="fa fa-hand-o-left"></span></button>

      </div>
		<?php }
	}
}
		?>
	
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      <center>  <h4 class="modal-title">EDIT PASSWORD  </h4><p /></center>
       
      </div>
       
      <div class="modal-body">
      	<form action=<?php echo $assets['base_url']."online/edit_lec_pwd/".$id."/".$uname.""; ?> method="POST">
      		<div class="form-group">
      			<input type="password" name="password" placeholder="New Password" id="in_r">
      		</div>
      		<div class="form-group">
      			<input type="password" name="cpassword" placeholder="Confirm  Password" require id="in_r"> 
      		</div>
      		<div class="form-group">
      			<input type="submit" value="Change password" class="btn btn-success" >
      		</div>
      	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>
	  
    </div>

  </div>
</div>	
	</div>
</div>
<?php include("footer.php"); ?>