<?php

/**
  * Class for creating HTML textarea elements
  *
  */
class Textarea extends HTMLElement 
{
	public $cols;
	public $rows;
	public $value;
	private $attributes	= Array();
	
	/**
	  * Sets HTML option element attributes
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
	  * Adds custom attributes to the HTML textarea element
	  *
	  * @param	String	$tag
	  * @param	String	$value
	  * @return	void
	  *
	  */
	public function addAttribute($tag, $value) 
	{
		$this->attributes[$tag] = $value;
	}
	
	/**
	  * Renders HTML textarea element
	  *	
	  * @return String
	  *
	  */
	public function render() 
	{
		$content = "";
		
		$content .= "<textarea ";
		
		$content .= parent::render();
	
		if (!empty($this->cols)) 
		{
			$content .= "cols='" . $this->cols . "' ";
		}
		
		if (!empty($this->rows)) 
		{
			$content .= "rows='" . $this->rows . "' ";
		}
		
		if (count($this->attributes) > 0) 
		{
			foreach ($this->attributes as $tag => $value) 
			{
				$content .= "$tag='$value' ";
			}
		}
		
		$content .= ">";
		
		if (!empty($this->value)) 
		{
			$content .= $this->value;
		}
		
		$content .= "</textarea>\n";
		
		return $content;
	}
}

?>
