<?php

/**
  * Class for creating HTML dropdown and list elements
  *
  */
class ListElement extends HTMLElement 
{
	public	$multiple = false;
	private $elements = Array();
	private $selectedElements = Array();
	private $attributes	= Array();
	
	/**
	  * Sets HTML button element attributes
	  *
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
	  * Adds custom attributes to the HTML dropdown or list element
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
	  * Adds items to the HTML dropdown or list element
	  *
	  * @param String $value
	  * @param String $text
	  * @return	void
	  *
	  */
	public function addElement($value, $text) 
	{
		$this->elements[$value] = $text;	
	}

	/**
	  * Adds selected items to the HTML dropdown or list element
	  *
	  * @param String $tag
	  * @param String $value
	  * @return	void
	  *
	  */
	public function selectElement($value) 
	{
		$this->selectedElements[$value] = $value;
	}
	
	/**
	  * Checks if the items is selected
	  *
	  * @param	String	$value
	  * @return	Boolean
	  *
	  */
	private function isSelected($value) 
	{
		foreach ($this->selectedElements as $key => $text) 
		{
			if ($key === $value) 
			{
				return true;
			}
		}
		return false;
	}
	
	/**
	  * Renders HTML dropdown or list element
	  *	
	  * @return String
	  *
	  */
	public function render() 
	{
		$content = "";
		
		if ($this->multiple === true) 
		{
			$content .= "<select multiple='multiple' ";
		} 
		else 
		
		{
			$content .= "<select ";
		}
		
		$content .= parent::render();
		
		if (count($this->attributes) > 0) 
		{
			foreach ($this->attributes as $tag => $value) 
			{
				$content .= "$tag='$value' ";
			}
		}
		
		$content .= ">\n";

		$content .= "<option value=''></option>\n";
		
		foreach ($this->elements as $value => $text) 
		{
			$content .= "<option " . ($this->isSelected($value) ? "selected='selected'" : "") . " value='$value' >$text</option>\n";
		}
		
		$content .= "</select>\n";
		
		return $content;
	}
	
}

?>