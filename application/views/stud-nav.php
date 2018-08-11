<ul class="nav nav-tabs">
	<li class="active">
<a href='<?php echo $assets["base_url"]."online/student/$id/$uname"; ?>' onclick='home();'><span class="fa fa-graduation-cap">&nbsp;</span><?php if(isset($uname)) echo $uname;?></a>
	</li>
	<li>
		<a href='<?php echo $assets["base_url"]."online/stud_submit/$id/$uname"; ?>' ><span class="fa fa-paper-plane"></span>&nbsp;&nbsp;Submit</a>
	</li>
	<li>
		<a href='<?php echo $assets["base_url"]."online/stud_profile/$id/$uname"; ?>' ><span class="fa fa-user"></span>&nbsp;&nbsp;Profile</a>
	</li>
	<li class="pull-right"><a href='<?php echo $assets["base_url"]."online/logout"; ?>'><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
</ul>
