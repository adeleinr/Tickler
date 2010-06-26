<?php 

Authentication::init();

Authentication::logout($profile->profileMetadata['PROFILE_NAME']);	

header("Location: /client_login");

?>