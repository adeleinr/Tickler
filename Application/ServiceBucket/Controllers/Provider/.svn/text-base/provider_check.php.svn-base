<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Provider/ProviderRegistration.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Provider/provider_check.tpl.php');

$serviceName = $_POST['SERVICE_NAME'];

$template->parse("SERVICE_LIST", "");

if( isset($_POST['PROVIDER_BUSINESS_NAME']) )
{
	$serviceName = $_POST['PROVIDER_BUSINESS_NAME'];
	ProviderRegistration::renderSearchByServiceNameResult($serviceName, $profile, $template, $database);
}

// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);

$profile->parse($template);

$template->output();

?>