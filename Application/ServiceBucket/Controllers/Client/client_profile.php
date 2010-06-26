<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Client/Client.class.php';
require 'ServiceBucket/Model/Core/Bucket/Bucket.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Client/client_profile.tpl.php');

Authentication::init();

if( !Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /client_login");
	exit;
}
else
{
	$template->parse("MESSAGE","");
	if ( isset($_GET['change_bucket']) )
	{
		if( isset ($_POST['BUCKET_ID']) && isset ($_POST['BUCKET_NAME']) && isset($_SESSION['CLIENT_ID']) )
		{
			Bucket::changeBucket($_POST['BUCKET_ID'], ucfirst($_POST['BUCKET_NAME']), $_SESSION['CLIENT_ID'], $template, $database);
		}
	}
	
	Client::renderSearchByClientIdResult($_SESSION['CLIENT_ID'], $profile, $template, $database);
	
	// Lets fill out the header and footer templates
	// of the page. Needs some session information
	// passed to it
	Authentication::init();
	FillTemplate::fill($template, $_SESSION);
		
	$profile->parse($template);
	
	$template->output();
}

?>