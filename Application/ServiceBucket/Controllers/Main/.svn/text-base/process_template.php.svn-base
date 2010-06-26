<?php 

function process_template($template)
{
	
	//Header
	$templateHeader = new Template('ServiceBucket/View/ClientPresentation/HTML/Main/header.tpl.php');
	$header = $templateHeader->output(True);
	$template->parse("HEADER",$header);
	
	//Footer
	$templateFooter = new Template('ServiceBucket/View/ClientPresentation/HTML/Main/footer.tpl.php');
	$footer = $templateFooter->output(True);
	$template->parse("FOOTER",$footer);
	
}




?>