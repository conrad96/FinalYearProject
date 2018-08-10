<?php include("header.php"); ?>
<center><?php if(isset($msg))echo $msg  ?></center>
	<div class="login" style="padding-left: 40%;padding-top: 5%;">
<div class="col-lg-6" >
	
                
       <section class="pull-right" style='border: 1px solid gray;' id="log">
       <button class='btn btn-default' onclick="disp_stud();">Students</button>
       <button class='btn btn-default pull-right' onclick="disp_staff();">Staff</button>
         <hr />
<form action='<?php echo $assets['base_url'].'online/login_student'; ?>' method="post" id='stud' >
         <div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Student Number</div>
  <input type="text" id="username3" name="studentNo" class="form-control" placeholder="Students Number" required>
  <div class="input-group-addon"><i class="fa fa-user"></i></div>
</div>
</div>  <div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Password</div>
  <input type="password" id="password3" name="password" class="form-control" placeholder="Password" required>
  <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
</div>
</div>
<div class="form-actions form-group">
<button type="submit" class="btn btn-primary btn-sm btn-lg" id="login_btn">Login</button>
</div>

</form>



            <form action='<?php echo $assets['base_url'].'online/login'; ?>' method="post" style='display: none;' id='staff'>

<div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Email</div>
  <input type="email" id="email3" name="email" class="form-control" required>
  <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
</div>
</div>
<div class="form-group">
<div class="input-group">
  <div class="input-group-addon">Password</div>
  <input type="password" id="password3" name="password" class="form-control" required>
  <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
</div>
</div>
<div class="form-actions form-group">
<button type="submit" class="btn btn-primary btn-sm btn-lg" id="login_btn">Login</button>
</div>
            </form>
            </section>
         
                    </div>

                  
       </div>
<script type="text/javascript">
  function disp_stud(){
document.getElementById("stud").style.display='block';
document.getElementById("staff").style.display='none';
  }
function disp_staff(){
document.getElementById("stud").style.display='none';
document.getElementById("staff").style.display='block';
}
</script>