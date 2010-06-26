<?php

class Service
{		
	const URL = "http://query.yahooapis.com/v1/public/yql?";
	
	const YQL = "SELECT 
				 	* 
				 FROM
				 	local.search
				 WHERE
				 	zip='00000' AND";
	
	const format = "xml";
	
	
	const YELP_URL = "http://query.yahooapis.com/v1/public/yql?";
	
	const YELP_YWSID = "Y-im63nd71w8yb6DtTNm5A";
	 	
	const YELP_FORMAT = "xml";
	
	const YELP_YQL = "SELECT 
				 	* 
				 FROM
				 	yelp.review.search
				 WHERE ";
	
	/**
	 * Search a service
	 * 
	 * @param String $serviceName
	 * @param String $api
	 * @return Array
	 * 
	 */
	static function search($serviceName)
	{
		$businessData = Array();
		$counter = 0;
		$finalURL = self::URL . "q=" . urlencode(self::YQL . " query='$serviceName'") ."&format=" . urlencode(self::format);
		
		$simpleXml = simplexml_load_file($finalURL);
	
		
		foreach ($simpleXml->results->Result as $business)
		{
			$businessData[$counter] = Array();
			$businessData[$counter]['SERVICE_NAME'] = (String)$business->Title;
			$businessData[$counter]['SERVICE_URL'] = (String)$business->BusinessUrl;
			$businessData[$counter]['SERVICE_CITY'] = (String)$business->City;
			$businessData[$counter]['SERVICE_STATE'] = (String)$business->State;
			$businessData[$counter]['SERVICE_PHONE'] = (String)$business->Phone;
			$counter++;
		}
			
		return $businessData;
	}
	
	/**
	 * Search a service
	 * 
	 * @param String $serviceName
	 * @param String $api
	 * @return Array
	 * 
	 */
	static function searchYelp($serviceName, $serviceLocation)
	{
		$finalURL = self::URL . "q=" . 
					urlencode(self::YELP_YQL . " term='$serviceName'"."AND location='$serviceLocation' AND ywsid='".self::YELP_YWSID."'")."&format=" . urlencode(self::YELP_FORMAT)."&env=".urlencode("http://datatables.org/alltables.env");
				
		$simpleXml = simplexml_load_file($finalURL);

		$businessData = Array();
	
		$counter = 0;
		foreach ($simpleXml->results->businesses as $business)
		{

			$businessData[$counter] = Array();
			$businessData[$counter]['SERVICE_NAME'] = addslashes((String)$business->name);
			$businessData[$counter]['SERVICE_ADDRESS'] = addslashes((String)$business->address1);
			$businessData[$counter]['SERVICE_CITY'] = addslashes((String)$business->city);
			$businessData[$counter]['SERVICE_STATE'] = addslashes((String)$business->state_code);
			$businessData[$counter]['SERVICE_ZIPCODE'] = addslashes((String)$business->zip);
			$businessData[$counter]['SERVICE_PHONE'] = addslashes((String)$business->phone);
			
			$businessData[$counter]['SERVICE_IMAGE_URL'] = (String)$business->photo_url;
			$businessData[$counter]['SERVICE_REVIEW_URL'] = (String)$business->url;
			$businessData[$counter]['SERVICE_REVIEW_COUNT'] = (String)$business->review_count;
			//$businessData[$counter]['SERVICE_URL'] = (String)$business->url;
			$businessData[$counter]['SERVICE_RATING_IMAGE_URL'] = (String)$business->rating_img_url_small;
			$counter++;
		}
		
		return $businessData;
	}
	
	
	
