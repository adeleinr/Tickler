<?php

require 'Uranus/Model/Database/Database.class.php';
require 'SocialBurner/Model/Core/Proxy/Feed.class.php';
require 'SocialBurner/Model/Core/Proxy/Proxy.class.php';

$database = new Database(Config::get("HOSTNAME"), Config::get("USERNAME"), Config::get("PASSWORD"), Config::get("DATABASE"));


// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();

$fid = $_GET['fid'];

$feedURL = Feed::getFeedURL($fid, $database);

$didRecordClick = Proxy::recordClick($fid, $database);

header("Location: $feedURL");

?> 
