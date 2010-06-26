<?php 

Authentication::init();

Authentication::logout($profile->profileMetadata['PROFILE_NAME']);	

header("Location: /user_login");

?>