<?php

require 'Uranus/Framework/Model/Database/Database.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Client/client_login.tpl.php');

Authentication::init();

if( Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /client_profile");
	exit;
}

if ( isset($_POST['CLIENT_USERNAME']) && isset($_POST['CLIENT_PASSWORD']) )
{ 
	$username = $_POST['CLIENT_USERNAME'];
	$password = $_POST['CLIENT_PASSWORD'];
	$profileName = $profile->profileMetadata['PROFILE_NAME'];
	
	Authentication::init();
	
	$userId = Authentication::login($username, $password, $_SESSION, $profileName, $database);
	
	if( $userId > 0 )
	{
		header("Location: /client_profile");
	    exit;		
	}
	else
	{
		header("Location: /client_login");
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
