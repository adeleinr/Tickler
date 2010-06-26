<?php
Authentication::init();

Authentication::logout($_SESSION,$profile->profileMetadata['PROFILE_NAME']);	

header("Location: /provider_login");	

?>