<?php

require 'Uranus/Framework/Model/Config/Config.class.php';
require 'Uranus/Framework/Model/Template/Template.class.php';
require 'Uranus/Framework/Model/Locale/Locale.class.php';
require 'Uranus/Framework/Model/Profile/Profile.class.php';
require 'ServiceBucket/Model/Core/Base/Authentication.class.php';
require 'ServiceBucket/Model/Core/Base/FillTemplate.class.php';

$applicationId = "ServiceBucket";

Config::init("ServiceBucket/Model/Config/global.conf");

require 'ServiceBucket/Model/Locale/' . Config::get("LOCALE") . '.php';

$profile = new Profile("SERVICE");

$action = $_GET['action'];

switch ($action)
{
	case 'search':
		include 'ServiceBucket/Controllers/Service/search.php';
	break;
	
	case 'search_result':
		include 'ServiceBucket/Controllers/Service/search_result.php';
	break;
	
	case 'save':
		include 'ServiceBucket/Controllers/Service/save.php';
	break;
	
	case 'bookmarklet':
		include 'ServiceBucket/Controllers/Service/bookmarklet.php';
	break;	
	case 'search_yelp':
		include 'ServiceBucket/Controllers/Service/search_yelp.php';
	break;
}

?>