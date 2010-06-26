<?php

require 'Uranus/Model/Database/Database.class.php';
require 'SocialBurner/Model/Core/User/User.class.php';


$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('SocialBurner/View/ClientPresentation/HTML/User/user_profile.tpl.php');

Authentication::init();

if( !Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /user_login");
	exit;
}
else
{
	$template->parse("MESSAGE","");
	
	User::renderUserFeedsSummary($_SESSION['USER_ID'], $profile, $template, $database);
	
	
	$socialCard = User::createFullCard($_SESSION['USER_ID'], $database, $template);

	
	// Lets fill out the header and footer templates
	// of the page. Needs some session information
	// passed to it
	Authentication::init();
	FillTemplate::fill($template, $_SESSION);
		
	$profile->parse($template);
	
	$template->output();
}

?>