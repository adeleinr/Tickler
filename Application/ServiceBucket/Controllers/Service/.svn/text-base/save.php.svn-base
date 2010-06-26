<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Service/Service.class.php';

Authentication::init();

if ( Authentication::isLoggedIn($_SESSION, "CLIENT") )
{
	if (isset($_POST['BUSINESS_OPTION']))
	{
		$businessOption = $_POST['BUSINESS_OPTION'];
	
		$profile = new Profile('SERVICE');
		
		$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));
		
		$clientId = $_SESSION['CLIENT_ID'];
		
		
	}
	if (isset($_POST['SERVICE_INFO_JSON']))
	{

		$businessOption = $_POST['SERVICE_INFO_JSON'];
		
		$profile = new Profile('SERVICE');
		
		$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));
		
		$clientId = $_SESSION['CLIENT_ID'];
		
		$success = Service::saveService($businessOption, $clientId, $profile, $database);
		
		if ($success)
		{
			echo "Service Added";
		}
		else
		{	
			echo "Error saving";
		}
		
		exit;
		
	}
}

header("Location: /");

?>