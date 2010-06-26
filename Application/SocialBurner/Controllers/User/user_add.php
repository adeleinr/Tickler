<?php
require 'Uranus/Model/Database/Database.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('SocialBurner/View/ClientPresentation/HTML/User/user_add.tpl.php');


// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);

if( Authentication::isLoggedIn($_SESSION, $profile->profileMetadata['PROFILE_NAME']) )
{
	header("Location: /user_profile");
	exit;
}

$profile->parse($template);


$template->output();

?>