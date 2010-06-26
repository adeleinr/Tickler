<?php 

class Feed{
	
	const rootURL = "http://socialburner";
	
	static function assembleFeedURL($fid){
		
		return self::rootURL."/proxy.php?fid=$fid";
		
	}
	
	static function createFeedURL($userId, $URL, $database){
		
		$sql = "INSERT INTO 
					FEED (USER_ID, FEED_URL)
				VALUES ('{$userId}','{$URL}')";
		$res = $database->query($sql);
		$fid = $database->getLastId();	
		
		$sql = "INSERT INTO 
					CLICK (FK_FEED_ID)
				VALUES ('{$fid}')";
		$res = $database->query($sql);
		
		$URL = self::assembleFeedURL($fid);
		
		return $URL;
				
	}


	
	
	
	static function getFeedURL($fid, $database){
		
		$sql = "SELECT * FROM
					FEED
				WHERE
					FEED_ID = '{$fid}'";
		
		$res = $database->query($sql);
		
		if ( $url = $database->fetchRow($res) )
		{
			
			return $url['FEED_URL'];
		}
		
	}

	
	
	static function getSocialImage($url){
		
		$host = parse_url($url, PHP_URL_HOST);
				
		switch ($host)
		{
			case 'twitter.com':
				return 'twitter';
			break;
			case 'www.twitter.com':
				return 'twitter';
			break;
			case 'facebook.com':
				return 'facebook';
			break;
			case 'www.facebook.com':
				return 'facebook';
			break;
			case 'friendfeed.com':
				return 'friendfeed';
			break;
			case 'www.friendfeed.com':
				return 'friendfeed';
			break;
			case 'flickr.com':
				return 'flickr';
			break;
				case 'www.flickr.com':
				return 'flickr';
			break;
			case 'yelp.com':
				return 'yelp';
			break;
			case 'www.yelp.com':
				return 'yelp';
			break;
			default:
				return 'unknown';
			
		}
		
	}
	
		
}


?>