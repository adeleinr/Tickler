<?php

class ServiceSearch
{		
	
	/**
	 * Search a service by ServiceId
	 * 
	 * @param String $serviceId 
	 * @param Object $database
	 * @return Object $res (should return one record)
	 * 
	 */
	static function ServiceSearchsByServiceId($serviceId,$database)
	{
		
		$sql = "SELECT
					*
				FROM
					SERVICE
				WHERE
					SERVICE_ID =  '{$serviceId}'";
		$res = $database->query($sql);
		
		return $res;
	}
	
	/**
	 * Search a service by Service Name
	 * 
	 * @param String $service name 
	 * @param Object $database
	 * @return Object $res (should return one record)
	 * 
	 */
	static function ServiceSearchsByServiceName($serviceName,$database)
	{
		
		$sql = "SELECT 
					*
				FROM
					SERVICE
				WHERE
					SERVICE_NAME =  '{$serviceName}'";
		$res = $database->query($sql);
		return $res;
	}
	/**
	 * Search services that are part of a bucket by BucketId
	 * 
	 * @param String $bucketId 
	 * @param Object $database
	 * @return Object $res (all service records that are part of the bucket)
	 * 
	 */
	static function ServiceSearchsByBucketId($bucketId,$database)
	{
		
		$sql = "SELECT 
					* 
				FROM
					CLIENT_SERVICE_BUCKET
				WHERE
					BUCKET_ID =  '{$bucketId}'";
		$res = $database->query($sql);
		return $res;
	}
	
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
		
		$sql = "SELECT
					*
				FROM 
					BUCKET
				WHERE
					BUCKET_NAME =  '{$bucketName}'";
		$res = $database->query($sql);
		return $res;
	}
	

	/**
	 * Search a Bucket by Bucket Id
	 * 
	 * @param String $bucketId 
	 * @param Object $database
	 * @return Object $res Only 1 bucket
	 * 
	 */
	static function searchBucketsByBucketId($bucketId,$database)
	{
		
		$sql = "SELECT
					*
				FROM
					BUCKET
				WHERE
					BUCKET_ID =  '{$bucketId}'";
		$res = $database->query($sql);
		return $res;
	}
		
	/**
	 * Search a Bucket Ids by Client Id
	 * 
	 * @param String $clientId 
	 * @param Object $database
	 * @return Object $res All Bucket Ids of the client
	 * 
	 */
	static function searchBucketIdsByClientId($clientId,$database)
	{
		
		$sql = "SELECT
					DISTINCT(BUCKET_ID)
				FROM
					CLIENT_SERVICE_BUCKET
				WHERE
					CLIENT_ID = {$clientId}";
		$res = $database->query($sql);
		return $res;
	}
	
}

?>