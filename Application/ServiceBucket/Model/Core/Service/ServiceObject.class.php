<?php 

class ServiceObject
{
	private $id;
	private $name;
	private $url;
	private $address;
	private $city;
	private $state;
	private $phone;
	private $providerId;
	
	/**
	 *  Creates a Service obj
	 *
	 * @param String $id
	 * @param String $className
	 *
	 */
	function __construct($id, $name, $phone, $city, $state, $url, $address="", $providerId="") 
	{
		$this->id = $id;
		$this->name = $name;
		$this->phone = $phone;
		$this->city = $city;
		$this->state = $state;
		
		//Defaults
		$this->url = $url;
		$this->address = $address;
		$this->providerId = $providerId;
	}
	
	/**
	  * Renders the Service
	  *
	  * @return	String
	  *
	  */
	public function render($profile)
	{
		$businessValue = "<div id='service'>";
		if (!empty($this->name))
		{
			$businessValue .= $this->name . "<br/> ";
		}
		
		if (!empty($this->phone))
		{
			$businessValue .= $this->phone . "<br/> ";
		}
		
		if (!empty($this->city))
		{
			$businessValue .= $this->city . "<br/> ";
		}
		
		if (!empty($this->state))
		{
			$businessValue .= $this->state . "<br/> ";
		}
		
		if (!empty($this->url))
		{
			$businessValue .= $this->url . "<br/> ";
		}
		
		if (!empty($this->address))
		{
			$businessValue .= $this->address. "<br/> ";
		}
		
		$businessValue .="</div>"
		
	}
	
	
	
}



?>