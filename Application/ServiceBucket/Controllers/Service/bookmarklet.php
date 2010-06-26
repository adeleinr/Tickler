<?php

require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Service/bookmarklet.tpl.php');

$profile = new Profile('SERVICE');

$profile->parse($template);

$template->output();

?>