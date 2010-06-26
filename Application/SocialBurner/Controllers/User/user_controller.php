<?php

require 'Uranus/Model/Config/Config.class.php';
require 'Uranus/Model/Template/Template.class.php';
require 'Uranus/Model/Locale/Locale.class.php';
require 'Uranus/Model/Profile/Profile.class.php';
require 'Uranus/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/View/ServerPresentation/HTML/InputElement.class.php';
require 'Uranus/View/ServerPresentation/HTML/ListElement.class.php';
require 'Uranus/View/ServerPresentation/HTML/Button.class.php';
require 'SocialBurner/Model/Core/Base/Authentication.class.php';
require 'SocialBurner/Model/Core/Base/FillTemplate.class.php';

$applicationId = "SocialBurner";

Config::init("SocialBurner/Model/Config/global.conf");

include('SocialBurner/Model/Locale/' . Config::get("LOCALE") . '.php');

$profile = new Profile('USER');

$action = $_GET['action'];

switch ($action)
{
	case 'save_user':
		include 'SocialBurner/Controllers/User/user_save.php';
	break;
	case 'add_user':
		include 'SocialBurner/Controllers/User/user_add.php';
	break;
	case 'login_user':
		include 'SocialBurner/Controllers/User/user_login.php';
	break;
	case 'logout_user':
		include 'SocialBurner/Controllers/User/user_logout.php';
	break;
	case 'profile_user':
		include 'SocialBurner/Controllers/User/user_profile.php';
	break;
	
}
?>