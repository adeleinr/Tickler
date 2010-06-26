<?php

require 'Uranus/Model/Database/Database.class.php';
require 'SocialBurner/Model/Core/User/User.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('SocialBurner/View/ClientPresentation/HTML/User/user_save.tpl.php');


// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);

if ( isset($_POST['USER_EMAIL']) && isset($_POST['USER_PASSWORD']) )
{

	$unencryptedPass = $_POST['USER_PASSWORD'];
	
	$_POST['USER_PASSWORD'] = md5(addslashes($_POST['USER_PASSWORD']));
	
	$recordId = $profile->saveData($_POST, false);
	
	$profile->getData($recordId);


	if ( $recordId > 0)
	{
	
		Authentication::init();
	 
		$username = $_POST['USER_EMAIL'];
		$password = $unencryptedPass;
		$profileName = $profile->profileMetadata['PROFILE_NAME'];
				
		$userId = Authentication::login($username, $password, $_SESSION, $profileName, $database);
		
		if( $userId > 0 )
		{
			$socialCard =  User::renderAndCreateSimpleCard($_POST, $recordId, $database, $template);
	  	
		}
  
	}else{
		
		$template->parse("SOCIALCARD", "", "w+");
		
	}
}
else
{
	header("Location: /user_add");
	
	//$template->parse("SOCIALCARD", "", "w+");
}

$profile->parse($template);
			
$template->output();

?>

