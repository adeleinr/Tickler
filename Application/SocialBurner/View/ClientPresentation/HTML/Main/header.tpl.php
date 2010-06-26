	<div class="container">
	
		<div id="header" class="span-24 last">	 
		 	<div class="last menuModule">
		 	<? if ( !empty($USER_EMAIL) ){ ?>
			  <ul class="clearfix">
			  	<li><a href="/user_add">Home</a></li>
			  	<li><a href="/"><?=$USER_EMAIL?></a></li>
			  	<li><a href="/user_profile" >Analytics</a></li>
			  	<li><a href="/user_logout">Logout</a></li>
			  </ul>
			 <?} else {?>
			  
			  <ul class="clearfix">
			  	<li><a href="/user_add">Home</a></li>
			  	<li><a href="/user_profile" >Analytics</a></li>
			  	<li><a href="/user_login">Login</a></li>
			  </ul>
			  <?php }?>
			 </div>

			
	 	</div>
