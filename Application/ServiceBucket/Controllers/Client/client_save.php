<?php

require 'Uranus/Framework/Model/Database/Database.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$_POST['CLIENT_PASSWORD'] = md5(addslashes($_POST['CLIENT_PASSWORD']));

$recordId = $profile->saveData($_POST);

if ( $recordId > 0)
{
	
	header("Location: /success");
}
else
{
	header("Location: /client_add");
}



?>