	/**
	 * Render search result
	 * 
	 * @param String $serviceName
	 * @param Object $profile
	 * @param Object $template
	 * @return Void
	 * 
	 */
	static function renderSearchResult($serviceName, $profile, $template, $userLogIn = false)
	{
		if ($userLogIn)
		{
			$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION'] = Array();
			$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION']['TYPE'] = "OPTION";
			$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION']['DATA'] = Array();
		}
			
		$businessData = self::search($serviceName);
		
	
		if (count($businessData) > 0)
		{
			$counter = 0;
			foreach ($businessData as $business) 
			{
				$businessValue = "";
				if (!empty($business['SERVICE_NAME']))
				{
					$businessValue .= $business['SERVICE_NAME'] . ", ";
				}
				
				if (!empty($business['SERVICE_URL']))
				{
					$businessValue .= $business['SERVICE_URL'] . ", ";
				}
				if (!empty($business['SERVICE_ADDRESS']))
				{
					$businessValue .= $business['SERVICE_ADDRESS'] . ", ";
				}
				
				if (!empty($business['SERVICE_CITY']))
				{
					$businessValue .= $business['SERVICE_CITY'] . ", ";
				}
				
				if (!empty($business['SERVICE_STATE']))
				{
					$businessValue .= $business['SERVICE_STATE'] . ", ";
				}
				
				if (!empty($business['SERVICE_ZIPCODE']))
				{
					$businessValue .= $business['SERVICE_ZIPCODE'] . ", ";
				}
				
				if (!empty($business['SERVICE_PHONE']))
				{
					$businessValue .= $business['SERVICE_PHONE'] . ", ";
				}
				
				if (!empty($business['SERVICE_IMAGE_URL']))
				{
					$businessValue .= $business['SERVICE_IMAGE_URL'] . ", ";
				}
				
				if (!empty($business['SERVICE_IMAGE_URL']))
				{
					$businessValue .= $business['SERVICE_IMAGE_URL'] . ", ";
				}
				
				if (!empty($business['SERVICE_REVIEW_URL']))
				{
					$businessValue .= $business['SERVICE_REVIEW_URL'] . ", ";
				}
				
				if (!empty($business['SERVICE_RATING_IMAGE_URL']))
				{
					$businessValue .= $business['SERVICE_RATING_IMAGE_URL'] . ", ";
				}
				

			
				$businessValue = substr($businessValue, 0, strlen($businessValue) - 2);
			
				if ($userLogIn)
				{
					$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION']['DATA']["BUSINESS_OPTION_" . $counter] = Array();
					$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION']['DATA']["BUSINESS_OPTION_" . $counter]['TEXT'] = $businessValue;
					$profile->profileMetadata['DISPLAY_FIELDS']['BUSINESS_OPTION']['DATA']["BUSINESS_OPTION_" . $counter]['VALUE'] = json_encode($business);
				
				}
				else
				{
					$template->parse("BUSINESS_OPTION", "$businessValue <br />", "w+");
				}
				
				$counter++;
			}
		
			if ($userLogIn)
			{
				$profile->profileMetadata['DISPLAY_BUTTONS']['SAVE_BUTTON'] = Array();
				$profile->profileMetadata['DISPLAY_BUTTONS']['SAVE_BUTTON']['TYPE'] = 'SUBMIT'; 
				$profile->profileMetadata['DISPLAY_BUTTONS']['SAVE_BUTTON']['VALUE'] = 'Save';
				
				$template->parse('SAVE_BUTTON_ID', 'SAVE_BUTTON');
				$template->parse('SAVE_BUTTON_ACTION', $profile->profileMetadata['FORMS']['SAVE_FORM']['ACTION']);
			}
			else
			{
				$template->parse('SAVE_BUTTON', '');
				$template->parse('SAVE_BUTTON_ID', '');
				$template->parse('SAVE_BUTTON_ACTION', '');
			}
			
			$template->parse('BUSINESS_OPTION_MESSAGE', '');
			$template->parse('DISPLAY', '');
			
		}
		else
		{
			$template->parse('BUSINESS_OPTION_MESSAGE', 'No Business Found');
			$template->parse('BUSINESS_OPTION', '');
			$template->parse('SAVE_BUTTON', '');
			$template->parse('SAVE_BUTTON_ID', '');
			$template->parse('SAVE_BUTTON_ACTION', '');
		}		
	}
	
	
/**
	 * Render search result from Yelp API
	 * 
	 * @param String $serviceName
	 * @param Object $profile
	 * @param Object $template
	 * @return Void
	 * 
	 */
	static function renderThirdPartySearchResult($serviceName, $serviceLocation, $profile, $template, $userLogIn = false)
	{
			
		// Exit if no location was specified. This is required for the Yelp API
		if( !isset($serviceLocation) || empty($serviceLocation) )
		{
			$template->parse('BUSINESS_OPTION', 'You need to enter a location to search in Yelp');
			$template->parse('SAVE_BUTTON', '');
			return;
		}
		
		$businessData = self::searchYelp($serviceName, $serviceLocation);
		$businessDataToSave = Array(); // Not all the data from the API results will be saved
		
		if (count($businessData) > 0)
		{
			$counter = 0;
			$servicesPerRow = 2;
			$displayService = "<div style='float:left'><table style='width:200px;'>
						   		<tr>";
			foreach ($businessData as $business) 
			{
				
				$businessValue = "";
				$displayImage = "";
				$displayRating = "";
				$displayInfo = "";
				$displayReviewUrl = "";
				
				
				if (!empty($business['SERVICE_NAME']))
				{
					$displayInfo .= "<b>".$business['SERVICE_NAME'] . "</b><br/>";
					$businessDataToSave['SERVICE_NAME'] = addslashes($business['SERVICE_NAME']);
				}
				
				if (!empty($business['SERVICE_URL']))
				{
					// TODO Need to find a way to ge this
					$businessDataToSave['SERVICE_URL'] = '';
				}
				if (!empty($business['SERVICE_ADDRESS']))
				{
					$displayInfo .= $business['SERVICE_ADDRESS']."<br/>";
					$businessDataToSave['SERVICE_ADDRESS'] = addslashes($business['SERVICE_ADDRESS']);
				}
				
				if (!empty($business['SERVICE_CITY']))
				{
					$displayInfo .= $business['SERVICE_CITY'].", ";
					$businessDataToSave['SERVICE_CITY'] = addslashes($business['SERVICE_CITY']);
				}
				
				if (!empty($business['SERVICE_STATE']))
				{
					$displayInfo .= $business['SERVICE_STATE']."<br/>";
					$businessDataToSave['SERVICE_STATE'] = addslashes($business['SERVICE_STATE']);
				}
				
				if (!empty($business['SERVICE_ZIPCODE']))
				{
					$displayInfo .= $business['SERVICE_ZIPCODE']."<br/>";
					$businessDataToSave['SERVICE_ZIPCODE'] = $business['SERVICE_ZIPCODE'];
				}
				
				if (!empty($business['SERVICE_PHONE']))
				{
					$displayInfo .= $business['SERVICE_PHONE']."<br/>";
					$businessDataToSave['SERVICE_PHONE'] = $business['SERVICE_PHONE'];
				}
				
				if (!empty($business['SERVICE_IMAGE_URL']))
				{
					$displayImage = "<div class='span-3 last' ='service_image'>
											<img src='{$business['SERVICE_IMAGE_URL']}'/>
									</div>";
				}
				
				if (!empty($business['SERVICE_REVIEW_URL']))
				{
					$displayReviewUrl = "<a href='{$business['SERVICE_REVIEW_URL']}' />More Info on Yelp</a>";
				}
				
				
				if (!empty($business['SERVICE_RATING_IMAGE_URL']))
				{
					$displayInfo .= "<img src='{$business['SERVICE_RATING_IMAGE_URL']}' /> ({$business['SERVICE_REVIEW_COUNT']} Reviews) <br />";
				}
			
				$businessValue = substr($businessValue, 0, strlen($businessValue) - 2);
			
								
				if( $counter % $servicesPerRow == 0 )
				{
					$displayService .= "</tr><tr>";	
				}
					
				$displayService .= "<td>
										
										<div id='yelp-service_".$counter."' class='yelp-service span-10 last'>
											<div id='service-info' class='span-7' >
												$displayImage
												$displayRating
												$displayInfo
												$displayReviewUrl
											</div>
											<div id='$counter' class='span-1 last'>
												<a class='add-service' href='/'>
													<img class='add-remove-service-icon' src='/View/ClientPresentation/Images/add_smaller.png'/>
												</a>
												<div class='message'>
												</div>	   				
											</div>
											
										</div>
									</td>";
												
				// If the user is logged in he should be able to save the service.
				// So we need to include a hidden field that sends the data to the server
				if ($userLogIn)
				{
					$hiddenName = 'BUSINESS_OPTION_'.$counter;
					$hiddenServiceField = 'SERVICE_'.$counter;
					$hiddenServiceField = new InputElement($hiddenName);
					$hiddenServiceField->type = "hidden";
					// Note that here to encode ONLY some of the data received
					// from Yelp. We are not storing all the data
					// TODO Need to figure out what to do with the rest of the
					// data. Should we cache it?
					$hiddenServiceField->value = json_encode($businessDataToSave);
					$hiddenServiceMarkup = $hiddenServiceField->render();
					
					$displayService .=$hiddenServiceMarkup;
					
				}							

				$counter++;
				
			}// end foreach service
					
			$displayService .= "</tr></table></div>";
			$template->parse('BUSINESS_OPTION',$displayService,'w+');
			
			// TODO We Need to have a common interface for yahoo and yelp
			// So this save button might not be needed
			$template->parse('SAVE_BUTTON', '');
			$template->parse('SAVE_BUTTON_ID', '');
			$template->parse('SAVE_BUTTON_ACTION', '');
			
		}
		else
		{
			$template->parse('BUSINESS_OPTION', 'No Business Found');
			$template->parse('SAVE_BUTTON', '');
			$template->parse('SAVE_BUTTON_ID', '');
			$template->parse('SAVE_BUTTON_ACTION', '');
		}		
	}
	
