<?php

require 'Uranus/Framework/View/ServerPresentation/HTML/OptionElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/HTMLElement.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/Button.class.php';
require 'Uranus/Framework/View/ServerPresentation/HTML/InputElement.class.php';

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Service/search.tpl.php');


// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);
		
$profile->parse($template);

$template->output();

?>