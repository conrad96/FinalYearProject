<ul class="nav nav-tabs">
	<li class="active">
<a href='<?php echo $assets["base_url"]."online/lecturer/$id/$uname"; ?>' onclick='home();'><span class="glyphicon glyphicon-book">&nbsp;</span><?php if(isset($uname)) echo $uname;?></a>
	</li>
	<li>
		<a href=<?php echo $assets['base_url']."online/lec_view_submission/".$id.'/'.$uname; ?> ><span class="fa fa-book">&nbsp;&nbsp;&nbsp;Submissions</span></a>
	</li>
	<li>
		<a href=<?php echo $assets['base_url']."online/lec_view_stud/".$id.'/'.$uname; ?> ><span class="fa fa-group">&nbsp;&nbsp;&nbsp;Students</span></a>
	</li>
	
	<li>
		<a href=<?php echo $assets['base_url']."online/lec_profile/".$id.'/'.$uname; ?> ><span class="fa fa-user">&nbsp;&nbsp;&nbsp;Profile</span></a>
	</li>
	<li class="pull-right"><a href='<?php echo $assets["base_url"]."online/logout"; ?>'><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
</ul>