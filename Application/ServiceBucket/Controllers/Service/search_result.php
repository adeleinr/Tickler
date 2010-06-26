<?php

require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/OptionElement.class.php';
require 'ServiceBucket/Model/Core/Service/Service.class.php';

Authentication::init();

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Service/search_result.tpl.php');

if (isset($_POST['SERVICE_NAME']))
{	
	if( Authentication::isLoggedIn($_SESSION, "CLIENT") ) // Client can search and add services because it is logged in
	{
		
		$profile = new Profile("SERVICE");
		$serviceName = addslashes($_POST['SERVICE_NAME']);
		if( isset($_POST['API']) )
		{
			if( strtolower($_POST['API']) == "yelp" )
			{
					
				$serviceLocation = addslashes($_POST['SERVICE_LOCATION']);
				Service::renderThirdPartySearchResult($_POST['SERVICE_NAME'], $serviceLocation, $profile, $template, true);
			}	
			else if( strtolower($_POST['API']) == "yahoo")		
			{
				Service::renderSearchResult($serviceName, $profile, $template, true);
			}
			
		}

		
	}
	else // Client can just search services because it is logged out
	{
		$serviceName = addslashes($_POST['SERVICE_NAME']);
		
		$profile = new Profile("SERVICE");
		
		Service::renderSearchResult($serviceName, $profile, $template);
	}
	
	// Lets fill out the header and footer templates
	// of the page. Needs some session information
	// passed to it
	Authentication::init();
	FillTemplate::fill($template, $_SESSION);
	
	$profile->parse($template);
	
	$template->output();
}
else
{
	header("Location: /search");
}

?>