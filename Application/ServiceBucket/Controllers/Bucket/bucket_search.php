<?php

$template = new Template('ServiceBucket/View/ClientPresentation/HTML/Bucket/bucket_search.tpl.php');


$profile = new Profile("BUCKET");
$template->parse("SERVICE_LIST", "");

if(isset($_POST['KEYWORD']))
{
	$keyword = addslashes($_POST['KEYWORD']);
	if (isset($keyword))
	{
		Bucket::renderSearchByBucketNameResult($keyword, $profile, $template, $database);
	}
}

// Lets fill out the header and footer templates
// of the page. Needs some session information
// passed to it
Authentication::init();
FillTemplate::fill($template, $_SESSION);


$profile->parse($template);
$template->output();


?>