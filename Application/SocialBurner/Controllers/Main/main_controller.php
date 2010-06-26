<?php

$action = $_GET['action'];

switch ($action)
{
	case 'home':
		include 'SocialBurner/View/ClientPresentation/HTML/Main/index.html';
	break;
	case 'user_add':
		include 'SocialBurner/Controllers/User/user_controller.php';
	case 'profile_user':
		include 'SocialBurner/Controllers/User/user_controller.php';
	break;
	case 'proxy':
		include 'SocialBurner/Controllers/Proxy/proxy_controller.php';
	break;

}

?>