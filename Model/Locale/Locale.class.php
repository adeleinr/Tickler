<?php

/**
  * Class for managing locales
  *
  */
class Locale 
{
	/**
	  * @param $key
	  * @return mixed
	  * 
	  */
	static public function get($key) 
	{
		global $locale;
		
		if ($locale[$key]) 
		{
			return $locale[$key];
		}
		else
		{
			return false;
		}
	}
}

?>
