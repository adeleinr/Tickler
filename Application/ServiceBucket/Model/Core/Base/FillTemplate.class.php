<?php 
class FillTemplate
{
	
	const HEADER =  'ServiceBucket/View/ClientPresentation/HTML/Main/header.tpl.php';
	const FOOTER = 	'ServiceBucket/View/ClientPresentation/HTML/Main/footer.tpl.php';
	
	/**
	 * Fill in header and footer template
	 * Will also fill in the dynamic parts
	 * of the template for the pages
	 * 
	 * @param Array $template
	 * @param Array $session
	 * @param String $profileName
	 * 
	 */
	static function fill(&$template, &$session)
	{
		
		//Header
		$templateHeader = new Template(self::HEADER);
		if( isset($session['CLIENT_USERNAME']) )
		{
			$templateHeader->parse('USERNAME',$session['CLIENT_USERNAME']);
		}
		else if( isset($session['PROVIDER_USERNAME']) )
		{
			$templateHeader->parse('USERNAME',$session['PROVIDER_USERNAME']);
		}
		else
		{
			$templateHeader->parse('USERNAME',"");
		}
		
		$header = $templateHeader->output(True);
		$template->parse("HEADER",$header);
		
		//Footer
		$templateFooter = new Template(self::FOOTER);
		$footer = $templateFooter->output(True);
		$template->parse("FOOTER",$footer);
		
	}
	
	
	
}

?>