<?php

require 'Uranus/Framework/Model/Config/Config.class.php';
require 'Uranus/Framework/Model/Template/Template.class.php';
require 'Uranus/Framework/Model/Locale/Locale.class.php';
require 'Uranus/Framework/Model/Profile/Profile.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/OptionElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/ListElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Textarea.class.php';
require 'ServiceBucket/Model/Core/Base/Authentication.class.php';
require 'ServiceBucket/Model/Core/Base/FillTemplate.class.php';

$applicationId = "ServiceBucket";

Config::init("ServiceBucket/Model/Config/global.conf");

include('ServiceBucket/Model/Locale/' . Config::get("LOCALE") . '.php');

$profile = new Profile("PROVIDER");

$action = $_GET['action'];

switch ($action)
{
	case 'save_provider':
		include 'ServiceBucket/Controllers/Provider/provider_save.php';
	break;
	case 'check_provider':
		include 'ServiceBucket/Controllers/Provider/provider_check.php';
	break;
	case 'add_provider':
		include 'ServiceBucket/Controllers/Provider/provider_add.php';
	break;
	case 'login_provider':
		 include 'ServiceBucket/Controllers/Provider/provider_login.php';
	break;
	case 'logout_provider':
		include 'ServiceBucket/Controllers/Provider/provider_logout.php';
	break;
	case 'profile_provider':
		 include 'ServiceBucket/Controllers/Provider/provider_profile.php';
	break;
	case 'event_save':
		 include 'ServiceBucket/Controllers/Provider/provider_event_save.php';
	break;
}

?>