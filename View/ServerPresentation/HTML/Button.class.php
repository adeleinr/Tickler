<?php

/**
  * Class for creating HTML button elements
  *
  */
class Button extends HTMLElement
{
	public $type = "submit";
	public $value = "";
	private $attributes	= Array();
	
	/**
	  * Sets HTML button element attributes
	  *
	  * @param String $id
	  * @param String $className
	  *
	  */ 
	function __construct($id, $className = "") 
	{
		parent::__construct(null, $id, $className);
	}
	
	/**
	  * Adds custom attributes to the HTML button element
	  *
	  * @param String $tag
	  * @param String $value
	  * @return	void
	  *
	  */
	public function addAttribute($tag, $value) 
	{
		$this->attributes[$tag] = $value;
	}
	
	/**
	  * Renders HTML button element
	  *	
	  * @return String
	  *
	  */
	public function render() 
	{
		$content = "";
		
		$content .= "<button ";
		
		if (!empty($this->type)) 
		{
			$content .= "type='{$this->type}' ";
		}
		
		if (!empty($this->className)) 
		{
			$content .= "class='{$this->className}' ";
		}
		
		$content .= parent::render();
	
		if (count($this->attributes) > 0) 
		{
			foreach ($this->attributes as $tag => $value) 
			{
				$content .= "$tag='$value' ";
			}
		}
		
		if (!empty($this->value)) 
		{
			$content .= ">" . $this->value;
		}
		
		$content .= "</button>\n";
		
		return $content;
	}
}

?>