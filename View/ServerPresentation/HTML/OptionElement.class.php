<?php

/**
  * Class for creating HTML radio and checkbox elements
  *
  */
class OptionElement extends HTMLElement 
{
	public $type = "radio";
	public $newLine = true;
	private $attributes	= Array();
	private $elements = Array();
	
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
	  * Adds custom attributes to the HTML radio or checkbox element
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
	public function addElement($id, $value, $text, $checked) 
	{
		$this->elements[$id] = Array();
		$this->elements[$id]['value'] = $value;
		$this->elements[$id]['text'] = $text;
		$this->elements[$id]['checked'] = $checked;
	}
	
	/**
	  * Renders HTML radio or checkbox element
	  *	
	  * @return String
	  *
	  */
	public function render()
	{
		
		$content = "";
				
		foreach ($this->elements as $id => $data) 
		{
			$content .= " <input type='" . $this->type . "' ";
			
			$content .= parent::render();
			
			$content .= "id='$id' ";
			
			$content .= "value='" . str_replace("'", "&#39;", $data['value']) . "' ";
			
			if ( $data['checked'] ) 
			{
				
				$content .= "checked='checked' ";
			}
			
			if (count($this->attributes) > 0) 
			{
				foreach ($this->attributes as $tag => $value) 
				{
					$content .= "$tag='$value' ";
				}
			}
			
			if( $this->newLine)
			{	
				$content .= " />" . $data['text'] . "<br />\n";				
			}
			else
			{
				$content .= " />" . $data['text'] . "\n";
			}
		}
		
		return $content;
	}
}

?>