
<?php include("header.php"); ?>
<!-- Include the above in your HEAD tag ---------->
<center><?php if(isset($msg))echo $msg  ?></center>
<!-- BEGIN # BOOTSNIP INFO -->
<div class="container">
	<div class="row" style="padding-top:100px;">
    <span >
		<h1 class="text-center">WELCOME</h1>
    <p style="padding-top:40px;">
      <blockquote>
This is a Learning Platform  integrated set of interactive online services that provides the teachers, learners, parents and others involved in education with information, tools and resources to support and enhance educational delivery and assessment
</blockquote>
    </p>
    <br />
    Click Below to Login<br />
        <p class="text-center"><a href="#" class="btn btn-primary btn-lg" data-backdrop='static' role="button" data-toggle="modal" data-target="#login-modal">Enter System</a></p>
      </span>
  </div>
</div>
<!-- END # BOOTSNIP INFO -->

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    	<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="<?php echo $assets['image'].'logo_ols.png'; ?>">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>

                <!-- Begin # DIV Form -->
                <div id="div-forms">

                    <!-- Begin # Login Form -->
                    <form id="login-form" action='<?php echo $assets['base_url'].'online/login_student'; ?>' method="post">
		                <div class="modal-body">
				    		<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your Student Number  and password.</span>
                            </div>
				    		<input id="login_username" class="form-control" type="number" name="studentNo" placeholder="Student Number" required>
				    		<input id="login_password" class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" checked> Remember me
                                </label>
                            </div>
        		    	</div>
				        <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                            </div>
				    	    <div>

                                <button id="login_register_btn" type="button" class="btn btn-link" ><i class='glyphicon glyphicon-hand-right'></i>&nbsp;Staff Login</button>
                  </div>
				        </div>
                    </form>
                    <!-- End # Login Form -->

<script type="text/javascript">
  $(document).ready(function(){
    $("#login_register_btn").click(function(){
      $("#login-form").hide();
      $("#register-form").show();
    });
    $("#register_login_btn").click(function (){
      $("#login-form").show();
      $("#register-form").hide();
    });
  });
</script>

                    <!-- Begin | Register Form -->
                    <form id="register-form" style="display:none;" action='<?php echo $assets['base_url'].'online/login'; ?>' method="post">
            		    <div class="modal-body">
		    				<div id="div-register-msg">
                                <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-register-msg">Staff Login.</span>
                </div>
                            <input id="register_email" class="form-control" type="email"  name="email" placeholder="E-Mail" required>
                            <input id="register_password" class="form-control" type="password" name="password" placeholder="Password" required>
            			</div>
		    		    <div class="modal-footer">
                            <div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                            </div>
                            <div>
                                <button id="register_login_btn" type="button" class="btn btn-link"><i class='glyphicon glyphicon-hand-right'></i>&nbsp;Student Log In</button>
                            </div>
		    		    </div>
                    </form>
                    <!-- End | Register Form -->

                </div>
                <!-- End # DIV Form -->

			</div>
		</div>
	</div>
    <!-- END # MODAL LOGIN -->
