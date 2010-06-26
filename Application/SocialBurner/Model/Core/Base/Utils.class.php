<?php

class Utils
{

	static function createJSON($object)
	{
		$jsonObj = '{';
		foreach ($object as $fieldName => $fieldData) 
		{
			$jsonObj .='"'.$fieldName.'":"'.$fieldData.'", ';
			
		}
		
		$jsonObj .="}";
		
		return $jsonObj;
		
	}


}

?>