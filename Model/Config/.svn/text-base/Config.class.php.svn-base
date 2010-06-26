<?

class Config 
{
	/**
	 * Init global configuration
	 *
	 * @param String $filePath
	 * @return Void
	 * 
	 */
	public static function init($filePath) 
	{
		global $applicationId;
		
		if (extension_loaded('apc') && !self::get(strtoupper($applicationId) . '_APC'))
		{
			$fileDescriptor = fopen($filePath, "r", true);
			if ($fileDescriptor)
			{
				$fileStat = fstat($fileDescriptor);
				$configContent = fread($fileDescriptor, $fileStat['size']);
				fclose($fileDescriptor);
				$configRecords = explode("\n", $configContent);
										
				foreach ($configRecords as $record) 
				{
					if (trim($record) != "") 
					{
						$values = explode("=", $record);
						Config::put(strtoupper($applicationId) . '_' . strtoupper($values[0]), trim($values[1]));
					}
				}
			}
			else	
			{
				die("<b>FATAL ERROR</b>: Configuration cannot be read.");
			}
		}
	}
	
	/**
	 * Cache field in shared memory
	 *
	 * @param String $field
	 * @param String $value
	 * @return Void
	 * 
	 */
	public static function put($field, $value)
	{
		if (extension_loaded('apc'))
		{
			apc_store($field, $value);
		}
		else
		{
			return false;
		}
	}
	
	/**
	 * Get field from shared memory
	 *
	 * @param String $field
	 * @return String
	 * 
	 */
	public static function get($field)
	{
		global $applicationId;
		
		if (extension_loaded('apc'))
		{
			return apc_fetch(strtoupper($applicationId) . "_" . $field);
		}
		else
		{
			return false;
		}
	}	
}

?>