	/**
	 * Save a service
	 * 
	 * @param String $businessOption This is a serialized JSON structure
	 * @param String $clientId
	 * @param Object $profile
	 * @return Void
	 * 
	 */
	static function save($businessOption, $clientId, $profile)
	{
		$businessData = json_decode($businessOption);
		
		$profile->saveData((Array)$businessData, false);
		
	}
	
	
	/**
	 * Save a service
	 * 
	 * @param String $businessOption This is a serialized JSON structure
	 * @param String $clientId
	 * @param Object $profile
	 * @param Object $database
	 * @return Boolean True if successfully added service
	 * 
	 */
	static function saveService($businessOption, $clientId, $profile, $database)
	{
		$businessData = json_decode($businessOption);
		
		$recordId1 = $profile->saveData((Array)$businessData, false);
			
		$sql = "INSERT INTO CLIENT_SERVICE_BUCKET VALUES ('{$clientId}','{$recordId1}', 1)";
		
		$res = $database->query($sql);
		
		$affectedRows = $database->affectedRows();
		
		return ($recordId1 > 0 && $affectedRows > 0);
					
		
	}
	
	/**
	 * Update a service
	 * 
	 * @param Array $serviceInfo
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function updateService($serviceInfo, $database)
	{
		// TODO Need to figure out a way to do with  the profile, or do cross profile data access?
		
		$queryArray = Array();
        $counter = 0;

        foreach ($serviceInfo as $parameter => $value)
        {
        	$queryArray['FIELDS'][$counter] = $parameter;

            $queryArray['VALUES'][$parameter] = "'". addslashes($value) ."'";

            $counter++;
        }
        
        $sql = "UPDATE SERVICE SET ";
        foreach ($queryArray['FIELDS'] as $parameter)
        {
        	$sql .= "$parameter = " . $queryArray['VALUES'][$parameter] . ", ";
        }

        $sql = substr($sql, 0, strlen($sql) - 2);
        $sql .= " WHERE SERVICE_ID = '" . $serviceInfo['SERVICE_ID'] . "'";

        $res = $database->query($sql);
        
	}
		
}

?>