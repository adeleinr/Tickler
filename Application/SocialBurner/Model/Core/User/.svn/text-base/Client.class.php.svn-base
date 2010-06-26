<?php

require 'ServiceBucket/Model/Core/Service/ServiceSearch.class.php';

class Client
{		
	
	CONST debug = FALSE;
	
	
	/**
	 * Search client name
	 * 
	 * @param String $clientId
	 * @return String $clientName
	 * 
	 */
	static function searchClientName($clientId, $database)
	{
		$sql = "SELECT
					*
				FROM
					CLIENT
				WHERE
					CLIENT_ID =  '{$clientId}'";
		$res = $database->query($sql);
		
		if ( $nameRow = $database->fetchRow($res) )
		{
			
			return $nameRow['CLIENT_NAME'];
		}
			
		return "";
	}
	/**
	 * Search a service
	 * 
	 * @param String $clientId
	 * @return Array
	 * 
	 */
	static function searchServices($clientId, $database)
	{
		$serviceData = Array();
		$bucketRes = ServiceSearch::searchBucketIdsByClientId($clientId, $database);
		
		// All the buckets of the client
		while ( $bucketRow = $database->fetchRow($bucketRes) )
		{
			// Get bucket info
			$bucketId=$bucketRow['BUCKET_ID'];
			$bucketInfoRes = ServiceSearch::searchBucketsByBucketId($bucketId,$database);
			$bucketInfoRow = $database->fetchRow($bucketInfoRes);
			$bucketName = $bucketInfoRow['BUCKET_NAME'];
			$serviceData[$bucketId] = Array();
			
			// Get Services info
			$clientServiceRes = ServiceSearch::ServiceSearchsByBucketId($bucketId,$database);

			while ( $clientServicesRow = $database->fetchRow($clientServiceRes) )
			{				
				$serviceId = $clientServicesRow['SERVICE_ID'];				
				$serviceRes = ServiceSearch::ServiceSearchsByServiceId($serviceId,$database);		
				$serviceData[$bucketId][$serviceId] = Array();

				while ($serviceRow = $database->fetchRow($serviceRes))
				{
					$serviceData[$bucketId][$serviceId]['BUCKET_ID'] = $bucketId;
					$serviceData[$bucketId][$serviceId]['BUCKET_NAME'] = $bucketName;
					$serviceData[$bucketId][$serviceId]['SERVICE_NAME'] = $serviceRow['SERVICE_NAME'];
					$serviceData[$bucketId][$serviceId]['SERVICE_URL'] = $serviceRow['SERVICE_URL'];
					$serviceData[$bucketId][$serviceId]['SERVICE_PHONE'] = $serviceRow['SERVICE_PHONE'];

				} // end iterating over services	
			} // end iterating over service ids
		} // end iterating over buckets

		return $serviceData;
	}
	
	/**
	 * Render search result
	 * 
	 * @param String $clientId
	 * @param Object $profile
	 * @param Object $template
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function renderSearchByClientIdResult($clientId, $profile, $template, $database)
	{
		$serviceData = self::searchServices($clientId, $database);

		
		if (count($serviceData) > 0)
		{
			foreach ($serviceData as $serviceArray) 
			{		
				if(self::debug)
				{
					print_r($serviceArray);
					echo "<br><br>";
				}
				$counter = 0;
				
				foreach ($serviceArray as $service)
				{
					$bucketName = $service['BUCKET_NAME'];

					if ($counter == 0)
					{
						$formName = 'BUCKET_' . $service['BUCKET_ID'] . '_CHANGE_FORM';
						$formAction = '/client_profile?change_bucket';
					
						$fieldName = 'BUCKET_NAME';
						$inputField = new InputElement($fieldName);
						$inputField->type = "text";
						$inputFieldMarkup = $inputField->render();
						
						$buttonName = 'BUTTON_' . $service['BUCKET_ID'];
						$buttonField = new Button($buttonName);
						$buttonField->type = "submit";
						$buttonField->value = "Change Bucket";
						$buttonFieldMarkup = $buttonField->render();
						
						$hiddenName = 'BUCKET_ID';
						$hiddenBucketIdField = 'HIDDEN_' . $service['BUCKET_ID'];
						$hiddenBucketIdField = new InputElement($hiddenName);
						$hiddenBucketIdField->type = "hidden";
						$hiddenBucketIdField->value = $service['BUCKET_ID'];
						$hiddenBucketIdMarkup = $hiddenBucketIdField->render();

						$serviceForm = "
							<form class='serviceBucket' id='$fieldName' action='$formAction' method='POST'>
								<div id='fieldContainer'>
									<div>
										<label for='$fieldName'>
											{$service['BUCKET_NAME']}
										</label>
										$inputFieldMarkup
										$buttonFieldMarkup
										$hiddenBucketIdMarkup
									</div>
								</div>
							</form>
						";
						
						$template->parse("SERVICE_LIST", $serviceForm, "w+");
					}
					
					$serviceList = "";
					$serviceList .= "<div id='{$bucketName}_SERVICE_$counter' class='service'>\n";
					
					$serviceList .= "<div class='title'>\n";
					
					$serviceList .= "{$service['SERVICE_NAME']} <br />\n";
					
					if ( $service['SERVICE_URL'] != "" )
					{
						$serviceList .= "<a href='{$service['SERVICE_URL']}'>{$service['SERVICE_URL']}</a> <br />\n";
					}
					
					if ( $service['SERVICE_PHONE'] != "" )
					{
						$serviceList .= "{$service['SERVICE_PHONE']} <br />\n";
					}

					$serviceList .= "</div>\n";
					
					$serviceList .= "<div class='events'></div>\n";
					
					$serviceList .= "</div>\n";
					
					$template->parse("SERVICE_LIST", $serviceList, "w+");
					
					$counter++;
				}
			}
		}
		else
		{
			$template->parse("SERVICE_LIST", "No Business Found <br /><br />");
			$template->parse("SERVICE_LIST", "<a href='http://service_bucket' >Go back</a>", "w+");
		}	
	}
	
}

?>