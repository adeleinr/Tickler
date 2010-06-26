<?php

// Common Base
require 'Uranus/Framework/Model/Config/Config.class.php';
require 'Uranus/Framework/Model/Database/Database.class.php';
require 'Uranus/Framework/Model/Template/Template.class.php';
require 'Uranus/Framework/Model/Locale/Locale.class.php';
require 'Uranus/Framework/Model/Profile/Profile.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';
require 'ServiceBucket/Model/Core/Bucket/Bucket.class.php';
require 'ServiceBucket/Model/Core/Client/Client.class.php';
require 'ServiceBucket/Model/Core/Base/Authentication.class.php';
require 'ServiceBucket/Model/Core/Base/FillTemplate.class.php';

$applicationId = "ServiceBucket";

Config::init("ServiceBucket/Model/Config/global.conf");

require 'ServiceBucket/Model/Locale/' . Config::get("LOCALE") . '.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$action = $_GET['action'];

switch ($action)
{
	case 'search':
		include 'ServiceBucket/Controllers/Bucket/bucket_search.php';
	break;
}

?>