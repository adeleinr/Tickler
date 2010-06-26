<?php

require 'SocialBurner/Model/Core/Proxy/Feed.class.php';
require 'SocialBurner/Model/Core/Category/Category.class.php';

class User
{		
	
	CONST debug = FALSE;
		
	/**
	 * Render search result
	 * 
	 * @param String $userId
	 * @param Object $profile
	 * @param Object $template
	 * @param Object $database
	 * @return Void
	 * 
	 */
	static function renderUserFeedsSummary($userId, $profile, $template, $database)
	{

		$results = "";
		$template->parse("FEEDS_LIST", "");
		
		$sql = "SELECT * FROM
					CLICK
				INNER JOIN
					FEED
				ON
					FK_FEED_ID = FEED_ID
				WHERE
					USER_ID = '{$userId}'";
		
		$res = $database->query($sql);
		
		if( $res ){
		
			$results .= "<table>
								<tr>
									<td> </td>
									<td> Feed Url </td>
									<td> Number of Clicks </td>
								</tr>";
			
			while ( $userInfo = $database->fetchRow($res) )
			{
				$img = '/View/ClientPresentation/Images/'.Feed::getSocialImage($userInfo['FEED_URL']).'.png';
				
				$results .= "
							<tr>
								<td> <img src='$img'/> </td>
								<td> <a href='{$userInfo['FEED_URL']}'>{$userInfo['FEED_URL']}</a> </td>
								<td> {$userInfo['FEED_CLICKS']} </td>
							</tr>";			
				
			}
			
			$results .= "</table>";
	
			$template->parse("FEEDS_LIST", $results, "w+");
		}else{
			$template->parse("MESSAGE", "You have no feeds", "w+");
		}
			
	}
	
	static function renderAndCreateSimpleCard($cardFields, $userId, $database, $template){
				
		$socialCard = "";	
		$proxyURL = "";

		if( isset($cardFields['USER_NAME']) ){
		 
			$id = "";
		
			// Required field
			$socialCard .= "<div id='socialCard'>";
					
			$socialCard .= "<div id='social'>";

			if( isset($cardFields['TWITTER_URL']) && !empty($cardFields['TWITTER_URL']) ){
				$proxyURL = Feed::createFeedURL($userId, $cardFields['TWITTER_URL'], $database);
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/twitter.png'/></a>";
				
			}
			
			if( isset($cardFields['FACEBOOK_URL']) && !empty($cardFields['FACEBOOK_URL']) ){
				$proxyURL = Feed::createFeedURL($userId, $cardFields['FACEBOOK_URL'], $database);
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/facebook.png'/></a>";
			}
			
			if( isset($cardFields['FRIENDFEED_URL']) && !empty($cardFields['FRIENDFEED_URL'])){
				$proxyURL = Feed::createFeedURL($userId, $cardFields['FRIENDFEED_URL'], $database);
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/friendfeed.png'/></a>";
				
			}
			
			if( isset($cardFields['FLICKR_URL']) && !empty($cardFields['FLICKR_URL'])){
				$proxyURL = Feed::createFeedURL($userId, $cardFields['FLICKR_URL'], $database);
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/flickr.png'/></a>";
				
			}
			
			if( isset($cardFields['YELP_URL']) && !empty($cardFields['YELP_URL'])){
				$proxyURL = Feed::createFeedURL($userId, $cardFields['YELP_URL'], $database);
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/yelp.png'/></a>";
				
			}
		
			$socialCard .="</div><div id='socialid'>socialID: $userId </div></div>";	
			$template->parse("SOCIALCARD", $socialCard, "w+");	
									
		}else{
			$template->parse("SOCIALCARD", "", "w+");
		}
		
		return $socialCard;
	}
	
	static function createFullCard($userId, $database, $template){
				
		$socialCard = "";
		
		//  Gather use information
		//-----------------------------//
		$sql = "SELECT * FROM
					USER
				WHERE
					USER_ID = '{$userId}'";
		
		$res = $database->query($sql);
		
		if( $res){
			
			$userInfo = $database->fetchRow($res);

			if( isset($userInfo['USER_NAME']) ){
					
				$id = "";

				$categoryID = $userInfo['CATEGORY'];
				
				$imgURL = Category::getImageURL($categoryID, $database);
	
				$socialCard .= "<div id='socialCard'>
										<div class='span-3'>
											<img src='{$imgURL}'/>
										</div>
										<div class='span-4 last'>
											<div id='name'> {$userInfo['USER_NAME']} </div>";
				
				if( isset($userInfo['USER_STREET']) ){
				
					$socialCard .= "<div id='street'> {$userInfo['USER_STREET']}</div>";
			
				}
				if( isset($userInfo['USER_CITY']) ){
				
					$socialCard .= "<div id='city'> {$userInfo['USER_CITY']}</div>";
			
				}
			
				if( isset($userInfo['USER_STATE']) ){
				
					$socialCard .= "<div id='state'> {$userInfo['USER_STATE']}";
			
				}
				
				if( isset($userInfo['USER_ZIP']) ){
				
					$socialCard .= 				", {$userInfo['USER_ZIP']}</div>";
			
				}
				else{
			
					$socialCard .= "</div>";
				}
			
				if( isset($userInfo['USER_URL']) ){
				
					$socialCard .= "<div id='url'>
								   	<a href='{$userInfo['USER_URL']}'>{$userInfo['USER_URL']}</a>
								   	</div>";
			
				}
			
				$socialCard .= "<div id='social'>";
				
				$socialCard .= self::getSocialInfo($userId, $database);
			
				$socialCard .="</div>
							   <div id='socialid' style='visibility:hidden'>socialID: $userId </div>
							   </div>
							   </div>";
				$template->parse("SOCIALCARD", $socialCard, "w+");
												
			}
		}
		else{
			$template->parse("SOCIALCARD", "", "w+");
		}
		
		return $socialCard;
	}
	
	
	
	static function renderSimpleCard($userId, $database, $template){
		
		$proxyURL = "";
		$socialCard = "";

		$sql = "SELECT * FROM
					FEED
				WHERE
					USER_ID = '{$userId}'";
		
		$res = $database->query($sql);


		if ( $res ){
			
			$socialCard .= "<div id='socialCard'>";
						
			$socialCard .= self::getSocialInfo($userId, $database);
			
			$socialCard .= "</div>";
		 		
			$template->parse("SOCIALCARD", $socialCard, "w+");	
									
		}else{
			$template->parse("SOCIALCARD", "", "w+");
		}
		
		return $socialCard;
	}
	
	static function getSocialInfo($userId, $database){
		
		$proxyURL = "";
		$socialCard = "";

		$sql = "SELECT * FROM
					FEED
				WHERE
					USER_ID = '{$userId}'";
		
		$res = $database->query($sql);

		if ( $res ){
						
			$socialCard .= "<div id='social'>";
		 
			while( $feedData = $database->fetchRow($res)){
				// Required field
	
				$socialImage = Feed::getSocialImage($feedData['FEED_URL']);
				
				$proxyURL = Feed::assembleFeedURL($feedData['FEED_ID']);
				
				$socialCard .= "<a href='$proxyURL'><img src='/View/ClientPresentation/Images/{$socialImage}.png'/></a>";
			
			}
		
			$socialCard .="</div><div id='socialid' style='visibility:hidden'>socialID: $userId </div>";	
									
		}
		
		return $socialCard;
		
	}
		

	
	
	
	static function dumpRenderedContent( $outFile, $content )
	{
		$fh = fopen($outFile, 'w') or die("can't open file");
		fwrite($fh, $content);
		
	}
	
}

?>