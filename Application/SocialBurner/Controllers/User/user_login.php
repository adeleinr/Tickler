<?php

require 'Uranus/Model/Database/Database.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('SocialBurner/View/ClientPresentation/HTML/User/user_login.tpl.php');

Authentication::init();

if( Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /user_profile");
	exit;
}

if ( isset($_POST['USER_EMAIL']) && isset($_POST['USER_PASSWORD']) )
{ 
	$username = $_POST['USER_EMAIL'];
	$password = $_POST['USER_PASSWORD'];
	$profileName = $profile->profileMetadata['PROFILE_NAME'];
	
	Authentication::init();
	
	$userId = Authentication::login($username, $password, $_SESSION, $profileName, $database);
	
	if( $userId > 0 )
	{
		header("Location: /user_profile");
	    exit;		
	}
	else
	{
		header("Location: /user_login");
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
