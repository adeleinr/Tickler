<?php

require 'Uranus/Framework/Model/Database/Database.class.php';

Authentication::init();

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Provider/provider_login.tpl.php');

if ( isset($_POST['PROVIDER_USERNAME']) && isset($_POST['PROVIDER_PASSWORD']) )
{ 

	$username = $_POST['PROVIDER_USERNAME'];
	$password = $_POST['PROVIDER_PASSWORD'];
	$profileName = $profile->profileMetadata['PROFILE_NAME'];
	
	$userId = Authentication::login($username, $password, $_SESSION, $profileName, $database);
	
	if( $userId > 0 )
	{
		header("Location: /provider_profile");
	    exit;		
	}
	else
	{
		header("Location: /provider_login");
	    exit;
	}
}

// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);

$profile->parse($template);

$template->output();

?>