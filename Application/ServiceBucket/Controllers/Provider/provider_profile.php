<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Provider/Event.class.php';

Authentication::init();

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Provider/provider_profile.tpl.php');

if( !Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /provider_login");
	exit;
}
else
{
	$template->parse("MESSAGE","");
	if ( isset($_GET['save_event']) )
	{
		if( isset($_POST['EVENT_NAME']) && isset($_POST['EVENT_DESCRIPTION']) )
		{
			Event::saveEvent($_POST, $_SESSION['PROVIDER_ID'], $template, $database);
		}

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