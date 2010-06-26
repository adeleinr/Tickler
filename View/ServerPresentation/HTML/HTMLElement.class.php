<?php

/**
  * Class for creating the HTML element base attributes
  *
  */
class HTMLElement
{
	private $id;
	private $name;
	private $className;
	
	/**
	  * Sets the HTML element base
	  *
	  * @param String $id
	  * @param String $className
	  *
	  */
	function __construct($name, $id, $className = "") 
	{
		$this->name = $name;
		$this->id = $id;
		$this->className = $className;
	}
	
	/**
	  * Renders the HTML element
	  *
	  * @return	String
	  *
	  */
	public function render()
	{
		$content = "";
		
		if (!empty($this->id)) 
		{
			$content .=  "id='" . $this->id . "' ";
		}
		
		if (!empty($this->name)) 
		{
			$content .=  "name='" . $this->name . "' ";
		}
		
		if (!empty($this->className)) 
		{
			$content .= "class='" . $this->className . "' ";
		}
		
		return $content;
	}
}

?>