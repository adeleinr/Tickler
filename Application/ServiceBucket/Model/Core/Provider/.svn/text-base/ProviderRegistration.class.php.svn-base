<?php

require 'ServiceBucket/Model/Core/Service/ServiceSearch.class.php';
require 'ServiceBucket/Model/Core/Service/Service.class.php';

class ProviderRegistration
{		
	/**
	 * Load existing provider data into profile
	 * for editing
	 * @param Array $serviceData
	 * @param Object $profile
	 * 
	 */
	static function loadExistingDataIntoProfile($serviceOption, $profile)
	{
		$serviceData = (Array)json_decode($serviceOption);
		
		// TODO The services pages need to get ALL the info about a service from YQL. Orlando needs to modify this.
		
		if ( isset($serviceData['SERVICE_NAME']) )
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['PROVIDER_BUSINESS_NAME']['VALUE'] = $serviceData['SERVICE_NAME'];
		}
		if ( isset($serviceData['SERVICE_CITY']) )
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['PROVIDER_CITY']['VALUE'] = $serviceData['SERVICE_CITY'];
		}
		if ( isset($serviceData['SERVICE_STATE']) )
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['PROVIDER_STATE']['VALUE'] = $serviceData['SERVICE_STATE'];
		}
		if ( isset($serviceData['SERVICE_PHONE']) )
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['PROVIDER_PHONE']['VALUE'] = $serviceData['SERVICE_PHONE'];
		}
		if ( isset($serviceData['SERVICE_URL']) )
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['PROVIDER_URL']['VALUE'] = $serviceData['SERVICE_URL'];
		}	
	}

	/**
	 * Search a service by name
	 * and return structured list
	 * @param String $service Name
	 * @return Array
	 * 
	 */
	static function formatServiceSearchsByName($serviceName, $database)
	{
		$serviceData = Array();
		$serviceRes = ServiceSearch::ServiceSearchsByServiceName($serviceName,$database);
					
		while ($serviceRow = $database->fetchRow($serviceRes))
		{
			$serviceId = $serviceRow['SERVICE_ID'];
			$serviceData[$serviceId]['SERVICE_NAME'] = $serviceRow['SERVICE_NAME'];
			$serviceData[$serviceId]['SERVICE_URL'] = $serviceRow['SERVICE_URL'];
			$serviceData[$serviceId]['SERVICE_PHONE'] = $serviceRow['SERVICE_PHONE'];

		} // end iterating over services	
		
		return $serviceData;
	}

	/**
	 * Render search result
	 * 
	 * @param String $serviceName
	 * @param Object $profile
	 * @param Object $template
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function renderSearchByServiceNameResult($serviceName, $profile, $template, $database)
	{
		$serviceData = self::formatServiceSearchsByName($serviceName,$database);
		
		$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION'] = Array();
		$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION']['TYPE'] = "OPTION";
		$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION']['DATA'] = Array();
		
		if (count($serviceData) > 0)
		{
			$template->parse("SERVICE_OPTION_MESSAGE", "Select Your Service From the List");
			$counter = 0;
			foreach ($serviceData as $business) 
			{
				$businessValue = "";

				$businessValue .= $business['SERVICE_ID'] . ", ";

				if (!empty($business['SERVICE_NAME']))
				{
					$businessValue .= $business['SERVICE_NAME'] . ", ";
				}
				
				if (!empty($business['SERVICE_URL']))
				{
					$businessValue .= $business['SERVICE_URL'] . ", ";
				}
				
				if (!empty($business['SERVICE_CITY']))
				{
					$businessValue .= $business['SERVICE_CITY'] . ", ";
				}
				
				if (!empty($business['SERVICE_STATE']))
				{
					$businessValue .= $business['SERVICE_STATE'] . ", ";
				}
				
				if (!empty($business['SERVICE_PHONE']))
				{
					$businessValue .= $business['SERVICE_PHONE'] . ", ";
				}
			
				$businessValue = substr($businessValue, 0, strlen($businessValue) - 2);
			
				$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION']['DATA']["SERVICE_OPTION_" . $counter] = Array();
				$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION']['DATA']["SERVICE_OPTION_" . $counter]['TEXT'] = $businessValue;
				$profile->profileMetadata['DISPLAY_FIELDS']['SERVICE_OPTION']['DATA']["SERVICE_OPTION_" . $counter]['VALUE'] = json_encode($business);
				
				$counter++;
			}
		
			$profile->profileMetadata['DISPLAY_BUTTONS']['EDIT_BUTTON'] = Array();
			$profile->profileMetadata['DISPLAY_BUTTONS']['EDIT_BUTTON']['TYPE'] = 'SUBMIT'; 
			$profile->profileMetadata['DISPLAY_BUTTONS']['EDIT_BUTTON']['VALUE'] = 'Edit'; 
			$profile->profileMetadata['DISPLAY_BUTTONS']['EDIT_BUTTON']['ACTION'] = '/provider_add';
			
			
		}
		else
		{
			$template->parse("SERVICE_OPTION_MESSAGE", "No Business Found");
			$template->parse("EDIT_BUTTON", "");
		}		
	}

	/**
	 * Save provider information (and service)
	 * 
	 * @param String $businessOption This is a serialized JSON structure
	 * @param String $clientId
	 * @param Object $profile
	 * @return Void
	 * 
	 */
	static function saveService($serviceInfo, $profile, $database)
	{
		// TODO: This is not working
		
		Service::updateService($serviceInfo. $database);
		$recordId = $profile->saveData((Array)$serviceInfo, false);
	}
	
}

?>