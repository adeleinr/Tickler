<?php

class Bucket
{		
	/**
	 * Search a service by Bucket Name
	 * 
	 * @param String $bucketName 
	 * @param Object $database
	 * @return Object $res (there could be multiple buckets with the same name
	 * 				  so this res has an entry per bucket with that name)
	 * 
	 */
	static function searchBucketsByBucketName($bucketName,$database)
	{
		
		$sql = "SELECT  * from BUCKET where BUCKET_NAME =  '{$bucketName}'";
		$res = $database->query($sql);
		return $res;
	}
	
	/**
	 * Search a service by Bucket Name
	 * among the buckets of a client
	 * 
	 * @param String $bucketName 
	 * @param String $clientId
	 * @param Object $database
	 * @return Object $res (there should be at most one bucket)
	 * 
	 */
	static function searchClientBucketsByBucketName($bucketName, $clientId, $database)
	{
		$bucketId = 0;
		$sql = "SELECT
					BUCKET_ID
				FROM
					BUCKET
				WHERE
					BUCKET_NAME = '{$bucketName}'";

		$res = $database->query($sql);
		if (  $bucketRow = $database->fetchRow($res)	)
		{
			$bucketId = $bucketRow['BUCKET_ID'];
			$sql = "SELECT
					DISTINCT(BUCKET_ID)
				FROM
					CLIENT_SERVICE_BUCKET
				WHERE
					BUCKET_ID = {$bucketId}
				AND CLIENT_ID = {$clientId}";
			$res = $database->query($sql);
		}

		return $res;

		
		$res = $database->query($sql);
		return $res;
	}
	
	/**
	 * Search a service
	 * 
	 * @param String $keyword (bucket name)
	 * @param Object $database
	 * @return Array
	 * 
	 */
	static function searchServices($keyword, $database)
	{
		$serviceData = Array();

		$bucketRes = ServiceSearch::searchBucketsByBucketName($keyword, $database);
		
		// All the buckets of the client
		while ($bucketRow = $database->fetchRow($bucketRes))
		{
			// Get bucket info
			$bucketId=$bucketRow['BUCKET_ID'];
			$bucketInfoRes = ServiceSearch::searchBucketsByBucketId($bucketId, $database);
			$bucketInfoRow = $database->fetchRow($bucketInfoRes);
			$bucketName = $bucketInfoRow['BUCKET_NAME'];
			$serviceData[$bucketId] = Array();
						
			// Get Services info
			$clientServiceRes = ServiceSearch::ServiceSearchsByBucketId($bucketId, $database);
			
			while ($clientServicesRow = $database->fetchRow($clientServiceRes))
			{				
				$serviceId = $clientServicesRow['SERVICE_ID'];				
				$serviceRes = ServiceSearch::ServiceSearchsByServiceId($serviceId, $database);
				$serviceData[$bucketId][$serviceId] = Array();
	
				while ($serviceRow = $database->fetchRow($serviceRes))
				{
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
	 * @param String $keyword
	 * @param Object $profile
	 * @param Object $template
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function renderSearchByBucketNameResult($keyword, $profile, $template, $database)
	{
		$serviceData = self::searchServices($keyword,$database);
		
		$template->parse("SERVICE_LIST", "<h2>Bucket Search Results for: \"" . $keyword . "\"</h2>");

		if ( count($serviceData) > 0 )
		{	
			foreach ($serviceData as $buckets) 
			{
				$count = 0;
				foreach ($buckets as $service) 
				{
					$bucketName = $service['BUCKET_NAME'];
					
					if($count == 0)
					{
						$template->parse("SERVICE_LIST", "<tr><td><h3>".$service['BUCKET_NAME']."</h3></td></tr>","w+");
						$count++;
					}
					
					$template->parse("SERVICE_LIST", "<tr><td>&nbsp; &nbsp; &nbsp; " . $service['SERVICE_NAME'] . "</td></tr>", "w+");
					$template->parse("SERVICE_LIST", "<tr><td>&nbsp; &nbsp; &nbsp; <a href=" . $service['SERVICE_URL'] . ">" . $service['SERVICE_URL'] . "</a></td></tr>", "w+");
					$template->parse("SERVICE_LIST", "<tr><td>&nbsp; &nbsp; &nbsp; " . $service['SERVICE_PHONE'] . "</td></tr>", "w+");
				}
			}
		}
		else
		{
			$template->parse("SERVICE_LIST", "No Business Found","w+");
		}	
	}
	
	
	/**
	 * Change a group of services to a new Bucket.
	 * If the old bucket is the default one then
	 * 1) Create a new bucket with the given name in BUCKET table
	 * 2) Change bucket id in the relation table
	 * 	  else if old bucket is not default
	 * 1) Change bucket id in the relation table
	 * 2) Change bucket name in the bucket table
	 * 
	 * @param String $oldBucketId
	 * @param String $newBucketName
	 * @param String $clientId
	 * @param Object $database
	 * 
	 */
	static function changeBucket ($oldBucketId, $newBucketName, $clientId, $template, $database)
	{

		if ( empty($newBucketName) )
		{
			return;	
		}
		// See if there is a bucket with that name already
		$bucketId = 0;
		$bucketIdRes = self::searchClientBucketsByBucketName($newBucketName, $clientId, $database);
		$bucketIdRow = $database->fetchRow($bucketIdRes);	
		$bucketId = $bucketIdRow['BUCKET_ID'];
		
		// If the bucket already exists AND
		// we are not changing from a default bucket name
		// then errors
		if( $bucketId > 0 && $oldBucketId != 1 && strtolower($newBucketName) != strtolower('Untagged'))
		{
			// A bucket already exists with that name
			$template->parse("MESSAGE","Oops, you already have a bucket with that name");
			return;
			
		}
		
		// Changing from a default bucket
		if( $oldBucketId == 1)
		{
			// If a bucket does not exists with that name
			// we need to create a new Bucket
			if( $bucketId <= 0)
			{
				// Create a new bucket
				$sql = "INSERT INTO
							BUCKET
							(CLIENT_ID, BUCKET_NAME)
						VALUES
						('$clientId','$newBucketName')"; 
				$res = $database->query($sql);
				$bucketId = $database->getLastId();
			
			}
			
		}
		// Changing from a NON default bucket
		else
		{			
			// If user is trying to change the name to
			// untagged (default) again then we will
			// keep the bucket name around but will move the
			// services to the untagged (default) bucket
			// Otherwise we update de bucket name here
			if ( strtolower($newBucketName) == strtolower('Untagged') )
			{
				$bucketId = 1;
			}
			else
			{
				// We just change the name of the bucket
				$sql = "UPDATE
							BUCKET
						SET 
							BUCKET_NAME = '$newBucketName'
						WHERE
							BUCKET_ID = $oldBucketId";
				$bucketId = $oldBucketId;
				
				$res = $database->query($sql);	

			}			
	
		}

		// Move all the services to the 
		// new assigned bucket which could be
		// an exising bucket or a new one
		$sql = "UPDATE
					CLIENT_SERVICE_BUCKET
				SET 
					BUCKET_ID = $bucketId
				WHERE
					CLIENT_ID = $clientId
				AND
					BUCKET_ID = $oldBucketId";
		
		$res = $database->query($sql);
		
		$template->parse("MESSAGE","");
		
	}
	
	
	
}

?>