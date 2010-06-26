<?php

/**
 * This class handles the separation of the application business logic from its presentation. 
 *
 */
class Template 
{
	private $includeFile = "";
	private $tags = Array();
	
	/**
	  * Construct template object
	  *
	  * @param	String	$filePath
	  *
	  */
	function __construct($filePath) 
	{
		$this->includeFile = $filePath;
	}
	
	/**
	  * Store template placeholder
	  *	 
	  * @param	String	$tag
	  * @param	String	$value
	  * @param	String	$method	'w' (replacing) | 'w+' (appending)
	  * @return	Void
	  *
	  */
	public function parse($tag, $value, $method = 'w') 
	{
		if ($method == 'w') 
		{
			$this->tags[$tag] = $value;
		} 
		elseif ($method == 'w+') 
		{
			(isset($this->tags[$tag])) ? $this->tags[$tag] .= $value : $this->tags[$tag] = $value;
		} 
		else 
		{
			die("Method $method is not valid. Use 'w' for replacing, 'w+' for appending");
		}
	}
	
	/**
	  * Replace each template placeholders to render final presentation
	  *
	  * @param	Boolean	$buffer
	  * @return	Mixed 
	  *
	  */
	public function output($buffer = false)
	{
		$tagKeys = array_keys($this->tags);
		for ($i = 0, $length = count($tagKeys); $i < $length; ++$i)
		{
			${$tagKeys[$i]} = $this->tags[$tagKeys[$i]];
		}

		if ($buffer) {
			ob_start();
			include($this->includeFile);
			$bufferContent = ob_get_contents();
			ob_end_clean();
			return $bufferContent;
		} else {
			include($this->includeFile);
		}
	}
  
}

?>