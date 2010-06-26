<?php

/**
  * Class for creating HTML input elements
  *
  */
class InputElement extends HTMLElement 
{
	public $type = "text";
	public $value = "";
	public $required = false;
	public $inputFormat = "";
	private $attributes	= Array();
	
	/**
	  * Sets HTML input element attributes
	  * 
	  * @param String $name
	  * @param String $id
	  * @param String $className
	  *
	  */
	function __construct($name, $id = "", $className = "") 
	{
		if (empty($id))
		{
			$id = $name;
		}
		
		parent::__construct($name, $id, $className);
	}
	
	/**
	  * Adds custom attributes to the HTML input element
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
	  * Renders HTML input element
	  *	
	  * @return String
	  *
	  */
	public function render() 
	{
		$content = "";
		
		$content .= "<input type='" . $this->type . "' ";

		$content .= parent::render();
		
		if (!empty($this->value)) 
		{
			$content .= "value='" . str_replace("'", "&#39;", $this->value) . "' ";
		}
		
		if (count($this->attributes) > 0) 
		{
			foreach ($this->attributes as $tag => $value) 
			{
				$content .= "$tag='$value' ";
			}
		}
		
		$content .= " />\n";
		
		return $content;
	}
}

?>