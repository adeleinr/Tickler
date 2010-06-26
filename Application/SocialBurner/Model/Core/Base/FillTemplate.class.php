<?php 
class FillTemplate
{
	
	const HEADER =  'SocialBurner/View/ClientPresentation/HTML/Main/header.tpl.php';
	const FOOTER = 	'SocialBurner/View/ClientPresentation/HTML/Main/footer.tpl.php';
	
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
		if( isset($session['USER_EMAIL']) )
		{
			$templateHeader->parse('USER_EMAIL',$session['USER_EMAIL']);
		}
		else
		{
			$templateHeader->parse('USER_EMAIL',"");
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