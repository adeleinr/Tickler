<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Provider/ProviderRegistration.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Provider/provider_add.tpl.php');

if (isset($_POST['SERVICE_OPTION']))
{
	$businessOption = $_POST['SERVICE_OPTION'];
	
	$profile = new Profile('PROVIDER');
	
	$clientId = $_SESSION['CLIENT_ID'];
	
	ProviderRegistration::loadExistingDataIntoProfile($_POST['SERVICE_OPTION'],$profile);
	
	//Service::saveService($businessOption, $clientId, $profile, $database);
}

// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);

$profile->parse($template);

$template->output();

?>