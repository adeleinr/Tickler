<?php

require 'Uranus/Framework/Model/Database/Database.class.php';
require 'ServiceBucket/Model/Core/Service/ServiceSearch.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$_POST['PROVIDER_PASSWORD'] = md5(addslashes($_POST['PROVIDER_PASSWORD']));

$profile->saveData($_POST, false);

header("Location: /provider_login");

?>