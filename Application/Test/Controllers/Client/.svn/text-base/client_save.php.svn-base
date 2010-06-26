<?php

include 'Uranus/Model/Config/Config.class.php';
include 'Uranus/Model/Database/Database.class.php';
include 'Uranus/Model/Template/Template.class.php';
include 'Uranus/Model/Locale/Locale.class.php';
include 'Uranus/Model/Profile/Profile.class.php';
include 'Uranus/View/ServerPresentation/HTML/HTMLElement.class.php';
include 'Uranus/View/ServerPresentation/HTML/InputElement.class.php';
include 'Uranus/View/ServerPresentation/HTML/Button.class.php';
include 'Uranus/View/ServerPresentation/HTML/OptionElement.class.php';
include 'Uranus/View/ServerPresentation/HTML/ListElement.class.php';

$applicationId = "Test";

Config::init("Test/Model/Config/global.conf");

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));

Config::init("Test/Model/Config/global.conf");

include('Test/Model/Locale/' . Config::get("LOCALE") . '.php');

$template = new Template('Test/View/ClientPresentation/HTML/Client/client.tpl.php');

$profile = new Profile("CLIENT");

$profile->saveData($_POST);

$profile->parse($template);

$template->output();

?>