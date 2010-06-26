<?php
require 'Uranus/Framework/Model/Database/Database.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Client/client_add.tpl.php');


// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);


$profile->parse($template);

$template->output();

?>