<?php

require 'Uranus/Framework/Model/Config/Config.class.php';
require 'Uranus/Framework/Model/Template/Template.class.php';
require 'Uranus/Framework/Model/Locale/Locale.class.php';
require 'Uranus/Framework/Model/Profile/Profile.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/ListElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';
require 'ServiceBucket/Model/Core/Base/Authentication.class.php';
require 'ServiceBucket/Model/Core/Base/FillTemplate.class.php';

$applicationId = "ServiceBucket";

Config::init("ServiceBucket/Model/Config/global.conf");

include('ServiceBucket/Model/Locale/' . Config::get("LOCALE") . '.php');

$profile = new Profile('CLIENT');

$action = $_GET['action'];

switch ($action)
{
	case 'save_client':
		include 'ServiceBucket/Controllers/Client/client_save.php';
	break;
	case 'add_client':
		include 'ServiceBucket/Controllers/Client/client_add.php';
	break;
	case 'login_client':
		include 'ServiceBucket/Controllers/Client/client_login.php';
	break;
	case 'logout_client':
		include 'ServiceBucket/Controllers/Client/client_logout.php';
	break;
	case 'profile_client':
		include 'ServiceBucket/Controllers/Client/client_profile.php';
	break;
	case 'change_bucket':
		include 'ServiceBucket/Controllers/Client/client_bucket_change.php';
	break;
}

?>