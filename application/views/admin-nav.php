<ul class="nav nav-tabs">
	<li class="active"><a href='<?php echo $assets["base_url"]."online/admin/$id/$uname"; ?>'><span class="glyphicon glyphicon-cog"></span><?php if(isset($uname)) echo $uname;?></a></li>
	<li><a href='<?php echo $assets["base_url"]."online/registerLecturer/$id/$uname"; ?>'><i class="glyphicon glyphicon-user"></i>Register Lecturer</a></li>
	<li><a href='<?php echo $assets["base_url"]."online/registerStudent/$id/$uname"; ?>'><i class="glyphicon glyphicon-user"></i>Register Student</a></li>
	<li><a href='<?php echo $assets["base_url"]."online/registerAdmin/$id/$uname"; ?>'><i class="glyphicon glyphicon-cog"></i>Register Admin</a></li>
	<li><a href='<?php echo $assets["base_url"]."online/view_all/$id/$uname"; ?>'><i class="fa fa-registered"></i>View</a></li>
	<li class="pull-right"><a href='<?php echo $assets["base_url"]."online/logout"; ?>'><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
</ul>
