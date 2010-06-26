<?php

require 'ServiceBucket/Model/Core/Service/ServiceSearch.class.php';

class Event
{		
	
	/**
	 * Save am event
	 * 
	 * @param Array  $post
	 * @param Object $profile
	 * @param String $providerId
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function saveEvent($post, $providerId, $template, $database)
	{
		
		//TODO Need to figure out what to do with start/ending dates
		$sql = "INSERT
				INTO 
					EVENT (PROVIDER_ID, EVENT_NAME, EVENT_DESCRIPTION, EVENT_START_DATE)
				VALUES ('{$providerId}','{$post['EVENT_NAME']}','{$post['EVENT_DESCRIPTION']}',NOW())";

		$res = $database->query($sql);
		$eventId = $database->getLastId();
		if( $eventId > 0)
		{
			$template->parse('MESSAGE', "Wohoo! Your event was published to many users");
		}

	}
	

	
	
}

?>